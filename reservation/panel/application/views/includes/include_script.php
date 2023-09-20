<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url("assets"); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!--UI-->
<script src="<?php echo base_url("assets"); ?>/plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url("assets"); ?>/bootstrap/js/bootstrap.min.js"></script>

<!-- Slimscroll -->
<script src="<?php echo base_url("assets"); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url("assets"); ?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url("assets"); ?>/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url("assets"); ?>/dist/js/demo.js"></script>
<!-- Confirm Plugin -->
<script src="<?php echo base_url("assets"); ?>/dist/js/third_party/bootbox.min.js"></script>

<script src="<?php echo base_url("assets"); ?>/dist/js/custom.js"></script>

<script src="<?php echo base_url("assets"); ?>/dist/js/third_party/bootstrap-toggle.min.js"></script>

<script>
    $(document).ready(function() {
        var base_url = $(".base_url").text();
        // Bootstrap Toggle init
        $('.toggle_check').bootstrapToggle();
        // isActive Change
        $('.toggle_check').change(function() {
            var isActive = $(this).prop('checked');
            var id = $(this).attr("dataID");
            $.post(base_url + "roomcategory/isActiveSetter", {
                id: id,
                isActive: isActive
            }, function(response) {});
        })
    })
</script>