<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KIA</h3>
			</div>
			<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal Terbit <?php echo form_error('tgl_input_kia') ?></td>
						<td><input type="date" class="form-control" name="tgl_input_kia" id="tgl_input_kia" placeholder="Tgl Input Kia" value="<?php echo $tgl_input_kia; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Pemohon <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="stts_perkawinan" id="id_penduduk" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?> / <?php echo $row->no_kk; ?></option>
						<?php endforeach; ?>
					</select>

					<tr>
						<td width='200'>NIK Kia <?php echo form_error('nik_kia') ?></td><td><input type="text" class="form-control" name="nik_kia" id="nik_kia" placeholder="nik kia" value="<?php echo $nik_kia; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Nama <?php echo form_error('id_aktalahir') ?></td><td>
		 				<select name="id_aktalahir" id="id_aktalahir" class="form-control">
						<?php foreach ($tbl_aktalahir_data as $row): ?>
						<option value="<?php echo $row->id_aktalahir; ?>"><?php echo $row->nama_bayi; ?> / <?php echo $row->no_akta; ?> / <?php echo $row->tgl_lahir_bayi; ?> / <?php echo $row->tempat_lahir_bayi; ?> / <?php echo $row->jenis_kelamin_bayi; ?> / <?php echo $row->kelahiran_ke; ?></option>
						<?php endforeach; ?>
					</select>

					<tr>
						<td width='200'>Agama <?php echo form_error('agama_kia') ?></td><td><input type="text" class="form-control" name="agama_kia" id="agama_kia" placeholder="Agama" value="<?php echo $agama_kia; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Kewarganegaraan <?php echo form_error('warganegara') ?></td><td><input type="text" class="form-control" name="warganegara" id="warganegara" placeholder="warganegara" value="<?php echo $warganegara; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Nama Ayah <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="id_penduduk" id="nama_ayah" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select></tr>
	
					<tr>
						<td width='200'>Nama Ibu <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="nama" id="nama_ibu" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select></tr>

					<tr>
						<td width='200'>Fc Akta Kelahiran <?php echo form_error('image_kia1') ?></td>
						<td><input type="file" name="image_kia1"></td>
					</tr>
	    
					<tr>
						<td width='200'>FC KK Orang Tua <?php echo form_error('image_kia2') ?></td>
						<td><input type="file" name="image_kia2"></td>
					</tr>
	    
					<tr>
						<td width='200'>FC KTP Orang Tua <?php echo form_error('image_kia3') ?></td>
						<td><input type="file" name="image_kia3"></td>
					</tr>
	    
					<tr>
						<td width='200'>Pas foto (4x6) 1 lbr <?php echo form_error('image_kia4') ?></td>
						<td><input type="file" name="image_kia4"><p><u>*Catatan:</u></p><p><i>Jika Merubah Data Harap Upload Ulang</i><p><i>Tahun Lahir Genap Foto Latar Biru</i></p><p><i>Tahun Lahir Genap Foto Latar Merah</i></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kia" value="<?php echo $id_kia; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kia') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>