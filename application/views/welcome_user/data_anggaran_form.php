<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA DATA_ANGGARAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Id Pengajuan <?php echo form_error('id_pengajuan') ?></td><td><input type="text" class="form-control" name="id_pengajuan" id="id_pengajuan" placeholder="Id Pengajuan" value="<?php echo $id_pengajuan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Kebutuhan <?php echo form_error('tanggal_kebutuhan') ?></td>
						<td><input type="date" class="form-control" name="tanggal_kebutuhan" id="tanggal_kebutuhan" placeholder="Tanggal Kebutuhan" value="<?php echo $tanggal_kebutuhan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nrp <?php echo form_error('nrp') ?></td><td><input type="text" class="form-control" name="nrp" id="nrp" placeholder="Nrp" value="<?php echo $nrp; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Isi Pengaduan <?php echo form_error('isi_pengaduan') ?></td>
						<td> <textarea class="form-control" rows="3" name="isi_pengaduan" id="isi_pengaduan" placeholder="Isi Pengaduan"><?php echo $isi_pengaduan; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
						<td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggapan <?php echo form_error('tanggapan') ?></td><td><input type="text" class="form-control" name="tanggapan" id="tanggapan" placeholder="Tanggapan" value="<?php echo $tanggapan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('welcome_user') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>