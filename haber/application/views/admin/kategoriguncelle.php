<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Kategori Güncelle</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('admin/editcat/') . $kategori->kategoriId; ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori Adı</label>
                                    <input type="text" class="form-control" name="kategoriAdi" value="<?= $kategori->kategoriAdi ?>" placeholder="Kategori Adı Giriniz">
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary btn-block" value="Güncelle" name="kategoriguncelle">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('admin/include/footer'); ?>