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
    <?php $this->load->view("site/home/slider"); ?>

    <!-- Rooms -->
    <?php $this->load->view("site/home/room_list"); ?>

    <!-- USP's -->
    <?php $this->load->view("site/home/usp_list"); ?>

    <!-- parallax -->
    <?php $this->load->view("site/home/parallax"); ?>

    <!-- gallery -->
    <?php $this->load->view("site/home/gallery"); ?>

    <!-- testimonials -->
    <?php $this->load->view("site/home/testimonials"); ?>

    <?php $this->load->view("site/includes/include_script"); ?>
    <?php $this->load->view("site/includes/footer"); ?>

</body>

</html>