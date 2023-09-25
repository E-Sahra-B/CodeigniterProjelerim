<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Room extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin_model");
		$this->room = "room";
		$this->roomimage = "room_image";
		$this->roomavailability = "room_availability";
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->title = "Odalar";
		$viewData->liste = "Oda Listesi";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Oda Listesi";
		$viewData->rows = $this->admin_model->get_all($this->room, array(), "rank ASC");
		$this->load->view("panel/room", $viewData);
	}

	public function newPage()
	{
		$viewData = new stdClass();
		$viewData->title = "Odalar";
		$viewData->liste = "Oda Ekle";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Oda Ekle";
		$this->load->view("panel/new_room", $viewData);
	}

	public function editPage($id)
	{
		$viewData = new stdClass();
		$viewData->row = $this->admin_model->get($this->room, array("id" => $id));
		$viewData->title = "Odalar";
		$viewData->liste = "Oda Düzenle";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Oda Düzenle";
		$this->load->view("panel/edit_room", $viewData);
	}

	public function add()
	{
		$room_properties     = implode(";", $this->input->post("room_properties"));
		$room_extra_services = implode(";", $this->input->post("room_extra_services"));
		$data = array(
			"room_code" 			=> $this->input->post("room_code"),
			"title" 				=> $this->input->post("title"),
			"detail" 				=> $this->input->post("detail"),
			"size" 					=> $this->input->post("size"),
			"default_price" 		=> $this->input->post("default_price"),
			"room_type_id" 			=> $this->input->post("room_type_id"),
			"room_capacity" 		=> $this->input->post("room_capacity"),
			"room_properties" 		=> $room_properties,
			"room_extra_services"	=> $room_extra_services,
			"isActive"				=> 0
		);
		$insert = $this->admin_model->add($this->room, $data);
		if ($insert) {
			redirect(base_url("panel/room"));
		} else {
			redirect(base_url("panel/room/newPage"));
		}
	}

	public function edit($id)
	{
		!empty($this->input->post("room_properties")) ? $room_properties     = implode(";", $this->input->post("room_properties")) : "";
		!empty($this->input->post("room_extra_services")) ? $room_extra_services = implode(";", $this->input->post("room_extra_services")) : "";
		$data = array(
			"room_code" 			=> $this->input->post("room_code"),
			"title" 				=> $this->input->post("title"),
			"detail" 				=> $this->input->post("detail"),
			"size" 					=> $this->input->post("size"),
			"default_price" 		=> $this->input->post("default_price"),
			"room_type_id" 			=> $this->input->post("room_type_id"),
			"room_capacity" 		=> $this->input->post("room_capacity"),
			"room_properties" 		=> $room_properties,
			"room_extra_services"	=> $room_extra_services
		);
		$update = $this->admin_model->update(
			$this->room,
			array("id"	=> $id),
			$data
		);
		if ($update) {
			redirect(base_url("panel/room"));
		} else {
			redirect(base_url("panel/room/editPage/$id"));
		}
	}

	public function isActiveSetter()
	{
		$id 	  = $this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? 1 : 0;
		$update = $this->admin_model->update(
			$this->room,
			array("id" => $id),
			array("isActive" => $isActive)
		);
	}

	public function delete($id)
	{
		$delete = $this->admin_model->delete($this->room, array("id" => $id));
		redirect(base_url("panel/room"));
	}

	public function rankUpdate()
	{
		parse_str($this->input->post("data"), $data);
		$items = $data["sortId"];
		foreach ($items as $rank => $id) {
			$this->admin_model->update(
				$this->room,
				array(
					"id"      => $id,
					"rank !=" => $rank
				),
				array("rank" => $rank)
			);
		}
	}

	public function isActiveSetterForImage()
	{
		$id 	  = $this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? 1 : 0;
		$update = $this->admin_model->update(
			$this->roomimage,
			array("id" => $id),
			array("isActive" => $isActive)
		);
	}
	public function isCoverSetterForImage()
	{
		$id 	  = $this->input->post("id");
		$isCover = ($this->input->post("isCover") == "true") ? 1 : 0;
		$update = $this->admin_model->update(
			$this->roomimage,
			array("id" => $id),
			array("isCover" => $isCover)
		);
	}

	public function roomImageRankUpdate()
	{
		parse_str($this->input->post("data"), $data);
		$items = $data["sortId"];
		foreach ($items as $rank => $id) {
			$this->admin_model->update(
				$this->roomimage,
				array(
					"id"      => $id,
					"rank !=" => $rank
				),
				array("rank" => $rank)
			);
		}
	}

	public function imageUploadPage($room_id)
	{
		$this->session->set_userdata("room_id", $room_id);
		$viewData = new stdClass();
		$viewData->rows = $this->admin_model->get_all(
			$this->roomimage,
			array(
				"room_id"	=> $room_id,
			),
			"rank ASC"
		);
		$viewData->title = "Resim";
		$viewData->liste = "Resim Listesi";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Resim Ekle";

		$this->load->view("panel/room_image", $viewData);
	}

	public function upload_image()
	{
		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = '*';
		$config['encrypt_name']			= true;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file')) { //		if(!file_exists(FCPATH)){}
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} else {
			$data = array('upload_data' => $this->upload->data());
			$img_id = $data["upload_data"]['file_name'];
			$this->admin_model->add(
				$this->roomimage,
				array(
					"img_id"	=> $img_id,
					"room_id"	=> $this->session->userdata("room_id"),
					"isActive"	=> 1,
					"rank"		=> 0
				)
			);
		}
	}

	public function deleteImage($id)
	{
		$image = $this->admin_model->get($this->roomimage, array("id" => $id));
		$file_name = FCPATH . "uploads/$image->img_id";
		if (unlink($file_name)) {
			$delete = $this->admin_model->delete($this->roomimage, array("id" => $id));
			if ($delete) {
				redirect("panel/room/imageUploadPage/$image->room_id");
			}
		}
	}

	public function newAvailabilityPage($room_id)
	{
		$viewData =  new stdClass();
		$viewData->room_id = $room_id;
		$viewData->availabilities = $this->admin_model->get_all(
			$this->roomavailability,
			array(
				"room_id"	    => $room_id,
				"daily_date >=" => date("Y-m-d")
			),
			"daily_date ASC"
		);
		$viewData->title = "Uygunluk";
		$viewData->liste = "Uygunluk Ekle";
		$viewData->title2 = "Oda İşlemleri";
		$viewData->islem = "Uygunluk Ekle";
		$this->load->view("panel/new_roomavailability", $viewData);
	}

	public function addNewAvailability($room_id)
	{
		$period = betweenTwoDates($this->input->post("availability_date"));
		foreach ($period as $date) {
			$record_test = $this->admin_model->get(
				$this->roomavailability,
				array(
					"room_id"	    => $room_id,
					"daily_date"	=> $date->format("Y-m-d")
				)
			);
			if (empty($record_test)) {
				$this->admin_model->add(
					$this->roomavailability,
					array(
						"daily_date" => $date->format("Y-m-d"),
						"room_id" => $room_id,
						"status" => 1
					)
				);
			}
		}
		redirect(base_url("panel/room/newAvailabilityPage/$room_id"));
	}
}
