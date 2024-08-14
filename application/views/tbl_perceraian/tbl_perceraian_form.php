<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PERCERAIAN</h3>
			</div>
			<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
				<tr>
						<td width='200'>Tanggal Terbit <?php echo form_error('tgl_input_cerai') ?></td>
						<td><input type="date" class="form-control" name="tgl_input_cerai" id="tgl_input_cerai" placeholder="Tgl Input Cerai" value="<?php echo $tgl_input_cerai; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>NIK Suami <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="id_penduduk" id="id_penduduk" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"> / <?php echo $row->nik; ?> / <?php echo $row->no_kk; ?> / <?php echo $row->nama; ?> / <?php echo $row->tempat_lahir; ?> / <?php echo $row->tgl_lahir; ?> / <?php echo $row->agama; ?> / <?php echo $row->pekerjaan; ?> / <?php echo $row->pendidikan; ?></option>
						<?php endforeach; ?>
					</select>

					<tr>
						<td width='200'>Negara Laki <?php echo form_error('negara_laki') ?></td><td><input type="text" class="form-control" name="negara_laki" id="negara_laki" placeholder="Negara Laki" value="<?php echo $negara_laki; ?>" /></td>
					</tr>
	

					<tr>
						<td width='200'>Ayah Laki <?php echo form_error('ayah_laki') ?></td><td><input type="text" class="form-control" name="ayah_laki" id="ayah_laki" placeholder="Ayah Laki" value="<?php echo $ayah_laki; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Ibu Laki <?php echo form_error('ibu_laki') ?></td><td><input type="text" class="form-control" name="ibu_laki" id="ibu_laki" placeholder="Ibu Laki" value="<?php echo $ibu_laki; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>NIK Istri <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="nama" id="nama" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"> / <?php echo $row->nik; ?> / <?php echo $row->no_kk; ?> / <?php echo $row->nama; ?> / <?php echo $row->tempat_lahir; ?> / <?php echo $row->tgl_lahir; ?> / <?php echo $row->agama; ?> / <?php echo $row->pekerjaan; ?> / <?php echo $row->pendidikan; ?></option>
						<?php endforeach; ?>
					</select>

					<tr>
						<td width='200'>Negara Istri <?php echo form_error('negara_istri') ?></td><td><input type="text" class="form-control" name="negara_istri" id="negara_istri" placeholder="Negara Istri" value="<?php echo $negara_istri; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Ayah Wanita <?php echo form_error('ayah_wanita') ?></td><td><input type="text" class="form-control" name="ayah_wanita" id="ayah_wanita" placeholder="Ayah Wanita" value="<?php echo $ayah_wanita; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Ibu Wanita <?php echo form_error('ibu_wanita') ?></td><td><input type="text" class="form-control" name="ibu_wanita" id="ibu_wanita" placeholder="Ibu Wanita" value="<?php echo $ibu_wanita; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Perkawinan <?php echo form_error('tgl_perkawinan') ?></td>
						<td><input type="date" class="form-control" name="tgl_perkawinan" id="tgl_perkawinan" placeholder="Tgl Perkawinan" value="<?php echo $tgl_perkawinan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Perceraian <?php echo form_error('tgl_perceraian') ?></td>
						<td><input type="date" class="form-control" name="tgl_perceraian" id="tgl_perceraian" placeholder="Tgl Perceraian" value="<?php echo $tgl_perceraian; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Penyebab Cerai <?php echo form_error('penyebab_cerai') ?></td><td><input type="text" class="form-control" name="penyebab_cerai" id="penyebab_cerai" placeholder="Penyebab Cerai" value="<?php echo $penyebab_cerai; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>FC Putusan Pengadilan Negara <?php echo form_error('imagecerai1') ?></td>
						<td><input type="file" name="imagecerai1"></td>
					</tr>
	    
					<tr>
						<td width='200'>FC KTP dan KK <?php echo form_error('imagecerai2') ?></td>
						<td><input type="file" name="imagecerai2"></td>
					</tr>
	    
					<tr>
						<td width='200'>Kutipan Akta Nikah Asli <?php echo form_error('imagecerai3') ?></td>
						<td><input type="file" name="imagecerai3"><h4><b>Catatan</b></h4><h4><b>Setiap Kali Edit Data,Wajib Upload Ulang File</b></h4></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_perceraian" value="<?php echo $id_perceraian; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_perceraian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>