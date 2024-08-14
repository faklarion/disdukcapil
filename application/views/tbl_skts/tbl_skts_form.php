<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA SKTS</h3>
			</div>
			<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal Terbit <?php echo form_error('tgl_input_skts') ?></td>
						<td><input type="date" class="form-control" name="tgl_input_skts" id="tgl_input_skts" placeholder="Tgl Input Skts" value="<?php echo $tgl_input_skts; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="id_penduduk" id="id_penduduk" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?> / / <?php echo $row->nik; ?> / <?php echo $row->no_kk; ?> / <?php echo $row->jenis_kelamin; ?> / <?php echo $row->tempat_lahir; ?> / <?php echo $row->tgl_lahir; ?> / <?php echo $row->pekerjaan; ?> / <?php echo $row->alamat; ?></option>
						<?php endforeach; ?>
					</select>

					<tr>
						<td width='200'>Keperluan <?php echo form_error('keperluan') ?></td><td><input type="text" class="form-control" name="keperluan" id="keperluan" placeholder="Keperluan" value="<?php echo $keperluan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Alamat Sementara <?php echo form_error('alamat_sementara') ?></td><td><input type="text" class="form-control" name="alamat_sementara" id="alamat_sementara" placeholder="Alamat Sementara" value="<?php echo $alamat_sementara; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Surat Pengantar RT <?php echo form_error('imageskts1') ?></td>
						<td><input type="file" name="imageskts1"></td>
					</tr>
	    
					<tr>
						<td width='200'>FC KTP <?php echo form_error('imageskts2') ?></td>
						<td><input type="file" name="imageskts2"></td>
					</tr>
	    
					<tr>
						<td width='200'>FC KK <?php echo form_error('imageskts3') ?></td>
						<td><input type="file" name="imageskts3"></td>
					</tr>
	
					
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_skts" value="<?php echo $id_skts; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_skts') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>