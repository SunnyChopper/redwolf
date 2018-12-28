<?php

namespace App\Http\Controllers;

use App\Custom\ClientHelper;
use App\Custom\InvoiceHelper;
use App\Custom\MailHelper;

use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function create(Request $data) {
        // Check to see if new client created
        if ($data->client_id == "create_new") {
            $client_data = array(
                "company_name" => $data->company_name,
                "email" => $data->client_email,
                "first_name" => $data->client_first_name,
                "last_name" => $data->client_last_name
            );

            // Create client
            $client_helper = new ClientHelper();
            $client_id = $client_helper->create($client_data);

            // Get data
            $invoice_data = array(
                "client_id" => $client_id,
                "amount" => $data->amount,
                "due_date" => $data->due_date,
                "status" => 0
            );

            // Create invoice
            $invoice_helper = new InvoiceHelper();
            $invoice_id = $invoice_helper->create($invoice_data);

        } else {
            // Get data
            $invoice_data = array(
                "client_id" => $data->client_id,
                "amount" => $data->amount,
                "due_date" => $data->due_date,
                "status" => 0
            );

            // Create invoice
            $invoice_helper = new InvoiceHelper();
            $invoice_id = $invoice_helper->create($invoice_data);

            // Get client data
            $client_helper = new ClientHelper($data->client_id);
        }

        // Send out email to client to notify
        $mail_data = array(
            "sender_first_name" => "Red",
            "sender_last_name" => "Wolf",
            "sender_email" => env('MAIL_USERNAME'),
            "recipient_first_name" => $client_helper->get_first_name(),
            "recipient_last_name" => $client_helper->get_last_name(),
            "recipient_email" => $client_helper->get_email(),
            "subject" => "🐺 Red Wolf Entertainment - New Invoice 🐺"
        );
        $mail_helper = new MailHelper($mail_data);
        $invoice_link = url('/invoices/' . $invoice_id);
        $mail_helper->send_new_invoice_email($invoice_link);

    	// Redirect
    	return redirect(url('/admin/invoices/view'));
    }

    public function update(Request $data) {
        // Get data
        $invoice_data = array(
            "invoice_id" => $data->invoice_id,
            "amount" => $data->amount,
            "due_date" => $data->due_date,
            "status" => $data->status
        );

        // Update invoice
        $invoice_helper = new InvoiceHelper();
        $invoice_helper->update($invoice_data);

        // Redirect
        return redirect(url('/admin/invoices/view'));
    }

    public function make_payment(Request $data) {
        // Get data
        $invoice_data = array(
            "invoice_id" => $data->invoice_id,
            "first_name" => $data->first_name,
            "last_name" => $data->last_name,
            "email" => $data->email,
            "card_number" => $data->card_number,
            "ccExpiryMonth" => $data->ccExpiryMonth,
            "ccExpiryYear" => $data->ccExpiryYear,
            "cvvNumber" => $data->cvvNumber
        );

        // Make payment
        $invoice_helper = new InvoiceHelper();
        $code = $invoice_helper->make_payment($invoice_data);

        if ($code == "success") {
            // Redirect to thank you page
            return redirect(url('/thank-you'));
        } else {
            return redirect()->back()->with('error', $code);
        }
    }
}
