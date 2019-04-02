<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function create(Request $data) {
    	$task = new Task;
    	$task->client_id = $data->client_id;
    	$task->title = $data->title;
    	$task->description = $data->description;
    	$task->due_date = $data->due_date;
    	if (isset($data->status)) {
    		$task->status = $data->status;
    	}
    	$task->save();

    	return redirect(url($data->redirect_url));
    }

    public function read($task_id) {
    	$task = Task::find($task_id);

    	$page_title = $task->title;
    	$page_header = $page_title;

    	return view('pages.view-task')->with('task', $task)->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function update(Request $data) {
    	$task = Task::find($data->task_id);
    	$task->title = $data->title;
    	$task->description = $data->description;
    	$task->due_date = $data->due_date;
    	if (isset($data->status)) {
    		$task->status = $data->status;
    	}
    	$task->save();

    	return redirect(url($data->redirect_url));
    }

    public function delete(Request $data) {
    	$task = Task::find($data->task_id);
    	$task->is_active = 0;
    	$task->save();

    	return redirect(url($data->redirect_url));
    }
}
