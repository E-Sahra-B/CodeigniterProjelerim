<!-- <footer class="main-footer fixed-bottom"> -->
<footer class="main-footer">
  <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">#</a></strong>
  Esma Sahra BALCI <div class="float-right d-none d-sm-inline-block"></div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/back/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/back/'); ?>dist/js/adminlte.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/back/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/back/'); ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/back/'); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/back/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/back/'); ?>dist/js/demo.js"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Sortable -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $('#summernote').summernote()
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>