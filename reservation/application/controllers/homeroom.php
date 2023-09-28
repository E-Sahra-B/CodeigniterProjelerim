<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class homeroom extends CI_Controller
{
    public function room_list()
    {
        $this->load->model("contact_model");
        $this->load->model("room_model");
        $this->load->model("roomproperties_model");
        $this->load->model("roomimage_model");
        $this->load->model("roomcategory_model");
        $this->load->model("roompricing_model");

        $viewData = new stdClass();

        $contact = $this->contact_model->get(["isActive"   => 1]);
        $rooms = $this->room_model->get_all(["isActive"   => 1], "rank ASC");
        $room_properties = $this->roomproperties_model->get_all(["isActive"   => 1]);
        $room_images = $this->roomimage_model->get_all(["isActive"   => 1, "isCover" => 1]);
        $room_categories = $this->roomcategory_model->get_all(["isActive"   => 1]);
        $prices = $this->roompricing_model->get_all(["date >=" => date("Y-m-d")]);

        $property_list = array();
        foreach ($room_properties as $property) {
            $property_list[$property->id] = $property->title;
        }

        $cover_image_list = array();
        foreach ($room_images as $image) {
            $cover_image_list[$image->room_id] = $image->img_id;
        }

        $room_category_list = array();
        foreach ($room_categories as $room_category) {
            $room_category_list[$room_category->id] = $room_category->title;
        }

        $viewData->contact = $contact;
        $viewData->rooms = $rooms;
        $viewData->prices = $prices;
        $viewData->room_images = $room_images;
        $viewData->property_list = $property_list;
        $viewData->cover_image_list = $cover_image_list;
        $viewData->room_category_list = $room_category_list;
        $viewData->room_categories = $room_categories;

        $this->load->view('site/room_list', $viewData);
    }

    public function room_detail($room_id)
    {
        $this->load->model("contact_model");
        $this->load->model("room_model");
        $this->load->model("roomproperties_model");
        $this->load->model("roomimage_model");
        $this->load->model("roomcategory_model");
        $this->load->model("roompricing_model");
        $this->load->model("roomextraservices_model");

        $viewData = new stdClass();
        $viewData->room_id = $room_id;

        $rooms = $this->room_model->get_all(["id !=" => $room_id, "isActive"   => 1]);
        $room_row = $this->room_model->get(["id" => $room_id, "isActive"   => 1]);
        $contact = $this->contact_model->get(["isActive"   => 1]);
        $room_properties = $this->roomproperties_model->get_all(["isActive"   => 1]);
        $room_extras = $this->roomextraservices_model->get_all(["isActive"   => 1]);
        $images = $this->roomimage_model->get_all(["room_id" => $room_id, "isActive"   => 1]);
        $room_images = $this->roomimage_model->get_all(["isActive"   => 1]);
        $room_categories = $this->roomcategory_model->get_all(["isActive"   => 1]);
        $prices = $this->roompricing_model->get_all(["date >=" => date("Y-m-d")]);

        $property_list = array();
        foreach ($room_properties as $property) {
            $property_list[$property->id] = $property->title;
        }

        $extra_list = array();
        foreach ($room_extras as $extra) {
            $extra_list[$extra->id] = $extra->title;
        }

        $cover_image_list = array();
        foreach ($room_images as $image) {
            $cover_image_list[$image->room_id] = $image->img_id;
        }

        $room_category_list = array();
        foreach ($room_categories as $room_category) {
            $room_category_list[$room_category->id] = $room_category->title;
        }

        $viewData->contact = $contact;
        $viewData->rooms = $rooms;
        $viewData->rooms_row = $room_row;
        $viewData->prices = $prices;
        $viewData->room_images = $room_images;
        $viewData->property_list = $property_list;
        $viewData->cover_image_list = $cover_image_list;
        $viewData->room_category_list = $room_category_list;
        $viewData->extra_list = $extra_list;
        $viewData->room_categories = $room_categories;
        $viewData->images = $images;

        $this->load->view("site/room_detail", $viewData);
    }

    public function search()
    {
        $viewData = new stdClass();
        $this->load->model("contact_model");
        $viewData->contact = $this->contact_model->get(["isActive"   => 1]);

        $this->load->view("site/room_search_list", $viewData);
    }

    public function check_availability()
    {
        $this->load->model("roomavailability_model");
        $this->load->model("roomproperties_model");

        $checkin = $this->input->post("checkin");
        $checkout = $this->input->post("checkout");
        $checkin = explode("/", $checkin)[2] . "-" . explode("/", $checkin)[1] . "-" . explode("/", $checkin)[0];
        $checkout = explode("/", $checkout)[2] . "-" . explode("/", $checkout)[1] . "-" . explode("/", $checkout)[0];
        $available_rooms = $this->roomavailability_model->getRoomAvailability($checkin, $checkout);
        // SELECT r.title, r.default_price, rp.price, r.room_properties, ri.img_id, ra.status, ra.* FROM
        // room_availability as ra JOIN 
        // room_image as ri ON ri.room_id = ra.room_id AND ri.isCover = 1 JOIN 
        // room as r ON r.id = ra.room_id LEFT JOIN 
        // room_pricing as rp ON r.id = rp.room_id AND ra.daily_date = rp.date
        // WHERE ra.daily_date BETWEEN '2023-09-24' AND '2023-09-24'
        // ORDER BY ra.daily_date ASC
        $room_list = array();
        foreach ($available_rooms as $room) {
            $price = ($room->status) ? ($room->price) ? $room->price : $room->default_price : "Dolu";
            $room_list[$room->room_id]["availability"][$room->daily_date] = $price;
            $room_list[$room->room_id]["img_id"] = $room->img_id;
            $room_list[$room->room_id]["room_id"] = $room->room_id;
            $room_list[$room->room_id]["title"] = $room->title;
            $room_list[$room->room_id]["status"] = $room->status;
            $room_list[$room->room_id]["room_properties"] = $room->room_properties;
            $room_list[$room->room_id]["total_price"] = array_sum($room_list[$room->room_id]["availability"]);
        }
        $viewData = new stdClass();
        $this->load->model("contact_model");
        $viewData->contact = $this->contact_model->get(["isActive"   => 1]);
        $viewData->rooms = $room_list;
        $room_properties = $this->roomproperties_model->get_all(["isActive"   => 1]);
        $property_list = array();
        foreach ($room_properties as $property) {
            $property_list[$property->id] = $property->title;
        }
        $viewData->property_list = $property_list;
        $this->load->view("site/room_search_list", $viewData);
    }

    public function add_to_cart()
    {
        print_r($this->input->post("book"));
    }

    public function contact()
    {
        $this->load->model("contact_model");
        $contact = $this->contact_model->get(["isActive"   => 1]);
        $viewData = new stdClass();
        $viewData->contact = $contact;
        $this->load->view("site/contact", $viewData);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->load->model("admin_model");
            $data = array(
                "gonderen"           => $this->input->post("gonderen"),
                "mail"               => $this->input->post("mail"),
                "baslik"             => $this->input->post("baslik"),
                "icerik"             => $this->input->post("icerik"),
                "isActive"           => 0
            );
            $result = $this->admin_model->add('message', $data);
            if ($result == true) {
                redirect('homeroom/contact');
            } else {
                redirect('homeroom/contact');
            }
        }
    }
}
