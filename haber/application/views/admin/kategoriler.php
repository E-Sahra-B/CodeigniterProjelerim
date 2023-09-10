<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
  </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?= uyarimesajioku(); ?>
        <!-- < ?php if($this->session->flashdata('success')){ echo "<div class='alert alert-success'>". $this->session->flashdata('success')."</div>";} ?> -->

        <!-- Main row -->
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
            <a class="btn btn-success float-right" href="<?= base_url('admin/addcat'); ?>">Yeni Kategori Ekle</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kategori Adı</th>
                        <th>Kategori Seo</th>
                        <th>Kategori Sıra</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($kategoriler as $row) : ?>
                    <tr>
                        <td><?= $row->kategoriAdi ?></td>
                        <td><?= $row->sefKategoriAdi ?></td>
                        <td><?= $row->sira ?></td>
                        <td><a class="btn btn-info" href="<?= base_url('admin/editcat/').$row->kategoriId; ?>">Düzenle</a></td>
                        <td><a class="btn btn-danger" href="<?= base_url('admin/deletecat/').$row->kategoriId; ?>">Sil</a></td>
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
