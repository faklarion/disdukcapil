<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kematian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_kematian_model');
        $this->load->model('Dt_penduduk_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_kematian/tbl_kematian_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_kematian_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_kematian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kematian' => $row->id_kematian,
		'tgl_input_kematian' => $row->tgl_input_kematian,
		'tgl_kematian' => $row->tgl_kematian,
		'penyebab_kematian' => $row->penyebab_kematian,
		'tempat_kematian' => $row->tempat_kematian,
		'imagekematian1' => $row->imagekematian1,
		'imagekematian2' => $row->imagekematian2,
		'imagekematian3' => $row->imagekematian3,
		'imagekematian4' => $row->imagekematian4,
		'id_penduduk' => $row->id_penduduk,
	    );
            $this->template->load('template','tbl_kematian/tbl_kematian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kematian'));
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



    public function laporankematian()//sesuaikan di list
	{

		$bulan = $_POST['bulan'];
    	$tahun = $_POST['tahun'];
        $bulanBaru = $this->konversiAngkaKeBulan($bulan);

		if (isset($_POST['cetaksemua'])) {
			$this->data['label'] = "Semua Periode";
			$this->data['tbl_kematian'] =  $this->Tbl_kematian_model->get_all();//
			$this->data['title_web'] = 'Laporan Akta Lahir';	
		} else {
			$this->data['label'] = "Bulan $bulanBaru Tahun $tahun";
			$this->data['tbl_kematian'] =  $this->Tbl_kematian_model->get_all_bulan($bulan,$tahun);//
			$this->data['title_web'] = 'Laporan Akta Lahir';
		}
		
        $this->load->view('tbl_kematian/tbl_kematian_doc',$this->data);
	}


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kematian/create_action'),
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
	    'id_kematian' => set_value('id_kematian'),
        'si_pemohon' => set_value('nama'),
        'id_meninggal' => set_value('id_penduduk'),
	    'tgl_input_kematian' => set_value('tgl_input_kematian'),
	    'tgl_kematian' => set_value('tgl_kematian'),
	    'penyebab_kematian' => set_value('penyebab_kematian'),
	    'tempat_kematian' => set_value('tempat_kematian'),
	    'imagekematian1' => set_value('imagekematian1'),
	    'imagekematian2' => set_value('imagekematian2'),
	    'imagekematian3' => set_value('imagekematian3'),
	    'imagekematian4' => set_value('imagekematian4'),
	    'id_penduduk' => set_value('id_penduduk'),
	);
        $this->template->load('template','tbl_kematian/tbl_kematian_form', $data);
    }
    
    function upload_foto1(){
        $config['upload_path']          = './assets/uploadkematian';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagekematian1');
        return $this->upload->data();
    }
    
    function upload_foto2(){
        $config['upload_path']          = './assets/uploadkematian';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagekematian2');
        return $this->upload->data();
        
    }

    function upload_foto3(){
        $config['upload_path']          = './assets/uploadkematian';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagekematian3');
        return $this->upload->data();
        
    }

    function upload_foto4(){
        $config['upload_path']          = './assets/uploadkematian';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagekematian4');
        return $this->upload->data();
        
    }


    public function create_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        $foto2 = $this->upload_foto2();
        $foto3 = $this->upload_foto3();
        $foto4 = $this->upload_foto4();

        
        $nik = $this->input->post('id_penduduk',TRUE);

        $sql = "SELECT * FROM tbl_kematian WHERE id_penduduk = '$nik'";

        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password       = $this->input->post('password',TRUE);
            $options        = array("cost"=>4);
            $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
            $data = array(
		'tgl_input_kematian' => $this->input->post('tgl_input_kematian',TRUE),
		'tgl_kematian' => $this->input->post('tgl_kematian',TRUE),
		'penyebab_kematian' => $this->input->post('penyebab_kematian',TRUE),
		'tempat_kematian' => $this->input->post('tempat_kematian',TRUE),
		'imagekematian1' =>$foto1['file_name'],
		'imagekematian2' =>$foto2['file_name'],
		'imagekematian3' =>$foto3['file_name'],
		'imagekematian4' =>$foto4['file_name'],
        'si_pemohon' => $this->input->post('nama',TRUE),
        'id_meninggal' => $this->input->post('id_penduduk',TRUE),
        'id_penduduk' => $this->input->post('id_penduduk',TRUE),
    );
        
            $this->Tbl_kematian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_kematian'));
        }
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data Orang Meninggal Sudah Ada ! Cek Kembali');
            window.location.href='".site_url('tbl_kematian/create')."';
            </script>");
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kematian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kematian/update_action'),
                'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
		'id_kematian' => set_value('id_kematian', $row->id_kematian),
        'si_pemohon' => set_value('nama', $row->nama),
        'id_meninggal' => set_value('id_penduduk', $row->id_penduduk),
		'tgl_input_kematian' => set_value('tgl_input_kematian', $row->tgl_input_kematian),
		'tgl_kematian' => set_value('tgl_kematian', $row->tgl_kematian),
		'penyebab_kematian' => set_value('penyebab_kematian', $row->penyebab_kematian),
		'tempat_kematian' => set_value('tempat_kematian', $row->tempat_kematian),
		'imagekematian1' => set_value('imagekematian1', $row->imagekematian1),
		'imagekematian2' => set_value('imagekematian2', $row->imagekematian2),
		'imagekematian3' => set_value('imagekematian3', $row->imagekematian3),
		'imagekematian4' => set_value('imagekematian4', $row->imagekematian4),
		'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
	    );
            $this->template->load('template','tbl_kematian/tbl_kematian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kematian'));
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
            $this->update($this->input->post('id_kematian', TRUE));
        } else {
            if(($foto1['file_name']=='')){
            $data = array(
		'tgl_input_kematian' => $this->input->post('tgl_input_kematian',TRUE),
		'tgl_kematian' => $this->input->post('tgl_kematian',TRUE),
		'penyebab_kematian' => $this->input->post('penyebab_kematian',TRUE),
		'tempat_kematian' => $this->input->post('tempat_kematian',TRUE),
		'imagekematian1' => $this->input->post('imagekematian1',TRUE),
		'imagekematian2' => $this->input->post('imagekematian2',TRUE),
		'imagekematian3' => $this->input->post('imagekematian3',TRUE),
		'imagekematian4' => $this->input->post('imagekematian4',TRUE),
        'id_penduduk' => $this->input->post('id_penduduk',TRUE),
        'si_pemohon' => $this->input->post('nama',TRUE),
        'id_meninggal' => $this->input->post('id_penduduk',TRUE),);
    } else {
        $data = array(
            'tgl_input_kematian' => $this->input->post('tgl_input_kematian',TRUE),
            'tgl_kematian' => $this->input->post('tgl_kematian',TRUE),
            'penyebab_kematian' => $this->input->post('penyebab_kematian',TRUE),
            'tempat_kematian' => $this->input->post('tempat_kematian',TRUE),
            'id_penduduk' => $this->input->post('id_penduduk',TRUE),
        'imagekematian1' => $foto1['file_name'],
		'imagekematian2' => $foto2['file_name'],
		'imagekematian3' => $foto3['file_name'],
		'imagekematian4' => $foto4['file_name'],);
        $this->session->set_userdata('imagekematian1',$foto1['file_name']);
        $this->session->set_userdata('imagekematian2',$foto2['file_name']);
        $this->session->set_userdata('imagekematian3',$foto3['file_name']);
        $this->session->set_userdata('imagekematian4',$foto4['file_name']);
            }
            $this->Tbl_kematian_model->update($this->input->post('id_kematian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kematian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kematian_model->get_by_id($id);

        if ($row) {
            $this->Tbl_kematian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kematian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kematian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_input_kematian', 'tgl input kematian', 'trim|required');
	$this->form_validation->set_rules('tgl_kematian', 'tgl kematian', 'trim|required');
	$this->form_validation->set_rules('penyebab_kematian', 'penyebab kematian', 'trim|required');
	$this->form_validation->set_rules('tempat_kematian', 'tempat kematian', 'trim|required');
	//$this->form_validation->set_rules('imagekematian1', 'imagekematian1', 'trim|required');
	//$this->form_validation->set_rules('imagekematian2', 'imagekematian2', 'trim|required');
	//$this->form_validation->set_rules('imagekematian3', 'imagekematian3', 'trim|required');
	//$this->form_validation->set_rules('imagekematian4', 'imagekematian4', 'trim|required');
	//$this->form_validation->set_rules('id_aktalahir', 'id aktalahir', 'trim');
	$this->form_validation->set_rules('id_penduduk', 'id penduduk', 'trim|required');

	$this->form_validation->set_rules('id_kematian', 'id_kematian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
       
        $data = array(
            'tbl_kematian_data' => $this->Tbl_kematian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kematian/tbl_kematian_doc',$data);
    }

}

/* End of file Tbl_kematian.php */
/* Location: ./application/controllers/Tbl_kematian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-26 07:00:47 */
/* http://harviacode.com */