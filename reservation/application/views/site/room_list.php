<!doctype html>
<html lang="tr">

<head>
    <?php $this->load->view("site/includes/head"); ?>
    <?php $this->load->view("site/includes/include_style"); ?>
</head>

<body>
    <!-- Header -->
    <?php $this->load->view("site/includes/header"); ?>

    <!-- Slider -->
    <?php $this->load->view("site/room/room_list_breadcrumb"); ?>

    <!-- Rooms -->
    <?php $this->load->view("site/room/room_list_filter"); ?>
    <?php $this->load->view("site/room/room_list"); ?>

    <?php $this->load->view("site/includes/include_script"); ?>
    <?php $this->load->view("site/includes/footer"); ?>

</body>

</html>