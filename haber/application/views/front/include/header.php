<!DOCTYPE html>
<html lang="zxx">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/remixicon.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/uicons-regular-rounded.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/flaticon_baxo.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/swiper.bundle.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/aos.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/header.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/footer.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/responsive.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>assets/css/dark-theme.css">
	<title><?= (isset($head) ? $head : "Haber Sitesi"); ?></title>
	<link rel="icon" type="image/png" href="assets/img/favicon.webp">
</head>

<body>

	<div class="loader-wrapper">
		<div class="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>

	<div class="switch-theme-mode">
		<label id="switch" class="switch">
			<input type="checkbox" onchange="toggleTheme()" id="slider">
			<span class="slider round"></span>
		</label>
	</div>

	<div class="navbar-area header-one" id="navbar">

		<div class="header-top">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-lg-4 col-md-6 col-5">
					</div>
					<div class="col-lg-4 col-md-6 md-none">
						<a class="navbar-brand" href="index.html">
						</a>
					</div>

				</div>
			</div>
		</div>

		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand d-lg-none" href="index.html">
					<img class="logo-light" src="<?php echo base_url('assets/front/'); ?>assets/img/logo-white.webp" alt="logo">
					<img class="logo-dark" src="<?php echo base_url('assets/front/'); ?>assets/img/logo-white.webp" alt="logo">
				</a>
				<button type="button" class="search-btn d-lg-none" data-bs-toggle="modal" data-bs-target="#searchModal">
					<i class="flaticon-loupe"></i>
				</button>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item"><a href="<?= base_url('') ?>" class="nav-link active">Anasayfa</a></li>
						<?php foreach ($kategoriler as $row) : ?>
							<li class="nav-item"><a href="<?= base_url('kategori-') . $row->seoad ?>" class="nav-link"><?= $row->ad; ?></a></li>
						<?php endforeach ?>
						<li class="nav-item"><a href="<?= base_url('iletisim') ?>" class="nav-link">İletişim</a></li>
					</ul>
					<div class="others-option d-flex align-items-center">
					</div>
				</div>
			</nav>
		</div>

	</div>