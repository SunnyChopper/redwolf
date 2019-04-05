<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientProject;
use App\Employee;
use App\Client;

class ClientProjectsController extends Controller
{
    public function create(Request $data) {
    	$project = new ClientProject;
    	$project->client_id = $data->client_id;
    	$project->managing_employee = $data->managing_employee;
    	if (isset($data->project_status)) {
    		$project->project_status = $data->project_status;
    	}
    	$project->save();

    	return redirect(url('/admin/projects/view'));
    }

    public function read($project_id) {
    	$project = ClientProject::find($project_id);
    	$employee = Employee::find($project->managing_employee);
    	$client = Client::find($project->client_id);

    	$page_title = "Project Dashboard";
    	$page_header = $page_title;

    	return view('pages.project-dashboard')->with('project', $project)->with('employee', $employee)->with('client', $client)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function update(Request $data) {
    	$project = ClientProject::find($data->project_id);
    	$project->managing_employee = $data->managing_employee;
    	if (isset($data->project_status)) {
    		$project->project_status = $data->project_status;
    	}
    	$project->save();

    	return redirect(url('/admin/projects/view'));
    }

    public function delete(Request $data) {
    	$project = ClientProject::find($data->project_id);
    	$project->is_active = 0;
    	$project->save();

    	return redirect(url('/admin/projects/view'));
    }
}
