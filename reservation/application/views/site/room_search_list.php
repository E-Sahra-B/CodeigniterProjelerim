<!doctype html>
<html lang="tr">

<head>
    <?php $this->load->view("site/includes/head"); ?>
    <?php $this->load->view("site/includes/include_style"); ?>
</head>

<body>
    <!-- Header -->
    <?php $this->load->view("site/includes/header"); ?>
    <!-- Search Breadcrumb -->
    <?php $this->load->view("site/room_search_list/room_search_list_breadcrumb"); ?>
    <!-- Rooms -->
    <?php $this->load->view("site/room_search_list/room_search_content"); ?>

    <?php $this->load->view("site/includes/include_script"); ?>
    <?php $this->load->view("site/room_search_list/page_script"); ?>
    <?php $this->load->view("site/includes/footer"); ?>
</body>

</html>