<?php

namespace App\Custom;

use App\Invoice;

use App\Custom\MailHelper;
use App\Custom\ClientHelper;

use Validator;
use Session;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

use Carbon\Carbon;

class InvoiceHelper {
	/* Private global variables */
	private $id;

	/* Public functions */
	public function __construct($id = 0) {
		$this->id = $id;
	}

	public function create($data) {
		// Get data
		$client_id = $data["client_id"];
		$amount = $data["amount"];
		$status = $data["status"];
		$due_date = $data["due_date"];

		// Create invoice
		$invoice = new Invoice;
		$invoice->client_id = $client_id;
		$invoice->amount = doubleval($amount);
		$invoice->status = $status;
		$invoice->due_date = $due_date;
		$invoice->next_late_payment_email_date = $due_date;
		$invoice->save();

		return $invoice->id;
	}

	public function read($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return Invoice::find($id);
	}

	public function update($data) {
		// Get data
		$id = $data["invoice_id"];
		$amount = $data["amount"];
		$due_date = $data["due_date"];
		$status = $data["status"];

		// Create client
		$invoice = Invoice::find($id);
		$invoice->amount = $amount;
		$invoice->due_date = $due_date;
		$invoice->next_late_payment_email_date = $due_date;
		$invoice->status = $status;
		$invoice->save();
	}

	// TODO: Create delete function
	// public function delete() {}

	public function get_late_payment_invoices() {
		return Invoice::where('status', 0)->where('due_date', '<=', Carbon::now())->get();
	}

	public function get_all_invoices() {
		// TODO: Update with `is_active` field
		return Invoice::all();
	}

	public function get_unpaid_invoices() {
		return Invoice::where('status', 0)->get();
	}

	public function get_paid_invoices() {
		return Invoice::where('status', 1)->get();
	}

	public function get_cancelled_invoices() {
		return Invoice::where('status', 2)->get();
	}

	public function get_invoices_for_client($client_id) {
		return Invoice::where('client_id', $client_id)->get();
	}

	public function get_client_id($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		 return Invoice::find($id)->client_id;
	}

	public function get_amount($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		 return Invoice::find($id)->amount;
	}

	public function get_due_date($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		 return Invoice::find($id)->due_date;
	}

	public function set_status($id = 0, $status) {
		if ($id == 0) {
			$id = $this->id;
		}

		$invoice = Invoice::find($id);
		$invoice->status = $status;
		$invoice->save();
	}

	public function make_payment($data) {
		// Start by creating a charge
		$stripe = Stripe::make(env('STRIPE_SECRET'));

		// Set id
		$this->id = $data["invoice_id"];

		try {
			// Create the token
			$token = $stripe->tokens()->create([
				'card' => [
					'number'    => $data["card_number"],
					'exp_month' => $data["ccExpiryMonth"],
					'exp_year'  => $data["ccExpiryYear"],
					'cvc'       => $data["cvvNumber"]
				]
			]);

			if (!isset($token['id'])) {
				\Session::put('error','The Stripe Token was not generated correctly');
				return redirect()->back();
			}

			// Create a customer
			$customer = $stripe->customers()->create([
				"email" => $data["email"]
			]);

			// Create a card for customer
			$card = $stripe->cards()->create($customer["id"], $token["id"]);

			// Get total
			$total = $this->get_amount();

			$charge = $stripe->charges()->create([
				'customer' => $customer["id"],
				'currency' => 'USD',
				'amount'   => $total,
				'description' => 'Purchase for services from Red Wolf Entertainment'
			]);

			if($charge['status'] == 'succeeded') {
				// Successfully created charge, now, let's update invoice
				$this->set_status($this->id, 1);

				// Get client
				$client_helper = new ClientHelper($this->get_client_id());
				$client = $client_helper->read();

				// Send thank you email
				$mail_data = array(
					"recipient_email" => $client->email,
					"recipient_first_name" => $client->first_name,
					"recipient_last_name" => $client->last_name,
					"sender_email" => env('MAIL_USERNAME'),
					"sender_first_name" => env('MAIL_FIRST_NAME'),
					"sender_last_name" => env('MAIL_LAST_NAME'),
					"subject" => "🐺 Red Wolf Entertainment - Thank You 🐺"
				);

				$mail_helper = new MailHelper($mail_data);
				$mail_helper->send_thank_you_email($client->company_name, $this->get_amount());

				return "success";
			} else {
				return "error";
			}
		} catch (Exception $e) {
			return $e->getMessage();
		} catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
			return $e->getMessage();
		} catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
			return $e->getMessage();
		}
	}
}

?>