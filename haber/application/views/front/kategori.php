<?php $this->load->view('front/include/header'); ?>
<!-- <div class="breadcrumb-wrap">
    <div class="container">
        <h2 class="breadcrumb-title">Business Article</h2>
        <ul class="breadcrumb-menu list-style">
            <li><a href="index.html">Home</a></li>
            <li>Business Article</li>
        </ul>
    </div>
</div> -->

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
                                    <!-- <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <ul class="page-nav list-style text-center mt-20">
                    <!-- <li><a href="business.html"><i class="flaticon-arrow-left"></i></a></li>
                    <li><a class="active" href="business.html">01</a></li>
                    <li><a href="business.html">02</a></li>
                    <li><a href="business.html">03</a></li>
                    <li><a href="business.html"><i class="flaticon-arrow-right"></i></a></li> -->
                    <?php echo $linkler; ?>
                </ul>
            </div>
            <?php $this->load->view('front/include/sidebar'); ?>
        </div>
    </div>
</div>
<?php $this->load->view('front/include/footer'); ?>