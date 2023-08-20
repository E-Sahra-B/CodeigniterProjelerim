<?php $this->load->view('front/include/header'); ?>
<section>
    <!--__--__--__-- A R T I C L E S --__--__--__--__-->

    <div id="articles">
        <?php foreach ($kategoriHaberler as $row) : ?>

            <article style="margin-bottom: 50px;">
                <h2><a href="<?= base_url('kategori/') .  $row->id ?>"><?= $row->baslik ?></a></h2>
                <h3><a href="<?= base_url('kategori/') . $row->sefKategoriAdi ?>"><?= 'Kategori : ' . $row->kategoriAdi ?></a>&nbsp; &nbsp;&nbsp;&nbsp;Tarih : <?= uzunTarih($row->eklemeTarihi) ?></h3>
                <img src="<?= $row->resim ?>" alt="" />
                <p><?= metinKirp($row->icerik, 500) ?><br><a class="continue" href="<?= base_url('haber/') . $row->id ?>">Devamını Oku &rarr;</a></p>
            </article>
        <?php endforeach ?>

    </div>
</section>
<?php $this->load->view('front/include/footer'); ?>