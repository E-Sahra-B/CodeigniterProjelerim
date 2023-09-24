<script src="<?php echo base_url("assets/panel/assets"); ?>/dist/js/third_party/dropzone.js"></script>
<script src="<?php echo base_url("assets/panel/assets"); ?>/dist/js/third_party/jquery.fancybox.min.js"></script>

<script>
    $(document).ready(function() {
        $(".dropzone").dropzone();
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    })
</script>