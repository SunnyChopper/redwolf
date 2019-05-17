<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeCategory;
use App\Custom\EmployeesHelper;
use App\Custom\AdminHelper;

class EmployeesCategoryController extends Controller
{

	public function view_all() {
		if (AdminHelper::isAdmin() == false) {
            return redirect(url('/admin'));
        }

        $categories = EmployeesHelper::getAllEmployeeCategories();

        $page_title = "All Employee Categories";
        $page_header = $page_title;

        return view('admin.employee-categories.view-all')->with('page_title', $page_title)->with('page_header', $page_header)->with('categories', $categories);
	}

	public function new() {
		if (AdminHelper::isAdmin() == false) {
            return redirect(url('/admin'));
        }

        $page_title = "Create New Employee Category";
        $page_header = $page_title;

        $employees = EmployeesHelper::getAllEmployees();

        return view('admin.employee-categories.new')->with('page_title', $page_title)->with('page_header', $page_header)->with('employees', $employees);
	}

    public function create(Request $data) {
    	$cat = new EmployeeCategory;
    	$cat->title = $data->title;
    	$cat->head_employee_id = $data->head_employee_id;
    	$cat->description = $data->description;
    	$cat->save();

    	return redirect(url('/admin/employee-categories/view'));
    }

    public function read($category_id) {
    	$cat = EmployeeCategory::find($category_id);
    	$page_title = $cat->title;
    	$page_header = $page_title;
    	return view('admin.employee-categories.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('category', $cat);
    }

    public function edit($category_id) {
    	if (AdminHelper::isAdmin() == false) {
            return redirect(url('/admin'));
        }

        $category = EmployeeCategory::find($category_id);

        $page_title = "Edit " . $category->title;
        $page_header = $page_title;

        return view('admin.employee-categories.edit')->with('page_title', $page_title)->with('page_header', $page_header)->with('category', $category);
    }

    public function update(Request $data) {
    	$cat = EmployeeCategory::find($data->category_id);
    	$cat->title = $data->title;
    	$cat->head_employee_id = $data->head_employee_id;
    	$cat->description = $data->description;
    	$cat->save();

    	return redirect(url('/admin/employee-categories/view'));
    }

    public function delete(Request $data) {
		$cat = EmployeeCategory::find($data->category_id);
		$cat->is_active = 0;
		$cat->save();

		return redirect(url('/admin/employee-categories/view'));
    }
}
