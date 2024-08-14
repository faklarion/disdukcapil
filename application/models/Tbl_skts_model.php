<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_skts_model extends CI_Model
{

    public $table = 'tbl_skts';
    public $id = 'id_skts';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_skts,status,keterangan,tgl_input_skts,keperluan,alamat_sementara,imageskts1,imageskts2,imageskts3,dt_penduduk.id_penduduk,nama,nik,no_kk,jenis_kelamin,tempat_lahir,tgl_lahir,pekerjaan,alamat');
        $this->datatables->from('tbl_skts');
        
        //add this line for join
        $this->datatables->join('dt_penduduk', 'tbl_skts.id_penduduk = dt_penduduk.id_penduduk');
        $this->datatables->join('tbl_user', 'tbl_skts.id_users = tbl_user.id_users', 'LEFT');
        if($this->session->userdata('id_user_level') == 2) {
            $this->datatables->where('tbl_skts.id_users', $this->session->userdata('id_users'));
            $this->datatables->add_column('action', anchor(site_url('tbl_skts/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('tbl_skts/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_skts');
        } else {
            $this->datatables->add_column('action', anchor(site_url('tbl_skts/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . " 
            ". anchor(site_url('tbl_skts/status/$1'), '<i class="fa fa-check" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('tbl_skts/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_skts');
        }
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_skts,tgl_input_skts,status,keterangan,keperluan,alamat_sementara,imageskts1,imageskts2,imageskts3,dt_penduduk.id_penduduk,nama,nik,no_kk,jenis_kelamin,tempat_lahir,tgl_lahir,pekerjaan,alamat');
        $this->datatables->join('dt_penduduk', 'tbl_skts.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    function get_all_bulan($bulan,$tahun)
    {
        $this->db->select('id_skts,tgl_input_skts,status,keterangan,keperluan,alamat_sementara,imageskts1,imageskts2,imageskts3,dt_penduduk.id_penduduk,nama,nik,no_kk,jenis_kelamin,tempat_lahir,tgl_lahir,pekerjaan,alamat');
        $this->datatables->join('dt_penduduk', 'tbl_skts.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->where('MONTH(tgl_input_skts)', $bulan);
        $this->db->where('YEAR(tgl_input_skts)', $tahun);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('dt_penduduk', 'tbl_skts.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_skts', $q);
        $this->db->or_like('tgl_input_skts', $q);
        $this->db->or_like('keperluan', $q);
        $this->db->or_like('alamat_sementara', $q);
        $this->db->or_like('imageskts1', $q);
        $this->db->or_like('imageskts2', $q);
        $this->db->or_like('imageskts3', $q);
        $this->db->or_like('id_penduduk', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_skts', $q);
        $this->db->or_like('tgl_input_skts', $q);
        $this->db->or_like('keperluan', $q);
        $this->db->or_like('alamat_sementara', $q);
        $this->db->or_like('imageskts1', $q);
        $this->db->or_like('imageskts2', $q);
        $this->db->or_like('imageskts3', $q);
        $this->db->or_like('id_penduduk', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tbl_skts_model.php */
/* Location: ./application/models/Tbl_skts_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-27 11:49:45 */
/* http://harviacode.com */