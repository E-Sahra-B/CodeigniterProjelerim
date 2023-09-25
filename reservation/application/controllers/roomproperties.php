<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Roomproperties extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin_model");
		$this->table = "room_properties";
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->title = "Özellikler";
		$viewData->liste = "Özellik Listesi";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Özellik Listesi";
		$viewData->rows = $this->admin_model->get_all($this->table, array(), "rank ASC");
		$this->load->view("panel/roomproperties", $viewData);
	}

	public function newPage()
	{
		$viewData = new stdClass();
		$viewData->title = "Özellikler";
		$viewData->liste = "Özellik Ekle";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Özellik Ekle";
		$this->load->view("panel/new_roomproperties", $viewData);
	}

	public function editPage($id)
	{
		$viewData = new stdClass();
		$viewData->title = "Özellikler";
		$viewData->liste = "Özellik Düzenle";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Özellik Düzenle";
		$viewData->row = $this->admin_model->get($this->table, array("id" => $id));
		$this->load->view("panel/edit_roomproperties", $viewData);
	}

	public function add()
	{
		$data = array(
			"title" 	=> $this->input->post("title"),
			"isActive"	=> 0
		);
		$insert = $this->admin_model->add($this->table, $data);
		if ($insert) {
			redirect(base_url("panel/roomproperties"));
		} else {
			redirect(base_url("panel/roomproperties/newPage"));
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
			redirect(base_url("panel/roomproperties"));
		} else {
			redirect(base_url("panel/roomproperties/editPage/$id"));
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
		redirect(base_url("panel/roomproperties"));
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
