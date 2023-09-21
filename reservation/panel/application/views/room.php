<!doctype html>
<html lang="tr">

<head>
    <?php $this->load->view("includes/head"); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view("includes/header"); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php $this->load->view("includes/left_side_bar"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php $this->load->view("room/list/breadcrumb"); ?>
            <?php $this->load->view("room/list/main_content"); ?>
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view("includes/footer"); ?>
        <!-- Control Sidebar -->
        <?php $this->load->view("includes/right_side_bar"); ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view("includes/include_script"); ?>
    <script>
        $(document).ready(function() {
            // Bootstrap Toggle init
            $('.toggle_check').bootstrapToggle();
            // isActive Change
            $('.toggle_check').change(function() {
                var isActive = $(this).prop('checked');
                var base_url = $(".base_url").text();
                var id = $(this).attr("dataID");
                $.post(base_url + "room/isActiveSetter", {
                    id: id,
                    isActive: isActive
                }, function(response) {});
            })
        })
    </script>
</body>

</html>