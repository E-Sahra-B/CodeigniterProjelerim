<section class="content-header">
    <h1>
        <a href="<?php echo base_url("panel/" . $this->router->fetch_class() . ""); ?>"><?php echo $title; ?></a>
        <small><?php echo $liste; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("panel"); ?>"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active"><a href="<?php echo base_url("panel/" . $this->router->fetch_class() . ""); ?>"><?php echo $title2; ?></a></li>
        <li class="active"><?php echo $islem; ?></li>
    </ol>
</section>