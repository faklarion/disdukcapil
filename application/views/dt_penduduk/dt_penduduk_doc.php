<!doctype html>
<html>
    <head>
    <title>DISDUKCAPIL Banjarmasin</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Dt_penduduk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Kk</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Jenis Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tgl Lahir</th>
		<th>Agama</th>
		<th>Pendidikan</th>
		<th>Pekerjaan</th>
		<th>Gol Darah</th>
		<th>Stts Perkawinan</th>
		<th>No Hp</th>
		
            </tr><?php
            foreach ($dt_penduduk_data as $dt_penduduk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $dt_penduduk->no_kk ?></td>
		      <td><?php echo $dt_penduduk->nik ?></td>
		      <td><?php echo $dt_penduduk->nama ?></td>
		      <td><?php echo $dt_penduduk->alamat ?></td>
		      <td><?php echo $dt_penduduk->jenis_kelamin ?></td>
		      <td><?php echo $dt_penduduk->tempat_lahir ?></td>
		      <td><?php echo $dt_penduduk->tgl_lahir ?></td>
		      <td><?php echo $dt_penduduk->agama ?></td>
		      <td><?php echo $dt_penduduk->pendidikan ?></td>
		      <td><?php echo $dt_penduduk->pekerjaan ?></td>
		      <td><?php echo $dt_penduduk->gol_darah ?></td>
		      <td><?php echo $dt_penduduk->stts_perkawinan ?></td>
		      <td><?php echo $dt_penduduk->no_hp ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>