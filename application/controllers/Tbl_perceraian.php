<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_perceraian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_perceraian_model');
        $this->load->model('Dt_penduduk_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_perceraian/tbl_perceraian_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_perceraian_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_perceraian_model->get_by_id($id);
        if ($row) {
            $data = array(
		    'data_perceraian' => $row,
	    );
            $this->load->View('tbl_perceraian/tbl_perceraian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_perceraian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Masukkan',
            'action' => site_url('tbl_perceraian/create_action'),
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
	    'id_perceraian' => set_value('id_perceraian'),
        'id_cerai_suami' => set_value('id_penduduk'),
        'id_cerai_istri' => set_value('nama'),
	    'tgl_input_cerai' => set_value('tgl_input_cerai'),
	    'ayah_laki' => set_value('ayah_laki'),
	    'ibu_laki' => set_value('ibu_laki'),
	    'ayah_wanita' => set_value('ayah_wanita'),
	    'ibu_wanita' => set_value('ibu_wanita'),
	    'tgl_perkawinan' => set_value('tgl_perkawinan'),
	    'tgl_perceraian' => set_value('tgl_perceraian'),
	    'penyebab_cerai' => set_value('penyebab_cerai'),
	    'id_penduduk' => set_value('id_penduduk'),
        'nama' => set_value('nama'),
	    'negara_laki' => set_value('negara_laki'),
	    'negara_istri' => set_value('negara_istri'),
	    'imagecerai1' => set_value('imagecerai1'),
	    'imagecerai2' => set_value('imagecerai2'),
	    'imagecerai3' => set_value('imagecerai3'),
	);
        $this->template->load('template','tbl_perceraian/tbl_perceraian_form', $data);
    }

    function upload_foto1(){
        $config['upload_path']          = './assets/uploadcerai';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagecerai1');
        return $this->upload->data();
    }
    
    function upload_foto2(){
        $config['upload_path']          = './assets/uploadcerai';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagecerai2');
        return $this->upload->data();
        
    }

    function upload_foto3(){
        $config['upload_path']          = './assets/uploadcerai';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagecerai3');
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
		'tgl_input_cerai' => $this->input->post('tgl_input_cerai',TRUE),
		'ayah_laki' => $this->input->post('ayah_laki',TRUE),
		'ibu_laki' => $this->input->post('ibu_laki',TRUE),
		'ayah_wanita' => $this->input->post('ayah_wanita',TRUE),
		'ibu_wanita' => $this->input->post('ibu_wanita',TRUE),
		'tgl_perkawinan' => $this->input->post('tgl_perkawinan',TRUE),
		'tgl_perceraian' => $this->input->post('tgl_perceraian',TRUE),
		'penyebab_cerai' => $this->input->post('penyebab_cerai',TRUE),
		'negara_laki' => $this->input->post('negara_laki',TRUE),
		'negara_istri' => $this->input->post('negara_istri',TRUE),
        'id_cerai_suami' => $this->input->post('id_penduduk',TRUE),
        'id_Cerai_istri' => $this->input->post('nama',TRUE),
        
		'imagecerai1'  =>$foto1['file_name'],
		'imagecerai2'  =>$foto2['file_name'],
		'imagecerai3'  =>$foto3['file_name'],
        
        
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
	    );

            $this->Tbl_perceraian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_perceraian'));
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



    public function laporanperceraian()//sesuaikan di list
	{

		$bulan = $_POST['bulan'];
    	$tahun = $_POST['tahun'];
        $bulanBaru = $this->konversiAngkaKeBulan($bulan);

		if (isset($_POST['cetaksemua'])) {
			$this->data['label'] = "Semua Periode";
			$this->data['tbl_perceraian'] =  $this->Tbl_perceraian_model->get_all();//
			$this->data['title_web'] = 'Laporan Akta Lahir';	
		} else {
			$this->data['label'] = "Bulan $bulanBaru Tahun $tahun";
			$this->data['tbl_perceraian'] =  $this->Tbl_perceraian_model->get_all_bulan($bulan,$tahun);//
			$this->data['title_web'] = 'Laporan Akta Lahir';
		}
		
        $this->load->view('tbl_perceraian/Tbl_perceraian_doc',$this->data);
	}





    public function update($id) 
    {
        $row = $this->Tbl_perceraian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui',
                'action' => site_url('tbl_perceraian/update_action'),
                'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
		'id_perceraian' => set_value('id_perceraian', $row->id_perceraian),
        'id_cerai_suami' => set_value('id_cerai_suami', $row->id_penduduk),
        'id_cerai_istri' => set_value('id_cerai_istri', $row->nama),
        'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
		'tgl_input_cerai' => set_value('tgl_input_cerai', $row->tgl_input_cerai),
		'ayah_laki' => set_value('ayah_laki', $row->ayah_laki),
		'ibu_laki' => set_value('ibu_laki', $row->ibu_laki),
		'ayah_wanita' => set_value('ayah_wanita', $row->ayah_wanita),
		'ibu_wanita' => set_value('ibu_wanita', $row->ibu_wanita),
		'tgl_perkawinan' => set_value('tgl_perkawinan', $row->tgl_perkawinan),
		'tgl_perceraian' => set_value('tgl_perceraian', $row->tgl_perceraian),
		'penyebab_cerai' => set_value('penyebab_cerai', $row->penyebab_cerai),
		'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
		'negara_laki' => set_value('negara_laki', $row->negara_laki),
		'negara_istri' => set_value('negara_istri', $row->negara_istri),
		'imagecerai1' => set_value('imagecerai1', $row->imagecerai1),
		'imagecerai2' => set_value('imagecerai2', $row->imagecerai2),
		'imagecerai3' => set_value('imagecerai3', $row->imagecerai3),
	    );
            $this->template->load('template','tbl_perceraian/tbl_perceraian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_perceraian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        $foto2 = $this->upload_foto2();
        $foto3 = $this->upload_foto3();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_perceraian', TRUE));
        } else {
            if(($foto1['file_name']=='')){
            $data = array(
		'tgl_input_cerai' => $this->input->post('tgl_input_cerai',TRUE),
		'ayah_laki' => $this->input->post('ayah_laki',TRUE),
		'ibu_laki' => $this->input->post('ibu_laki',TRUE),
		'ayah_wanita' => $this->input->post('ayah_wanita',TRUE),
		'ibu_wanita' => $this->input->post('ibu_wanita',TRUE),
		'tgl_perkawinan' => $this->input->post('tgl_perkawinan',TRUE),
		'tgl_perceraian' => $this->input->post('tgl_perceraian',TRUE),
		'penyebab_cerai' => $this->input->post('penyebab_cerai',TRUE),
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
		'negara_laki' => $this->input->post('negara_laki',TRUE),
		'negara_istri' => $this->input->post('negara_istri',TRUE),
        'id_cerai_suami' => $this->input->post('id_penduduk',TRUE),
        'id_Cerai_istri' => $this->input->post('nama',TRUE),
        'imagecerai1'  =>$foto1['file_name'],
		'imagecerai2'  =>$foto2['file_name'],
		'imagecerai3'  =>$foto3['file_name'],);
    } else {
        $data = array(
            'tgl_input_cerai' => $this->input->post('tgl_input_cerai',TRUE),
		'ayah_laki' => $this->input->post('ayah_laki',TRUE),
		'ibu_laki' => $this->input->post('ibu_laki',TRUE),
		'ayah_wanita' => $this->input->post('ayah_wanita',TRUE),
		'ibu_wanita' => $this->input->post('ibu_wanita',TRUE),
		'tgl_perkawinan' => $this->input->post('tgl_perkawinan',TRUE),
		'tgl_perceraian' => $this->input->post('tgl_perceraian',TRUE),
		'penyebab_cerai' => $this->input->post('penyebab_cerai',TRUE),
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
		'negara_laki' => $this->input->post('negara_laki',TRUE),
		'negara_istri' => $this->input->post('negara_istri',TRUE),
        'id_cerai_suami' => $this->input->post('id_penduduk',TRUE),
        'id_Cerai_istri' => $this->input->post('nama',TRUE),
		'imagecerai1'  =>$foto1['file_name'],
		'imagecerai2'  =>$foto2['file_name'],
		'imagecerai3'  =>$foto3['file_name'],);
        $this->session->set_userdata('imagebaru1',$foto1['file_name']);
        $this->session->set_userdata('imagebaru2',$foto2['file_name']);
        $this->session->set_userdata('imagebaru3',$foto3['file_name']);
    }

            $this->Tbl_perceraian_model->update($this->input->post('id_perceraian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_perceraian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_perceraian_model->get_by_id($id);

        if ($row) {
            $this->Tbl_perceraian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_perceraian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_perceraian'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('tgl_input_cerai', 'tgl input cerai', 'trim|required');
	//$this->form_validation->set_rules('ayah_laki', 'ayah laki', 'trim|required');
	//$this->form_validation->set_rules('ibu_laki', 'ibu laki', 'trim|required');
	//$this->form_validation->set_rules('ayah_wanita', 'ayah wanita', 'trim|required');
	//$this->form_validation->set_rules('ibu_wanita', 'ibu wanita', 'trim|required');
	//$this->form_validation->set_rules('tgl_perkawinan', 'tgl perkawinan', 'trim|required');
	//$this->form_validation->set_rules('tgl_perceraian', 'tgl perceraian', 'trim|required');
	//$this->form_validation->set_rules('penyebab_cerai', 'penyebab cerai', 'trim|required');
	//$this->form_validation->set_rules('id_penduduk', 'id penduduk', 'trim');
	//$this->form_validation->set_rules('negara_laki', 'negara laki', 'trim|required');
	//$this->form_validation->set_rules('negara_istri', 'negara istri', 'trim|required');
	//$this->form_validation->set_rules('imagecerai1', 'imagecerai1', 'trim|required');
	//$this->form_validation->set_rules('imagecerai2', 'imagecerai2', 'trim|required');
	//$this->form_validation->set_rules('imagecerai3', 'imagecerai3', 'trim|required');

	$this->form_validation->set_rules('id_perceraian', 'id_perceraian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        $data = array(
            'tbl_perceraian_data' => $this->Tbl_perceraian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_perceraian/tbl_perceraian_doc',$data);
    }

}

/* End of file Tbl_perceraian.php */
/* Location: ./application/controllers/Tbl_perceraian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-28 15:27:13 */
/* http://harviacode.com */