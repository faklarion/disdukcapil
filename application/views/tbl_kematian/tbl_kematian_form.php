<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KEMATIAN</h3>
			</div>
			<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal Terbit <?php echo form_error('tgl_input_kematian') ?></td>
						<td><input type="date" class="form-control" name="tgl_input_kematian" id="tgl_input_kematian" placeholder="Tgl Input Kematian" value="<?php echo $tgl_input_kematian; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pemohon <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="nama" id="nama" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select></tr>
					
					<tr>

					<tr>
						<td width='200'>Nama <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="id_penduduk" id="id_penduduk" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->no_kk; ?> /<?php echo $row->nama; ?> / <?php echo $row->tgl_lahir; ?> / <?php echo $row->tempat_lahir; ?> / <?php echo $row->jenis_kelamin; ?> / <?php echo $row->alamat; ?> / <?php echo $row->agama; ?> / <?php echo $row->pekerjaan; ?></option>
						<?php endforeach; ?>
					</select>
					

					<tr>
						<td width='200'>Tanggal Kematian <?php echo form_error('tgl_kematian') ?></td>
						<td><input type="date" class="form-control" name="tgl_kematian" id="tgl_kematian" placeholder="Tgl Kematian" value="<?php echo $tgl_kematian; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Penyebab Kematian <?php echo form_error('penyebab_kematian') ?></td><td><input type="text" class="form-control" name="penyebab_kematian" id="penyebab_kematian" placeholder="Penyebab Kematian" value="<?php echo $penyebab_kematian; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tempat Kematian <?php echo form_error('tempat_kematian') ?></td><td><input type="text" class="form-control" name="tempat_kematian" id="tempat_kematian" placeholder="Tempat Kematian" value="<?php echo $tempat_kematian; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Surat Keterangan Kematian <?php echo form_error('imagekematian1') ?></td>
							<td><input type="file" name="imagekematian1"></td>
						</tr>

					<tr>
						<td width='200'>KTP yang meninggal <?php echo form_error('imagekematian2') ?></td>
							<td><input type="file" name="imagekematian2"></td>
						</tr>

					<tr>
						<td width='200'>Fc Kartu Keluarga <?php echo form_error('imagekematian3') ?></td>
							<td><input type="file" name="imagekematian3"></td>
						</tr>

					<tr>
						<td width='200'>Fc KTP Saksi <?php echo form_error('imagekematian4') ?></td>
							<td><input type="file" name="imagekematian4"><p><u>*Catatan:</u></p><h3><i>Jika Merubah Data Harap Upload Ulang</i></h3></td>
						</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kematian" value="<?php echo $id_kematian; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kematian') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>