<?php

namespace App\Http\Controllers;

use Auth;

use App\User;
use App\Task;

use App\Custom\AdminHelper;
use App\Custom\ClientHelper;
use App\Custom\InvoiceHelper;
use App\Custom\EmployeesHelper;
use App\Custom\ClientDashboardHelper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login() {
    	// Dynamic page elements
    	$page_title = "Admin Login";
    	$page_header = $page_title;

        // Redirect if already logged in
        $redirect_code = $this->redirect_admin();
        if ($redirect_code == 0) {
            return redirect(url('/members/dashboard'));
        } elseif ($redirect_code == 1) {
            $this->login_user();
            return redirect(url('/admin/dashboard'));
        }

    	return view('admin.login')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function logout() {
        AdminHelper::logout();
        return redirect(url('/'));
    }

    public function user_login(Request $data) {
    	// Get data
    	$username = $data->username;
    	$password = $data->password;

    	// Create user dictionary
    	$user_data = array(
            'username' => $username,
            'password' => $password
        ); 

    	// Get user
    	if (User::where('username', $username)->count() == 0) {
    		return redirect()->back()->with('error', 'User does not exist');
    	} else {
    		$user = User::where('username', $username)->first();
    		
    		// Attempt logging in
    		if (Auth::attempt($user_data)) {
    			// Check for backend auth
    			if ($user->backend_auth == 0) {
    				return redirect()->back()->with('admin_login_error', 'You are not authorized to access this area.');
    			} else {
    				$this->login_user();
    				return redirect(url('/admin/dashboard'));
    			}
    		} else {
    			return redirect()->back()->with('admin_login_error', 'Password is incorrect.');
    		}
    	}
    }

    public function new_task() {
        if($this->protect() != 1) {
            return redirect(url('/admin'));
        }

        $page_title = "New Task";
        $page_header = $page_title;

        $client_helper = new ClientHelper;
        $clients = $client_helper->get_all_clients();

        return view('admin.tasks.new')->with('page_title', $page_title)->with('page_header', $page_header)->with('clients', $clients);
    }

    public function create_task(Request $data) {
        $task = new Task;
        $task->client_id = $data->client_id;
        $task->title = $data->title;
        $task->description = $data->description;
        $task->due_date = $data->due_date;
        $task->status = $data->status;
        $task->notes = $data->notes;
        $task->category_id = 0;
        $task->save();

        return redirect(url('/admin/tasks/view'));
    }

    public function view_all_tasks() {
        $tasks = Task::where('status', '>', 0)->get();
        $page_title = "All Tasks";
        $page_header = $page_title;
        return view('admin.tasks.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('tasks', $tasks);
    }

    public function view_requested_tasks() {
        $tasks = ClientDashboardHelper::viewRequestedTasks();
        $page_title = "Requested Tasks";
        $page_header = $page_title;
        return view('admin.tasks.requested')->with('tasks', $tasks)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function edit_task($task_id) {
        $task = Task::find($task_id);
        $page_title = "Edit Task";
        $page_header = $page_title;
        return view('admin.tasks.edit')->with('task', $task)->With('page_title', $page_title)->with('page_header', $page_header);
    }

    public function update_task(Request $data) {
        $task = Task::find($data->task_id);
        $task->title = $data->title;
        $task->description = $data->description;
        $task->due_date = $data->due_date;
        $task->status = $data->status;
        $task->notes = $data->notes;
        $task->save();

        return redirect(url('/admin/tasks/view'));
    }

    public function dashboard() {
        // Dynamic page elements
        $page_title = "Dashboard";
        $page_header = $page_title;

        // Protect admin backend
        if ($this->protect() != 1) {
            return redirect(url('/admin'));
        }

        return view('admin.dashboard')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function view_clients() {
        // Dynamic page elements
        $page_title = "Clients";
        $page_header = $page_title;

        // Protect admin backend
        if ($this->protect() != 1) {
            return redirect(url('/admin'));
        }

        // Get clients
        $client_helper = new ClientHelper();
        $clients = $client_helper->get_all_clients();

        return view('admin.clients.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('clients', $clients);
    }

    public function edit_client($client_id) {
        // Dynamic page elements
        $page_title = "Edit Client";
        $page_header = $page_title;

        // Protect admin backend
        if ($this->protect() != 1) {
            return redirect(url('/admin'));
        }

        // Get invoices
        $client_helper = new ClientHelper($client_id);
        $client = $client_helper->read();

        $employees = EmployeesHelper::getAllEmployees();

        return view('admin.clients.edit')->with('page_title', $page_title)->with('page_header', $page_header)->with('client', $client)->with('employees', $employees);
    }

    public function new_client() {
        // Dynamic page elements
        $page_title = "New Client";
        $page_header = $page_title;

        // Protect admin backend
        if ($this->protect() != 1) {
            return redirect(url('/admin'));
        }

        return view('admin.clients.new')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function view_invoices() {
        // Dynamic page elements
        $page_title = "Invoices";
        $page_header = $page_title;

        // Protect admin backend
        if ($this->protect() != 1) {
            return redirect(url('/admin'));
        }

        // Get invoices
        $invoice_helper = new InvoiceHelper();
        $invoices = $invoice_helper->get_all_invoices();

        // Client helper for page
        $client_helper = new ClientHelper();

        return view('admin.invoices.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('invoices', $invoices)->with('client_helper', $client_helper);
    }

    public function edit_invoice($invoice_id) {
        // Dynamic page elements
        $page_title = "Edit Invoice";
        $page_header = $page_title;

        // Protect admin backend
        if ($this->protect() != 1) {
            return redirect(url('/admin'));
        }

        // Get invoices
        $invoice_helper = new InvoiceHelper($invoice_id);
        $invoice = $invoice_helper->read();

        // Client helper for page
        $client_helper = new ClientHelper($invoice->client_id);

        return view('admin.invoices.edit')->with('page_title', $page_title)->with('page_header', $page_header)->with('invoice', $invoice)->with('client_helper', $client_helper);
    }

    public function new_invoice() {
        // Dynamic page elements
        $page_title = "New Invoice";
        $page_header = $page_title;

        // Protect admin backend
        if ($this->protect() != 1) {
            return redirect(url('/admin'));
        }

        // Get clients
        $client_helper = new ClientHelper();
        $clients = $client_helper->get_all_clients();

        return view('admin.invoices.new')->with('page_title', $page_title)->with('page_header', $page_header)->with('clients', $clients);
    }
    
    /* Private functions */
    private function protect() {
        // Check to see if already logged in
        if (!Auth::guest()) {
            // Check to see if user has backend authorization
            $user = Auth::user();
            if ($user->backend_auth == 0) {
                return 0;
            } else {
                return 1;
            }
        } else {
            // Not even logged in
            return 2;
        }
    }

    private function redirect_admin() {
        // Check to see if user logged in
        if (!Auth::guest()) {
            // Check to see if user has backend authorization
            $user = Auth::user();
            if ($user->backend_auth == 0) {
                return 0;
            } else {
                return 1;
            }
        } else {
            // Not even logged in
            return 2;
        }
    }

    private function login_user() {
    	// Get data
    	$user = Auth::user();
    	$user_id = $user->id;
    	$backend_auth = $user->backend_auth;

    	// Save
    	Session::put('backend_auth', $backend_auth);
    	Session::put('admin_user_id', $user_id);
    	Session::put('admin_login', true);
    	Session::put('admin_switch', false);
    }
}
