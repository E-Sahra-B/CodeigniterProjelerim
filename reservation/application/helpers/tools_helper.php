<?php

function get_room_category()
{

    $CI = &get_instance();
    $CI->load->model("admin_model");
    return $CI->admin_model->get_all("room_category");
}

function get_room_properties()
{

    $CI = &get_instance();
    $CI->load->model("admin_model");
    return $CI->admin_model->get_all("room_properties");
}

function get_room_extra_services($where = array())
{

    $CI = &get_instance();
    $CI->load->model("admin_model");
    return $CI->admin_model->get_all("room_extra_services", $where);
}

function get_folder_list($dir)
{
    $folder = array();
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    array_push($folder, $object);
            }
        }
    }
    return $folder;
}

function get_images($dir = "")
{
    $imageList = array();
    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $en1 = @explode("_", $entry);
                $en2 = @explode(".", $en1[1]);
                if (substr($entry, 0, 1) != "." && ($en2[0] != 'thumb')) {
                    array_push($imageList, $entry);
                }
            }
        }
        closedir($handle);
    }
    return $imageList;
}

function betweenTwoDates($availability_dates)
{
    $availability_date = explode("-", $availability_dates);
    $startDateArr  = explode("/", $availability_date[0]);
    $finishDateArr = explode("/", $availability_date[1]);
    $startDateStr  = trim($startDateArr[2]) . "-" . trim($startDateArr[0]) . "-" . trim($startDateArr[1]);
    $finishDateStr = trim($finishDateArr[2]) . "-" . trim($finishDateArr[0]) . "-" . trim($finishDateArr[1]);
    $startDate  = new DateTime($startDateStr);
    $finishDate = new DateTime(date("Y-m-d", strtotime("1 day", strtotime($finishDateStr))));
    $interval = DateInterval::createFromDateString("1 day");
    $period = new DatePeriod($startDate, $interval, $finishDate);
    return $period;
}

function get_day_from_eng($day)
{
    $days = array(
        "Mon"   => "Pzt",
        "Tue"   => "Sal",
        "Wed"   => "Çar",
        "Thu"   => "Per",
        "Fri"   => "Cum",
        "Sat"   => "Cmt",
        "Sun"   => "Paz",
    );
    return $days[$day];
}

function get_month_from_eng($month)
{
    $months = array(
        "Jan"   => "Oca",
        "Feb"   => "Şub",
        "Mar"   => "Mar",
        "Apr"   => "Nis",
        "May"   => "May",
        "Jun"   => "Haz",
        "Jul"   => "Tem",
        "Aug"   => "Ağu",
        "Sep"   => "Eyl",
        "Oct"   => "Eki",
        "Nov"   => "Kas",
        "Dec"   => "Ara",
    );
    return $months[$month];
}

function get_month($date)
{
    return date("d", strtotime($date)) . " " . get_month_from_eng(date("M", strtotime($date))) . " " . get_day_from_eng(date("D", strtotime($date)));
}

function get_class_name($str)
{
    $str = strtolower($str);
    $tr   = array("ş", "ü", "ğ", "ç", "i", "ı", "ö", ".", ",", "?", " ");
    $eng  = array("s", "u", "g", "c", "i", "i", "o", "",  "",  "",  "_");
    $class = str_replace($tr, $eng, $str);
    return $class;
}

function get_prices($where = array())
{
    $CI = &get_instance();
    $CI->load->model("roompricing_model");
    $times = $CI->roompricing_model->get_all($where);
    $price = "null";
    foreach ($times as $time) {
        if ($times) {
            $price = $time->price;
        }
    }
    return $price;
}

function fiyat($fiyat)
{
    return number_format($fiyat, 2, ',', '.');
}
