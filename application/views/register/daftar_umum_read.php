
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA DAFTAR_UMUM</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nik</td>
				<td><?php echo $nik; ?></td>
			</tr>
	
			<tr>
				<td>Nama</td>
				<td><?php echo $nama; ?></td>
			</tr>
	
			<tr>
				<td>No Hp</td>
				<td><?php echo $no_hp; ?></td>
			</tr>
	
			<tr>
				<td>Pilih Poliklinik</td>
				<td><?php echo $pilih_poliklinik; ?></td>
			</tr>
	
			<tr>
				<td>Pilih Dokter</td>
				<td><?php echo $pilih_dokter; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('form_daftar') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>