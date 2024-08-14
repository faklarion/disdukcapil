<div class="content-wrapper">
<script>
    $(document).ready(function () {
        // Inisialisasi input jam dengan ClockPicker
        $('#jam').clockpicker({
            autoclose: true,
            placement: 'top',
            donetext: 'Done'
        });
    });
</script>

	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA AKTALAHIR</h3>
			</div>
			<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal Terbit <?php echo form_error('tgl_input') ?></td>
						<td><input type="date" class="form-control" name="tgl_input" id="tgl_input" placeholder="Tgl Input" value="<?php echo $tgl_input; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>No Akta <?php echo form_error('no_akta') ?></td><td><input type="text" class="form-control" name="no_akta" id="no_akta" placeholder="No Akta" value="<?php echo $no_akta; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pemohon <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="id_penduduk" id="id_penduduk" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?> / <?php echo $row->no_kk; ?></option>
						<?php endforeach; ?>
					</select>


					<tr>
						<td width='200'>Nama Bayi <?php echo form_error('nama_bayi') ?></td><td><input type="text" class="form-control" name="nama_bayi" id="nama_bayi" placeholder="Nama Bayi" value="<?php echo $nama_bayi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jenis Kelamin Bayi <?php echo form_error('jenis_kelamin_bayi') ?></td>
						<td><select name="jenis_kelamin_bayi" id="jenis_kelamin_bayi" class="form-control">
						<option value="">--Pilih Jenis Kelamin--</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
						</select></td>
        </tr>
	
					<tr>
						<td width='200'>Tempat Lahir Bayi <?php echo form_error('tempat_lahir_bayi') ?></td><td><input type="text" class="form-control" name="tempat_lahir_bayi" id="tempat_lahir_bayi" placeholder="Tempat Lahir Bayi" value="<?php echo $tempat_lahir_bayi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Lahir Bayi <?php echo form_error('tgl_lahir_bayi') ?></td>
						<td><input type="date" class="form-control" name="tgl_lahir_bayi" id="tgl_lahir_bayi" placeholder="Tgl Lahir Bayi" value="<?php echo $tgl_lahir_bayi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jam <?php echo form_error('jam') ?></td><td><input type="time" class="form-control" name="jam" id="jam" placeholder="Jam" value="<?php echo $jam; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Berat Bayi <?php echo form_error('berat_bayi') ?></td><td><input type="text" class="form-control" name="berat_bayi" id="berat_bayi" placeholder="Berat Bayi" value="<?php echo $berat_bayi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kelahiran Ke <?php echo form_error('kelahiran_ke') ?></td><td><input type="text" class="form-control" name="kelahiran_ke" id="kelahiran_ke" placeholder="Kelahiran Ke" value="<?php echo $kelahiran_ke; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Penolong Kelahiran <?php echo form_error('penolong_kelahiran') ?></td><td><input type="text" class="form-control" name="penolong_kelahiran" id="penolong_kelahiran" placeholder="Penolong Kelahiran" value="<?php echo $penolong_kelahiran; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Ayah <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="nama" id="nama_ayah" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
	
					<tr>
						<td width='200'>Nama Ibu <?php echo form_error('id_penduduk') ?></td><td>
		 				<select name="nik" id="nama_ibu" class="form-control">
						<?php foreach ($dt_penduduk_data as $row): ?>
						<option value="<?php echo $row->id_penduduk; ?>"><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
					
					<tr>

					<tr>
						<td width='200'>Fc Surat Kelahiran <?php echo form_error('imagebaru1') ?></td>
						<td><input type="file" name="imagebaru1"></td>
					</tr>

					<tr>
						<td width='200'>Fc Buku Nikah <?php echo form_error('imagebaru2') ?></td>
						<td><input type="file" name="imagebaru2"></td>
					</tr>

					<tr>
						<td width='200'>Fc Kartu Keluarga <?php echo form_error('imagebaru3') ?></td>
						<td><input type="file" name="imagebaru3"></td>
					</tr>
					
					<tr>
						<td width='200'>Fc KTP Saksi <?php echo form_error('imagebaru4') ?></td>
						<td><input type="file" name="imagebaru4"></td>
					</tr>

					<tr><td width='200'>Status<?php echo form_error('status') ?></td><td><select name="status" id="status" class="form-control">
						<option value="">--Pilih Status--</option>
						<option value="Akta Baru">Akta Baru</option>
						<option value="Rusak">Rusak</option>
						<option value="Hilang">Hilang</option>
						</select></td>

						<td></td>
						<td>
							<input type="hidden" name="id_aktalahir" value="<?php echo $id_aktalahir; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_aktalahir') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>