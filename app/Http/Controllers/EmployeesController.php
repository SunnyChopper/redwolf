<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Employee;

class EmployeesController extends Controller
{
    public function create(Request $data) {
    	$employee = new Employee;
    	$employee->first_name = $data->first_name;
    	$employee->last_name = $data->last_name;
    	$employee->email = $data->email;
    	$employee->password = Hash::make($data->password);
    	if(isset($data->phone)) {
    		$employee->phone = $data->phone;
    	}
    	if (isset($data->auth_level)) {
    		$employee->auth_level = $data->auth_level;
    	}
    	$employee->save();

    	return redirect(url('/admin/employees/view'));
    }

    public function read($employee_id) {
    	$employee = Employee::find($employee_id);
    	$page_title = $employee->first_name . " " . $employee->last_name;
    	$page_header = $page_title;
    	return view('admin.employees.view-employee')->with('employee', $employee)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function update(Request $data) {
    	$employee = Employee::find($data->employee_id);
    	$employee->first_name = $data->first_name;
    	$employee->last_name = $data->last_name;
    	$employee->email = $data->email;
    	$employee->password = Hash::make($data->password);
    	if(isset($data->phone)) {
    		$employee->phone = $data->phone;
    	}
    	if (isset($data->auth_level)) {
    		$employee->auth_level = $data->auth_level;
    	}
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
