<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\Custom\TasksHelper;
use App\Custom\AdminHelper;
use App\Custom\EmployeesHelper;
use App\Employee;

class EmployeesController extends Controller
{

    public function login() {
        if (EmployeesHelper::isAuth() == true) {
            return redirect(url('/employees/dashboard'));
        }

        $page_title = "Employees Login";
        $page_header = $page_title;

        return view('employees.login')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function attempt_login(Request $data) {
        if (Employee::where('email', strtolower($data->email))->count() > 0) {
            $employee = Employee::where('email', strtolower($data->email))->first();
            if ($employee->is_active == 2) {
                Session::put('employee_id', $employee->id);
                Session::save();
                return redirect(url('/employee/password/set'));
            } else {
                if (Hash::check($data->password, $employee->password)) {
                    Session::put('employee_id', $employee->id);
                    Session::save();
                    return redirect(url('/employee/dashboard'));
                } else {
                    return redirect()->back()->with('error', 'Password is incorrect.');
                }
            }
        } else {
            return redirect()->back()->with('error', 'No account associated with that email.');
        }
    }

    public function set_password() {
        $employee = Employee::find(Session::get('employee_id'));

        $page_title = "Set Password";

        return view('employees.set-password')->with('page_title', $page_title)->with('employee', $employee);
    }

    public function update_password(Request $data) {
        $employee = Employee::find(Session::get('employee_id'));
        $employee->password = Hash::make($data->password);
        $employee->is_active = 1;
        $employee->save();

        return redirect(url('/employee/dashboard'));
    }

    public function dashboard() {
        if (EmployeesHelper::isAuth() == false) {
            return redirect(url('/employee'));
        }

        $employee = Employee::find(Session::get('employee_id'));
        $tasks = TasksHelper::getUpcomingTasks();
        $past_tasks = TasksHelper::getPastTasks();

        $page_title = "Employee Dashboard";
        $page_header = $page_title;

        return view('employees.dashboard')->with('page_title', $page_title)->with('page_header', $page_header)->with('employee', $employee)->with('tasks', $tasks)->with('past_tasks', $past_tasks);
    }

    public function logout() {
        Session::forget('employee_id');
        Session::save();

        return redirect(url('/'));
    }

    public function view_all() {
        if (AdminHelper::isAdmin() == false) {
            return redirect(url('/admin'));
        }

        $page_title = "All Employees";
        $page_header = $page_title;

        $employees = EmployeesHelper::getAllEmployees();

        return view('admin.employees.view-all')->with('employees', $employees)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function new() {
        if (AdminHelper::isAdmin() == false) {
            return redirect(url('/admin'));
        }

        $page_title = "Create New Employee";
        $page_header = $page_title;

        $categories = EmployeesHelper::getAllEmployeeCategories();

        return view('admin.employees.new')->with('page_title', $page_title)->with('page_header', $page_header)->with('categories', $categories);
    }

    public function create(Request $data) {
    	$employee = new Employee;
    	$employee->first_name = $data->first_name;
    	$employee->last_name = $data->last_name;
    	$employee->email = $data->email;
    	$employee->password = Hash::make($data->password);

    	if(isset($data->phone)) {
    		$employee->phone = $data->phone;
    	}

    	if(isset($data->title)) {
            $employee->title = $data->title;
        }

        $employee->category_id = $data->category_id;
    	$employee->save();

    	return redirect(url('/admin/employees/view'));
    }

    public function read($employee_id) {
    	$employee = Employee::find($employee_id);
    	$page_title = $employee->first_name . " " . $employee->last_name;
    	$page_header = $page_title;
    	return view('admin.employees.view')->with('employee', $employee)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function edit($employee_id) {
        if (AdminHelper::isAdmin() == false) {
            return redirect(url('/admin'));
        }

        $employee = Employee::find($employee_id);

        $categories = EmployeesHelper::getAllEmployeeCategories();

        $page_title = $employee->first_name . " " . $employee->last_name;
        $page_header = $page_title;

        return view('admin.employees.edit')->with('employee', $employee)->with('categories', $categories)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function update(Request $data) {
    	$employee = Employee::find($data->employee_id);
    	$employee->first_name = $data->first_name;
        $employee->last_name = $data->last_name;

    	if(isset($data->phone)) {
            $employee->phone = $data->phone;
        }

        if(isset($data->title)) {
            $employee->title = $data->title;
        }

        $employee->category_id = $data->category_id;
        $employee->save();

    	return redirect(url('/admin/employees/view'));
    }

    public function delete(Request $data) {
    	$employee = Employee::find($data->employee_id);
    	$employee->is_active = 0;
    	$employee->save();

    	return redirect(url('/admin/employees/view'));
    }
}
