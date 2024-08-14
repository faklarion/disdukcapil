<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_buku_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_buku/tbl_buku_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_buku_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_buku_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'judul' => $row->judul,
		'pengarang' => $row->pengarang,
		'tahun' => $row->tahun,
	    );
            $this->template->load('template','tbl_buku/tbl_buku_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_buku'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_buku/create_action'),
	    'id' => set_value('id'),
	    'judul' => set_value('judul'),
	    'pengarang' => set_value('pengarang'),
	    'tahun' => set_value('tahun'),
	);
        $this->template->load('template','tbl_buku/tbl_buku_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'pengarang' => $this->input->post('pengarang',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->Tbl_buku_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_buku'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_buku_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_buku/update_action'),
		'id' => set_value('id', $row->id),
		'judul' => set_value('judul', $row->judul),
		'pengarang' => set_value('pengarang', $row->pengarang),
		'tahun' => set_value('tahun', $row->tahun),
	    );
            $this->template->load('template','tbl_buku/tbl_buku_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_buku'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'pengarang' => $this->input->post('pengarang',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->Tbl_buku_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_buku'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_buku_model->get_by_id($id);

        if ($row) {
            $this->Tbl_buku_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_buku'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_buku'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('pengarang', 'pengarang', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_buku.xls";
        $judul = "tbl_buku";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
	xlsWriteLabel($tablehead, $kolomhead++, "Pengarang");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");

	foreach ($this->Tbl_buku_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pengarang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_buku.doc");

        $data = array(
            'tbl_buku_data' => $this->Tbl_buku_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_buku/tbl_buku_doc',$data);
    }

}

/* End of file Tbl_buku.php */
/* Location: ./application/controllers/Tbl_buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-12-27 07:38:17 */
/* http://harviacode.com */