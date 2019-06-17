<?php

namespace App\Custom;

use Carbon\Carbon;
use App\Task;
use App\Charts\SampleChart;

/* ------------------- *\
	-1. Unapproved
	0. Deleted
	1. Scheduled
	2. Requested
	3. In Progress
	4. Waiting on Client
	5. Done
\* ------------------- */

class ClientDashboardHelper {

	public static function viewAllForClient($client_id) {
		return Task::where('client_id', $client_id)->get();
	}

	public static function numberRequestedTasks() {
		return Task::where('status', 2)->count();
	}

	public static function getUnapprovedTasks() {
		return Task::where('status', -1)->get();
	}

	public static function viewRequestedTasks() {
		return Task::where('status', 2)->get();
	}

	public static function viewClosedTasks($client_id) {
		return Task::where('status', 5)->get();
	}

	public static function viewOpenTasks($client_id) {
		return Task::where('status', 3)->get();
	}
	
	public static function getTasksCompletedChart($client_id) {
		// Get completed tasks
		$tasks_array = array();
		$dates_array = array();
		for ($i = 7; $i >= 0; $i--) {
			array_push($dates_array, Carbon::today()->subDays($i)->format('M jS, Y'));
			$tasks = Task::where('status', 5)->where('client_id', $client_id)->whereDate('completed_time', '=', Carbon::today()->subDays($i))->count();
			array_push($tasks_array, $tasks);
		}

		// Create basic chart
        $chart = new SampleChart;
        $chart->labels($dates_array);

        // Set dataset
        $chart->dataset('Tasks Completed', 'line', $tasks_array)->options([
            'backgroundColor' => 'rgba(219, 21, 41, 0.75)',
            'fill' => true
        ]);
        $chart->displayLegend(false);

        return $chart;
	}

	public static function viewLogsForClient($client_id) {}

	public static function viewLogsForCategory($category_id, $client_id) {}

}

?>