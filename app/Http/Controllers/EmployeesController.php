<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Custom\AdminHelper;
use App\Custom\EmployeesHelper;
use App\Employee;

class EmployeesController extends Controller
{

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
