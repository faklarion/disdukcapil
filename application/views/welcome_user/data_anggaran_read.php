
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA DATA_ANGGARAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Pengajuan</td>
				<td><?php echo $id_pengajuan; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Kebutuhan</td>
				<td><?php echo $tanggal_kebutuhan; ?></td>
			</tr>
	
			<tr>
				<td>Nrp</td>
				<td><?php echo $nrp; ?></td>
			</tr>
	
			<tr>
				<td>Isi Pengaduan</td>
				<td><?php echo $isi_pengaduan; ?></td>
			</tr>
	
			<tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan; ?></td>
			</tr>
	
			<tr>
				<td>Tanggapan</td>
				<td><?php echo $tanggapan; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('welcome_user') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>