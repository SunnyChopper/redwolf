<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login() {
    	// Dynamic page elements
    	$page_title = "Admin Login";
    	$page_header = $page_title;

    	return view('admin.login')->with('page_title', $page_title)->with('page_header', $page_header);
    }
}
