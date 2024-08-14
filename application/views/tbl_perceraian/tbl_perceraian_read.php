<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Keterangan Perceraian</title>
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
        <p>Jl. Sultan Adam No.18 Surgi Mufti Kec. Banjarmasin Utara, Kalimantan Selatan</p>
        <p>Kode Pos 70116 Telp: (0511) 3307293</p>
    </div>

    <div class="print-button">
        <button onclick="window.print()">Cetak Surat</button>
    </div>

    <div class="content">
        <h2 style="text-align:center;">SURAT KETERANGAN PERCERAIAN</h2>

        <p>Yang bertanda tangan di bawah ini, Kepala Dinas Kependudukan dan Pencatatan Sipil Kota Banjarmasin, menerangkan bahwa:</p>

        <table>
            <tr>
                <td>Tanggal Terbit</td>
                <td>: <strong><?php echo tanggal_indo($data_perceraian->tgl_input_cerai); ?></strong></td>
            </tr>
            <tr>
                <td>Nama Suami</td>
                <td>: <strong><?php echo htmlspecialchars($data_perceraian->namasuami); ?></strong></td>
            </tr>
            <tr>
                <td>Nama Istri</td>
                <td>: <strong><?php echo htmlspecialchars($data_perceraian->namaistri); ?></strong></td>
            </tr>
            <tr>
                <td>Tanggal Pernikahan</td>
                <td>: <strong><?php echo tanggal_indo($data_perceraian->tgl_perkawinan); ?></strong></td>
            </tr>
            <tr>
                <td>Tanggal Perceraian</td>
                <td>: <strong><?php echo tanggal_indo($data_perceraian->tgl_perceraian); ?></strong></td>
            </tr>
            <tr>
                <td>Alasan Perceraian</td>
                <td>: <strong><?php echo htmlspecialchars($data_perceraian->penyebab_cerai); ?></strong></td>
            </tr>
        </table>

        <p>Telah bercerai sebagaimana tersebut di atas. Surat keterangan ini diterbitkan untuk dipergunakan sebagaimana mestinya.</p>

        <p>Ditetapkan di: Kota Banjarmasin</p>
        <p>Pada tanggal: <?php echo tanggal_indo(date('Y-m-d')); ?></p>

        <br><br>

        <div style="text-align: center; display: inline-block; float: right;">
            <h5 align="left">Mengetahui,</h5>
            <h5>
                Banjarmasin, <?php echo tanggal_indo(date('Y-m-d')); ?>
                <h5>KEPALA DINAS</h5>
                <br><br><br><br>
                <u>YUSNA IRAWAN, SE, M.Eng</u>
                <div>NIP. 197212222000031004</div>
            </h5>
        </div>
    </div>

</body>
</html>
