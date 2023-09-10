<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['kategori-(:any)'] = 'home/kategori/$1';
$route['kategori-(:any)/(:any)'] = 'home/kategori/$1/$2';
$route['haber-(:any)'] = 'home/haber/$1';
$route['iletisim'] = 'home/iletisim/';
