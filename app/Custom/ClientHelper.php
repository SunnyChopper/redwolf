<?php

namespace App\Custom;

use App\Client;

class ClientHelper {
	/* Private global variables */
	private $id;

	/* Public functions */
	public function __construct($id = 0) {
		$this->id = $id;
	}

	public function create($data) {
		// Get data
		$company_name = $data["company_name"];
		$first_name = $data["first_name"];
		$last_name = $data["last_name"];
		$email = $data["email"];

		// Create client
		$client = new Client;
		$client->company_name = $company_name;
		$client->first_name = $first_name;
		$client->last_name = $last_name;
		$client->email = $email;
		$client->save();

		return $client->id;
	}

	public function read($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return Client::find($id);
	}

	public function update($data) {
		// Get data
		$id = $data["client_id"];
		$company_name = $data["company_name"];
		$first_name = $data["first_name"];
		$last_name = $data["last_name"];
		$email = $data["email"];

		// Create client
		$client = Client::find($id);
		$client->company_name = $company_name;
		$client->first_name = $first_name;
		$client->last_name = $last_name;
		$client->email = $email;
		$client->save();
	}

	// TODO: Create delete function
	// public function delete() {}

	public function get_all_clients() {
		// TODO: Update with `is_active` field
		return Client::all();
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function get_company_name($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return Client::find($id)->company_name;
	}

	public function get_first_name($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return Client::find($id)->first_name;
	}

	public function get_last_name($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return Client::find($id)->last_name;
	}

	public function get_email($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return Client::find($id)->email;
	}
}

?>