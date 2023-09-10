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
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Mesaj Tarihi</th>
                <th>Mesaj Zamanı</th>
                <th>Mesaj Gönderen</th>
                <th>Mail Adresi</th>
                <th>Mesaj Başlığı</th>
                <th>Mesaj İçeriği</th>
                <th>İşlemler</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($mesajlar as $row) : ?>
                <tr>
                  <td><?= uzunTarih($row->date); ?></td>
                  <td><?= getReturnTime($row->date) ?></td>
                  <td><?= $row->name ?></td>
                  <td><?= $row->email ?></td>
                  <td><?= $row->subject ?></td>
                  <td><?= metinKirp($row->message, 50) ?></td>
                  <td>
                    <a class="btn btn-info" href="<?= base_url('admin/updatemsg/') . $row->id; ?>">Oku</a>
                    <a class="btn btn-danger" href="<?= base_url('admin/deletemsg/') . $row->id; ?>">Sil</a>
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