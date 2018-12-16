<?php

namespace App\Http\Controllers;

use App\Custom\ClientHelper;
use App\Custom\InvoiceHelper;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	// Dynamic page elements
    	$page_title = "Home";

    	return view('pages.index')->with('page_title', $page_title);
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
}
