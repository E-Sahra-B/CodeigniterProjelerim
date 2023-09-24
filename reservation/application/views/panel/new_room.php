<!doctype html>
<html lang="tr">

<head>
    <?php $this->load->view("panel/includes/head"); ?>
    <?php $this->load->view("panel/room/add/page_style"); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view("panel/includes/header"); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php $this->load->view("panel/includes/left_side_bar"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php $this->load->view("panel/includes/breadcrumb"); ?>
            <?php $this->load->view("panel/room/add/main_content"); ?>
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view("panel/includes/footer"); ?>
        <!-- Control Sidebar -->
        <?php $this->load->view("panel/includes/right_side_bar"); ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view("panel/includes/include_script"); ?>
    <?php $this->load->view("panel/room/add/page_script"); ?>
</body>

</html>