<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_aktalahir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_aktalahir_model');
        $this->load->model('Dt_penduduk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_aktalahir/tbl_aktalahir_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_aktalahir_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_aktalahir_model->get_by_id($id);
        if ($row) {
            $data = array(
		        'data_akta' => $row,
	    );
            $this->load->view('tbl_aktalahir/tbl_aktalahir_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_aktalahir'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Masukkan',
            'action' => site_url('tbl_aktalahir/create_action'),
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
            'id_aktalahir' => set_value('id_aktalahir'),
            'tgl_input' => set_value('tgl_input'),
            'no_akta' => set_value('no_akta'),
            'nama_bayi' => set_value('nama_bayi'),
            'jenis_kelamin_bayi' => set_value('jenis_kelamin_bayi'),
            'tempat_lahir_bayi' => set_value('tempat_lahir_bayi'),
            'tgl_lahir_bayi' => set_value('tgl_lahir_bayi'),
            'jam' => set_value('jam'),
            'berat_bayi' => set_value('berat_bayi'),
            'kelahiran_ke' => set_value('kelahiran_ke'),
            'penolong_kelahiran' => set_value('penolong_kelahiran'),
            'imagebaru1' => set_value('imagebaru1'),
            'imagebaru2' => set_value('imagebaru2'),
            'imagebaru3' => set_value('imagebaru3'),
            'imagebaru4' => set_value('imagebaru4'),
            'status' => set_value('status'),
            'id_penduduk' => set_value('id_penduduk'),
            'id_papa' => set_value('nama'),
            'id_mama' => set_value('nik'),
	);
        $this->template->load('template','tbl_aktalahir/tbl_aktalahir_form', $data);
    }
    
    function upload_foto1(){
        $config['upload_path']          = './assets/uploads';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagebaru1');
        return $this->upload->data();
    }
    
    function upload_foto2(){
        $config['upload_path']          = './assets/uploads';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagebaru2');
        return $this->upload->data();
        
    }

    function upload_foto3(){
        $config['upload_path']          = './assets/uploads';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagebaru3');
        return $this->upload->data();
        
    }

    function upload_foto4(){
        $config['upload_path']          = './assets/uploads';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagebaru4');
        return $this->upload->data();
        
    }


    public function create_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        $foto2 = $this->upload_foto2();
        $foto3 = $this->upload_foto3();
        $foto4 = $this->upload_foto4();

        $noAkta = $this->input->post('no_akta',TRUE);

        $sql = "SELECT * FROM tbl_aktalahir WHERE no_akta = '$noAkta'";

        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password       = $this->input->post('password',TRUE);
            $options        = array("cost"=>4);
            $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
            $data = array(
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'no_akta' => $this->input->post('no_akta',TRUE),
		'nama_bayi' => $this->input->post('nama_bayi',TRUE),
		'jenis_kelamin_bayi' => $this->input->post('jenis_kelamin_bayi',TRUE),
		'tempat_lahir_bayi' => $this->input->post('tempat_lahir_bayi',TRUE),
		'tgl_lahir_bayi' => $this->input->post('tgl_lahir_bayi',TRUE),
		'jam' => $this->input->post('jam',TRUE),
		'berat_bayi' => $this->input->post('berat_bayi',TRUE),
		'kelahiran_ke' => $this->input->post('kelahiran_ke',TRUE),
		'penolong_kelahiran' => $this->input->post('penolong_kelahiran',TRUE),
        'imagebaru1'        =>$foto1['file_name'],
        'imagebaru2'        =>$foto2['file_name'],
        'imagebaru3'        =>$foto3['file_name'],
        'imagebaru4'        =>$foto4['file_name'],
        'status' => $this->input->post('status',TRUE),
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
        'id_papa' => $this->input->post('nama',TRUE),
        'id_mama' => $this->input->post('nik',TRUE),
	    );

            $this->Tbl_aktalahir_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_aktalahir'));
        }
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data No AKTA Sudah Ada ! Cek Kembali');
            window.location.href='".site_url('tbl_aktalahir/create')."';
            </script>");
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



    public function laporanaktalahir()//sesuaikan di list
	{

		$bulan = $_POST['bulan'];
    	$tahun = $_POST['tahun'];
        $bulanBaru = $this->konversiAngkaKeBulan($bulan);

		if (isset($_POST['cetaksemua'])) {
			$this->data['label'] = "Semua Periode";
			$this->data['tbl_aktalahir'] =  $this->Tbl_aktalahir_model->get_all();//
			$this->data['title_web'] = 'Laporan Akta Lahir';	
		} else {
			$this->data['label'] = "Bulan $bulanBaru Tahun $tahun";
			$this->data['tbl_aktalahir'] =  $this->Tbl_aktalahir_model->get_all_bulan($bulan,$tahun);//
			$this->data['title_web'] = 'Laporan Akta Lahir';
		}
		
        $this->load->view('tbl_aktalahir/tbl_aktalahir_doc',$this->data);
	}



    public function update($id) 
    {
        $row = $this->Tbl_aktalahir_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui',
                'action' => site_url('tbl_aktalahir/update_action'),
                'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
                'id_aktalahir' => set_value('id_aktalahir', $row->id_aktalahir),
                'tgl_input' => set_value('tgl_input', $row->tgl_input),
                'no_akta' => set_value('no_akta', $row->no_akta),
                'nama_bayi' => set_value('nama_bayi', $row->nama_bayi),
                'jenis_kelamin_bayi' => set_value('jenis_kelamin_bayi', $row->jenis_kelamin_bayi),
                'tempat_lahir_bayi' => set_value('tempat_lahir_bayi', $row->tempat_lahir_bayi),
                'tgl_lahir_bayi' => set_value('tgl_lahir_bayi', $row->tgl_lahir_bayi),
                'jam' => set_value('jam', $row->jam),
                'berat_bayi' => set_value('berat_bayi', $row->berat_bayi),
                'kelahiran_ke' => set_value('kelahiran_ke', $row->kelahiran_ke),
                'penolong_kelahiran' => set_value('penolong_kelahiran', $row->penolong_kelahiran),
                'imagebaru1' => set_value('imagebaru1', $row->imagebaru1),
                'imagebaru2' => set_value('imagebaru2', $row->imagebaru2),
                'imagebaru3' => set_value('imagebaru3', $row->imagebaru3),
                'imagebaru4' => set_value('imagebaru4', $row->imagebaru4),
                'status' => set_value('status', $row->status),
                'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
                'id_papa' => set_value('id_papa', $row->nama),
                'id_mama' => set_value('id_mama', $row->nik),
	    );
            $this->template->load('template','tbl_aktalahir/tbl_aktalahir_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_aktalahir'));
        }
    }
    
    public function update_action() 
        {
            $this->_rules();
            $foto1 = $this->upload_foto1();
            $foto2 = $this->upload_foto2();
            $foto3 = $this->upload_foto3();
            $foto4 = $this->upload_foto4();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_aktalahir', TRUE));
        } else {
            if(($foto1['file_name']=='')){
            $data = array(
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'no_akta' => $this->input->post('no_akta',TRUE),
		'nama_bayi' => $this->input->post('nama_bayi',TRUE),
		'tempat_lahir_bayi' => $this->input->post('tempat_lahir_bayi',TRUE),
		'tgl_lahir_bayi' => $this->input->post('tgl_lahir_bayi',TRUE),
		'jam' => $this->input->post('jam',TRUE),
		'berat_bayi' => $this->input->post('berat_bayi',TRUE),
		'kelahiran_ke' => $this->input->post('kelahiran_ke',TRUE),
		'penolong_kelahiran' => $this->input->post('penolong_kelahiran',TRUE),
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
        'id_papa' => $this->input->post('nama',TRUE),
        'id_mama' => $this->input->post('nik',TRUE),);
    } else {
        $data = array(
            'tgl_input' => $this->input->post('tgl_input',TRUE),
		'no_akta' => $this->input->post('no_akta',TRUE),
		'nama_bayi' => $this->input->post('nama_bayi',TRUE),
		'jenis_kelamin_bayi' => $this->input->post('jenis_kelamin_bayi',TRUE),
		'tempat_lahir_bayi' => $this->input->post('tempat_lahir_bayi',TRUE),
		'tgl_lahir_bayi' => $this->input->post('tgl_lahir_bayi',TRUE),
		'jam' => $this->input->post('jam',TRUE),
		'berat_bayi' => $this->input->post('berat_bayi',TRUE),
		'kelahiran_ke' => $this->input->post('kelahiran_ke',TRUE),
		'penolong_kelahiran' => $this->input->post('penolong_kelahiran',TRUE),
        'id_papa' => $this->input->post('nama',TRUE),
        'id_mama' => $this->input->post('nik',TRUE),
        'imagebaru1'        =>$foto1['file_name'],
        'imagebaru2'        =>$foto2['file_name'],
        'imagebaru3'        =>$foto3['file_name'],
        'imagebaru4'        =>$foto4['file_name'],);
        $this->session->set_userdata('imagebaru1',$foto1['file_name']);
        $this->session->set_userdata('imagebaru2',$foto2['file_name']);
        $this->session->set_userdata('imagebaru3',$foto3['file_name']);
        $this->session->set_userdata('imagebaru4',$foto4['file_name']);
    }

            $this->Tbl_aktalahir_model->update($this->input->post('id_aktalahir', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_aktalahir'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_aktalahir_model->get_by_id($id);

        if ($row) {
            $this->Tbl_aktalahir_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_aktalahir'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_aktalahir'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('tgl_input', 'tgl input', 'trim|required');
	//$this->form_validation->set_rules('no_akta', 'no akta', 'trim|required');
	//$this->form_validation->set_rules('nama_bayi', 'nama bayi', 'trim|required');
	//$this->form_validation->set_rules('jenis_kelamin_bayi', 'jenis kelamin bayi', 'trim|required');
	//$this->form_validation->set_rules('tempat_lahir_bayi', 'tempat lahir bayi', 'trim|required');
	//$this->form_validation->set_rules('tgl_lahir_bayi', 'tgl lahir bayi', 'trim|required');
	//$this->form_validation->set_rules('jam', 'jam', 'trim|required');
	//$this->form_validation->set_rules('berat_bayi', 'berat bayi', 'trim|required');
	//$this->form_validation->set_rules('kelahiran_ke', 'kelahiran ke', 'trim|required');
	//$this->form_validation->set_rules('penolong_kelahiran', 'penolong kelahiran', 'trim|required');
    //$this->form_validation->set_rules('status', 'Status', 'trim|required');
	//$this->form_validation->set_rules('id_penduduk', 'id penduduk', 'trim|required');

	$this->form_validation->set_rules('id_aktalahir', 'id_aktalahir', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {

        $data = array(
            'tbl_aktalahir_data' => $this->Tbl_aktalahir_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_aktalahir/tbl_aktalahir_doc',$data);
    }

}

/* End of file Tbl_aktalahir.php */
/* Location: ./application/controllers/Tbl_aktalahir.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-25 08:17:48 */
/* http://harviacode.com */