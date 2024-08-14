<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_aktalahir_model extends CI_Model
{

    public $table = 'tbl_aktalahir';
    public $id = 'id_aktalahir';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('tbl_aktalahir.id_aktalahir,a.nama as ayah, b.nama as mama,id_papa,id_mama,tgl_input,no_akta,nama_bayi,jenis_kelamin_bayi,tempat_lahir_bayi,tgl_lahir_bayi,jam,berat_bayi,kelahiran_ke,penolong_kelahiran,status,imagebaru1,imagebaru2,imagebaru3,imagebaru4,dt_penduduk.id_penduduk,dt_penduduk.nama,dt_penduduk.no_kk,dt_penduduk.nik');
        $this->datatables->from('tbl_aktalahir');
        //add this line for join
        $this->datatables->join('dt_penduduk', 'tbl_aktalahir.id_penduduk = dt_penduduk.id_penduduk');
        $this->datatables->join('dt_penduduk a', 'tbl_aktalahir.id_papa = a.id_penduduk', 'LEFT');
        $this->datatables->join('dt_penduduk b', 'tbl_aktalahir.id_mama = b.id_penduduk', 'LEFT');
        $this->datatables->add_column('action', anchor(site_url('tbl_aktalahir/read/$1'),'<i class="fa fa-print" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ". anchor(site_url('tbl_aktalahir/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('tbl_aktalahir/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_aktalahir');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('tbl_aktalahir.id_aktalahir,a.nama as ayah, b.nama as mama,id_papa,id_mama,tgl_input,no_akta,nama_bayi,jenis_kelamin_bayi,tempat_lahir_bayi,tgl_lahir_bayi,jam,berat_bayi,kelahiran_ke,penolong_kelahiran,status,imagebaru1,imagebaru2,imagebaru3,imagebaru4,dt_penduduk.id_penduduk,dt_penduduk.nama,dt_penduduk.no_kk,dt_penduduk.nik');
        $this->db->join('dt_penduduk', 'tbl_aktalahir.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->join('dt_penduduk a', 'tbl_aktalahir.id_papa = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_aktalahir.id_mama = b.id_penduduk', 'LEFT');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_bulan($bulan,$tahun)
    {
        $this->db->select('tbl_aktalahir.id_aktalahir,a.nama as ayah, b.nama as mama,id_papa,id_mama,tgl_input,no_akta,nama_bayi,jenis_kelamin_bayi,tempat_lahir_bayi,tgl_lahir_bayi,jam,berat_bayi,kelahiran_ke,penolong_kelahiran,status,imagebaru1,imagebaru2,imagebaru3,imagebaru4,dt_penduduk.id_penduduk,dt_penduduk.nama,dt_penduduk.no_kk,dt_penduduk.nik');
        $this->db->join('dt_penduduk', 'tbl_aktalahir.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->join('dt_penduduk a', 'tbl_aktalahir.id_papa = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_aktalahir.id_mama = b.id_penduduk', 'LEFT');
        $this->db->where('MONTH(tgl_input)', $bulan);
        $this->db->where('YEAR(tgl_input)', $tahun);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->datatables->select('tbl_aktalahir.id_aktalahir,a.nama as ayah, b.nama as mama,id_papa,id_mama,tgl_input,no_akta,nama_bayi,jenis_kelamin_bayi,tempat_lahir_bayi,tgl_lahir_bayi,jam,berat_bayi,kelahiran_ke,penolong_kelahiran,status,imagebaru1,imagebaru2,imagebaru3,imagebaru4,dt_penduduk.id_penduduk,dt_penduduk.nama,dt_penduduk.no_kk,dt_penduduk.nik');
        $this->datatables->join('dt_penduduk', 'tbl_aktalahir.id_penduduk = dt_penduduk.id_penduduk');
        $this->datatables->join('dt_penduduk a', 'tbl_aktalahir.id_papa = a.id_penduduk', 'LEFT');
        $this->datatables->join('dt_penduduk b', 'tbl_aktalahir.id_mama = b.id_penduduk', 'LEFT');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_aktalahir', $q);
	$this->db->or_like('tgl_input', $q);
	$this->db->or_like('no_akta', $q);
	$this->db->or_like('nama_bayi', $q);
	$this->db->or_like('jenis_kelamin_bayi', $q);
	$this->db->or_like('tempat_lahir_bayi', $q);
	$this->db->or_like('tgl_lahir_bayi', $q);
	$this->db->or_like('jam', $q);
	$this->db->or_like('berat_bayi', $q);
	$this->db->or_like('kelahiran_ke', $q);
	$this->db->or_like('penolong_kelahiran', $q);
	$this->db->or_like('imagebaru1', $q);
    $this->db->or_like('imagebaru2', $q);
    $this->db->or_like('imagebaru3', $q);
    $this->db->or_like('imagebaru4', $q);
    $this->db->or_like('id_penduduk', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_aktalahir', $q);
	$this->db->or_like('tgl_input', $q);
	$this->db->or_like('no_akta', $q);
	$this->db->or_like('nama_bayi', $q);
	$this->db->or_like('jenis_kelamin_bayi', $q);
	$this->db->or_like('tempat_lahir_bayi', $q);
	$this->db->or_like('tgl_lahir_bayi', $q);
	$this->db->or_like('jam', $q);
	$this->db->or_like('berat_bayi', $q);
	$this->db->or_like('kelahiran_ke', $q);
	$this->db->or_like('penolong_kelahiran', $q);
    $this->db->or_like('imagebaru1', $q);
    $this->db->or_like('imagebaru2', $q);
    $this->db->or_like('imagebaru3', $q);
    $this->db->or_like('imagebaru4', $q);
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

/* End of file Tbl_aktalahir_model.php */
/* Location: ./application/models/Tbl_aktalahir_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-25 08:17:48 */
/* http://harviacode.com */