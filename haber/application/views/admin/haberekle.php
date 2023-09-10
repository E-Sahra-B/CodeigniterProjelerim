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
                            <h3 class="card-title">Haber Ekle</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('admin/addnews'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Başlık</label>
                                    <input type="text" class="form-control" name="baslik" placeholder="Başlık Giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori</label>
                                    <select class="form-control" name="kategoriId" id="categoryList">
                                        <option value="0">Kategori Seçiniz</option>
                                        <?php foreach ($categories as $row) : ?>
                                            <option value="<?= $row->kategoriId ?>"><?= $row->kategoriAdi ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea rows="8" id="summernote" name="habericerik"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Resim</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="resim">
                                            <label class="custom-file-label" for="exampleInputFile">Resim Seç</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Resim Yükle</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ana Sayfa Gösterim Yeri</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-sm-4"><input class="form-check-input" type="radio" value="sol" name="checkbutton" id="flexCheckChecked">Sol</div>
                                            <div class="col-sm-4"><input class="form-check-input" type="radio" value="orta" name="checkbutton" id="flexCheckChecked">Orta</div>
                                            <div class="col-sm-4"><input class="form-check-input" type="radio" value="sag" name="checkbutton" id="flexCheckChecked">Sağ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary btn-block" value="Kaydet" name="haberekle">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('admin/include/footer'); ?>
<script>
    $(document).ready(function() {
        $('#categoryList').select2({
            theme: 'bootstrap4'
        });
    });
</script>