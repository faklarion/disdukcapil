<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_pindah_model extends CI_Model
{

    public $table = 'tbl_pindah';
    public $id = 'id_pindah';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_pindah,full_name,tbl_pindah.id_users,status,keterangan,tgl_input_pindah,klasifikasi_pindah,alamat_pindah,alasan_pindah,imagepindah1,imagepindah2,dt_penduduk.id_penduduk,nama,no_kk,nik,jenis_kelamin,tgl_lahir,tempat_lahir,alamat');
        $this->datatables->from('tbl_pindah');
        //add this line for join
        $this->datatables->join('dt_penduduk', 'tbl_pindah.id_penduduk = dt_penduduk.id_penduduk');

        $this->datatables->join('tbl_user', 'tbl_pindah.id_users = tbl_user.id_users', 'LEFT');
        if($this->session->userdata('id_user_level') == 2) {
            $this->datatables->where('tbl_pindah.id_users', $this->session->userdata('id_users'));
            $this->datatables->add_column('action', anchor(site_url('tbl_pindah/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('tbl_pindah/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pindah');
        } else {
            $this->datatables->add_column('action', anchor(site_url('tbl_pindah/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . " 
            ". anchor(site_url('tbl_pindah/status/$1'), '<i class="fa fa-check" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('tbl_pindah/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pindah');
        }
    
       
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('*, id_pindah,status,keterangan,tgl_input_pindah,klasifikasi_pindah,alamat_pindah,alasan_pindah,imagepindah1,imagepindah2,dt_penduduk.id_penduduk,nama,no_kk,nik,jenis_kelamin,tgl_lahir,tempat_lahir,alamat');
        $this->db->join('dt_penduduk', 'tbl_pindah.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    function get_all_bulan($bulan, $tahun)
    {
        $this->db->select('id_pindah,status,keterangan,tgl_input_pindah,klasifikasi_pindah,alamat_pindah,alasan_pindah,imagepindah1,imagepindah2,dt_penduduk.id_penduduk,nama,no_kk,nik,jenis_kelamin,tgl_lahir,tempat_lahir,alamat');
        $this->db->join('dt_penduduk', 'tbl_pindah.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->where('MONTH(tgl_input_pindah)', $bulan);
        $this->db->where('YEAR(tgl_input_pindah)', $tahun);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }



    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*, id_pindah,status,keterangan,tgl_input_pindah,klasifikasi_pindah,alamat_pindah,alasan_pindah,imagepindah1,imagepindah2,dt_penduduk.id_penduduk,nama,no_kk,nik,jenis_kelamin,tgl_lahir,tempat_lahir,alamat');
        $this->db->join('dt_penduduk', 'tbl_pindah.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_pindah', $q);
        $this->db->or_like('tgl_input_pindah', $q);
        $this->db->or_like('klasifikasi_pindah', $q);
        $this->db->or_like('alamat_pindah', $q);
        $this->db->or_like('alasan_pindah', $q);
        $this->db->or_like('id_penduduk', $q);
        $this->db->or_like('imagepindah1', $q);
        $this->db->or_like('imagepindah2', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pindah', $q);
        $this->db->or_like('tgl_input_pindah', $q);
        $this->db->or_like('klasifikasi_pindah', $q);
        $this->db->or_like('alamat_pindah', $q);
        $this->db->or_like('alasan_pindah', $q);
        $this->db->or_like('id_penduduk', $q);
        $this->db->or_like('imagepindah1', $q);
        $this->db->or_like('imagepindah2', $q);
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

/* End of file Tbl_pindah_model.php */
/* Location: ./application/models/Tbl_pindah_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-27 08:25:48 */
/* http://harviacode.com */