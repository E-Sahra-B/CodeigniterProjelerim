<?php

function get_room_category()
{

    $CI = &get_instance();
    $CI->load->model("roomcategory_model");
    return $CI->roomcategory_model->get_all();
}

function get_room_properties()
{

    $CI = &get_instance();
    $CI->load->model("roomproperties_model");
    return $CI->roomproperties_model->get_all();
}
