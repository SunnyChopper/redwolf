<?php

namespace App\Custom;

use Carbon\Carbon;

use Illuminate\Support\Facades\Session;

use App\Employee;
use App\EmployeeCategory;

class EmployeesHelper {

	public static function isAuth() {
		if (Session::has('employee_id')) {
			return true;
		} else {
			return false;
		}
	}

	public static function getLoggedInEmployeeFirstName() {
		return Employee::find(Session::get('employee_id'))->first_name;
	}
	
	public static function getAllEmployees() {
		return Employee::where('is_active', '!=', 0)->get();
	}

	public static function getAllEmployeeCategories() {
		return EmployeeCategory::where('is_active', 1)->get();
	}

	public static function getEmployeesInCategory($category_id) {
		return Employee::where('category_id', $category_id)->where('is_active', 1)->get();
	}

	public static function getEmployeesWithTitle($title) {
		return Employee::where('title', 'LIKE', '%'.$title.'%')->where('is_active', 1)->get();
	}

	public static function getCategoryTitle($category_id) {
		$cat = EmployeeCategory::find($category_id);
		return $cat->title;
	}

	public static function getEmail($employee_id) {
		return Employee::find($employee_id)->email;
	}

	public static function getEmployeeName($employee_id) {
		$e = Employee::find($employee_id);
		return $e->first_name . " " . $e->last_name;
	}

}

?>