<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KTP</h3>
			</div>
			<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal Terbit <?php echo form_error('tgl_input_ktp') ?></td>
						<td><input type="date" class="form-control" name="tgl_input_ktp" id="tgl_input_ktp" placeholder="Tgl Input Ktp" value="<?php echo $tgl_input_ktp; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="id_penduduk" id="id_penduduk" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?> / / <?php echo $row->nik; ?> / <?php echo $row->jenis_kelamin; ?> / <?php echo $row->tempat_lahir; ?> / <?php echo $row->tgl_lahir; ?> / <?php echo $row->agama; ?> / <?php echo $row->pekerjaan; ?> / <?php echo $row->stts_perkawinan; ?> / <?php echo $row->alamat; ?></option>
						<?php endforeach; ?>
					</select>
	    

					<tr>
						<td width='200'>Kewarganegaraan <?php echo form_error('negara_ktp') ?></td><td><input type="text" class="form-control" name="negara_ktp" id="negara_ktp" placeholder="Warga Negara" value="<?php echo $negara_ktp; ?>" /></td>
					</tr>

					
					<tr>
						<td width='200'>Image KK <?php echo form_error('imagektp') ?></td>
						<td><input type="file" name="imagektp"></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_ktp" value="<?php echo $id_ktp; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_ktp') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>