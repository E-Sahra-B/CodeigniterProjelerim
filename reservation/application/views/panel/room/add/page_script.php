    <!-- CkEditor -->
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url("assets/panel/assets"); ?>/plugins/select2/select2.full.min.js"></script>

    <script>
        $(document).ready(function() {
            CKEDITOR.replace('detail');
            $(".select2").select2();
        });
    </script>