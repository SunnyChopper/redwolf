<?php

namespace App\Http\Controllers;

use App\Custom\ClientHelper;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function create(Request $data) {
    	// Get data
    	$client_data = array(
    		"company_name" => $data->company_name,
    		"email" => $data->email,
    		"first_name" => $data->first_name,
    		"last_name" => $data->last_name
    	);

    	// Create client
    	$client_helper = new ClientHelper();
    	$client_id = $client_helper->create($client_data);

    	// Redirect
    	return redirect(url('/admin/clients/view'));
    }

    public function update(Request $data) {
        // Get data
        $client_data = array(
            "client_id" => $data->client_id,
            "company_name" => $data->company_name,
            "email" => $data->email,
            "first_name" => $data->first_name,
            "last_name" => $data->last_name
        );

        // Update client
        $client_helper = new ClientHelper();
        $client_id = $client_helper->update($client_data);

        // Redirect
        return redirect(url('/admin/clients/view'));
    }
}
