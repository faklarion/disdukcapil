<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PINDAH</h3>
			</div>
			<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal Terbit <?php echo form_error('tgl_input_pindah') ?></td>
						<td><input type="date" class="form-control" name="tgl_input_pindah" id="tgl_input_pindah" placeholder="Tgl Input Pindah" value="<?php echo $tgl_input_pindah; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama <?php echo form_error('klasifikasi_pindah') ?></td><td>
		 				<select name="id_penduduk" id="id_penduduk" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?> /<?php echo $row->no_kk; ?> / <?php echo $row->nik; ?> / <?php echo $row->jenis_kelamin; ?> / <?php echo $row->tgl_lahir; ?> / <?php echo $row->tempat_lahir; ?> / <?php echo $row->alamat; ?></option>
						<?php endforeach; ?>
					</select>

					<tr>
						<td width='200'>Klasifikasi Pindah <?php echo form_error('klasifikasi_pindah') ?></td>
						<td><select name="klasifikasi_pindah" id="klasifikasi_pindah" class="form-control">
						<option value="">--Pilih Klasifikasi--</option>
						<option value="Antar Kecamatan">Antar Kecamatan</option>
						<option value="Antar Kab/Kota">Antar Kab/Kota</option>
						<option value="Antar Provinsi">Antar Provinsi</option>
						</select></td>
	
					<tr>
						<td width='200'>Alamat Pindah <?php echo form_error('alamat_pindah') ?></td><td><input type="text" class="form-control" name="alamat_pindah" id="alamat_pindah" placeholder="Alamat Pindah" value="<?php echo $alamat_pindah; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Alasan Pindah <?php echo form_error('alasan_pindah') ?></td><td><input type="text" class="form-control" name="alasan_pindah" id="alasan_pindah" placeholder="Alasan Pindah" value="<?php echo $alasan_pindah; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>KK Asli <?php echo form_error('imagepindah1') ?></td>
						<td><input type="file" name="imagepindah1"></td>
					</tr>

					<tr>
						<td width='200'>Fc KTP <?php echo form_error('imagepindah2') ?></td>
						<td><input type="file" name="imagepindah2"></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_pindah" value="<?php echo $id_pindah; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_pindah') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>