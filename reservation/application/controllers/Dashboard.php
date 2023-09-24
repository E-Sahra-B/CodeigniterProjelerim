<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->uri->segment(2) == 'panel') {
			redirect('dashboard/index');
		}
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->title = "Anasayfa";
		$viewData->liste = "Dashboard";
		$viewData->title2 = "Dashboard";
		$viewData->islem = "Dashboard";
		$this->load->view("panel/dashboard", $viewData);
	}

	public function setActiveMenu()
	{
		$parent 	= $this->input->post("parent");
		$activeItem = $this->input->post("activeItem");
		$this->session->set_userdata(
			array(
				"parent" 		=> $parent,
				"activeItem"	=> $activeItem
			)
		);
	}
}
