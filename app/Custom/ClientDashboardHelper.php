<?php

namespace App\Custom;

use App\Task;

class ClientDashboardHelper {

	public static function viewAllForClient($client_id) {
		return Task::where('client_id', $client_id)->get();
	}

	public static function viewRequestedTasks() {}

	public static function viewClosedTasks($client_id) {}

	public static function viewOpenTasks($client_id) {}
	
	public static function getTasksCompletedChart($client_id) {}

	public static function viewLogsForClient($client_id) {}

	public static function viewLogsForCategory($category_id, $client_id) {}

}

?>