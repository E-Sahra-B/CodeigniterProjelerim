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
    <?php $this->load->view("site/contact/contact_breadcrumb"); ?>

    <!-- Rooms -->
    <?php $this->load->view("site/contact/contact"); ?>

    <?php $this->load->view("site/includes/include_script"); ?>
    <?php $this->load->view("site/contact/page_script"); ?>
    <?php $this->load->view("site/includes/footer"); ?>
</body>

</html>