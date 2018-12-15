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

        // Redirect if already logged in
        $redirect_code = $this->redirect_admin();
        if ($redirect_code == 0) {
            return redirect(url('/members/dashboard'));
        } elseif ($redirect_code == 1) {
            return redirect(url('/admin/dashboard'));
        }

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

    public function dashboard() {
        // Dynamic page elements
        $page_title = "Dashboard";
        $page_header = $page_title;

        // Protect admin backend
        $this->protect();

        return view('admin.dashboard')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    /* Private functions */
    private function protect() {
        // Check to see if already logged in
        if (Session::has('admin_login')) {
            if (Session::get('admin_login') == false) {
                return redirect(url('/admin'));
            }
        } else {
            return redirect(url('/admin'));
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
