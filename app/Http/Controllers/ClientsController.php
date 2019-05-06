<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Client;
use App\Custom\ClientHelper;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Charts\SampleChart;

class ClientsController extends Controller
{

    public function dashboard_login() {
        $page_title = "Clients Login";
        return view('clients.login')->with('page_title', $page_title);
    }

    public function attempt_login(Request $data) {
        if (Client::where('email', strtolower($data->email))->count() > 0) {
            $client = Client::where('email', strtolower($data->email))->first();
            Session::put('active_client_id', $client->id);
            Session::save();

            return redirect(url('/clients/dashboard'));
        } else{
            return redirect()->back()->with('error', 'The email you entered was not associated with any client accounts.');
        }
    }

    public function dashboard() {
        // Check if authorized.
        if ($this->authorized() == false) {
            return redirect(url('/clients/login/'));
        }

        // Get client
        $client_id = Session::get('active_client_id');
        $client = Client::find($client_id);

        // Charts
        $chart = new SampleChart;
        $chart->labels([Carbon::today()->subDays(2)->format('M jS, Y'), Carbon::today()->subDays(1)->format('M jS, Y'), Carbon::today()->format('M jS, Y')]);
        $chart->dataset('Tasks Completed', 'line', [3,2,6])->options([
            'backgroundColor' => 'rgba(219, 21, 41, 0.75)',
            'fill' => true
        ]);
        $chart->displayLegend(false);

        $page_title = $client->company_name;
        $page_header = $page_title;

        return view('clients.dashboard')->with('page_title', $page_title)->with('page_header', $page_header)->with('client', $client)->with('chart', $chart);
    }

    public function create(Request $data) {
    	// Get data
    	$client_data = array(
    		"company_name" => $data->company_name,
    		"email" => strtolower($data->email),
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

    private function authorized() {
        if (Session::has('active_client_id')) {
            return true;
        } else {
            return false;
        }
    }
}
