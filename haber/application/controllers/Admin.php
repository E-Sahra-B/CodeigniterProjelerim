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
		$admin=$this->vt->single('admin');
		// echo password_verify(postval('password'),$pass->password).'<br>'; // true dönüyor
		// echo password_hash(postval('password'),PASSWORD_DEFAULT);
		// exit;
		// $exist = $this->db->from('admin')->where(['mail' => $this->input->post('email'),
		//  'password' => password_hash(postval('password'),PASSWORD_DEFAULT)])
		//  ->get()->row();
		 if (password_verify(postval('password'),$admin->password) && $admin->mail==postval('email')) {
			// if ($exist) {
			$this->session->set_userdata('adminlogin', true);
			$this->session->set_userdata('admininfo', $exist);
			redirect('admin/panel');
			} else {
				$hata = "Email adresi veya şifre hatalı.";
				$this->session->set_flashdata('error', $hata);
				redirect('admin');
			}
		//}

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

	// public function addnews()
	// {
	// 	if ($this->input->post('haberekle')) {
	// 		$baslik = $this->input->post('baslik');
	// 		$icerik = $this->input->post('habericerik');
	// 		$kategoriId = $this->input->post('kategoriId');
	// 		$gosterim  = $this->input->post('checkbutton');
	// 		// $searchTerm  = $this->input->post('searchTerm');
	// 		// var_dump($searchTerm);
	// 		// exit;
	// 		$config = array(
	// 			'upload_path' => 'assets/upload/',
	// 			'allowed_types' => "gif|jpg|png|webp",
	// 			'max_size' => 2048
	// 		);
	// 		$this->upload->initialize($config);
	// 		if ($this->upload->do_upload('resim')) {
	// 			$resim = $this->upload->data();
	// 			$yeniResimYolu = base_url("assets/upload/" . $resim["file_name"]);
	// 			$values = ['kategoriId' => $kategoriId, 'baslik' => $baslik, 'sefBaslik' => seflink($baslik), 'icerik' => $icerik, 'resim' => $yeniResimYolu, 'gosterim' => $gosterim];
	// 			$insert = $this->vt->haberEkle($values);
	// 			if ($insert) {
	// 				//$this->session->set_flashdata('success', 'Haber Ekleme Başarılı.');
	// 				uyarimesaji("success", "Haber Ekleme Başarılı");
	// 				redirect('admin/news');
	// 			} else {
	// 				echo "hata";
	// 			}
	// 		}
	// 	}
	// 	$data['categories'] = $this->vt->kategorilerlist();
	// 	$data['head'] = 'Haber Ekle';
	// 	$this->load->view('admin/haberekle', $data);
	// }

	// function editnews($id)
	// {
	// 	$data['haber'] = $this->vt->haberGetir($id);
	// 	$data['id'] = $id;
	// 	$data['categories'] = $this->vt->kategorilerlist();
	// 	$data['head'] = 'Haber Güncelle';
	// 	$this->load->view('admin/haberguncelle', $data);
	// 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 		$baslik = $this->input->post('baslik');
	// 		$icerik = $this->input->post('icerik');
	// 		$kategoriId = $this->input->post('kategoriId');
	// 		$eskiresim = $this->input->post('eskiresim');
	// 		$gosterim  = $this->input->post('checkbutton');
	// 		$config = array(
	// 			'upload_path' => 'assets/upload/',
	// 			'allowed_types' => "gif|jpg|png|webp",
	// 			'max_size' => 2048 // max_size
	// 		);
	// 		$this->upload->initialize($config);
	// 		//$this->load->library('upload', $config);
	// 		if ($this->upload->do_upload('haberyeniresim')) {
	// 			$resim = $this->upload->data();
	// 			$yeniResimYolu = base_url("assets/upload/" . $resim["file_name"]);
	// 			$values = [
	// 				'kategoriId' => $kategoriId,
	// 				'baslik' => $baslik,
	// 				'sefBaslik' => seflink($baslik),
	// 				'icerik' => $icerik,
	// 				'resim' => $yeniResimYolu
	// 			];
	// 			//unlink($eskiresim);
	// 			//delete_files($eskiresim);
	// 			//unlink(FCPATH . $eskiresim);
	// 			$result = $this->vt->haberGuncelle($values, $id);
	// 			if ($result) {
	// 				//$this->session->set_flashdata('success', 'Haber Güncelleme Başarılı.');
	// 				uyarimesaji("info", "Haber Güncelleme Başarılı");
	// 				redirect('admin/news');
	// 			} else {
	// 				//$this->session->set_flashdata('error', 'Error');
	// 				uyarimesaji("error", "Haber Güncelleme Hatalı");
	// 				redirect('admin/news');
	// 			}
	// 		} else {
	// 			$values = ['kategoriId' => $kategoriId, 'baslik' => $baslik, 'sefBaslik' => seflink($baslik), 'icerik' => $icerik, 'resim' => $eskiresim, 'gosterim' => $gosterim];
	// 			$result =  $this->vt->haberGuncelle($values, $id);
	// 			if ($result == true) {
	// 				//$this->session->set_flashdata('success', 'Güncelleme İşlemi Başarılı');
	// 				uyarimesaji("info", "Haber Güncelleme Başarılı");
	// 				redirect('admin/news');
	// 			} else {
	// 				//$this->session->set_flashdata('error', 'Error');
	// 				uyarimesaji("error", "Haber Güncelleme Hatalı");
	// 				redirect('admin/news');
	// 			}
	// 		}
	// 	}
	// }

	public function deletenews($id)
	{
		if (is_numeric($id)) {
			$result = $this->vt->habersil($id);
			if ($result == true) {
				//$this->session->set_flashdata('success', 'Blog Silme Başarılı.');
				uyarimesaji("primary", "Blog Silme Başarılı.");
				redirect('admin/news');
			}
		}
	}

	// public function addcat()
	// {
	// 	if ($this->input->post('kategoriekle')) {
	// 		$kategoriAdi = $this->input->post('kategoriAdi');
	// 		$values = ['kategoriAdi' => $kategoriAdi, 'sefKategoriAdi' => seflink($kategoriAdi)];
	// 		$insert = $this->vt->kategoriekleme($values);
	// 		if ($insert) {
	// 			$this->session->set_flashdata('success', 'Kategori Ekleme Başarılı.');
	// 			redirect('admin/cagories');
	// 		} else {
	// 			echo "hata";
	// 		}
	// 	}
	// 	$data['head'] = 'Kategori Ekle';
	// 	$this->load->view('admin/kategoriekle', $data);
	// }
	public function addcat()
	{
		if (postval('kategoriekle')) {
			$sira=$this->vt->single('kategori',array('ustmenu'=>0),'kategoriId','DESC');//son veri yi bul
			$sira=$sira->sira;
			$sira++;
			$values = ['kategoriAdi' => postval('kategoriAdi'), 'sefKategoriAdi' => seflink(postval('kategoriAdi')),'sira'=>$sira];

			$insert=$this->vt->insert('kategori',$values);
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
			// print_r($items);
			foreach ($items as $sira => $id) {
				$result =  $this->vt->update("kategori", array("kategoriId" => $id), array("sira" => $sira));
				//$this->db->where(array("kategoriId" => $id))->update("kategori", array("sira" => $sira));
			}
		}
	}

	function editcat($id)
	{
		$data['kategori'] = $this->vt->single('kategori',array('kategoriId'=>$id));
		$data['kategoriId'] = $id;
		$data['head'] = 'Kategori Güncelle';
		$this->load->view('admin/kategoriguncelle', $data);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$kategoriAdi = postval('kategoriAdi');
			$values = ['kategoriAdi' => $kategoriAdi, 'sefKategoriAdi' => seflink($kategoriAdi)];
			$result =  $this->vt->update('kategori',array('kategoriId'=>$id),$values);
			if ($result == true) {
				//$this->session->set_flashdata('success', 'Güncelleme İşlemi Başarılı');
				uyarimesaji('success', 'Kategori Güncelleme Başarılı.');
				redirect('admin/cagories');
			} else {
				//$this->session->set_flashdata('error', 'Error');
				uyarimesaji('danger', 'Kategori Güncelleme Hatalı.');
				redirect('admin/cagories');
			}
		}
	}

	public function deletecat($id)
	{//delete($from, $where, $id)
		if (is_numeric($id)) {
			$result = $this->vt->delete('kategori',array('kategoriId'=>$id));
			if ($result == true) {
				//$this->session->set_flashdata('success', 'Kategori Silme Başarılı.');
				uyarimesaji('success', 'Kategori Silme Başarılı.');
				redirect('admin/cagories');
			}
		}
	}

	// public function select2() {
	//     $search = $this->input->post('kategoriId');
	// 	// var_dump($search);
	// 	// exit;
	//     $data = $this->vt->select2($search);
	//     echo json_encode($data);
	// 	//$this->load->view('admin/kategoriekle', $data);
	// }

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
		// if (is_array($result)) {
		// 	//print_r($result); // Yükleme bilgilerini görüntüle
		// 	uyarimesaji("success", "Resim Yükleme Başarılı");
		// 	//redirect('admin/deneme');
		// } else {
		// 	//echo $result;
		// 	uyarimesaji("danger", $result);
		// 	//redirect('admin/deneme');
		// }
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
			// if ($_FILES[$yeniresim]['name'] != '') {
			// 	unlink($eskiresim);
			// 	$yeniResimYolu = resimupload($config, $yeniresim);
				$values = [
					'kategoriId' => postval('kategoriId'),
					'baslik' => postval('baslik'),
					'sefBaslik' => seflink(postval('baslik')),
					'icerik' => postval('icerik'),
					'resim' => ($_FILES[$yeniresim]['name'] != '') ? resimupload($config, $yeniresim) : postval('eskiresim'),
					'gosterim' => postval('checkbutton')
				];
				//$result = $this->vt->haberGuncelle($values, $id);
				$result =  $this->vt->update('haber', array('id'=>$id), $values);
				if ($result) {
					uyarimesaji("info", "Haber Güncelleme Başarılı");
					redirect('admin/news');
				} else {
					uyarimesaji("error", "Haber Güncelleme Hatalı");
					redirect('admin/news');
				}
			// } else {
			// 	$values = ['kategoriId' => $kategoriId, 'baslik' => $baslik, 'sefBaslik' => seflink($baslik), 'icerik' => $icerik, 'resim' => $eskiresim, 'gosterim' => $gosterim];
			// 	//$result =  $this->vt->haberGuncelle($values, $id);
			// 	$result =  $this->vt->update('haber', $id, $values);
			// 	if ($result == true) {
			// 		uyarimesaji("info", "Haber Güncelleme Başarılı");
			// 		redirect('admin/news');
			// 	} else {
			// 		uyarimesaji("error", "Haber Güncelleme Hatalı");
			// 		redirect('admin/news');
			// 	}
			// }
		}
	}
	public function deletefunc(){
		if (session('oku','deletefunc')) {
			$this->session->unset_userdata('deletefunc');
			geridon();
		}else{
			session('yaz','deletefunc',true);
			geridon();
		}
	}

	public function deleteislemi($from, $where, $id)//Codeigniter Kariyer Sitesi #Ders8 1:08:50 1:11:45 view sayfası
	{
		if (session('oku','deletefunc')) {
			$this->vt->delete($from, $where, $id);

				uyarimesaji("info", "Silme Başarılı");
				geridon();
		}else{
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
	{//$this->vt->delete('haber', array('id'=>$id), $values);
		if (is_numeric($id)) {
			$result = $this->vt->delete('mesaj', array('id'=>$id));
			if ($result == true) {
				uyarimesaji("success","Mesaj Silme Başarılı.");
				redirect('admin/message');
			}
		}
	}
	public function updatemsg($id){
		
		
		$data['mesaj'] = $this->vt->detail('mesaj',array('id'=>$id));
		// var_dump($data['mesaj']);
		// exit;
		$this->vt->update('mesaj', array('id'=>$id), array('isread'=>1));
		$this->load->view('admin/gelenmesaj', $data);
	}
}
//https://esma.dvebdemo.com.tr/
//https://esma.dvebdemo.com.tr/admin