<?php

namespace App\Http\Controllers;

use Auth;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login() {
    	// Dynamic page elements
    	$page_title = "Admin Login";
    	$page_header = $page_title;

    	return view('admin.login')->with('page_title', $page_title)->with('page_header', $page_header);
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

    /* Private functions */
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
