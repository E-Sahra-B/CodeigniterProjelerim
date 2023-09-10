<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?= uyarimesajioku(); ?>
      <!-- Main row -->
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <a class="btn btn-success float-right" href="<?= base_url('admin/addnews'); ?>">Yeni Haber Ekle</a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Resim</th>
                <th>Haber Başlığı</th>
                <th>Haber Başlığı Seo</th>
                <th>Haber Kategorisi</th>
                <th>Haber İçeriği</th>
                <th>Ekleme Tarihi</th>
                <th>İşlemler</th>
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
                  <td><a class="btn btn-info" href="<?= base_url('admin/editnews/') . $row->id; ?>">Düzenle</a>
                    <a class="btn btn-danger" href="<?= base_url('admin/deletenews/') . $row->id; ?>">Sil</a>
                  </td>
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