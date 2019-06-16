<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/email/check', function(Request $data) {
	if (User::where('email', strtolower($data->email))->count() > 0) {
		return response()->json(["error" => "Email already in use."]);
	} else {
		return response()->json(["success" => "Email not in use."]);
	}
});

Route::post('/username/check', function(Request $data) {
	if (User::where('username', strtolower($data->username))->count() > 0) {
		return response()->json(["error" => "Username already in use."]);
	} else {
		return response()->json(["success" => "Username not in use."]);
	}
});


Route::post('/profile/update', function(Request $data) {
	$user = User::find($data->user_id);
	$user->first_name = $data->first_name;
	$user->last_name = $data->last_name;
	$user->email = strtolower($data->email);
	$user->username = $data->username;
	$user->save();

	return response()->json(["success" => "Successfully updated profile."]);
});

Route::post('/password/update', function(Request $data) {
	$user = User::find($data->user_id);
	$new_password = Hash::make($data->password);
	$user->password = $new_password;
	$user->save();

	return response()->json(["success" => "Successfully updated password."]);
});