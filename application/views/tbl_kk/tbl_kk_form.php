<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA Kartu Keluarga</h3>
			</div>
			<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
			
			
	
					<tr>
						<td width='200'>Tanggal Terbit <?php echo form_error('tgl_input_kk') ?></td>
						<td><input type="date" class="form-control" name="tgl_input_kk" id="tgl_input_kk" placeholder="Tgl Input Kk" value="<?php echo $tgl_input_kk; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pemohon <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="id_penduduk" id="id_penduduk" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?> / / <?php echo $row->no_kk; ?> / <?php echo $row->nik; ?> / <?php echo $row->jenis_kelamin; ?> / <?php echo $row->tempat_lahir; ?> / <?php echo $row->tgl_lahir; ?> / <?php echo $row->agama; ?> / <?php echo $row->pendidikan; ?> / <?php echo $row->pekerjaan; ?> / <?php echo $row->gol_darah; ?> / <?php echo $row->alamat; ?></option>
						<?php endforeach; ?>
					</select>
					</tr>

					<tr>
						<td width='200'>Kepala Keluarga <?php echo form_error('kepala_keluarga') ?></td><td><input type="text" class="form-control" name="kepala_keluarga" id="kepala_keluarga" placeholder="Kepala Keluarga" value="<?php echo $kepala_keluarga; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Upload File <?php echo form_error('imagekk1') ?></td>
						<td><input type="file" name="imagekk1"></td>
					</tr>
	    
					<tr>
						<td width='200'>Upload File <?php echo form_error('imagekk2') ?></td>
						<td><input type="file" name="imagekk2"></td>
					</tr>
	    
					<tr>
						<td width='200'>Upload File <?php echo form_error('imagekk3') ?></td>
						<td><input type="file" name="imagekk3"><div><u>*Catatan:</u></div><div><i>Perubahan Pada Kartu Keluarga (Penambah Anak)</i></div><div><i>- KK Asli</i></div><div><i>- FC Buku Nikah</i></div><div><i>- Surat Kelahiran Anak Dari RS/Bidan/klink</i></div><br><div><i>Perubahan KK ( Bagi Anggota Keluarga Yang Dikeluarkan )</i></div><div><i>- KK Asli</i></div><div><i>- Surat Keterangan Pindah Datang Yang Di Keluarkan DISDUKCAPIL</i></div><div><i>- Surat Ket.Kematian</i></div><div><i>- Surat Ket.Nikah / Akta Perkawinan</i></div><div><i>- KTP Asli</i></div></td>
					</tr>

					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kk" value="<?php echo $id_kk; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kk') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>