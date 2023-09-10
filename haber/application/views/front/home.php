<?php $this->load->view('front/include/header'); ?>
	<div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<input type="text" class="form-control" placeholder="Search here....">
					<button type="submit"><i class="fi fi-rr-search"></i></button>
				</form>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line"></i></button>
			</div>
		</div>
	</div>
<br>
	<div class="container-fluid pb-75">
		<div class="news-col-wrap">
			<!-- sol -->
			<div class="news-col-one">
				<div class="news-card-two">
					<div class="news-card-img">
						<img src="<?= $solust->resim; ?>" alt="Image">
						<a href="<?= base_url('kategori-') . $solust->sefKategoriAdi ?>" class="news-cat"><?= $solust->kategoriAdi; ?></a>
					</div>
					<div class="news-card-info">
						<h3><a href="<?= base_url('haber-') . $solust->sefBaslik ?>"><?= $solust->baslik; ?></a></h3>
						<ul class="news-metainfo list-style">
							<li><i class="fi fi-rr-calendar-minus"></i><a href="<?= base_url('haber-') . $solust->sefBaslik ?>"><?= uzunTarih($solust->eklemeTarihi); ?></a></li>
						</ul>
					</div>
				</div>
				<?php foreach ($sol3 as $row) : ?>
				<div class="news-card-three">
					<div class="news-card-img">
						<img src="<?= $row->resim ?>" alt="Image">
					</div>
					<div class="news-card-info">
						<a href="<?= base_url('kategori-') . $row->sefKategoriAdi ?>" class="news-cat"><?= $row->kategoriAdi ?></a>
						<h3><a href="<?= base_url('haber-') . $row->sefBaslik ?>"><?= $row->baslik ?></a></h3>
						<ul class="news-metainfo list-style">
							<li><i class="fi fi-rr-calendar-minus"></i><a href="<?= base_url('haber-') . $row->sefBaslik ?>"><?= uzunTarih($row->eklemeTarihi) ?></a></li>
						</ul>
					</div>
				</div>
				<?php endforeach ?>
			</div>
			<!-- sol -->

			<!-- orta -->
			<div class="news-col-two">
				<div class="news-card-four">
					<img src="<?= $ortaust->resim; ?>" alt="Image">
					<div class="news-card-info">
						<h3><a href="<?= base_url('haber-') . $ortaust->sefBaslik ?>"><?= $ortaust->baslik; ?></a></h3>
						<ul class="news-metainfo list-style">
							<li><i class="fi fi-rr-calendar-minus"></i><a href="<?= base_url('haber-') . $ortaust->sefBaslik ?>"><?= uzunTarih($ortaust->eklemeTarihi); ?></a></li>
						</ul>
					</div>
				</div>
				<?php foreach ($orta2 as $orta) : ?>
				<div class="news-card-five">
					<div class="news-card-img">
						<img src="<?= $orta->resim ?>" alt="Image">
						<a href="<?= base_url('kategori-') . $orta->sefKategoriAdi ?>" class="news-cat"><?= $orta->kategoriAdi ?></a>
					</div>
					<div class="news-card-info">
						<h3><a href="<?= base_url('haber-') . $orta->sefBaslik ?>"><?= $orta->baslik ?></a></h3>
						<!-- <p>< ?= metinKirp($orta->icerik,100) ?></p> -->
						<p><?= $orta->icerik ?></p>
						<ul class="news-metainfo list-style">
							<li><i class="fi fi-rr-calendar-minus"></i><a href="<?= base_url('haber-') . $orta->sefBaslik ?>"><?= uzunTarih($orta->eklemeTarihi) ?></a></li>
						</ul>
					</div>
				</div>
				<?php endforeach ?>
				
			</div>
			<!-- orta -->

			<!-- sağ -->
			<div class="news-col-three">
				<div class="news-card-two">
					<div class="news-card-img">
						<img src="<?= $sagust->resim; ?>" alt="Image">
						<a href="<?= base_url('kategori-') . $sagust->sefKategoriAdi ?>" class="news-cat"><?= $sagust->kategoriAdi; ?></a>
					</div>
					<div class="news-card-info">
						<h3><a href="<?= base_url('haber-') . $sagust->sefBaslik ?>"><?= $sagust->baslik; ?></a></h3>
						<ul class="news-metainfo list-style">
							<li><i class="fi fi-rr-calendar-minus"></i><a href="<?= base_url('haber-') . $sagust->sefBaslik ?>"><?= uzunTarih($sagust->eklemeTarihi); ?></a></li>
						</ul>
					</div>
				</div>
				<?php foreach ($sag3 as $sag) : ?>
				<div class="news-card-three">
					<div class="news-card-img">
						<img src="<?= $sag->resim ?>" alt="Image">
					</div>
					<div class="news-card-info">
						<a href="<?= base_url('kategori-') . $sag->sefKategoriAdi ?>" class="news-cat"><?= $sag->kategoriAdi ?></a>
						<h3><a href="<?= base_url('haber-') . $sag->sefBaslik ?>"><?= $sag->baslik ?></a></h3>
						<ul class="news-metainfo list-style">
							<li><i class="fi fi-rr-calendar-minus"></i><a href="<?= base_url('haber-') . $sag->sefBaslik ?>"><?= uzunTarih($sag->eklemeTarihi) ?></a></li>
						</ul>
					</div>
				</div>
				<?php endforeach ?>
			</div>
			<!-- sağ -->
		</div>
	</div>
<?php $this->load->view('front/include/footer'); ?>