<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Register_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('register/daftar_umum_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Register_model->json();
    }

    public function read($id) 
    {
        $row = $this->Register_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'no_hp' => $row->no_hp,
		'pilih_poliklinik' => $row->pilih_poliklinik,
		'pilih_dokter' => $row->pilih_dokter,
	    );
            $this->template->load('template','register/daftar_umum_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('register'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('register/create_action'),
            'id_users'      => set_value('id_users'),
        'nik_user'         => set_value('nik_user'),
        'no_kk_user'         => set_value('no_kk_user'),
	    'full_name'     => set_value('full_name'),
        'jenis_kelamin_user'         => set_value('jenis_kelamin_user'),
        'tempat_lahir_user'         => set_value('tempat_lahir_user'),
        'tgl_lahir_user'         => set_value('tgl_lahir_user'),
        'alamat_user'         => set_value('alamat_user'),
        'no_telp_user'         => set_value('no_telp_user'),
        'email'         => set_value('email'),
	    'password'      => set_value('password'),
	    'id_user_level' => set_value('id_user_level'),
	    'is_aktif'      => set_value('is_aktif'),
	);
        $this->load->view('register/daftar_umum_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
       
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password       = $this->input->post('password',TRUE);
            $options        = array("cost"=>4);
            $hashPassword   = password_hash($password,PASSWORD_BCRYPT,$options);
            
            $data = array(
                
                'nik_user'         => $this->input->post('nik_user',TRUE),
                'no_kk_user'         => $this->input->post('no_kk_user',TRUE),
                'full_name'     => $this->input->post('full_name',TRUE),
                'jenis_kelamin_user'         => $this->input->post('jenis_kelamin_user',TRUE),
                'tempat_lahir_user'         => $this->input->post('tempat_lahir_user',TRUE),
                'tgl_lahir_user'         => $this->input->post('tgl_lahir_user',TRUE),
                'alamat_user'         => $this->input->post('alamat_user',TRUE),
                'no_telp_user'         => $this->input->post('no_telp_user',TRUE),
                'email'         => $this->input->post('email',TRUE),
                'password'      => $hashPassword,
                'id_user_level' => $this->input->post('id_user_level',TRUE),
                'is_aktif'      => $this->input->post('is_aktif',TRUE),
	    );

            $this->Register_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('auth'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Register_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('register/update_action'),
		'id_users'      => set_value('id_users', $row->id_users),
        'nik_user'         => set_value('nik_user', $row->nik_user),
        'no_kk_user'         => set_value('no_kk_user', $row->no_kk_user),
		'full_name'     => set_value('full_name', $row->full_name),
        'jenis_kelamin_user'         => set_value('jenis_kelamin_user', $row->jenis_kelamin_user),
        'tempat_lahir_user'         => set_value('tempat_lahir_user', $row->tempat_lahir_user),
        'tgl_lahir_user'         => set_value('tgl_lahir_user', $row->tgl_lahir_user),
        'alamat_user'         => set_value('alamat_user', $row->alamat_user),
        'no_telp_user'         => set_value('no_telp_user', $row->no_telp_user),
		'email'         => set_value('email', $row->email),
		'password'      => set_value('password', $row->password),
		'id_user_level' => set_value('id_user_level', $row->id_user_level),
		'is_aktif'      => set_value('is_aktif', $row->is_aktif),
	    );
            $this->template->load('template','register/daftar_umum_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('register'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
            $data = array(
		'full_name'     => $this->input->post('full_name',TRUE),
		'email'         => $this->input->post('email',TRUE),
		'id_user_level' => $this->input->post('id_user_level',TRUE),
		'is_aktif'      => $this->input->post('is_aktif',TRUE),);
            }else{
                $data = array(
        'nik_user'   => $this->input->post('nik_user',TRUE),
        'no_kk_user'  => $this->input->post('no_kk_user',TRUE),
		'full_name'   => $this->input->post('full_name',TRUE),
        'jenis_kelamin_user'   => $this->input->post('jenis_kelamin_user',TRUE),
        'tempat_lahir_user'  => $this->input->post('tempat_lahir_user',TRUE),
        'tgl_lahir_user'  => $this->input->post('tgl_lahir_user',TRUE),
        'alamat_user'  => $this->input->post('alamat_user',TRUE),
        'no_telp_user' => $this->input->post('no_telp_user',TRUE),
		'email' => $this->input->post('email',TRUE),
		'id_user_level' => $this->input->post('id_user_level',TRUE),
		'is_aktif'      => $this->input->post('is_aktif',TRUE));
                
            $this->Register_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('register'));
        }
    }
    

    

    public function delete($id) 
    {
        $row = $this->Register_model->get_by_id($id);

        if ($row) {
            $this->Register_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('register'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('register'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('full_name', 'full name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        //$this->form_validation->set_rules('images', 'images', 'trim|required');
        $this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
        $this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');
    
        $this->form_validation->set_rules('id_users', 'id_users', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        }

}

/* End of file Form_daftar.php */
/* Location: ./application/controllers/Form_daftar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-24 13:15:20 */
/* http://harviacode.com */