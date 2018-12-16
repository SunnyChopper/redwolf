<?php

namespace App\Custom;

use Validator;
use Session;
use Auth;
use Mail;

class MailHelper {
	/* Private global variables */
	private $sender_first_name;
	private $sender_last_name;
	private $sender_email;
	private $recipient_first_name;
	private $recipient_last_name;
	private $recipient_email;
	private $body;
	private $subject;

	/* Initializer */
	public function __construct($data) {
		if (isset($data["sender_first_name"])) {
			$this->sender_first_name = $data["sender_first_name"];
		} else {
			$this->sender_first_name = "";
		}

		if (isset($data["sender_last_name"])) {
			$this->sender_last_name = $data["sender_last_name"];
		} else {
			$this->sender_last_name = "";
		}

		if (isset($data["sender_email"])) {
			$this->sender_email = $data["sender_email"];
		} else {
			$this->sender_email = "";
		}

		if (isset($data["recipient_first_name"])) {
			$this->recipient_first_name = $data["recipient_first_name"];
		} else {
			$this->recipient_first_name = "";
		}

		if (isset($data["recipient_last_name"])) {
			$this->recipient_last_name = $data["recipient_last_name"];
		} else {
			$this->recipient_last_name = "";
		}

		if (isset($data["recipient_email"])) {
			$this->recipient_email = $data["recipient_email"];
		} else {
			$this->recipient_email = "";
		}

		if (isset($data["body"])) {
			$this->body = $data["body"];
		} else {
			$this->body = "";
		}

		if (isset($data["subject"])) {
			$this->subject = $data["subject"];
		} else {
			$this->subject = "";
		}
	}

	/* Public functions */
	public function send_contact_email() {
		$email_data = $this->get_email_data();
		Mail::send('emails.contact-email', $email_data, function($message) use ($email_data) {
			$message->to("luis@redwolfent.com", "Red Wolf")->subject($email_data["subject"]);
			$message->from(env('MAIL_USERNAME'), "Red Wolf");
			$message->replyTo($email_data["sender_email"], $email_data["sender_first_name"] . " " . $email_data["sender_last_name"]);
		});
	}

	public function send_thank_you_email($company_name, $amount) {
		$email_data = $this->get_email_data();
		Mail::send('emails.thank-you-email', $email_data, function($message) use ($email_data) {
			$message->to($email_data["recipient_email"], $email_data["recipient_first_name"] . " " . $email_data["recipient_last_name"])->subject($email_data["subject"]);
			$message->from(env('MAIL_USERNAME'), "Red Wolf");
			$message->replyTo(env('MAIL_USERNAME'), "Red Wolf");
		});

		// Send notification emails
		Mail::send('emails.luis-notification-email', ['email_data' => $email_data, "company_name" => $company_name, "amount" => $amount], function($message) use ($email_data) {
			$message->to("luis@redwolfent.com", "Luis Garcia")->subject("💵 Red Wolf - Invoice Paid 💵");
			$message->from(env('MAIL_USERNAME'), "Red Wolf");
			$message->cc("ishy.singh@gmail.com", "Sunny Singh");
		});
	}

	public function send_new_invoice_email($invoice_link) {
		$email_data = $this->get_email_data();
		Mail::send('emails.invoice-notification-email', ['email_data' => $email_data, 'invoice_link' => $invoice_link], function($message) use ($email_data) {
			$message->to($email_data["recipient_email"], $email_data["recipient_first_name"] . " " . $email_data["recipient_last_name"])->subject($email_data["subject"]);
			$message->from(env('MAIL_USERNAME'), "Red Wolf");
			$message->replyTo(env('MAIL_USERNAME'), "Red Wolf");
		});
	}

	/* Private functions */
	private function get_email_data() {
		$data = array(
			"sender_first_name" => $this->sender_first_name,
			"sender_last_name" => $this->sender_last_name,
			"sender_email" => $this->sender_email,
			"recipient_first_name" => $this->recipient_first_name,
			"recipient_last_name" => $this->recipient_last_name,
			"recipient_email" => $this->recipient_email,
			"body" => $this->body,
			"subject" => $this->subject
		);

		return $data;
	}
}

?>