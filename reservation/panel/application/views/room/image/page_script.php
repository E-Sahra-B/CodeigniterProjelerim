<script src="<?php echo base_url("assets"); ?>/dist/js/third_party/dropzone.js"></script>

<script>
    $(document).ready(function() {
        $(".dropzone").dropzone();

        $('.toggle_check').bootstrapToggle();
        $('.toggle_check').change(function() {
            var isActive = $(this).prop('checked');
            var base_url = $(".base_url").text();
            var id = $(this).attr("dataID");
            var toggleCover = $('.toggle_cover');
            $.post(base_url + "room/isActiveSetterForImage", {
                id: id,
                isActive: isActive
            }, function(response) {
                if (!isActive) {
                    toggleCover.bootstrapToggle('off');
                }
            });
        })

        $('.toggle_cover').bootstrapToggle();
        $('.toggle_cover').change(function() {
            var isCover = $(this).prop('checked');
            var base_url = $(".base_url").text();
            var id = $(this).attr("dataID");
            var toggleCheck = $('.toggle_check');
            $.post(base_url + "room/isCoverSetterForImage", {
                id: id,
                isCover: isCover
            }, function(response) {
                if (isCover) {
                    toggleCheck.bootstrapToggle('on');
                }
            });
        });
    })
</script>