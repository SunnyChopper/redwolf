<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Client;
use App\Task;
use App\Invoice;
use App\Log;
use App\Custom\ClientHelper;
use App\Custom\ClientDashboardHelper;
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

    public function client_logout() {
        Session::forget('active_client_id');
        Session::save();
        return redirect(url('/'));
    }

    public function dashboard() {
        // Check if authorized.
        if ($this->authorized() == false) {
            return redirect(url('/clients/login/'));
        }

        // Get client
        $client = $this->get_client();
        $client_id = $client->id;

        $chart = ClientDashboardHelper::getTasksCompletedChart($client_id);

        $page_title = $client->company_name;
        $page_header = $page_title;

        return view('clients.dashboard')->with('page_title', $page_title)->with('page_header', $page_header)->with('client', $client)->with('chart', $chart);
    }

    public function dashboard_view_tasks() {
        // Get client id
        $client = $this->get_client();
        $client_id = $client->id;

        // Get tasks
        $tasks = ClientDashboardHelper::viewAllForClient($client_id);

        $page_title = "All Tasks";
        $page_header = $page_title;
        return view('clients.tasks.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('tasks', $tasks);
    }

    public function dashboard_request_task() {
        // Get client id
        $client = $this->get_client();
        $client_id = $client->id;

        $page_title = "Request New Task";
        $page_header = $page_title;
        return view('clients.tasks.request')->with('page_title', $page_title)->with('page_header', $page_header)->with('client', $client);
    }

    public function dashboard_submit_request(Request $data) {
        // Create new task
        $task = new Task;
        $task->client_id = $data->client_id;
        $task->category_id = 0;
        $task->title = $data->title;
        $task->description = $data->description;
        $task->due_date = $data->due_date;
        $task->status = 2;
        $task->save();

        return redirect()->back()->with('success', 'Task request submitted.');
    }

    public function dashboard_view_invoices() {
        // Get client id
        $client = $this->get_client();
        $client_id = $client->id;

        $page_title = "View Invoices";
        $page_header = $page_title;

        $invoices = Invoice::where('client_id', $client_id)->get();

        return view('clients.invoices.view')->with('invoices', $invoices)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function dashboard_view_logs() {
        // Get client id
        $client = $this->get_client();
        $client_id = $client->id;

        $page_title = "View Logs";
        $page_header = $page_title;

        $logs = Log::where('client_id', $client_id)->where('is_active', 1)->get();

        return view('clients.logs.view')->with('logs', $logs)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function create(Request $data) {
    	// Get data
    	$client_data = array(
    		"company_name" => $data->company_name,
    		"email" => strtolower($data->email),
    		"first_name" => $data->first_name,
    		"last_name" => $data->last_name,
            "rep_id" => $data->rep_id
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
            "last_name" => $data->last_name,
            "rep_id" => $data->rep_id,
            "website_dev" => $data->website_dev,
            "website_dev_employee_id" => $data->website_dev_employee_id,
            "marketing" => $data->marketing,
            "marketing_employee_id" => $data->marketing_employee_id,
            "branding" => $data->branding,
            "branding_employee_id" => $data->branding_employee_id,
            "content_curation" => $data->content_curation,
            "content_curation_employee_id" => $data->content_curation_employee_id
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

    private function get_client() {
        $client_id = Session::get('active_client_id');
        $client = Client::find($client_id);
        return $client;
    }
}
