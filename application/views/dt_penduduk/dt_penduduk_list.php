<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PENDUDUK</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('dt_penduduk/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('dt_penduduk/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>No Kk</th>
		    <th>Nik</th>
		    <th>Nama</th>
		    <th>Alamat</th>
		    <th>Jenis Kelamin</th>
		    <th>Tempat Lahir</th>
		    <th>Tgl Lahir</th>
		    <th>Agama</th>
		    <th>Pendidikan</th>
		    <th>Pekerjaan</th>
		    <th>Gol Darah</th>
		    <th>Stts Perkawinan</th>
		    <th>No Hp</th>
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
                    ajax: {"url": "dt_penduduk/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_penduduk",
                            "orderable": false
                        },{"data": "no_kk"},{"data": "nik"},{"data": "nama"},{"data": "alamat"},{"data": "jenis_kelamin"},{"data": "tempat_lahir"},{"data": "tgl_lahir"},{"data": "agama"},{"data": "pendidikan"},{"data": "pekerjaan"},{"data": "gol_darah"},{"data": "stts_perkawinan"},{"data": "no_hp"},
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