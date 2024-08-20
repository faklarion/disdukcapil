<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_kk_model');
        $this->load->model('Dt_penduduk_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_kk/tbl_kk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_kk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_kk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kk' => $row->id_kk,
		'tgl_input_kk' => $row->tgl_input_kk,
		'id_penduduk' => $row->id_penduduk,
	    );
            $this->template->load('template','tbl_kk/tbl_kk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Masukkan',
            'action' => site_url('tbl_kk/create_action'),
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
	    'id_kk' => set_value('id_kk'),
        'kepala_keluarga' => set_value('kepala_keluarga'),
	    'tgl_input_kk' => set_value('tgl_input_kk'),
        'imagekk1' => set_value('imagekk1'),
        'imagekk2' => set_value('imagekk2'),
        'imagekk3' => set_value('imagekk3'),
	    'id_penduduk' => set_value('id_penduduk'),
	);
        $this->template->load('template','tbl_kk/tbl_kk_form', $data);
    }

    function upload_foto1(){
        $config['upload_path']          = './assets/uploadkk';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagekk1');
        return $this->upload->data();
    }
    
    function upload_foto2(){
        $config['upload_path']          = './assets/uploadkk';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagekk2');
        return $this->upload->data();
        
    }

    function upload_foto3(){
        $config['upload_path']          = './assets/uploadkk';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagekk3');
        return $this->upload->data();
        
    }

    
    public function create_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        $foto2 = $this->upload_foto2();
        $foto3 = $this->upload_foto3();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password       = $this->input->post('password',TRUE);
            $options        = array("cost"=>4);
            $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
            $data = array(
                'tgl_input_kk' => $this->input->post('tgl_input_kk',TRUE),
                'kepala_keluarga' => $this->input->post('kepala_keluarga',TRUE),
                'imagekk1' =>$foto1['file_name'],
                'imagekk2' =>$foto2['file_name'],
                'imagekk3' =>$foto3['file_name'],
                'id_penduduk' => $this->input->post('id_penduduk',TRUE),
	    );

            $this->Tbl_kk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_kk'));
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



    public function laporankk()//sesuaikan di list
	{

		$bulan = $_POST['bulan'];
    	$tahun = $_POST['tahun'];
        $bulanBaru = $this->konversiAngkaKeBulan($bulan);

		if (isset($_POST['cetaksemua'])) {
			$this->data['label'] = "Semua Periode";
			$this->data['tbl_kk'] =  $this->Tbl_kk_model->get_all();//
			$this->data['title_web'] = 'Laporan Akta Lahir';	
		} else {
			$this->data['label'] = "Bulan $bulanBaru Tahun $tahun";
			$this->data['tbl_kk'] =  $this->Tbl_kk_model->get_all_bulan($bulan,$tahun);//
			$this->data['title_web'] = 'Laporan Akta Lahir';
		}
		
        $this->load->view('tbl_kk/tbl_kk_doc',$this->data);
	}



    public function update($id) 
    {
        $row = $this->Tbl_kk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui',
                'action' => site_url('tbl_kk/update_action'),
                'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
                'id_kk' => set_value('id_kk', $row->id_kk),
                'tgl_input_kk' => set_value('tgl_input_kk', $row->tgl_input_kk),
                'kepala_keluarga' => set_value('kepala_keluarga', $row->kepala_keluarga),
                'imagekk1' => set_value('imagekk1', $row->imagekk1),
                'imagekk2' => set_value('imagekk2', $row->imagekk2),
                'imagekk3' => set_value('imagekk3', $row->imagekk3),
                'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
	    );
            $this->template->load('template','tbl_kk/tbl_kk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        $foto2 = $this->upload_foto2();
        $foto3 = $this->upload_foto3();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kk', TRUE));
        } else {
            if(($foto1['file_name']=='')){
            $data = array(
		'tgl_input_kk' => $this->input->post('tgl_input_kk',TRUE),
        'kepala_keluarga' => $this->input->post('kepala_keluarga',TRUE),
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
	    );
    } else {
        $data = array(
        'tgl_input_kk' => $this->input->post('tgl_input_kk',TRUE),
        'kepala_keluarga' => $this->input->post('kepala_keluarga',TRUE),
        'imagekk1' =>$foto1['file_name'],
		'imagekk2' =>$foto2['file_name'],
		'imagekk3' =>$foto3['file_name'],);
        $this->session->set_userdata('imagekematian1',$foto1['file_name']);
        $this->session->set_userdata('imagekematian2',$foto2['file_name']);
        $this->session->set_userdata('imagekematian3',$foto3['file_name']);
    }
        
            $this->Tbl_kk_model->update($this->input->post('id_kk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kk_model->get_by_id($id);

        if ($row) {
            $this->Tbl_kk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kk'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('tgl_input_kk', 'tgl input kk', 'trim|required');
	//$this->form_validation->set_rules('id_penduduk', 'id penduduk', 'trim|required');

	$this->form_validation->set_rules('id_kk', 'id_kk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_kk.doc");

        $data = array(
            'tbl_kk_data' => $this->Tbl_kk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kk/tbl_kk_doc',$data);
    }

}

/* End of file Tbl_kk.php */
/* Location: ./application/controllers/Tbl_kk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-27 12:35:54 */
/* http://harviacode.com */