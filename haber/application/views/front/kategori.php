<?php $this->load->view('front/include/header'); ?>

<div class="sports-wrap ptb-100">
    <div class="container">
        <div class="row gx-55 gx-5">
            <div class="col-lg-8">
                <div class="row justify-content-center">
                    <?php foreach ($kategoriHaberler as $row) : ?>
                        <div class="col-md-6">
                            <div class="news-card-thirteen">
                                <div class="news-card-img">
                                    <img src="<?= $row->resim ?>" alt="Iamge">
                                    <a href="<?= base_url('kategori-') . $row->sefKategoriAdi ?>" class="news-cat"><?= $row->kategoriAdi ?></a>
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="<?= base_url('haber-') . $row->sefBaslik ?>"><?= $row->baslik ?></a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html"><?= uzunTarih($row->eklemeTarihi) ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <ul class="page-nav list-style text-center mt-20">
                    <?php echo $linkler; ?>
                </ul>
            </div>
            <?php $this->load->view('front/include/sidebar'); ?>
        </div>
    </div>
</div>
<?php $this->load->view('front/include/footer'); ?>