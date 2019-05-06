<?php


namespace App\Custom;
use Auth;
use Illuminate\Support\Facades\Session;

class AdminHelper {

	public static function isAdmin() {
		if (!Auth::guest()) {
            $user = Auth::user();
            if ($user->backend_auth == 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
	}

    public static function logout() {
        Auth::logout();
        Session::forget('backend_auth');
        Session::save();
    }

}

?>