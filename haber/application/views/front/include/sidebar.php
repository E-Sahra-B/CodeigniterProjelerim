<div class="col-lg-4">
    <div class="sidebar">
        <div class="sidebar-widget">
            <h3 class="sidebar-widget-title">Kategoriler</h3>
            <ul class="category-widget list-style">
                <?php foreach ($kategoriler as $row) : ?>
                    <li><a href="<?= base_url('kategori-') . $row->seoad ?>">
                            <img src="<?php echo base_url('assets/front/'); ?>assets/img/icons/arrow-right.svg" alt="<?= $row->ad; ?>">
                            <?= $row->ad; ?> <span>(<?= $row->say  ?>)</span></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
<!-- sidebar -->