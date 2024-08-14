<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">APPROVAL DATA PINDAH</h3>
			</div>
			<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
                    <tr>
						<td width='200'>Status </td>
                        <td>
                        <select name="status" id="status" class="form-control">
                            <option value="Belum Disetujui"  <?php if($status=="Belum Disetujui") echo 'selected="selected"'; ?>>Belum Disetujui</option>
                            <option value="Disetujui"  <?php if($status=="Disetujui") echo 'selected="selected"'; ?>>Disetujui</option>
                            <option value="Ditolak" <?php if($status=="Ditolak") echo 'selected="selected"'; ?>>Ditolak</option>
                        </select>
                        </td>
					</tr>
					
                    <tr>
						<td width='200'>Keterangan </td><td><textarea class="form-control" name="keterangan" id="keterangan"><?= $keterangan ?></textarea></td>
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