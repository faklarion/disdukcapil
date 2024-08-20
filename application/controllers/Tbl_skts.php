<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_skts extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_skts_model');
        $this->load->model('Dt_penduduk_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'tbl_skts/tbl_skts_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Tbl_skts_model->json();
    }

    public function read($id)
    {
        $row = $this->Tbl_skts_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_skts' => $row->id_skts,
                'tgl_input_skts' => $row->tgl_input_skts,
                'keperluan' => $row->keperluan,
                'alamat_sementara' => $row->alamat_sementara,
                'imageskts1' => $row->imageskts1,
                'imageskts2' => $row->imageskts2,
                'imageskts3' => $row->imageskts3,
                'id_penduduk' => $row->id_penduduk,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
                'pekerjaan' => $row->pekerjaan,
                'jenis_kelamin' => $row->jenis_kelamin,
                'tempat_lahir' => $row->tempat_lahir,
                'tgl_lahir' => $row->tgl_lahir,
            );
            $this->load->view('tbl_skts/tbl_skts_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_skts'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Masukkan',
            'action' => site_url('tbl_skts/create_action'),
            'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
            'id_skts' => set_value('id_skts'),
            'tgl_input_skts' => set_value('tgl_input_skts'),
            'keperluan' => set_value('keperluan'),
            'alamat_sementara' => set_value('alamat_sementara'),
            'imageskts1' => set_value('imageskts1'),
            'imageskts2' => set_value('imageskts2'),
            'imageskts3' => set_value('imageskts3'),
            'id_penduduk' => set_value('id_penduduk'),
        );
        $this->template->load('template', 'tbl_skts/tbl_skts_form', $data);
    }

    function upload_foto1()
    {
        $config['upload_path'] = './assets/uploadskts';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imageskts1');
        return $this->upload->data();
    }

    function upload_foto2()
    {
        $config['upload_path'] = './assets/uploadskts';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imageskts2');
        return $this->upload->data();

    }

    function upload_foto3()
    {
        $config['upload_path'] = './assets/uploadskts';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imageskts3');
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
            $password = $this->input->post('password', TRUE);
            $options = array("cost" => 4);
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
            $data = array(
                'tgl_input_skts' => $this->input->post('tgl_input_skts', TRUE),
                'keperluan' => $this->input->post('keperluan', TRUE),
                'alamat_sementara' => $this->input->post('alamat_sementara', TRUE),
                'imageskts1' => $foto1['file_name'],
                'imageskts2' => $foto2['file_name'],
                'imageskts3' => $foto3['file_name'],
                'id_penduduk' => $this->input->post('id_penduduk', TRUE),
                'id_users' => $this->session->userdata('id_users'),
                'status' => 'Belum Disetujui',
                'keterangan' => '-',
            );

            $this->Tbl_skts_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_skts'));
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



    public function laporanskts()//sesuaikan di list
    {

        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $bulanBaru = $this->konversiAngkaKeBulan($bulan);

        if (isset($_POST['cetaksemua'])) {
            $this->data['label'] = "Semua Periode";
            $this->data['tbl_skts'] = $this->Tbl_skts_model->get_all();//
            $this->data['title_web'] = 'Laporan Akta Lahir';
        } else {
            $this->data['label'] = "Bulan $bulanBaru Tahun $tahun";
            $this->data['tbl_skts'] = $this->Tbl_skts_model->get_all_bulan($bulan, $tahun);//
            $this->data['title_web'] = 'Laporan Akta Lahir';
        }

        $this->load->view('tbl_skts/tbl_skts_doc', $this->data);
    }

    public function update($id)
    {
        $row = $this->Tbl_skts_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Perbarui',
                'action' => site_url('tbl_skts/update_action'),
                'dt_penduduk_data' => $this->Dt_penduduk_model->get_all(),
                'id_skts' => set_value('id_skts', $row->id_skts),
                'tgl_input_skts' => set_value('tgl_input_skts', $row->tgl_input_skts),
                'keperluan' => set_value('keperluan', $row->keperluan),
                'alamat_sementara' => set_value('alamat_sementara', $row->alamat_sementara),
                'imageskts1' => set_value('imageskts1', $row->imageskts1),
                'imageskts2' => set_value('imageskts2', $row->imageskts2),
                'imageskts3' => set_value('imageskts3', $row->imageskts3),
                'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
            );
            $this->template->load('template', 'tbl_skts/tbl_skts_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_skts'));
        }
    }

    public function status($id)
    {
        $row = $this->Tbl_skts_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_skts/status_action'),
                'status' => set_value('status', $row->status),
                'id_skts' => set_value('id_skts', $row->id_skts),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );
            $this->template->load('template', 'tbl_skts/tbl_skts_status', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_skts'));
        }
    }

    public function status_action()
    {
        $data = array(
            'status' => $this->input->post('status', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
        );
            
        $this->Tbl_skts_model->update($this->input->post('id_skts', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('tbl_skts'));
    }
    

    public function update_action()
    {
        $this->_rules();
        $foto1 = $this->upload_foto1();
        $foto2 = $this->upload_foto2();
        $foto3 = $this->upload_foto3();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_skts', TRUE));
        } else {
            if (($foto1['file_name'] == '')) {
                $data = array(
                    'tgl_input_skts' => $this->input->post('tgl_input_skts', TRUE),
                    'keperluan' => $this->input->post('keperluan', TRUE),
                    'alamat_sementara' => $this->input->post('alamat_sementara', TRUE),
                    'id_penduduk' => $this->input->post('id_penduduk', TRUE),
                );
            } else {
                $data = array(
                    'tgl_input_skts' => $this->input->post('tgl_input_skts', TRUE),
                    'keperluan' => $this->input->post('keperluan', TRUE),
                    'alamat_sementara' => $this->input->post('alamat_sementara', TRUE),
                    'imageskts1' => $foto1['file_name'],
                    'imageskts2' => $foto2['file_name'],
                    'imageskts3' => $foto3['file_name'],
                );
                $this->session->set_userdata('imagebaru1', $foto1['file_name']);
                $this->session->set_userdata('imagebaru2', $foto2['file_name']);
                $this->session->set_userdata('imagebaru3', $foto3['file_name']);
            }

            $this->Tbl_skts_model->update($this->input->post('id_skts', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_skts'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tbl_skts_model->get_by_id($id);

        if ($row) {
            $this->Tbl_skts_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_skts'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_skts'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tgl_input_skts', 'tgl input skts', 'trim|required');
        $this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');
        $this->form_validation->set_rules('alamat_sementara', 'alamat sementara', 'trim|required');
        //$this->form_validation->set_rules('imageskts1', 'imageskts1', 'trim|required');
        //$this->form_validation->set_rules('imageskts2', 'imageskts2', 'trim|required');
        //$this->form_validation->set_rules('imageskts3', 'imageskts3', 'trim|required');
        //$this->form_validation->set_rules('id_penduduk', 'id penduduk', 'trim|required');

        $this->form_validation->set_rules('id_skts', 'id_skts', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_skts.doc");

        $data = array(
            'tbl_skts_data' => $this->Tbl_skts_model->get_all(),
            'start' => 0
        );

        $this->load->view('tbl_skts/tbl_skts_doc', $data);
    }

}

/* End of file Tbl_skts.php */
/* Location: ./application/controllers/Tbl_skts.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-27 11:49:45 */
/* http://harviacode.com */