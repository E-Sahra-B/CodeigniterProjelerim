<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vt');
	}

	public function index()
	{
		$data['head'] = 'Anasayfa';
		$data['haberler'] = $this->vt->kategoriHaberInnerJoin();
		$data['sonHaber'] = $this->vt->son4Haber();
		$data['kategoriler'] = $this->vt->kategorilerlist();

		$this->load->view('front/home', $data);
	}

	public function kategori($sefKategori)
	{
		$data['head'] = $sefKategori;
		$data['kategoriler'] = $this->vt->kategorilerlist();
		$data['kategoriHaberler'] = $this->vt->kategoriyeGoreHaberler($sefKategori);
		$this->load->view('front/kategori', $data);
	}

	public function haber($id)
	{
		$data['head'] = 'Haber';
		$data['kategoriler'] = $this->vt->kategorilerlist();
		$data['kategoriHaberleri'] = $this->vt->kategoriyeGoreHaber($id);
		$this->load->view('front/haber', $data);
	}
}
