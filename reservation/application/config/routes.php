<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["panel/dashboard"]         = "dashboard/index";
$route["panel/dashboard/(.*)"]    = "dashboard/$1";

$route["panel/roomcategory"]      = "roomcategory/index";
$route["panel/roomcategory/(.*)"] = "roomcategory/$1";

$route["panel/roomproperties"]      = "roomproperties/index";
$route["panel/roomproperties/(.*)"] = "roomproperties/$1";

$route["panel/room"]      = "room/index";
$route["panel/room/(.*)"] = "room/$1";

$route["panel/roomextraservices"]      = "roomextraservices/index";
$route["panel/roomextraservices/(.*)"] = "roomextraservices/$1";

$route["panel"]         = "dashboard/index";
$route["panel/(.*)"]    = "dashboard/$1";

$route["^(.*)"] = "index/$1";
