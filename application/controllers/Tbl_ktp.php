<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_ktp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_ktp_model');
        $this->load->model('Dt_penduduk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_ktp/tbl_ktp_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_ktp_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_ktp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ktp' => $row->id_ktp,
		'tgl_input_ktp' => $row->tgl_input_ktp,
		'negara_ktp' => $row->negara_ktp,
		'id_penduduk' => $row->id_penduduk,
		'imagektp' => $row->imagektp,
	    );
            $this->template->load('template','tbl_ktp/tbl_ktp_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_ktp'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Masukkan',
            'action' => site_url('tbl_ktp/create_action'),
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
	    'id_ktp' => set_value('id_ktp'),
	    'tgl_input_ktp' => set_value('tgl_input_ktp'),
	    'negara_ktp' => set_value('negara_ktp'),
	    'id_penduduk' => set_value('id_penduduk'),
	    'imagektp' => set_value('imagektp'),
	);
        $this->template->load('template','tbl_ktp/tbl_ktp_form', $data);
    }
    
    function upload_foto1(){
        $config['upload_path']          = './assets/uploadktp';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagektp');
        return $this->upload->data();
    }

    public function create_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();

        $nik = $this->input->post('id_penduduk',TRUE);

        $sql = "SELECT * FROM tbl_ktp WHERE id_penduduk = $nik";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password       = $this->input->post('password',TRUE);
            $options        = array("cost"=>4);
            $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
            $data = array(
                'tgl_input_ktp' => $this->input->post('tgl_input_ktp',TRUE),
                'negara_ktp' => $this->input->post('negara_ktp',TRUE),
                'id_penduduk' => $this->input->post('id_penduduk',TRUE),
                'imagektp' =>$foto1['file_name'],
	    );

            $this->Tbl_ktp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_ktp'));
        }
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data NIK Sudah Ada ! Cek Kembali');
            window.location.href='".site_url('tbl_ktp/create')."';
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



    public function laporanktp()//sesuaikan di list
	{

		$bulan = $_POST['bulan'];
    	$tahun = $_POST['tahun'];
        $bulanBaru = $this->konversiAngkaKeBulan($bulan);

		if (isset($_POST['cetaksemua'])) {
			$this->data['label'] = "Semua Periode";
			$this->data['tbl_ktp'] =  $this->Tbl_ktp_model->get_all();//
			$this->data['title_web'] = 'Laporan Akta Lahir';	
		} else {
			$this->data['label'] = "Bulan $bulanBaru Tahun $tahun";
			$this->data['tbl_ktp'] =  $this->Tbl_ktp_model->get_all_bulan($bulan,$tahun);//
			$this->data['title_web'] = 'Laporan Akta Lahir';
		}
		
        $this->load->view('tbl_ktp/tbl_ktp_doc',$this->data);
	}




    public function update($id) 
    {
        $row = $this->Tbl_ktp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui',
                'action' => site_url('tbl_ktp/update_action'),
                'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
		'id_ktp' => set_value('id_ktp', $row->id_ktp),
		'tgl_input_ktp' => set_value('tgl_input_ktp', $row->tgl_input_ktp),
		'negara_ktp' => set_value('negara_ktp', $row->negara_ktp),
		'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
		'imagektp' => set_value('imagektp', $row->imagektp),
	    );
            $this->template->load('template','tbl_ktp/tbl_ktp_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_ktp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ktp', TRUE));
        } else {
            if(($foto1['file_name']=='')){
            $data = array(
		'tgl_input_ktp' => $this->input->post('tgl_input_ktp',TRUE),
		'negara_ktp' => $this->input->post('negara_ktp',TRUE),
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),);
    } else {
        $data = array(
            'tgl_input_ktp' => $this->input->post('tgl_input_ktp',TRUE),
		'negara_ktp' => $this->input->post('negara_ktp',TRUE),
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
		'imagektp' =>$foto1['file_name'],);
        $this->session->set_userdata('imagebaru1',$foto1['file_name']);
    }
            $this->Tbl_ktp_model->update($this->input->post('id_ktp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_ktp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_ktp_model->get_by_id($id);

        if ($row) {
            $this->Tbl_ktp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_ktp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_ktp'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('tgl_input_ktp', 'tgl input ktp', 'trim|required');
	//$this->form_validation->set_rules('negara_ktp', 'negara ktp', 'trim|required');
	//$this->form_validation->set_rules('id_penduduk', 'id penduduk', 'trim|required');
	//$this->form_validation->set_rules('imagektp', 'imagektp', 'trim|required');

	$this->form_validation->set_rules('id_ktp', 'id_ktp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_ktp.doc");

        $data = array(
            'tbl_ktp_data' => $this->Tbl_ktp_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_ktp/tbl_ktp_doc',$data);
    }

}

/* End of file Tbl_ktp.php */
/* Location: ./application/controllers/Tbl_ktp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-27 12:42:08 */
/* http://harviacode.com */