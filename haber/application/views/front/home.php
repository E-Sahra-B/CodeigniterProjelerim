<?php $this->load->view('front/include/header'); ?>
<!--__--__--__--__--  M A I N   C O N T E N T  --__--__--__--___--__--__-->
<section>
	<div id="line">
		<div class="dline"></div>
		<h1>Haberler</h1>
		<div class="dline"></div>
	</div>
	<div id="ourserv">
		<?php foreach ($haberler as $row) : ?>
			<article style="margin-bottom: 50px;">
				<h1><a href="<?= base_url('haber/') . $row->id ?>"><?= $row->baslik ?></a></h1>
				<img src="<?= $row->resim ?>" alt="<?= $row->sefBaslik ?>" height="200" width="200" />
				<p><?= metinKirp($row->icerik, 100) ?></p>
				<a href="<?= base_url('haber/') . $row->id ?>" class="rm">Devam..</a>
			</article>
		<?php endforeach ?>
	</div>


	<div id="sline">
		<div class="sdline"></div>
		<h1>Son Haberler</h1>
		<div class="sdline"></div>
	</div>
	<div id="latestp">
		<?php foreach ($sonHaber as $row) : ?>
			<article>
				<h1><a href="<?= base_url('haber/') . $row->id ?>"><?= $row->baslik ?></a></h1>
				<p><?= $row->kategoriAdi ?></p>
				<img src="<?= $row->resim ?>" alt="<?= $row->sefBaslik ?>" height="200" width="200" />
				<p><?= metinKirp($row->icerik, 100) ?></p>
				<a href="<<?= base_url('haber/') . $row->id ?>" class="rm">Devam..</a>
			</article>
		<?php endforeach ?>

	</div>
</section>

<?php $this->load->view('front/include/footer'); ?>