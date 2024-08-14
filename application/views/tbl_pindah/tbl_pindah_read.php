<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
<style>
table {
  border-spacing: 0;
  border-collapse: collapse;
}
td, th {
  padding: 5px;
}
</style>
<div class="content-wrapper">
	<section class="content">
	<p class="text-center"><img src="<?php echo base_url('assets/img/kopsurat.png')?>" width="100%"></p>
	<div class="col-md-12">
      <div class="row " >  
          
      
            
          
      </div>
      <hr class="line-top" />
      <p class="text-center" style="font-family: times new roman; font-size: 8mm; margin-bottom: 0px;" > <b>SURAT KETERANGAN PINDAH</b></p>
	  <p class="text-center" style="font-family: times new roman; font-size: 4mm; margin-bottom: 0px;" >Nomor : <?php echo $id_pindah ?>/SKPP/DUKCAPIL-BJM/<?php $dateString = '2024-02-02';
		$date = new DateTime(date('Y-m-d'));
		$month = $date->format('m');
		echo convertToRoman($month); ?>/<?php echo date('Y')?></p>
      <br>
	  <br>
      <p>Yang bertanda tangan dibawah ini Kepala Disdukcapil Kota Banjarmasin.</p>
      <p>Dengan ini menerangkan bahwa permohonan pindah warga Kota Banjarmasin dengan data berikut : </p>
		<table>
			<tr>
				<td style="font-size: 4mm;" width="170px">Nama</td>
				<td>:</td>
				<td style="font-size: 4mm;"> <?= $nama; ?></td>
			</tr>
			<tr>
				<td style="font-size: 4mm;" width="170px">Jenis Kelamin</td>
				<td>:</td>
				<td style="font-size: 4mm;"> <?= $jenis_kelamin; ?></td>
			</tr>
			<tr>
				<td style="font-size: 4mm;" width="170px">Tempat, Tanggal Lahir</td>
				<td>:</td>
				<td style="font-size: 4mm;"> <?= $tempat_lahir; ?>, <?= tanggal_indo($tgl_lahir); ?></td>
			</tr>
			<tr>
				<td style="font-size: 4mm;" width="170px">Pekerjaan</td>
				<td>:</td>
				<td style="font-size: 4mm;"> <?= $pekerjaan ?></td>
			</tr>
			<tr>
				<td style="font-size: 4mm;" width="170px">Alamat</td>
				<td>:</td>
				<td style="font-size: 4mm;"> <?= $alamat ?></td>
			</tr>
			<tr>
				<td style="font-size: 4mm;" width="170px">Alamat Pindah</td>
				<td>:</td>
				<td style="font-size: 4mm;"> <?= $alamat_pindah ?></td>
			</tr>
			<tr>
				<td style="font-size: 4mm;" width="170px">Alasan Pindah</td>
				<td>:</td>
				<td style="font-size: 4mm;"> <?= $alasan_pindah ?></td>
			</tr>
		</table>
	<br>
	<p>Demikian surat ini dibuat, diharapkan digunakan sebagaimana mestinya.</p>
	<br>
	<div style="width: 400px; float: right;">
                    <center>
                    <br>
                    <br>
                    <br>
                    <p style="font-family: times new roman;" >Banjarmasin, <?php echo tanggal_indo(date('Y-m-d')); ?></p>
					<p style="font-family: times new roman;" >Kepala Disdukcapil Banjarmasin</p>
					<img src="<?= base_url('assets/img/qrttd.png')?>" width="30%">
					<p style="font-family: times new roman;" ><b>YUSNA IRAWAN, SE., M.Eng</b></p>
					<p style="font-family: times new roman;" ><u>NIP. 19721222 200003 1 004</u></p>
                  </center>
                </div>
    </div>
	</div>
	
	</section>
</div>
<script>
	window.print();
</script>