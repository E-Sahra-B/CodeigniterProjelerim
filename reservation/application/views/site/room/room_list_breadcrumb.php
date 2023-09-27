<!-- Parallax Effect -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#parallax-pagetitle').parallax("50%", -0.55);
    });
</script>

<section class="parallax-effect">
    <div id="parallax-pagetitle" style="background-image: url(<?php echo base_url("assets/images/parallax/tour.jpg"); ?>);">
        <div class="color-overlay">
            <!-- Page title -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>">Anasayfa</a></li>
                            <li class="active"><a href="<?php echo base_url("homeroom/room_list"); ?>">Oda Listesi</a></li>
                        </ol>
                        <h1>Odaları Görüntüle</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>