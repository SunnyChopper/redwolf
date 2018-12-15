<?php

namespace App\Http\Controllers;

use App\Custom\InvoiceHelper;

use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function create(Request $data) {
    	// Get data
    	$invoice_data = array(
    		"client_id" => $data->client_id,
    		"amount" => $data->amount,
    		"due_date" => $data->due_date,
    		"status" => 0
    	);

    	// Create invoice
    	$invoice_helper = new InvoiceHelper();
    	$invoice_helper->create($invoice_data);

    	// Redirect
    	return redirect(url('/admin/invoices/view'));
    }
}
