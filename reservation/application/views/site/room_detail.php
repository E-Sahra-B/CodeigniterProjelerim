<!doctype html>
<html lang="tr">

<head>
    <?php $this->load->view("site/includes/head"); ?>
    <?php $this->load->view("site/includes/include_style"); ?>
</head>

<body>
    <!-- Header -->
    <?php $this->load->view("site/includes/header"); ?>

    <!-- Main Content -->
    <?php $this->load->view("site/room_detail/room_detail_main_content"); ?>

    <?php $this->load->view("site/includes/include_script"); ?>
    <?php $this->load->view("site/includes/footer"); ?>
    <script>
        $(document).ready(function() {
            $("#checkout").change(function() {
                if ($("#checkin").val() !== "" && $("#checkout").val() !== "") {
                    $(".sorgu-btn").removeClass("disabled");
                }
            })
        })
    </script>
</body>

</html>