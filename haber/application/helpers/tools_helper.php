<?php
function active($menu)
{
    $ci = get_instance();
    echo ($ci->uri->segment(2) == $menu) ? "active" : "";
}

function postval($name)
{
    $ci = get_instance();
    return $ci->input->post($name, true);
}

function resimupload($config, $file_input_name)
{
    $ci = &get_instance();
    $ci->upload->initialize($config);

    if ($ci->upload->do_upload($file_input_name)) {
        $resim = $ci->upload->data();
        return base_url() . $config['upload_path'] . $resim['file_name'];
    } else {
        //return $ci->upload->display_errors();
        uyarimesaji("danger", $ci->upload->display_errors());
    }
}

function geridon()
{
    echo redirect($_SERVER['HTTP_REFERER']);
}

function uyarimesaji($type, $message)
{
    $ci = get_instance();
    $msg = '<div class="alert alert-' . $type . '">' . $message . '</div>';
    return $ci->session->set_flashdata("mesaj", $msg);
}

function uyarimesajioku()
{
    $ci = get_instance();
    return $ci->session->flashdata('mesaj');
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

function countto($from, $where = array())
{
    $ci = &get_instance();
    $result = $ci->db
        ->from($from)
        ->where($where)
        ->count_all_results();
    return $result;
}

function getReturnTime($date)
{
    $createTime = strtotime($date);
    $currentTime = time();
    $dtCreate = DateTime::createFromFormat('U', $createTime);
    $dtCurrent = DateTime::createFromFormat('U', $currentTime);
    $diff = $dtCurrent->diff($dtCreate);
    //$interval = $diff->format("%D-%H-%I");
    $interval = $diff->format("%y yil %m ay %d gun %h saat %i dk. %s sn. önce");
    $interval = preg_replace('/(^0| 0) (yil|ay|gun|saat|dakika)/', '', $interval);
    return $interval;
}

function paylasimzamani($date)
{
    $date = strtotime($date);
    $zamanfarki = time() - $date;
    $saniye = $zamanfarki;
    $dakika = round($zamanfarki / 60);
    $saat = round($zamanfarki / 3600);
    $gun = round($zamanfarki / 86400);
    $hafta = round($zamanfarki / 604800);
    $ay = round($zamanfarki / 2419200);
    $yil = round($zamanfarki / 29030400);
    if ($saniye < 60) {
        if ($saniye == 0) {
            return "az önce";
        } else {
            return $saniye . " saniye önce";
        }
    } else if ($dakika < 60) {
        return $dakika . " dakika önce";
    } else if ($saat < 24) {
        return $saat . " saat önce";
    } else if ($gun < 7) {
        return $gun . " gun önce";
    } else if ($hafta < 4) {
        return $hafta . " hafta önce";
    } else if ($ay < 12) {
        return $ay . " ay önce";
    } else {
        return $yil . " yıl önce";
    }
}
