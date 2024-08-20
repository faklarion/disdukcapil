<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kia extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_kia_model');
        $this->load->model('Tbl_aktalahir_model');
        $this->load->model('Dt_penduduk_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_kia/tbl_kia_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_kia_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_kia_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kia' => $row->id_kia,
		'tgl_input_kia' => $row->tgl_input_kia,
		'image_kia1' => $row->image_kia1,
		'image_kia2' => $row->image_kia2,
		'image_kia3' => $row->image_kia3,
		'image_kia4' => $row->image_kia4,
		'id_penduduk' => $row->id_penduduk,
		'id_aktalahir' => $row->id_aktalahir,
	    );
            $this->template->load('template','tbl_kia/tbl_kia_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kia'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Masukkan',
            'action' => site_url('tbl_kia/create_action'),
            'tbl_aktalahir_data' => $this->Tbl_aktalahir_model->get_all(),
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
	    'id_kia' => set_value('id_kia'),
        'id_ayah' => set_value('id_penduduk'),
        'id_ibu' => set_value('nama'),
        'id_pemohon' => set_value('stts_perkawinan'),
	    'tgl_input_kia' => set_value('tgl_input_kia'),
        'nik_kia' => set_value('nik_kia'),
        'agama_kia' => set_value('agama_kia'),
        'warganegara' => set_value('warganegara'),
	    'image_kia1' => set_value('image_kia1'),
	    'image_kia2' => set_value('image_kia2'),
	    'image_kia3' => set_value('image_kia3'),
	    'image_kia4' => set_value('image_kia4'),
	    'id_penduduk' => set_value('id_penduduk'),
	    'id_aktalahir' => set_value('id_aktalahir'),
	);
        $this->template->load('template','tbl_kia/tbl_kia_form', $data);
    }
    
    function upload_foto1(){
        $config['upload_path']          = './assets/uploadkia';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('image_kia1');
        return $this->upload->data();
    }
    
    function upload_foto2(){
        $config['upload_path']          = './assets/uploadkia';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('image_kia2');
        return $this->upload->data();
        
    }

    function upload_foto3(){
        $config['upload_path']          = './assets/uploadkia';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('image_kia3');
        return $this->upload->data();
        
    }

    function upload_foto4(){
        $config['upload_path']          = './assets/uploadkia';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('image_kia4');
        return $this->upload->data();
        
    }

    public function create_action() 
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        $foto2 = $this->upload_foto2();
        $foto3 = $this->upload_foto3();
        $foto4 = $this->upload_foto4();

        $nik = $this->input->post('nik_kia',TRUE);

        $sql = "SELECT * FROM tbl_kia WHERE nik_kia = $nik";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password       = $this->input->post('password',TRUE);
            $options        = array("cost"=>4);
            $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
            $data = array(
		'tgl_input_kia' => $this->input->post('tgl_input_kia',TRUE),
        'nik_kia' => $this->input->post('nik_kia',TRUE),
        'agama_kia' => $this->input->post('agama_kia',TRUE),
        'warganegara' => $this->input->post('warganegara',TRUE),
		'image_kia1'    =>$foto1['file_name'],
		'image_kia2'    =>$foto2['file_name'],
		'image_kia3'    =>$foto3['file_name'],
		'image_kia4'    =>$foto4['file_name'],
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
		'id_aktalahir' => $this->input->post('id_aktalahir',TRUE),
        'id_ayah' => $this->input->post('id_penduduk',TRUE),
        'id_ibu' => $this->input->post('nama',TRUE),
        'id_pemohon' => $this->input->post('stts_perkawinan',TRUE),
	    );

            $this->Tbl_kia_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_kia'));
        }
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data NIK KIA Sudah Ada ! Cek Kembali');
            window.location.href='".site_url('tbl_kia/create')."';
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



    public function laporankia()//sesuaikan di list
	{

		$bulan = $_POST['bulan'];
    	$tahun = $_POST['tahun'];
        $bulanBaru = $this->konversiAngkaKeBulan($bulan);

		if (isset($_POST['cetaksemua'])) {
			$this->data['label'] = "Semua Periode";
			$this->data['tbl_kia'] =  $this->Tbl_kia_model->get_all();//
			$this->data['title_web'] = 'Laporan Akta Lahir';	
		} else {
			$this->data['label'] = "Bulan $bulanBaru Tahun $tahun";
			$this->data['tbl_kia'] =  $this->Tbl_kia_model->get_all_bulan($bulan,$tahun);//
			$this->data['title_web'] = 'Laporan Akta Lahir';
		}
		
        $this->load->view('tbl_kia/tbl_kia_doc',$this->data);
	}



    public function update($id) 
    {
        $row = $this->Tbl_kia_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui',
                'action' => site_url('tbl_kia/update_action'),
                'tbl_aktalahir_data' => $this->Tbl_aktalahir_model->get_all(),
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
		'id_kia' => set_value('id_kia', $row->id_kia),
        'id_ayah' => set_value('id_penduduk', $row->id_penduduk),
        'id_ibu' => set_value('nama', $row->nama),
        'id_pemohon' => set_value('id_pemohon', $row->stts_perkawinan),
		'tgl_input_kia' => set_value('tgl_input_kia', $row->tgl_input_kia),
        'nik_kia' => set_value('nik_kia', $row->nik_kia),
        'agama_kia' => set_value('agama_kia', $row->agama_kia),
        'warganegara' => set_value('warganegara', $row->warganegara),
		'image_kia1' => set_value('image_kia1', $row->image_kia1),
		'image_kia2' => set_value('image_kia2', $row->image_kia2),
		'image_kia3' => set_value('image_kia3', $row->image_kia3),
		'image_kia4' => set_value('image_kia4', $row->image_kia4),
		'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
		'id_aktalahir' => set_value('id_aktalahir', $row->id_aktalahir),
	    );
            $this->template->load('template','tbl_kia/tbl_kia_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kia'));
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
            $this->update($this->input->post('id_kia', TRUE));
        } else {
            if(($foto1['file_name']=='')){
            $data = array(
		'tgl_input_kia' => $this->input->post('tgl_input_kia',TRUE),
        'agama_kia' => $this->input->post('agama_kia',TRUE),
        'nik_kia' => $this->input->post('nik_kia',TRUE),
        'warganegara' => $this->input->post('warganegara',TRUE),
		'id_penduduk' => $this->input->post('id_penduduk',TRUE),
		'id_aktalahir' => $this->input->post('id_aktalahir',TRUE),
        'id_ayah' => $this->input->post('id_penduduk',TRUE),
        'id_ibu' => $this->input->post('nama',TRUE),
        'id_pemohon' => $this->input->post('stts_perkawinan',TRUE),
        'image_kia1'    =>$foto1['file_name'],
		'image_kia2'    =>$foto2['file_name'],
		'image_kia3'    =>$foto3['file_name'],
		'image_kia4'    =>$foto4['file_name'],
	    );

    } else {
        $data = array(
            'tgl_input_kia' => $this->input->post('tgl_input_kia',TRUE),
        
        'agama_kia' => $this->input->post('agama_kia',TRUE),
        'id_ayah' => $this->input->post('id_penduduk',TRUE),
        'id_ibu' => $this->input->post('nama',TRUE),
        'id_pemohon' => $this->input->post('stts_perkawinan',TRUE),
        'warganegara' => $this->input->post('warganegara',TRUE),
		'image_kia1'    =>$foto1['file_name'],
		'image_kia2'    =>$foto2['file_name'],
		'image_kia3'    =>$foto3['file_name'],
		'image_kia4'    =>$foto4['file_name'],);
        $this->session->set_userdata('image_kia1',$foto1['file_name']);
        $this->session->set_userdata('image_kia2',$foto2['file_name']);
        $this->session->set_userdata('image_kia3',$foto3['file_name']);
        $this->session->set_userdata('image_kia4',$foto4['file_name']);
        }

            $this->Tbl_kia_model->update($this->input->post('id_kia', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kia'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kia_model->get_by_id($id);

        if ($row) {
            $this->Tbl_kia_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kia'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kia'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_input_kia', 'tgl input kia', 'trim|required');
	//$this->form_validation->set_rules('image_kia1', 'image kia1', 'trim|required');
	//$this->form_validation->set_rules('image_kia2', 'image kia2', 'trim|required');
	//$this->form_validation->set_rules('image_kia3', 'image kia3', 'trim|required');
	//$this->form_validation->set_rules('image_kia4', 'image kia4', 'trim|required');
	$this->form_validation->set_rules('id_penduduk', 'id penduduk', 'trim|required');
	$this->form_validation->set_rules('id_aktalahir', 'id aktalahir', 'trim|required');

	$this->form_validation->set_rules('id_kia', 'id_kia', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_kia.doc");

        $data = array(
            'tbl_kia_data' => $this->Tbl_kia_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kia/tbl_kia_doc',$data);
    }

}

/* End of file Tbl_kia.php */
/* Location: ./application/controllers/Tbl_kia.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-27 09:23:50 */
/* http://harviacode.com */