<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentsController extends Controller
{
    public function create(Request $data) {
    	$app = new Appointment;
    	$app->client_id = $data->client_id;
    	$app->meeting_time = $data->meeting_time;
    	if (isset($data->status)) {
    		$app->status = $data->status;
    	}
    	$app->save();

    	return redirect(url($data->redirect_url));
    }

    public function read($appointment_id) {
    	$app = Appointment::find($appointment_id);

    	$page_title = "View Appointment";
    	$page_header = $page_title;

    	return view('admin.appointments.view');
    }

    public function update(Request $data) {
    	$app = Appointment::find($data->appointment_id);
    	$app->meeting_time = $data->meeting_time;
    	if (isset($data->status)) {
    		// TODO: If approved, send email
    		$app->status = $data->status;
    	}
    	$app->save();

    	return redirect(url($data->redirect_url));
    }

    public function delete(Request $data) {
    	$app = Appointment::find($data->appointment_id);
    	$app->is_active = 0;
    	$app->save();

    	return redirect(url($data->redirect_url));
    }
}
