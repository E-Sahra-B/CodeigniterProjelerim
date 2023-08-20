<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('adminlogin') && $this->uri->segment(2) && $this->uri->segment(2) != 'login') {
			redirect('admin');
		}
		$this->load->model('vt');
		//$this->load->library('upload');
	}

	public function index()
	{
		if ($this->session->userdata('adminlogin')) {
			redirect('admin/panel');
		}
		$this->load->view('admin/login');
	}

	public function login()
	{
		$exist = $this->db->from('admin')->where(['mail' => $this->input->post('email'), 'password' => $this->input->post('password')])->get()->row();
		if ($exist) {
			$this->session->set_userdata('adminlogin', true);
			$this->session->set_userdata('admininfo', $exist);
			redirect('admin/panel');
		} else {
			$hata = "Email adresi veya şifre hatalı.";
			$this->session->set_flashdata('error', $hata);
			redirect('admin');
		}
	}

	public function panel()
	{
		$data['head'] = 'Anasayfa';
		$data['haberler'] = $this->vt->kategoriHaberInnerJoin();
		$this->load->view('admin/panel', $data);
	}

	public function news()
	{
		$data['head'] = 'Haberler';
		$data['haberler'] = $this->vt->kategoriHaberInnerJoin();
		$this->load->view('admin/haberler', $data);
	}

	public function cagories()
	{
		$data['head'] = 'Kategoriler';
		$data['kategoriler'] = $this->vt->kategorilerlist();
		$this->load->view('admin/kategoriler', $data);
	}

	public function cikis()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function addnews()
	{
		if ($this->input->post('haberekle')) {
			$baslik = $this->input->post('baslik');
			$icerik = $this->input->post('habericerik');
			$kategoriId = $this->input->post('kategoriId');
			$config = array(
				'upload_path' => 'assets/upload/',
				'allowed_types' => "gif|jpg|png",
				'max_size' => 2048
			);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('resim')) {
				$resim = $this->upload->data();
				$yeniResimYolu = base_url("assets/upload/" . $resim["file_name"]);
				$values = ['kategoriId' => $kategoriId, 'baslik' => $baslik, 'sefBaslik' => seflink($baslik), 'icerik' => $icerik, 'resim' => $yeniResimYolu];
				$insert = $this->vt->haberEkle($values);
				if ($insert) {
					$this->session->set_flashdata('success', 'Haber Ekleme Başarılı.');
					redirect('admin/news');
				} else {
					echo "hata";
				}
			}
		}
		$data['categories'] = $this->vt->kategorilerlist();
		$data['head'] = 'Haber Ekle';
		$this->load->view('admin/haberekle', $data);
	}

	function editnews($id)
	{
		$data['haber'] = $this->vt->haberGetir($id);
		$data['id'] = $id;
		$data['categories'] = $this->vt->kategorilerlist();
		$data['head'] = 'Haber Güncelle';
		$this->load->view('admin/haberguncelle', $data);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$baslik = $this->input->post('baslik');
			$icerik = $this->input->post('icerik');
			$kategoriId = $this->input->post('kategoriId');
			$eskiresim = $this->input->post('eskiresim');
			$config = array(
				'upload_path' => 'assets/upload/',
				'allowed_types' => "gif|jpg|png",
				'max_size' => 2048 // max_size
			);
			$this->upload->initialize($config);
			//$this->load->library('upload', $config);
			if ($this->upload->do_upload('haberyeniresim')) {
				$resim = $this->upload->data();
				$yeniResimYolu = base_url("assets/upload/" . $resim["file_name"]);
				$values = [
					'kategoriId' => $kategoriId,
					'baslik' => $baslik,
					'sefBaslik' => seflink($baslik),
					'icerik' => $icerik,
					'resim' => $yeniResimYolu
				];
				//unlink($eskiresim);
				//delete_files($eskiresim);
				//unlink(FCPATH . $eskiresim);
				$result = $this->vt->haberGuncelle($values, $id);
				if ($result) {
					$this->session->set_flashdata('success', 'Haber Güncelleme Başarılı.');
					redirect('admin/news');
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect('admin/news');
				}
			} else {
				$values = ['kategoriId' => $kategoriId, 'baslik' => $baslik, 'sefBaslik' => seflink($baslik), 'icerik' => $icerik, 'resim' => $eskiresim];
				$result =  $this->vt->haberGuncelle($values, $id);
				if ($result == true) {
					$this->session->set_flashdata('success', 'Güncelleme İşlemi Başarılı');
					redirect('admin/news');
				} else {
					$this->session->set_flashdata('error', 'Error');
					redirect('admin/news');
				}
			}
		}
	}

	public function deletenews($id)
	{
		if (is_numeric($id)) {
			$result = $this->vt->habersil($id);
			if ($result == true) {
				$this->session->set_flashdata('success', 'Blog Silme Başarılı.');
				redirect('admin/news');
			}
		}
	}

	public function addcat()
	{
		if ($this->input->post('kategoriekle')) {
			$kategoriAdi = $this->input->post('kategoriAdi');
			$values = ['kategoriAdi' => $kategoriAdi, 'sefKategoriAdi' => seflink($kategoriAdi)];
			$insert = $this->vt->kategoriekleme($values);
			if ($insert) {
				$this->session->set_flashdata('success', 'Kategori Ekleme Başarılı.');
				redirect('admin/cagories');
			} else {
				echo "hata";
			}
		}
		$data['head'] = 'Kategori Ekle';
		$this->load->view('admin/kategoriekle', $data);
	}

	function editcat($id)
	{
		$data['kategori'] = $this->vt->kategoriGetir($id);
		$data['kategoriId'] = $id;
		$data['head'] = 'Kategori Güncelle';
		$this->load->view('admin/kategoriguncelle', $data);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$kategoriAdi = $this->input->post('kategoriAdi');
			$values = ['kategoriAdi' => $kategoriAdi, 'sefKategoriAdi' => seflink($kategoriAdi)];
			$result =  $this->vt->kategoriguncelle($values, $id);
			if ($result == true) {
				$this->session->set_flashdata('success', 'Güncelleme İşlemi Başarılı');
				redirect('admin/cagories');
			} else {
				$this->session->set_flashdata('error', 'Error');
				redirect('admin/cagories');
			}
		}
	}

	public function deletecat($id)
	{
		if (is_numeric($id)) {
			$result = $this->vt->kategorisil($id);
			if ($result == true) {
				$this->session->set_flashdata('success', 'Kategori Silme Başarılı.');
				redirect('admin/cagories');
			}
		}
	}
}
