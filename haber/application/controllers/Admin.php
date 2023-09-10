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
		$admin = $this->vt->single('admin');
		if (password_verify(postval('password'), $admin->password) && $admin->mail == postval('email')) {
			$this->session->set_userdata('adminlogin', true);
			$this->session->set_userdata('admininfo', $admin);
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
		$data['toplamKategori'] = $this->vt->kategoriSayisi();
		$data['haberSayisi'] = $this->vt->haberSayisi();
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

	public function deletenews($id)
	{
		if (is_numeric($id)) {
			$result = $this->vt->habersil($id);
			if ($result == true) {
				uyarimesaji("primary", "Blog Silme Başarılı.");
				redirect('admin/news');
			}
		}
	}

	public function addcat()
	{
		if (postval('kategoriekle')) {
			$sira = $this->vt->single('kategori', array('ustmenu' => 0), 'kategoriId', 'DESC');
			$sira = $sira->sira;
			$sira++;
			$values = ['kategoriAdi' => postval('kategoriAdi'), 'sefKategoriAdi' => seflink(postval('kategoriAdi')), 'sira' => $sira];
			$insert = $this->vt->insert('kategori', $values);
			if ($insert) {
				uyarimesaji('success', 'Kategori Ekleme Başarılı.');
				redirect('admin/cagories');
			} else {
				uyarimesaji('danger', 'Kategori Ekleme Hatalı.');
				geridon();
			}
		}
		$data['head'] = 'Kategori Ekle';
		$this->load->view('admin/kategoriekle', $data);
	}

	function kategoriSira()
	{

		$data['head'] = 'KategoriSiralama';
		$data['kategoriler'] = $this->vt->kategorilerlist();
		$this->load->view('admin/kategorilersira', $data);

		if (!empty(postval('data'))) {
			parse_str(postval('data'), $order);
			$items = $order["sira"];
			foreach ($items as $sira => $id) {
				$result =  $this->vt->update("kategori", array("kategoriId" => $id), array("sira" => $sira));
			}
		}
	}

	function editcat($id)
	{
		$data['kategori'] = $this->vt->single('kategori', array('kategoriId' => $id));
		$data['kategoriId'] = $id;
		$data['head'] = 'Kategori Güncelle';
		$this->load->view('admin/kategoriguncelle', $data);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$kategoriAdi = postval('kategoriAdi');
			$values = ['kategoriAdi' => $kategoriAdi, 'sefKategoriAdi' => seflink($kategoriAdi)];
			$result =  $this->vt->update('kategori', array('kategoriId' => $id), $values);
			if ($result == true) {
				uyarimesaji('success', 'Kategori Güncelleme Başarılı.');
				redirect('admin/cagories');
			} else {
				uyarimesaji('danger', 'Kategori Güncelleme Hatalı.');
				redirect('admin/cagories');
			}
		}
	}

	public function deletecat($id)
	{
		if (is_numeric($id)) {
			$result = $this->vt->delete('kategori', array('kategoriId' => $id));
			if ($result == true) {
				uyarimesaji('success', 'Kategori Silme Başarılı.');
				redirect('admin/cagories');
			}
		}
	}

	public function resimyukle()
	{
		$this->load->view('admin/deneme');

		$file_input_name = "logo";
		$config = array(
			'upload_path'   => "assets/upload/",
			'allowed_types' => 'jpg|gif|png|jpeg|pdf',
			'overwrite'     => 1,
			'max_size'      => 4096,
			'remove_space'  => true
		);

		echo resimupload($config, $file_input_name);
	}

	public function addnews()
	{
		if ($this->input->post('haberekle')) {
			$baslik = $this->input->post('baslik');
			$icerik = $this->input->post('habericerik');
			$kategoriId = $this->input->post('kategoriId');
			$gosterim  = $this->input->post('checkbutton');
			$resim = 'resim';
			$config = array(
				'upload_path' => 'assets/upload/',
				'allowed_types' => "gif|jpg|png|webp",
				'max_size' => 2048
			);
			if ($_FILES[$resim]['name'] != '') {
				$yeniResimYolu = resimupload($config, $resim);
				$values = ['kategoriId' => $kategoriId, 'baslik' => $baslik, 'sefBaslik' => seflink($baslik), 'icerik' => $icerik, 'resim' => $yeniResimYolu, 'gosterim' => $gosterim];
				$insert = $this->vt->haberEkle($values);
				if ($insert) {
					uyarimesaji("success", "Haber Ekleme Başarılı");
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

		if ($this->input->post('haberguncelle')) {
			$yeniresim = 'haberyeniresim';
			$config = array(
				'upload_path' => 'assets/upload/',
				'allowed_types' => "gif|jpg|png|webp",
				'max_size' => 2048
			);
			$values = [
				'kategoriId' => postval('kategoriId'),
				'baslik' => postval('baslik'),
				'sefBaslik' => seflink(postval('baslik')),
				'icerik' => postval('icerik'),
				'resim' => ($_FILES[$yeniresim]['name'] != '') ? resimupload($config, $yeniresim) : postval('eskiresim'),
				'gosterim' => postval('checkbutton')
			];
			$result =  $this->vt->update('haber', array('id' => $id), $values);
			if ($result) {
				uyarimesaji("info", "Haber Güncelleme Başarılı");
				redirect('admin/news');
			} else {
				uyarimesaji("error", "Haber Güncelleme Hatalı");
				redirect('admin/news');
			}
		}
	}
	public function deletefunc()
	{
		if (session('oku', 'deletefunc')) {
			$this->session->unset_userdata('deletefunc');
			geridon();
		} else {
			session('yaz', 'deletefunc', true);
			geridon();
		}
	}

	public function deleteislemi($from, $where, $id)
	{
		if (session('oku', 'deletefunc')) {
			$this->vt->delete($from, $where, $id);

			uyarimesaji("info", "Silme Başarılı");
			geridon();
		} else {
			uyarimesaji("warning", "Silme Hatası");
			geridon();
		}
	}

	public function message()
	{
		$data['head'] = 'Gelen Mesajlar';
		$data['mesajlar'] = $this->vt->list('mesaj');

		$this->load->view('admin/mesajlar', $data);
	}
	public function deletemsg($id)
	{
		if (is_numeric($id)) {
			$result = $this->vt->delete('mesaj', array('id' => $id));
			if ($result == true) {
				uyarimesaji("success", "Mesaj Silme Başarılı.");
				redirect('admin/message');
			}
		}
	}
	public function updatemsg($id)
	{
		$data['mesaj'] = $this->vt->detail('mesaj', array('id' => $id));
		$this->vt->update('mesaj', array('id' => $id), array('isread' => 1));
		$this->load->view('admin/gelenmesaj', $data);
	}
}
