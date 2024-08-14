<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>Data_anggaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Pengajuan</th>
		<th>Tanggal Kebutuhan</th>
		<th>Nrp</th>
		<th>Isi Pengaduan</th>
		<th>Keterangan</th>
		<th>Tanggapan</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($welcome_user_data as $welcome_user)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $welcome_user->id_pengajuan ?></td>
		      <td><?php echo $welcome_user->tanggal_kebutuhan ?></td>
		      <td><?php echo $welcome_user->nrp ?></td>
		      <td><?php echo $welcome_user->isi_pengaduan ?></td>
		      <td><?php echo $welcome_user->keterangan ?></td>
		      <td><?php echo $welcome_user->tanggapan ?></td>
		      <td><?php echo $welcome_user->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>