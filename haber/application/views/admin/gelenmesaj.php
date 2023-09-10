<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
  </div>

  <!-- Main content -->
  <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Mesaj Detayı</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- <form action="< ?= base_url('admin/editcat/') . $kategori->kategoriId; ?>" method="post"> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mesaj Gönderen Ad</label>
                                    <input type="text" class="form-control" value="<?= $mesaj->name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mesaj Gönderen Mail</label>
                                    <input type="text" class="form-control" value="<?= $mesaj->email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mesaj Başlığı</label>
                                    <input type="text" class="form-control" value="<?= $mesaj->subject ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mesaj İçeriği</label>
                                    <input type="text" class="form-control" value="<?= $mesaj->message ?>">
                                </div>
                                <!-- /.card-body -->

                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('admin/include/footer'); ?>