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
        $data['solust'] = $this->vt->solust();
        $data['sol3'] = $this->vt->sol3();
		$data['ortaust'] = $this->vt->ortaust();
        $data['orta2'] = $this->vt->orta2();
		$data['sagust'] = $this->vt->sagust();
        $data['sag3'] = $this->vt->sag3();

        $data['kategoriler'] = $this->vt->totalProductsOfCategories();

        $this->load->view('front/home', $data);
    }

	public function kategori($sefKategori)
	{
		$data['head'] = $sefKategori;
		$data['kategoriler'] = $this->vt->totalProductsOfCategories();
		//$data['kategoriHaberler'] = $this->vt->kategoriyeGoreHaberler($sefKategori);

		$sayi=$this->vt->get_category_counts($sefKategori);
		$config=[
			'base_url' 			=> base_url().'kategori-'.$sefKategori,
			'total_rows' 		=> $sayi,
       		'per_page' 			=> 1, // Her sayfada gösterilecek sayısı
			'full_tag_open'     => '<ul class="page-nav list-style text-center mt-20">',
            'full_tag_close'    => '</ul>',
            // 'first_link'        => 'İlk',//İlk Sayfa
            // 'first_tag_open'    => '<li>',
            // 'first_tag_close'   => '</li>',
            // 'last_link'         => 'Son',//Son Sayfa
            // 'last_tag_open'     => '<li>',
            // 'last_tag_close'    => '</li>',
            'next_link'         => '<i class="flaticon-arrow-right"></i>',//sonraki
            'next_tag_open'     => '<li>',
            'next_tag_close'    => '</li>',
            'prev_link'         => '<i class="flaticon-arrow-left"></i>',//önceki
            'prev_tag_open'     => '<li>',
            'prev_tag_close'    => '</li>',
            'cur_tag_open'      => '<li><a class="active">',//active
            'cur_tag_close'     => '</a></li>',
            'num_tag_open'      => '<li>',
            'num_tag_close'     => '</li>'
		];
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;

        $this->pagination->initialize($config);
        $data['linkler'] = $this->pagination->create_links();
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['kategoriHaberler'] = $this->vt->kategoriyeGoreHaberlerLimitli($sefKategori,$config['per_page'], $page);
		//$data['kategorisayisi'] = $this->vt->kategoriSayisi();
		$this->load->view('front/kategori', $data);
	}

// 	public function kategori($sefKategori){
// 		//$sefKategori='hayat';
// $sayi=$this->vt->get_category_counts($sefKategori);
// // $this->load->view('front/deneme', $data);
// 		$config=[
// 			'base_url' => base_url().'kategori',
// 			'total_rows' => $sayi,
//        		'per_page' => 1 // Her sayfada gösterilecek öğe sayısı
// 			//'uri_segment' => 3
// 		];
//         $this->pagination->initialize($config);

		
//         $data['linkler'] = $this->pagination->create_links();

//         //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//         $data['bigi'] = $this->vt->kategoriyeGoreHaberlerLimitli($sefKategori,$config['per_page'], $this->uri->segment(3,0));

//         $this->load->view('front/deneme', $data);
// 	}

	public function haber($sefBaslik)
	{
		$data['head'] = 'Haber';
		$data['kategoriler'] = $this->vt->totalProductsOfCategories();
		$data['kategoriHaberleri'] = $this->vt->kategoriyeGoreHaber($sefBaslik);

		$data['kategorisayisi'] = $this->vt->kategoriSayisi();
		$this->load->view('front/haber', $data);
	}

	public function iletisim()
	{
		$data['head'] = 'İletişim';
		$data['kategoriler'] = $this->vt->totalProductsOfCategories();
		$this->load->view('front/iletisim', $data);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$values = ['name' => postval('name'), 'email' => postval('email'), 'subject' => postval('subject'), 'message' => postval('message')];
			$result = $this->vt->insert('mesaj', $values);
			if ($result == true) {
				uyarimesaji('success', 'Mesaj Gönderme Başarılı.');
				redirect('home/iletisim');
			} else {
				uyarimesaji('danger', 'Mesaj Görderim Hatalı.');
				redirect('home/iletisim');
			}
		}
	}
}
