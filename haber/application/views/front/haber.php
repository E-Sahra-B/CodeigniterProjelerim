<?php $this->load->view('front/include/header'); ?>
<div class="news-details-wrap ptb-100">
    <div class="container">
        <div class="row gx-55 gx-5">
            <div class="col-lg-8">
                <article>
                    <div class="news-img">
                        <img src="<?= $kategoriHaberleri->resim ?>" alt="Image">
                        <a href="<?= base_url('kategori-') .  $kategoriHaberleri->sefKategoriAdi ?>" class="news-cat"><?= $kategoriHaberleri->kategoriAdi ?></a>
                    </div>
                    <ul class="news-metainfo list-style">
                        <!-- <li class="author">
                            <span class="author-img">
                                <img src="< ?php echo base_url('assets/front/'); ?>assets/img/author/author-thumb-1.webp" alt="Image">
                            </span>
                            <a href="author.html">James William</a>
                        </li> -->
                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html"><?= uzunTarih($kategoriHaberleri->eklemeTarihi); ?></a></li>
                        <!-- <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li> -->
                    </ul>
                    <div class="news-para">
                        <h1><?= $kategoriHaberleri->baslik ?></h1>
                        <p><?= $kategoriHaberleri->icerik ?></p>
                    </div>
                </article>
            </div>
            <!-- sidebar -->
            <?php $this->load->view('front/include/sidebar'); ?>
            <!-- sidebar -->
        </div>
    </div>
</div>
<?php $this->load->view('front/include/footer'); ?>