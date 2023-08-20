<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>css/default/default.css" type="text/css" media="screen" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="jquery.nivo.slider.pack.js" type="text/javascript"></script>
	<title><?= (isset($head) ? $head : "Haber Sitesi"); ?></title>
</head>

<body id="home">
	<div id="wrapper">

		<!--__--__--__--__--__--  L O G O  &   N A V    B A R --__--___--__--__--__-->
		<header>
			<div id="logo">
				<h1>Source X <span id="iisrt"><span id="ii">II</span> <span id="srt">SRT</span></span></h1>
				<div id="tagline">
					<h2>Just another Geeksband Template !</h2>
				</div>
			</div>
			<nav>
				<ul>
					<li><a href="<?= base_url('') ?>" id="homenav">Anasayfa</a></li>
					<?php foreach ($kategoriler as $row) : ?>
						<li><a href="<?= base_url('kategori/') . $row->sefKategoriAdi ?>"><?= $row->kategoriAdi ?></a></li>
					<?php endforeach ?>
				</ul>
			</nav>
		</header>