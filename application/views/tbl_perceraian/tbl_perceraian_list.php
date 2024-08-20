<div class="content-wrapper">
    <section class="content">
    <style>
    .table-wrapper {
        overflow-x: auto;
    }

    #mytable {
        width: 100%; /* Atur lebar tabel menjadi 100% */
        white-space: nowrap; /* Agar teks dalam sel tabel tidak pindah baris */
    }
</style>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PERCERAIAN</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('tbl_perceraian/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('tbl_perceraian/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
        
        <form action="<?php echo site_url("Tbl_perceraian/laporanperceraian");?>" method="post">
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
                        <input type="submit" name="submit" value="Cetak" class="btn btn-primary">
                        <input type="submit" name="cetaksemua" value="Cetak Semua" class="btn btn-warning">
                    </form>
        
        <div class="table-wrapper">
    <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>Tanggal Terbit</th>
                    <th>NIK</th>
                    <th>No KK</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pekerjaan</th>
                    <th>Pendidikan</th>
                    <th>Kewarganegaraan</th>
                    <th>Ayah Laki</th>
                    <th>Ibu Laki</th>
                    <th>Alamat</th>
                    <th>NIK</th>
                    <th>No KK</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pekerjaan</th>
                    <th>Pendidikan</th>
                    <th>Kewarganegaraan</th>
                    <th>Ayah Wanita</th>
                    <th>Ibu Wanita</th>
                    <th>Alamat</th>
                    <th>Tgl Perkawinan</th>
                    <th>Tgl Perceraian</th>
                    <th>Penyebab Cerai</th>
                    <th>FC Putusan Pengadilan Negara</th>
                    <th>FC KTP dan KK</th>
                    <th>Kutipan Akta Nikah Asli</th>
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
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
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
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
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
                    ajax: {"url": "tbl_perceraian/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_perceraian",
                            "orderable": false
                        },{"data": "tgl_input_cerai"},{"data": "nik"},{"data": "no_kk"},{"data": "namasuami"},{"data": "tempat_lahir"},{"data": "tgl_lahir"},{"data": "agama"},{"data": "pekerjaan"},{"data": "pendidikan"},{"data": "negara_laki"},{"data": "ayah_laki"},{"data": "ibu_laki"},{"data": "alamat"},{"data": "nik"},{"data": "no_kk"},{"data": "namaistri"},{"data": "tempat_lahir"},{"data": "tgl_lahir"},{"data": "agama"},{"data": "pekerjaan"},{"data": "pendidikan"},{"data": "negara_laki"},{"data": "ayah_wanita"},{"data": "ibu_wanita"},{"data": "alamat"},{"data": "tgl_perkawinan"},{"data": "tgl_perceraian"},{"data": "penyebab_cerai"},
                        { "data": "imagecerai1",
                        "render": function (data) {
                        return '<a href="<?php echo base_url() ?>assets/uploadcerai/'+data+'">Lihat File</a>';}},
                        { "data": "imagecerai2",
                        "render": function (data2) {
                        return '<a href="<?php echo base_url() ?>assets/uploadcerai/'+data2+'">Lihat File</a>';}},
                        { "data": "imagecerai3",
                        "render": function (data3) {
                        return '<a href="<?php echo base_url() ?>assets/uploadcerai/'+data3+'">Lihat File</a>';}},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>