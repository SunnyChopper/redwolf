<?php

namespace App\Custom;

use App\Invoice;

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
		$invoice->amount = $amount;
		$invoice->status = $status;
		$invoice->due_date = $due_date;
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
		$invoice->status = $status;
		$invoice->save();
	}

	// TODO: Create delete function
	// public function delete() {}

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
}

?>