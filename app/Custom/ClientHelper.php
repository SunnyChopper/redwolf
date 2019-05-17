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
		// Create client
		$client = new Client;
		$client->company_name = $data["company_name"];
		$client->first_name = $data["first_name"];
		$client->last_name = $data["last_name"];
		$client->email = $data["email"];
		$client->save();

		$this->id = $client->id;

		return $client->id;
	}

	public function read($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return Client::find($id);
	}

	public function update($data) {
		$client = Client::find($data["client_id"]);
		$client->company_name = $data["company_name"];
		$client->first_name = $data["first_name"];
		$client->last_name = $data["last_name"];
		$client->email = $data["email"];
		$client->website_dev = $data["website_dev"];
		$client->website_dev_employee_id = $data["website_dev_employee_id"];
		$client->marketing = $data["marketing"];
		$client->marketing_employee_id = $data["marketing_employee_id"];
		$client->branding = $data["branding"];
		$client->branding_employee_id = $data["branding_employee_id"];
		$client->content_curation = $data["content_curation"];
		$client->content_curation_employee_id = $data["content_curation_employee_id"];
		$client->save();
	}

	// TODO: Create delete function
	// public function delete() {}

	public function get_all_clients() {
		return Client::where('lock', 0)->get();
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public static function get_company_name($id = 0) {
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