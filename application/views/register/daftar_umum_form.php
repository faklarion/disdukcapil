<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>DISDUKCAPIL BANJARMASIN</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/iCheck/square/blue.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
    body {
        height: 100%;
        margin: 0;
        font-family: "Source Sans Pro","Helvetica Neue",Helvetica,Arial,sans-serif;
        background-color: #f9f9f9; /* Warna latar belakang keseluruhan halaman */
    }
    .login-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-box {
        width: 500px; /* Lebarkan kotak */
        background-color: #fff; /* Warna latar belakang elemen .login-box */
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); /* Tambahkan bayangan pada .login-box */
        border-radius: 10px; /* Tambahkan lingkaran pada .login-box */
        padding: 20px;
    }
    .login-logo {
        text-align: center;
        margin-bottom: 20px;
    }
    .button-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
</style>
</head>
<body class="hold-transition login-page">
<body style="background-image: url('<?= base_url() ?>assets/adminlte/dist/img/back.jpg');   background-attachment: fixed;
  background-size: 100% 100%;">
    <div class="login-box">
        
        
        <div class="login-logo" align="center">
        <p align="center"><img src="<?php echo base_url() ?>assets/adminlte/dist/img/dukcapil.png" width="35%" height="35%" class="img-box"></p>
            <a><b> PENDAFTARAN AKUN</b></a>
            <p> DISDUKCAPIL BANJARMASIN</p>
        </div>
        <div class="login-box-body">
                <?php
                $status_login = $this->session->userdata('status_login');
                if (empty($status_login)) {
                    $message = "Silahkan lakukan pendaftaran untuk login ke aplikasi";
                } else {
                    $message = $status_login;
                }
                ?>
                <p class="login-box-msg"><?php echo $message; ?></p>
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <table class="table">
                    <tr><td width='200'>NIK <?php echo form_error('nik_user') ?></td><td><input type="text" class="form-control" name="nik_user" id="nik_user" placeholder="NIK" value="<?php echo $nik_user; ?>" /></td></tr>

                    <tr><td width='200'>NO KK <?php echo form_error('no_kk_user') ?></td><td><input type="text" class="form-control" name="no_kk_user" id="no_kk_user" placeholder="NO KK" value="<?php echo $no_kk_user; ?>" /></td></tr>

					<tr><td width='200'>Nama Lengkap <?php echo form_error('full_name') ?></td><td><input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" /></td></tr>
                    
                    <tr><td width='200'>Jenis Kelamin <?php echo form_error('jenis_kelamin_user') ?></td><td>
                                <select name="jenis_kelamin_user" id="jenis_kelamin_user" class="form-control">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki">L</option>
                                    <option value="Perempuan">P</option>
                                </select>
                            </td></tr>
                    
                    <tr><td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir_user') ?></td><td><input type="text" class="form-control" name="tempat_lahir_user" id="tempat_lahir_user" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir_user; ?>" /></td></tr>

                    <tr><td width='200'>Tanggal lahir <?php echo form_error('tgl_lahir_user') ?></td><td><input type="date" class="form-control" name="tgl_lahir_user" id="tgl_lahir_user" placeholder="tgl" value="<?php echo $tgl_lahir_user; ?>" /></td></tr>

                    <tr><td width='200'>Alamat <?php echo form_error('alamat_user') ?></td><td><input type="text" class="form-control" name="alamat_user" id="alamat_user" placeholder="Alamat" value="<?php echo $alamat_user; ?>" /></td></tr>

                    <tr><td width='200'>No Telpon <?php echo form_error('no_telp_user') ?></td><td><input type="text" class="form-control" name="no_telp_user" id="no_telp_user" placeholder="NO KK" value="<?php echo $no_telp_user; ?>" /></td></tr>
                    <tr><td width='200'>Email <?php echo form_error('email') ?></td><td>

                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td></tr>

                    <?php
                    if ($this->uri->segment(2) == 'create') {
                        ?>

                        <tr><td width='200'>Password <?php echo form_error('password') ?></td><td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td></tr>
                        <?php
                    }
                    ?>


                    <tr><td width='200'>Level User <?php echo form_error('id_user_level') ?></td><td>
                            <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level,'DESC') ?>
                            <!--<input type="text" class="form-control" name="id_user_level" id="id_user_level" placeholder="Id User Level" value="<?php echo $id_user_level; ?>" />--></td></tr>
                            <tr><td width='200'>Status Aktif <?php echo form_error('is_aktif') ?></td><td>
                            <?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $is_aktif, array('class' => 'form-control')); ?>
                            <!--<input type="text" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="<?php echo $is_aktif; ?>" />--></td></tr>
            
                        <tr>
                            <td></td>
                            <td class="button-container">
                                <input type="hidden" name="id_users" value="<?php echo $id_users; ?>" />
                                <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                                <a href="<?php echo site_url('auth') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
                </table></form>        </div>
</div>
</div>

