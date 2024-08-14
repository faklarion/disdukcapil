<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA SKTS</h3>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <?php echo anchor(site_url('tbl_skts/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                            <?php if ($this->session->userdata('id_user_level') === 2) { ?>
                                <?php echo anchor(site_url('tbl_skts/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
                            </div>

                            <form action="<?php echo site_url("Tbl_skts/laporanskts"); ?>" method="post">
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
                        <?php } ?>

                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Tanggal Input Skts</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>No KK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Pekerjaan</th>
                                    <th>Keperluan</th>
                                    <th>Alamat Asal</th>
                                    <th>Alamat Sementara</th>
                                    <th>Surat Pengantar RT</th>
                                    <th>FC KTP</th>
                                    <th>FC KK</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>

                        </table>
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
            ajax: { "url": "tbl_skts/json", "type": "POST" },
            columns: [
                {
                    "data": "id_skts",
                    "orderable": false
                }, { "data": "tgl_input_skts" }, { "data": "nama" }, { "data": "nik" }, { "data": "no_kk" }, { "data": "jenis_kelamin" }, { "data": "tempat_lahir" }, { "data": "tgl_lahir" }, { "data": "pekerjaan" }, { "data": "keperluan" }, { "data": "alamat" }, { "data": "alamat_sementara" },
                {
                    "data": "imageskts1",
                    "render": function (data) {
                        return '<a href="<?php echo base_url() ?>assets/uploadskts/' + data + '">Lihat File</a>';
                    }
                },
                {
                    "data": "imageskts2",
                    "render": function (data2) {
                        return '<a href="<?php echo base_url() ?>assets/uploadskts/' + data2 + '">Lihat File</a>';
                    }
                },
                {
                    "data": "imageskts3",
                    "render": function (data3) {
                        return '<a href="<?php echo base_url() ?>assets/uploadskts/' + data3 + '">Lihat File</a>';
                    }
                },
                {
                    "data": "status",
                    "render": function (data, type, row) {
                        if (data === "Disetujui") {
                            return 'Disetujui, cetak : <a class="btn btn-danger" target="_blank" href="<?= site_url() ?>/tbl_skts/read/' + row.id_skts + '"><i class="fa fa-print" aria-hidden="true"></i></a>';
                        } else {
                            return data; // Tampilkan status asli jika bukan "Disetujui"
                        }
                    }
                }, {
                    "data": "keterangan"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [[0, 'desc']],
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