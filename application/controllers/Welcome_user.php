<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Welcome_user_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','welcome_user/data_anggaran_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Welcome_user_model->json();
    }

    public function read($id) 
    {
        $row = $this->Welcome_user_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_pengajuan' => $row->id_pengajuan,
		'tanggal_kebutuhan' => $row->tanggal_kebutuhan,
		'nrp' => $row->nrp,
		'isi_pengaduan' => $row->isi_pengaduan,
		'keterangan' => $row->keterangan,
		'tanggapan' => $row->tanggapan,
		'status' => $row->status,
	    );
            $this->template->load('template','welcome_user/data_anggaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('welcome_user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('welcome_user/create_action'),
	    'id' => set_value('id'),
	    'id_pengajuan' => set_value('id_pengajuan'),
	    'tanggal_kebutuhan' => set_value('tanggal_kebutuhan'),
	    'nrp' => set_value('nrp'),
	    'isi_pengaduan' => set_value('isi_pengaduan'),
	    'keterangan' => set_value('keterangan'),
	    'tanggapan' => set_value('tanggapan'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','welcome_user/data_anggaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pengajuan' => $this->input->post('id_pengajuan',TRUE),
		'tanggal_kebutuhan' => $this->input->post('tanggal_kebutuhan',TRUE),
		'nrp' => $this->input->post('nrp',TRUE),
		'isi_pengaduan' => $this->input->post('isi_pengaduan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tanggapan' => $this->input->post('tanggapan',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Welcome_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('welcome_user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Welcome_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('welcome_user/update_action'),
		'id' => set_value('id', $row->id),
		'id_pengajuan' => set_value('id_pengajuan', $row->id_pengajuan),
		'tanggal_kebutuhan' => set_value('tanggal_kebutuhan', $row->tanggal_kebutuhan),
		'nrp' => set_value('nrp', $row->nrp),
		'isi_pengaduan' => set_value('isi_pengaduan', $row->isi_pengaduan),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'tanggapan' => set_value('tanggapan', $row->tanggapan),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','welcome_user/data_anggaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('welcome_user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_pengajuan' => $this->input->post('id_pengajuan',TRUE),
		'tanggal_kebutuhan' => $this->input->post('tanggal_kebutuhan',TRUE),
		'nrp' => $this->input->post('nrp',TRUE),
		'isi_pengaduan' => $this->input->post('isi_pengaduan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tanggapan' => $this->input->post('tanggapan',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Welcome_user_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('welcome_user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Welcome_user_model->get_by_id($id);

        if ($row) {
            $this->Welcome_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('welcome_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('welcome_user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pengajuan', 'id pengajuan', 'trim|required');
	$this->form_validation->set_rules('tanggal_kebutuhan', 'tanggal kebutuhan', 'trim|required');
	$this->form_validation->set_rules('nrp', 'nrp', 'trim|required');
	$this->form_validation->set_rules('isi_pengaduan', 'isi pengaduan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('tanggapan', 'tanggapan', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_anggaran.doc");

        $data = array(
            'data_anggaran_data' => $this->Welcome_user_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('welcome_user/data_anggaran_doc',$data);
    }

}

/* End of file Welcome_user.php */
/* Location: ./application/controllers/Welcome_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-21 19:39:32 */
/* http://harviacode.com */