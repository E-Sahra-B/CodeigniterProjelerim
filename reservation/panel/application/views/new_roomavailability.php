<!doctype html>
<html lang="tr">

<head>
    <?php $this->load->view("includes/head"); ?>
    <?php $this->load->view("room_availability/add/page_style"); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view("includes/header"); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php $this->load->view("includes/left_side_bar"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php $this->load->view("room_availability/add/breadcrumb"); ?>
            <?php $this->load->view("room_availability/add/availability_add_main_content"); ?>
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view("includes/footer"); ?>
        <!-- Control Sidebar -->
        <?php $this->load->view("includes/right_side_bar"); ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view("includes/include_script"); ?>
    <?php $this->load->view("room_availability/add/page_script"); ?>
</body>

</html>