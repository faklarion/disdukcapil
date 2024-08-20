<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_pindah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_pindah_model');
        $this->load->model('Dt_penduduk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_pindah/tbl_pindah_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_pindah_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_pindah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pindah' => $row->id_pindah,
		'tgl_input_pindah' => $row->tgl_input_pindah,
		'klasifikasi_pindah' => $row->klasifikasi_pindah,
		'alamat_pindah' => $row->alamat_pindah,
		'alasan_pindah' => $row->alasan_pindah,
		'imagepindah1' => $row->imagepindah1,
		'imagepindah2' => $row->imagepindah2,
		'id_penduduk' => $row->id_penduduk,
        'nama' => $row->nama,
        'alamat' => $row->alamat,
        'pekerjaan' => $row->pekerjaan,
        'jenis_kelamin' => $row->jenis_kelamin,
        'tempat_lahir' => $row->tempat_lahir,
        'tgl_lahir' => $row->tgl_lahir,
	    );
            $this->load->view('tbl_pindah/tbl_pindah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pindah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Masukkan',
            'action' => site_url('tbl_pindah/create_action'),
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
            'id_pindah' => set_value('id_pindah'),
            'tgl_input_pindah' => set_value('tgl_input_pindah'),
            'klasifikasi_pindah' => set_value('klasifikasi_pindah'),
            'alamat_pindah' => set_value('alamat_pindah'),
            'alasan_pindah' => set_value('alasan_pindah'),
            'imagepindah1' => set_value('imagepindah1'),
            'imagepindah2' => set_value('imagepindah2'),
            'id_penduduk' => set_value('id_penduduk'),
	);
        $this->template->load('template','tbl_pindah/tbl_pindah_form', $data);
    }
    
    function upload_foto1(){
        $config['upload_path']          = './assets/uploadpindah';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagepindah1');
        return $this->upload->data();
    }
    
    function upload_foto2(){
        $config['upload_path']          = './assets/uploadpindah';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagepindah2');
        return $this->upload->data();
        
    }


    public function create_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        $foto2 = $this->upload_foto2();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password       = $this->input->post('password',TRUE);
            $options        = array("cost"=>4);
            $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
            $data = array(
                'tgl_input_pindah' => $this->input->post('tgl_input_pindah',TRUE),
                'klasifikasi_pindah' => $this->input->post('klasifikasi_pindah',TRUE),
                'alamat_pindah' => $this->input->post('alamat_pindah',TRUE),
                'alasan_pindah' => $this->input->post('alasan_pindah',TRUE),
                'imagepindah1' =>$foto1['file_name'],
                'imagepindah2' =>$foto2['file_name'],
                'id_penduduk' => $this->input->post('id_penduduk',TRUE),
                'id_users' => $this->session->userdata('id_users'),
                'status' => 'Belum Disetujui',
                'keterangan' => '-',
	    );

            $this->Tbl_pindah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_pindah'));
        }
    }
    

    function konversiAngkaKeBulan($angka)
    {
        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
    
        if (array_key_exists($angka, $namaBulan)) {
            return $namaBulan[$angka];
        } else {
            return 'Bulan tidak valid';
        }
    }



    public function laporanpindah()//sesuaikan di list
	{

		$bulan = $_POST['bulan'];
    	$tahun = $_POST['tahun'];
        $bulanBaru = $this->konversiAngkaKeBulan($bulan);

		if (isset($_POST['cetaksemua'])) {
			$this->data['label'] = "Semua Periode";
			$this->data['tbl_pindah'] =  $this->Tbl_pindah_model->get_all();//
			$this->data['title_web'] = 'Laporan Akta Lahir';	
		} else {
			$this->data['label'] = "Bulan $bulanBaru Tahun $tahun";
			$this->data['tbl_pindah'] =  $this->Tbl_pindah_model->get_all_bulan($bulan,$tahun);//
			$this->data['title_web'] = 'Laporan Akta Lahir';
		}
		
        $this->load->view('tbl_pindah/tbl_pindah_doc',$this->data);
	}



    public function update($id) 
    {
        $row = $this->Tbl_pindah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui',
                'action' => site_url('tbl_pindah/update_action'),
                'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
		'id_pindah' => set_value('id_pindah', $row->id_pindah),
		'tgl_input_pindah' => set_value('tgl_input_pindah', $row->tgl_input_pindah),
		'klasifikasi_pindah' => set_value('klasifikasi_pindah', $row->klasifikasi_pindah),
		'alamat_pindah' => set_value('alamat_pindah', $row->alamat_pindah),
		'alasan_pindah' => set_value('alasan_pindah', $row->alasan_pindah),
		'imagepindah1' => set_value('imagepindah1', $row->imagepindah1),
		'imagepindah2' => set_value('imagepindah2', $row->imagepindah2),
		'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
	    );
            $this->template->load('template','tbl_pindah/tbl_pindah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pindah'));
        }
    }

    public function status($id) 
    {
        $row = $this->Tbl_pindah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_pindah/status_action'),
                'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
                'id_pindah' => set_value('id_pindah', $row->id_pindah),
                'tgl_input_pindah' => set_value('tgl_input_pindah', $row->tgl_input_pindah),
                'klasifikasi_pindah' => set_value('klasifikasi_pindah', $row->klasifikasi_pindah),
                'alamat_pindah' => set_value('alamat_pindah', $row->alamat_pindah),
                'alasan_pindah' => set_value('alasan_pindah', $row->alasan_pindah),
                'imagepindah1' => set_value('imagepindah1', $row->imagepindah1),
                'imagepindah2' => set_value('imagepindah2', $row->imagepindah2),
                'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','tbl_pindah/tbl_pindah_status', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pindah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        $foto2 = $this->upload_foto2();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pindah', TRUE));
        } else {
            if(($foto1['file_name']=='')){
            $data = array(
		'tgl_input_pindah' => $this->input->post('tgl_input_pindah',TRUE),
		'klasifikasi_pindah' => $this->input->post('klasifikasi_pindah',TRUE),
		'alamat_pindah' => $this->input->post('alamat_pindah',TRUE),
		'alasan_pindah' => $this->input->post('alasan_pindah',TRUE),
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
	    );
    } else {
        $data = array(
            'tgl_input_pindah' => $this->input->post('tgl_input_pindah',TRUE),
            'klasifikasi_pindah' => $this->input->post('klasifikasi_pindah',TRUE),
            'alamat_pindah' => $this->input->post('alamat_pindah',TRUE),
            'alasan_pindah' => $this->input->post('alasan_pindah',TRUE),
            'id_penduduk' => $this->input->post('id_penduduk',TRUE),
            'imagepindah1' =>$foto1['file_name'],
            'imagepindah2' =>$foto2['file_name'],);
            $this->session->set_userdata('imagebaru1',$foto1['file_name']);
            $this->session->set_userdata('imagebaru2',$foto1['file_name']);
            $this->session->set_userdata('imagebaru3',$foto1['file_name']);
            $this->session->set_userdata('imagebaru4',$foto1['file_name']);
        }
            $this->Tbl_pindah_model->update($this->input->post('id_pindah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_pindah'));
        }
    }

    public function status_action() 
    {
       
        $data = array(
            'status' => $this->input->post('status',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
            );
    
            $this->Tbl_pindah_model->update($this->input->post('id_pindah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_pindah'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_pindah_model->get_by_id($id);

        if ($row) {
            $this->Tbl_pindah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_pindah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pindah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_input_pindah', 'tgl input pindah', 'trim|required');
	$this->form_validation->set_rules('klasifikasi_pindah', 'klasifikasi pindah', 'trim|required');
	$this->form_validation->set_rules('alamat_pindah', 'alamat pindah', 'trim|required');
	$this->form_validation->set_rules('alasan_pindah', 'alasan pindah', 'trim|required');
	
	$this->form_validation->set_rules('id_penduduk', 'id penduduk', 'trim|required');

	$this->form_validation->set_rules('id_pindah', 'id_pindah', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_pindah.doc");

        $data = array(
            'tbl_pindah_data' => $this->Tbl_pindah_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_pindah/tbl_pindah_doc',$data);
    }

}

/* End of file Tbl_pindah.php */
/* Location: ./application/controllers/Tbl_pindah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-27 08:51:41 */
/* http://harviacode.com */