<!DOCTYPE html>
<html>
<head>
    <title>Data Aktalahir</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>">
</head>
<body>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-warning box-solid">
                        <div class="box-header">
                            <h3 class="box-title">KELOLA DATA AKTALAHIR</h3>
                        </div>
                        <div class="box-body">
                            <div style="padding-bottom: 10px;">
                                <?php echo anchor(site_url('tbl_aktalahir/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                                <?php echo anchor(site_url('tbl_aktalahir/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
                            
                                <form action="<?php echo site_url("Tbl_aktalahir/laporanaktalahir");?>" method="post">
                        <label for="bulan">Pilih Bulan:</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <?php
                            // Membuat pilihan bulan secara dinamis
                            for ($i = 1; $i <= 12; $i++) {
                                $bulan = date('F', mktime(0, 0, 0, $i, 1));
                                echo "<option value='$i'>$bulan</option>";
                            }
                            ?>
                        </select>

                        <label for="tahun">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <?php
                            // Membuat pilihan tahun secara dinamis (contoh: 10 tahun terakhir)
                            $tahun_sekarang = date('Y');
                            for ($tahun = $tahun_sekarang; $tahun >= $tahun_sekarang - 10; $tahun--) {
                                echo "<option value='$tahun'>$tahun</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" name="cetaksemua" value="Cetak Semua" class="btn btn-warning">
                    </form>
                            
                            
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                        <tr>
                                            <th width="30px">No</th>
                                            <th>Tanggal Terbit</th>
                                            <th>No Akta</th>
                                            <th>Pemohon</th>
                                            <th>No KK</th>
                                            <th>Nama Bayi</th>
                                            <th>Jenis Kelamin Bayi</th>
                                            <th>Tempat Lahir Bayi</th>
                                            <th>Tanggal Lahir Bayi</th>
                                            <th>Jam</th>
                                            <th>Berat Bayi</th>
                                            <th>Kelahiran Ke</th>
                                            <th>Penolong Kelahiran</th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Fc Surat Kelahiran</th>
                                            <th>Fc Buku Nikah</th>
                                            <th>Fc Kartu Keluarga</th>
                                            <th>Fc KTP Saksi</th>
                                            <th>Status</th>
                                            <th width="200px">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            var t = $("#mytable").dataTable({
                initComplete: function () {
                    var api = this.api();
                    $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function (e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                            }
                        });
                },
                oLanguage: {
                    sProcessing: "loading..."
                },
                processing: true,
                serverSide: true,
                ajax: { "url": "tbl_aktalahir/json", "type": "POST" },
                columns: [
                    {
                        "data": "id_aktalahir",
                        "orderable": false
                    }, { "data": "tgl_input" }, { "data": "no_akta" }, { "data": "nama" }, { "data": "no_kk" }, { "data": "nama_bayi" }, { "data": "jenis_kelamin_bayi" }, { "data": "tempat_lahir_bayi" }, { "data": "tgl_lahir_bayi" }, { "data": "jam" }, { "data": "berat_bayi" }, { "data": "kelahiran_ke" }, { "data": "penolong_kelahiran" }, { "data": "ayah" }, { "data": "mama" },
                    {
                        "data": "imagebaru1",
                        "render": function (data) {
                            return '<a href="<?php echo base_url() ?>assets/uploads/' + data + '">Lihat File</a>';
                        }
                    },
                    {
                        "data": "imagebaru2",
                        "render": function (data2) {
                            return '<a href="<?php echo base_url() ?>assets/uploads/' + data2 + '">Lihat File</a>';
                        }
                    },
                    {
                        "data": "imagebaru3",
                        "render": function (data3) {
                            return '<a href="<?php echo base_url() ?>assets/uploads/' + data3 + '">Lihat File</a>';
                        }
                    },
                    {
                        "data": "imagebaru4",
                        "render": function (data4) {
                            return '<a href="<?php echo base_url() ?>assets/uploads/' + data4 + '">Lihat File</a>';
                        }
                    },
                    { "data": "status" },
                    {
                        "data": "action",
                        "orderable": false,
                        "className": "text-center"
                    }
                ],
                order: [[0, 'desc']],
                autoWidth: true, // Menyesuaikan ukuran kolom dengan isi kontennya
                rowCallback: function (row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });
        });
    </script>

    <style>
        /* Style untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Style untuk header kolom */
        th {
            background-color: #f2f2f2;
            border-top: 1px solid #ddd; /* tambahkan border atas */
        }

        /* Style saat kursor diarahkan ke baris */
        tr:hover {
            background-color: #f5f5f5;
        }

        /* Style untuk kolom aksi (kolom terakhir) */
        .text-center {
            text-align: center;
        }
    </style>
</body>
</html>
