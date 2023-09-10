<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">

  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $toplamKategori; ?>
              <p>Toplam Kategori</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $haberSayisi; ?>
              <p>Toplam Haber Sayısı</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Haber Resmi</th>
                <th>Haber Başlığı</th>
                <th>Haber Başlığı Seo</th>
                <th>Haber Kategorisi</th>
                <th>Haber İçeriği</th>
                <th>Ekleme Tarihi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($haberler as $row) : ?>
                <tr>
                  <td><img src="<?= $row->resim ?>" height="50" width="50" alt="<?= $row->baslik ?>"></td>
                  <td><?= $row->baslik ?></td>
                  <td><?= $row->sefBaslik ?></td>
                  <td><?= $row->kategoriAdi ?></td>
                  <td><?= metinKirp($row->icerik, 50) ?></td>
                  <td><?= uzunTarih($row->eklemeTarihi); ?></td>
                </tr>
              <?php endforeach ?>
              </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('admin/include/footer'); ?>