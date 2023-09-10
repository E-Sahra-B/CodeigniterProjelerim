<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="col-md-6">
        <h3 class="text-primary">Kategorileri Sıralama</h3>
        <hr>
        <h6 id="sonuc" class="text-success">(*) Kategorileri Sürükleyerek Sıralayabilirsiniz</h6>
        <!-- Main row -->
        <!-- /.row (main row) -->
        <ul class="list-group" id="sortable">
          <?php foreach ($kategoriler as $row) : ?>
            <li id="sira-<?= $row->kategoriId ?>" class="list-group-item d-flex justify-content-between align-items-center">
              <img class="handle" src="<?php echo base_url('assets/back/'); ?>dist/img/arrow.png" width="20" height="20">
              <!-- <i class="ion ion-stats-bars"></i> -->
              <?= $row->kategoriAdi ?>
              <span class="badge badge-primary badge-pill"><?= ($row->sira) + 1 ?></span>
            </li>
          <?php endforeach ?>
        </ul>
      </div><!-- /.container-fluid -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('admin/include/footer'); ?>
<script>
  $(document).ready(function() {
    $('#sortable').sortable();
    $("#sortable").on('sortupdate', function() {
      var data = $(this).sortable('serialize');
      var url = "<?= base_url('admin/kategoriSira') ?>";
      $.post(url, {
        data: data
      }, function(response) {
        //$("#sonuc").html('<div class="alert alert-success">Sıralama Başarıyla Değistirildi</div>');
        sonuc("success", "Sıralama Başarıyla Değistirildi");
      });
    });

    function sonuc(result, message) {
      $("#sonuc").html('<div class="alert alert-' + result + '">' + message + '</div>');
      $("#sonuc").fadeTo(2000, 500).slideUp(500, function() {
        $("#sonuc").slideUp(500);
      });
    }
  });
</script>