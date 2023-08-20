<?php $this->load->view('front/include/header'); ?>
<!--__--__--__--__--  M A I N   C O N T E N T  --__--__--__--___--__--__-->
<section>
    <h1><?= $kategoriHaberleri->baslik ?></h1>

    <img src="<?= $kategoriHaberleri->resim ?>" />
    <h2 class="mg"><a href="<?= base_url('kategori/') . $kategoriHaberleri->sefKategoriAdi ?>"><?= $kategoriHaberleri->kategoriAdi ?></a></h2>

    <h2 class="mg">Text</h2>
    <p><?= $kategoriHaberleri->icerik ?></p>
</section>
<?php $this->load->view('front/include/footer'); ?>