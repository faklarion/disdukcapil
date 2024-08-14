<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kematian_model extends CI_Model
{

    public $table = 'tbl_kematian';
    public $id = 'id_kematian';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_kematian,a.nama as pemohon, b.nama as meninggal,tgl_input_kematian,tgl_kematian,penyebab_kematian,tempat_kematian,imagekematian1,imagekematian2,imagekematian3,imagekematian4,si_pemohon,id_meninggal,dt_penduduk.id_penduduk,dt_penduduk.nama,dt_penduduk.no_kk,dt_penduduk.tgl_lahir,dt_penduduk.tempat_lahir,dt_penduduk.jenis_kelamin,dt_penduduk.alamat,dt_penduduk.agama,dt_penduduk.pekerjaan');
        $this->datatables->from('tbl_kematian');
        //add this line for join
        $this->datatables->join('dt_penduduk', 'tbl_kematian.id_penduduk = dt_penduduk.id_penduduk');
        $this->datatables->join('dt_penduduk a', 'tbl_kematian.si_pemohon = a.id_penduduk', 'LEFT');
        $this->datatables->join('dt_penduduk b', 'tbl_kematian.id_meninggal = b.id_penduduk', 'LEFT');
        
        $this->datatables->add_column('action', anchor(site_url('tbl_kematian/read/$1'),'<i class="fa fa-print" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))."  
        ".anchor(site_url('tbl_kematian/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('tbl_kematian/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_kematian');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_kematian,a.nama as pemohon, b.nama as meninggal,tgl_input_kematian,tgl_kematian,penyebab_kematian,tempat_kematian,imagekematian1,imagekematian2,imagekematian3,imagekematian4,si_pemohon,id_meninggal,dt_penduduk.id_penduduk,dt_penduduk.nama,dt_penduduk.no_kk,dt_penduduk.tgl_lahir,dt_penduduk.tempat_lahir,dt_penduduk.jenis_kelamin,dt_penduduk.alamat,dt_penduduk.agama,dt_penduduk.pekerjaan,dt_penduduk.nik');
        $this->db->join('dt_penduduk', 'tbl_kematian.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->join('dt_penduduk a', 'tbl_kematian.si_pemohon = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_kematian.id_meninggal = b.id_penduduk', 'LEFT');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_bulan($bulan,$tahun)
    {
        $this->db->select('id_kematian,a.nama as pemohon, b.nama as meninggal, tgl_input_kematian,tgl_kematian,penyebab_kematian,tempat_kematian,imagekematian1,imagekematian2,imagekematian3,imagekematian4,si_pemohon,id_meninggal,dt_penduduk.id_penduduk,dt_penduduk.nama,dt_penduduk.no_kk,dt_penduduk.tgl_lahir,dt_penduduk.tempat_lahir,dt_penduduk.jenis_kelamin,dt_penduduk.alamat,dt_penduduk.agama,dt_penduduk.pekerjaan,dt_penduduk.nik');
        $this->db->join('dt_penduduk', 'tbl_kematian.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->join('dt_penduduk a', 'tbl_kematian.si_pemohon = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_kematian.id_meninggal = b.id_penduduk', 'LEFT');
        $this->db->where('MONTH(tgl_input_kematian)', $bulan);
        $this->db->where('YEAR(tgl_input_kematian)', $tahun);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->select('id_kematian,a.nama as pemohon, b.nama as meninggal,tgl_input_kematian,tgl_kematian,penyebab_kematian,tempat_kematian,imagekematian1,imagekematian2,imagekematian3,imagekematian4,si_pemohon,id_meninggal,dt_penduduk.id_penduduk,dt_penduduk.nama,dt_penduduk.no_kk,dt_penduduk.tgl_lahir,dt_penduduk.tempat_lahir,dt_penduduk.jenis_kelamin,dt_penduduk.alamat,dt_penduduk.agama,dt_penduduk.pekerjaan');
    
        //add this line for join
        $this->db->join('dt_penduduk', 'tbl_kematian.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->join('dt_penduduk a', 'tbl_kematian.si_pemohon = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_kematian.id_meninggal = b.id_penduduk', 'LEFT');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kematian', $q);
	$this->db->or_like('tgl_input_kematian', $q);
	$this->db->or_like('tgl_kematian', $q);
	$this->db->or_like('penyebab_kematian', $q);
	$this->db->or_like('tempat_kematian', $q);
	$this->db->or_like('imagekematian1', $q);
	$this->db->or_like('imagekematian2', $q);
	$this->db->or_like('imagekematian3', $q);
	$this->db->or_like('imagekematian4', $q);
	$this->db->or_like('id_penduduk', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kematian', $q);
	$this->db->or_like('tgl_input_kematian', $q);
	$this->db->or_like('tgl_kematian', $q);
	$this->db->or_like('penyebab_kematian', $q);
	$this->db->or_like('tempat_kematian', $q);
	$this->db->or_like('imagekematian1', $q);
	$this->db->or_like('imagekematian2', $q);
	$this->db->or_like('imagekematian3', $q);
	$this->db->or_like('imagekematian4', $q);
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

/* End of file Tbl_kematian_model.php */
/* Location: ./application/models/Tbl_kematian_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-26 15:15:13 */
/* http://harviacode.com */