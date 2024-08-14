<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DISDUKCAPIL Banjarmasin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Style AdminLTE -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- Pilihan Skin AdminLTE. Pilih satu skin dari folder css/skins 
         alih-alih mengunduh semuanya untuk mengurangi beban. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/skins/_all-skins.min.css">
    <!-- Font Google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url() ?>adminlte/index2.html" class="logo">
            <!-- Mini logo untuk sidebar dengan ukuran 50x50 piksel -->
            <span class="logo-mini"><b>DI</b>S</span>
            <!-- Logo untuk tampilan biasa dan perangkat seluler -->
            <span class="logo-lg"><b>DISDUKCAPIL</b> | BJM</span>
        </a>
        <!-- Header Navbar: gaya dapat ditemukan di header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Tombol untuk mengganti sidebar -->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">                          

                    <!-- Akun Pengguna: gaya dapat ditemukan di dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Foto Pengguna -->
                            <li class="user-header">
                                <img src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?> " class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $this->session->userdata('full_name'); ?>                                         
                                    <small>Anggota sejak Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu bagian bawah -->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?php echo anchor('user/tbl_user_form.php', 'Profil', array('class' => 'btn btn-default btn-flat')); ?>
                                </div>
                                <div class="pull-right">
                                    <?php echo anchor('auth/logout', 'Keluar', array('class' => 'btn btn-default btn-flat')); ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Tombol untuk mengganti Control Sidebar -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Kolom sisi kiri. Berisi logo dan sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: gaya dapat ditemukan di sidebar.less -->
        <?php $this->load->view('template/sidebar'); ?>
    </aside>

    <?php
    echo $contents;
    ?>


    <!-- /.content-wrapper 
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versi</b> 2.4.0
        </div>
        <strong>Hak Cipta &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> Seluruh hak cipta dilindungi.
    </footer>-->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Buat tab-tab -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Isi tab -->
        <div class="tab-content">
            <!-- Isi tab beranda -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Aktivitas Terbaru</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Ulang Tahun Langdon</h4>

                                <p>Akan berusia 23 pada 24 April</p>
                            </div>
                        </a>
                    </li>
                    <!-- Tambahkan aktivitas terbaru lainnya di sini -->
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Progres Tugas</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Desain Template Kustom
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <!-- Tambahkan tugas progres lainnya di sini -->
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Isi tab statistik -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Konten Tab Statistik</div>
            <!-- /.tab-pane -->
            <!-- Isi tab pengaturan -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">Pengaturan Umum</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Penggunaan panel laporan
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Beberapa informasi tentang opsi pengaturan umum ini
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <!-- Tambahkan opsi pengaturan umum lainnya di sini -->

                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Tambahkan latar belakang sidebar. Div ini harus ditempatkan
         tepat setelah control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<!-- jQuery 3
<script src="<?php echo base_url() ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
 -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/adminlte/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- script kustom Anda -->
<script>
    $(function () {
        $('.select2').select2();
        $('#example1').DataTable();
        $('#example2').DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            autoWidth: false
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#id_penduduk').select2({
            placeholder: 'Pilih...',
            allowClear: true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#nama_ayah').select2({
            placeholder: 'Pilih...',
            allowClear: true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#nama_ibu').select2({
            placeholder: 'Pilih...',
            allowClear: true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#nama').select2({
            placeholder: 'Pilih...',
            allowClear: true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#id_aktalahir').select2({
            placeholder: 'Pilih...',
            allowClear: true
        });
    });
</script>
</body>
</html>
