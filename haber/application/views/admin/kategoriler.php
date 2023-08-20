<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <?php if($this->session->flashdata('success')){ echo "<div class='alert alert-success'>". $this->session->flashdata('success')."</div>";} ?>

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
                        <th>Düzenle</th>
                        <th>Sil</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($kategoriler as $row) : ?>
                    <tr>
                        <td><?= $row->kategoriAdi ?></td>
                        <td><?= $row->sefKategoriAdi ?></td>
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
