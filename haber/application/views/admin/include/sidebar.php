  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin'); ?>" class="brand-link">
      <img src="<?php echo base_url('assets/back/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/back/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
            $info = $this->session->userdata('admininfo');
            echo 'Hoşgeldiniz ' . (isset($info) ? metinKirp($info->name, 10) : "Admin");
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item"><a href="<?= base_url('admin'); ?>" class="nav-link">
              <p>Anasayfa</p>
            </a></li>
          <li class="nav-item"><a href="<?= base_url('admin/news'); ?>" class="nav-link">
              <p>Haberler</p>
            </a></li>
            <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin'); ?>" class="brand-link">
      <img src="<?php echo base_url('assets/back/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/back/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
            $info = $this->session->userdata('admininfo');
            echo 'Hoşgeldiniz ' . (isset($info) ? metinKirp($info->name, 10) : "Admin");
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item"><a href="<?= base_url('admin'); ?>" class="nav-link">
              <p>Anasayfa</p>
            </a></li>
          <li class="nav-item"><a href="<?= base_url('admin/news'); ?>" class="nav-link">
              <p>Haberler</p>
            </a></li>
          <li class="nav-item"><a href="<?= base_url('admin/cagories'); ?>" class="nav-link">
              <p>Kategoriler</p>
            </a></li>
            <li class="nav-item"><a href="<?= base_url('admin/kategoriSira'); ?>" class="nav-link">
              <p>Kategori Sıralama</p>
            </a></li>
          <li class="nav-item"><a href="<?= base_url('admin/message'); ?>" class="nav-link">
              <p>Gelen Mesajlar </p><span style="color:aqua;">( <?= countto('mesaj', array('isread' => 0)) ?> )</span>
            </a></li>
          <li class="nav-item"><a href="<?= base_url('admin/cikis'); ?>" class="nav-link">
              <p>Çıkış Yap</p>
            </a></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
          <li class="nav-item"><a href="<?= base_url('admin/message'); ?>" class="nav-link">
              <p>Gelen Mesajlar </p><span style="color:aqua;">( <?= countto('mesaj', array('isread' => 0)) ?> )</span>
            </a></li>
          <li class="nav-item"><a href="<?= base_url('admin/cikis'); ?>" class="nav-link">
              <p>Çıkış Yap</p>
            </a></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>