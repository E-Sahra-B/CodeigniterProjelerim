<?php
// function elma() {
//     echo "elma";
// }
// <?php elma();? > //helper dan çagrılıyor autoload/helper da helper'a verilen isim tanımlanmalı view kullanımı


function active($menu) //menu aktif
{
    $ci = get_instance();
    echo ($ci->uri->segment(2) == $menu) ? "active" : "";
    //return ($this->uri->segment(3) == $menu) ? "active" : "";
    // <li class="<?php active('panel');? >">
}

function postvalue($name)
{
    $ci = get_instance();
    return $ci->input->post($name, true);
}

function do_upload() // sitedeki
{
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('userfile')) {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('upload_form', $error);
    } else {
        $data = array('upload_data' => $this->upload->data());
        $this->load->view('upload_success', $data);
    }
}

function imageupload($name, $path, $param)
{
    $ci = get_instance();

    //echo $config['upload_path'] = base_url('assets/upload/') . $path;
    echo $config['upload_path'] = 'assets/upload/' . $path . '/';
    $config['allowed_types']        = $param;

    $ci->upload->initialize($config);
    if ($ci->upload->do_upload($name)) {
        echo "geldi";
        $image = $ci->upload->$data();
        return $config['upload_path'] . $image['file_name'];
    }
    //echo $ci->upload->display_error();
}

function geridon()
{
    echo redirect($_SERVER['HTTP_REFERER']);
}

function uyarimesaji($type, $message)
{
    $ci = get_instance();
    $msg = '<div class="alert alert-' . $type . '">' . $message . '</div>';
    $ci->session->set_flashdata("uyarimesaj", $msg);
}

function uyarimesajioku()
{
    $ci = get_instance();
    echo $ci->session->flashdata('uyarimesaj');
}

function isPost()
{
    return ($_SERVER['REQUEST_METHOD'] == "POST") ? true : false;
}

function seflink($text)
{
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '-', $text);

    return $text;
}

function metinKirp(string $metin, int $sayi, int $baslangic = 0): string
{
    return substr($metin, $baslangic, $sayi);
}

function tarih($tarih)
{
    return date("d.m.Y", strtotime($tarih));
}

function uzunTarih($tarih)
{
    return date("d.m.Y H:i:s", strtotime($tarih));
}

function kelimesay($metin)
{
    $kelimesay = str_word_count($metin);
    return $kelimesay;
}
function dakikahesapla($metin)
{
    $kelimesay = str_word_count($metin);
    $kacdakika = ceil($kelimesay / 190);
    return $kacdakika;
}
function kelimeBitirAltSatiraAt($metin)
{
    return wordwrap($metin, 30, "<br>", false);
}

function delete_files($path)
{
    unlink($path);
}
