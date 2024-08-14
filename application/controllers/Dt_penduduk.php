<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dt_penduduk_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','dt_penduduk/dt_penduduk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Dt_penduduk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Dt_penduduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penduduk' => $row->id_penduduk,
		'no_kk' => $row->no_kk,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tempat_lahir' => $row->tempat_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'agama' => $row->agama,
		'pendidikan' => $row->pendidikan,
		'pekerjaan' => $row->pekerjaan,
		'gol_darah' => $row->gol_darah,
		'stts_perkawinan' => $row->stts_perkawinan,
		'no_hp' => $row->no_hp,
	    );
            $this->template->load('template','dt_penduduk/dt_penduduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_penduduk'));
        }
    }

    public function create() 
    {

        
        $data = array(
            'button' => 'Create',
            'action' => site_url('dt_penduduk/create_action'),
	    'id_penduduk' => set_value('id_penduduk'),
	    'no_kk' => set_value('no_kk'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'agama' => set_value('agama'),
	    'pendidikan' => set_value('pendidikan'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'gol_darah' => set_value('gol_darah'),
	    'stts_perkawinan' => set_value('stts_perkawinan'),
	    'no_hp' => set_value('no_hp'),
	);
        $this->template->load('template','dt_penduduk/dt_penduduk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        $nik = $this->input->post('nik',TRUE);

        $sql = "SELECT * FROM dt_penduduk WHERE nik = $nik";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_kk' => $this->input->post('no_kk',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'gol_darah' => $this->input->post('gol_darah',TRUE),
		'stts_perkawinan' => $this->input->post('stts_perkawinan',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
	    );

            $this->Dt_penduduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('dt_penduduk'));
        }  
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Data NIK Ada ! Cek Kembali');
            window.location.href='".site_url('dt_penduduk/create')."';
            </script>");
            }
    }
    
    public function update($id) 
    {
        $row = $this->Dt_penduduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dt_penduduk/update_action'),
		'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
		'no_kk' => set_value('no_kk', $row->no_kk),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'agama' => set_value('agama', $row->agama),
		'pendidikan' => set_value('pendidikan', $row->pendidikan),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'gol_darah' => set_value('gol_darah', $row->gol_darah),
		'stts_perkawinan' => set_value('stts_perkawinan', $row->stts_perkawinan),
		'no_hp' => set_value('no_hp', $row->no_hp),
	    );
            $this->template->load('template','dt_penduduk/dt_penduduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_penduduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penduduk', TRUE));
        } else {
            $data = array(
		'no_kk' => $this->input->post('no_kk',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'gol_darah' => $this->input->post('gol_darah',TRUE),
		'stts_perkawinan' => $this->input->post('stts_perkawinan',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
	    );

            $this->Dt_penduduk_model->update($this->input->post('id_penduduk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dt_penduduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dt_penduduk_model->get_by_id($id);

        if ($row) {
            $this->Dt_penduduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dt_penduduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dt_penduduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('gol_darah', 'gol darah', 'trim|required');
	$this->form_validation->set_rules('stts_perkawinan', 'stts perkawinan', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');

	$this->form_validation->set_rules('id_penduduk', 'id_penduduk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=dt_penduduk.doc");

        $data = array(
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('dt_penduduk/dt_penduduk_doc',$data);
    }

}

/* End of file Dt_penduduk.php */
/* Location: ./application/controllers/Dt_penduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-25 08:12:20 */
/* http://harviacode.com */