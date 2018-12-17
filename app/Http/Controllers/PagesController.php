<?php

namespace App\Http\Controllers;

use App\Custom\ClientHelper;
use App\Custom\InvoiceHelper;
use App\Custom\MailHelper;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	// Dynamic page elements
    	$page_title = "Home";

    	return view('pages.index')->with('page_title', $page_title);
    }

    public function mission() {
        // Dynamic page elements
        $page_title = "Mission";
        $page_header = $page_title;

        return view('pages.mission')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function services() {
        // Dynamic page elements
        $page_title = "Services";
        $page_header = $page_title;

        return view('pages.services')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function show_invoice($invoice_id) {
    	// Get invoice
    	$invoice_helper = new InvoiceHelper($invoice_id);
    	$invoice = $invoice_helper->read();

    	// Client helper
    	$client_helper = new ClientHelper($invoice->client_id);

    	// Dynamic page elements
    	$page_title = "Pay Invoice";
    	$page_header = $client_helper->get_company_name();

    	return view('pages.invoice')->with('page_title', $page_title)->with('page_header', $page_header)->with('invoice', $invoice)->with('client_helper', $client_helper);
    }

    public function thank_you() {
    	// Dynamic page elements
    	$page_title = "Thank You";
    	$page_header = $page_title;

    	return view('pages.thank-you')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function test() {
        $mail_data = array(
            "sender_first_name" => "Red",
            "sender_last_name" => "Wolf",
            "sender_email" => env('MAIL_USERNAME'),
            "recipient_first_name" => "Sunny",
            "recipient_last_name" => "Singh",
            "recipient_email" => "ishy.singh@gmail.com",
            "subject" => "Test Email"
        );

        $mail_helper = new MailHelper($mail_data);
        $mail_helper->send_new_invoice_email("https://www.google.com");
    }
}
