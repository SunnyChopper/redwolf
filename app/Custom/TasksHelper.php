<?php


namespace App\Custom;

use Auth;
use Carbon\Carbon;

use App\Task;

use Illuminate\Support\Facades\Session;

class TasksHelper {

	public static function getUpcomingTasks() {
        return Task::whereDate('due_date', '>=', Carbon::today())->where('status', '!=', 5)->get();
    }

    public static function getPastTasks() {
    	return Task::whereDate('due_date', '<', Carbon::today())->get();
    }

}

?>