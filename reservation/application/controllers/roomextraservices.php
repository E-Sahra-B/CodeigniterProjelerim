<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Roomextraservices extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin_model");
		$this->table = "room_extra_services";
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->title = "Ekstra Servisler";
		$viewData->liste = "Ekstra Servisler Listesi";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Ekstra Servisler Listesi";
		$viewData->rows = $this->admin_model->get_all($this->table, array(), "rank ASC");
		$this->load->view("panel/roomextraservices", $viewData);
	}

	public function newPage()
	{
		$viewData = new stdClass();
		$viewData->title = "Ekstra Servisler";
		$viewData->liste = "Ekstra Servis Ekle";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Ekstra Servis Ekle";
		$this->load->view("panel/new_roomextraservices", $viewData);
	}

	public function editPage($id)
	{
		$viewData = new stdClass();
		$viewData->title = "Ekstra Servisler";
		$viewData->liste = "Ekstra Servis Düzenle";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Ekstra Servis Düzenle";
		$viewData->row = $this->admin_model->get($this->table, array("id" => $id));
		$this->load->view("panel/edit_roomextraservices", $viewData);
	}

	public function add()
	{
		$data = array(
			"title" 	=> $this->input->post("title"),
			"isActive"	=> 0
		);
		$insert = $this->admin_model->add($this->table, $data);
		if ($insert) {
			redirect(base_url("panel/roomextraservices"));
		} else {
			redirect(base_url("panel/roomextraservices/newPage"));
		}
	}

	public function edit($id)
	{
		$data = array(
			"title" => $this->input->post("title")
		);
		$update = $this->admin_model->update(
			$this->table,
			array("id"	=> $id),
			$data
		);

		if ($update) {
			redirect(base_url("panel/roomextraservices"));
		} else {
			redirect(base_url("panel/roomextraservices/editPage/$id"));
		}
	}

	public function isActiveSetter()
	{
		$id 	  = $this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? 1 : 0;
		$update = $this->admin_model->update(
			$this->table,
			array("id" => $id),
			array("isActive" => $isActive)
		);
	}

	public function delete($id)
	{
		$delete = $this->admin_model->delete($this->table, array("id" => $id));
		redirect(base_url("panel/roomextraservices"));
	}

	public function rankUpdate()
	{
		parse_str($this->input->post("data"), $data);
		$items = $data["sortId"];
		foreach ($items as $rank => $id) {
			$this->admin_model->update(
				$this->table,
				array(
					"id"      => $id,
					"rank !=" => $rank
				),
				array("rank" => $rank)
			);
		}
	}
}
