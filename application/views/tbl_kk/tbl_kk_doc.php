<?php 
function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<script type="text/javascript">
    var css = '@page { size: landscape; }',
        head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet) {
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);
    window.print();
</script>


<!doctype html>
<html>
    <head>
    <title>DISDUKCAPIL Banjarmasin</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
    <body>
<img src="<?= base_url() ?>/assets/adminlte/dist/img/dukcapil.png" align="left" width="10%">
    <p align="center"><b>
    <br><br>
            <font size="5">DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</font> <br>
            <font size="5">KOTA BANJARMASIN</font> <br>
            <font size="5">KECAMATAN BANJARMASIN UTARA</font> <br>
           
            <font size="3">Jl.Sulatan Adam No.18 Surgi Mufti Kec. Banjarmasin Utara, Kalimantan Selatan Kode Pos 70116 Telp : (0511) 3307293</font>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        </b></p>
    <br>
    <h5><b>Cetak : <?= $this->session->userdata('full_name') ?></b></h5>
    <h5><b><?= $label ?></b></h5>
        <h3 align="center"><b>Laporan Penerbitan Kartu Keluarga</b></h3><br>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NO KK</th>
		<th>Kepala Keluarga</th>
		<th>NIK</th>
        <th>Tempat Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Pekerjaan</th>
        <th>Tanggal Terbit</th>
        <tbody>
                    <?php 
                    $no=0;
                    foreach($tbl_kk as $isi)
                    {
                    ?>
                            <tr>
		      <td><?php echo ++$no ?></td>
		      <td><?php echo $isi->no_kk ?></td>
		      <td><?php echo $isi->kepala_keluarga ?></td>	
              <td><?php echo $isi->nik ?></td>	
              <td><?php echo $isi->tempat_lahir. ' ' . $isi->tgl_lahir?></td>	
              <td><?php echo $isi->jenis_kelamin ?></td>	
              <td><?php echo $isi->agama ?></td>
              <td><?php echo $isi->pekerjaan ?></td>	
              <td><?php echo $isi->tgl_input_kk ?></td>	
              </tr>
                    
                    <?php
                }
                ?>
            </table>
            <div style="text-align: center; display: inline-block; float: right;">
            <h5 align="left">Mengetahui,</h5>
            <h5>
                Banjarmasin, <?= tgl_indo(date('Y-m-d')); ?>
                <h5>KEPALA DINAS</h5>
                <br><br><br><br>
                <u>YUSNA IRAWAN, SE, M.Eng</u>
                <div>NIP. 197212222000031004</div>
            </h5>
    
        </div>
        </body>
    </html>