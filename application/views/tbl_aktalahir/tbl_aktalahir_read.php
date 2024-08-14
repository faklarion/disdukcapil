<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Akta Lahir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
        .header, .footer {
            text-align: center;
        }
        .header img {
            width: 100px;
            margin-bottom: 20px;
        }
        .content {
            margin-top: 30px;
            line-height: 1.6;
        }
        .content p {
            margin: 10px 0;
        }
        .content table {
            width: 100%;
            margin-bottom: 20px;
            table-layout: fixed; /* memastikan semua kolom memiliki ukuran yang sama */
        }
        .content table td {
            padding: 5px;
            vertical-align: top; /* menjaga teks tetap di bagian atas sel */
        }
        .content table td:first-child {
            width: 35%; /* menetapkan lebar kolom label */
        }
        .content table td:last-child {
            width: 65%; /* menetapkan lebar kolom isi */
        }
        .print-button {
            margin-bottom: 20px;
            text-align: right;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="<?= base_url() ?>/assets/adminlte/dist/img/dukcapil.png" alt="Logo">
        <h2>Pemerintah Kota Banjarmasin</h2>
        <h3>Dinas Kependudukan dan Pencatatan Sipil</h3>
        <p>Jl. Sultan Adam No.18 Surgi Mufti Kec. Banjarmasin Utara, Kalimantan Selatan </p>
		<p>Kode Pos 70116 Telp : (0511) 3307293</p>
    </div>

    <div class="print-button">
        <button onclick="window.print()">Cetak Surat</button>
    </div>

    <div class="content">
        <h2 style="text-align:center;">AKTA KELAHIRAN</h2>

        <p>Yang bertanda tangan di bawah ini, Kepala Dinas Kependudukan dan Pencatatan Sipil Kota Banjarmasin, menerangkan bahwa:</p>

        <table>
            <tr>
                <td>Nama</td>
                <td>: <strong><?php echo $data_akta->nama_bayi; ?></strong></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>: <strong><?php echo $data_akta->tempat_lahir_bayi; ?>, <?php echo tanggal_indo($data_akta->tgl_lahir_bayi); ?></strong></td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td>: <strong><?php echo htmlspecialchars($data_akta->ayah); ?></strong></td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td>: <strong><?php echo htmlspecialchars($data_akta->mama); ?></strong></td>
            </tr>
        </table>

        <p>Telah lahir dengan selamat pada tanggal tersebut di atas. Akta kelahiran ini diterbitkan untuk dipergunakan sebagaimana mestinya.</p>

        <p>Ditetapkan di: Kota Banjarmasin</p>
        <p>Pada tanggal: <?php echo tanggal_indo(($data_akta->tgl_input)); ?></p>

        <br><br>

        <div style="text-align: center; display: inline-block; float: right;">
            <h5 align="left">Mengetahui,</h5>
            <h5>
                Banjarmasin, <?= tanggal_indo(date('Y-m-d')); ?>
                <h5>KEPALA DINAS</h5>
                <br><br><br><br>
                <u>YUSNA IRAWAN, SE, M.Eng</u>
                <div>NIP. 197212222000031004</div>
            </h5>
        </div>
    </div>

</body>
</html>
