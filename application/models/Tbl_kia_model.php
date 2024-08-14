<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kia_model extends CI_Model
{

    public $table = 'tbl_kia';
    public $id = 'id_kia';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_kia,a.nama as ayah, b.nama as ibu,c.nama as pemohon,nik_kia,tgl_input_kia,image_kia1,image_kia2,image_kia3,image_kia4,agama_kia,warganegara,dt_penduduk.id_penduduk,dt_penduduk.alamat,dt_penduduk.nik,dt_penduduk.nama,dt_penduduk.stts_perkawinan,dt_penduduk.no_kk,tbl_aktalahir.nama_bayi,tbl_aktalahir.id_aktalahir,tbl_aktalahir.no_akta,tbl_aktalahir.tgl_lahir_bayi,tbl_aktalahir.tempat_lahir_bayi,tbl_aktalahir.jenis_kelamin_bayi,tbl_aktalahir.kelahiran_ke');
        $this->datatables->from('tbl_kia');
        //add this line for join
        $this->datatables->join('dt_penduduk a', 'tbl_kia.id_ayah = a.id_penduduk', 'LEFT');
        $this->datatables->join('dt_penduduk b', 'tbl_kia.id_ibu = b.id_penduduk', 'LEFT');
        $this->datatables->join('dt_penduduk c', 'tbl_kia.id_pemohon = c.id_penduduk', 'LEFT');
        $this->datatables->join('tbl_aktalahir', 'tbl_kia.id_aktalahir = tbl_aktalahir.id_aktalahir');
        $this->datatables->join('dt_penduduk', 'tbl_kia.id_penduduk = dt_penduduk.id_penduduk');
        $this->datatables->add_column('action', anchor(site_url('tbl_kia/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('tbl_kia/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_kia');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_kia,a.nama as ayah, b.nama as ibu,c.nama as pemohon,nik_kia,tgl_input_kia,image_kia1,image_kia2,image_kia3,image_kia4,agama_kia,warganegara,dt_penduduk.id_penduduk,dt_penduduk.alamat,dt_penduduk.nik,dt_penduduk.nama,dt_penduduk.stts_perkawinan,dt_penduduk.no_kk,tbl_aktalahir.nama_bayi,tbl_aktalahir.id_aktalahir,tbl_aktalahir.no_akta,tbl_aktalahir.tgl_lahir_bayi,tbl_aktalahir.tempat_lahir_bayi,tbl_aktalahir.jenis_kelamin_bayi,tbl_aktalahir.kelahiran_ke');
        $this->db->join('dt_penduduk a', 'tbl_kia.id_ayah = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_kia.id_ibu = b.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk c', 'tbl_kia.id_pemohon = c.id_penduduk', 'LEFT');
        $this->db->join('tbl_aktalahir', 'tbl_kia.id_aktalahir = tbl_aktalahir.id_aktalahir');
        $this->datatables->join('dt_penduduk', 'tbl_kia.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_bulan($bulan,$tahun)
    {
        $this->db->select('id_kia,a.nama as ayah, b.nama as ibu,c.nama as pemohon,nik_kia,tgl_input_kia,image_kia1,image_kia2,image_kia3,image_kia4,agama_kia,warganegara,dt_penduduk.id_penduduk,dt_penduduk.alamat,dt_penduduk.nik,dt_penduduk.nama,dt_penduduk.stts_perkawinan,dt_penduduk.no_kk,tbl_aktalahir.nama_bayi,tbl_aktalahir.id_aktalahir,tbl_aktalahir.no_akta,tbl_aktalahir.tgl_lahir_bayi,tbl_aktalahir.tempat_lahir_bayi,tbl_aktalahir.jenis_kelamin_bayi,tbl_aktalahir.kelahiran_ke');
        $this->db->join('dt_penduduk a', 'tbl_kia.id_ayah = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_kia.id_ibu = b.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk c', 'tbl_kia.id_pemohon = c.id_penduduk', 'LEFT');
        $this->db->join('tbl_aktalahir', 'tbl_kia.id_aktalahir = tbl_aktalahir.id_aktalahir');
        $this->datatables->join('dt_penduduk', 'tbl_kia.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->where('MONTH(tgl_input_kia)', $bulan);
        $this->db->where('YEAR(tgl_input_kia)', $tahun);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }



    // get data by id
    function get_by_id($id)
    {
        $this->datatables->select('id_kia,a.nama as ayah, b.nama as ibu,c.nama as pemohon,nik_kia,tgl_input_kia,image_kia1,image_kia2,image_kia3,image_kia4,agama_kia,warganegara,dt_penduduk.id_penduduk,dt_penduduk.alamat,dt_penduduk.nik,dt_penduduk.nama,dt_penduduk.stts_perkawinan,dt_penduduk.no_kk,tbl_aktalahir.nama_bayi,tbl_aktalahir.id_aktalahir,tbl_aktalahir.no_akta,tbl_aktalahir.tgl_lahir_bayi,tbl_aktalahir.tempat_lahir_bayi,tbl_aktalahir.jenis_kelamin_bayi,tbl_aktalahir.kelahiran_ke');
        $this->datatables->join('dt_penduduk a', 'tbl_kia.id_ayah = a.id_penduduk', 'LEFT');
        $this->datatables->join('dt_penduduk b', 'tbl_kia.id_ibu = b.id_penduduk', 'LEFT');
        $this->datatables->join('dt_penduduk c', 'tbl_kia.id_pemohon = c.id_penduduk', 'LEFT');
        $this->db->join('tbl_aktalahir', 'tbl_kia.id_aktalahir = tbl_aktalahir.id_aktalahir');
        $this->datatables->join('dt_penduduk', 'tbl_kia.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kia', $q);
        $this->db->like('id_ayah', $q);
        $this->db->like('id_ibu', $q);
        $this->db->like('id_pemohon', $q);
	$this->db->or_like('tgl_input_kia', $q);
	$this->db->or_like('image_kia1', $q);
	$this->db->or_like('image_kia2', $q);
	$this->db->or_like('image_kia3', $q);
	$this->db->or_like('image_kia4', $q);
	$this->db->or_like('id_penduduk', $q);
	$this->db->or_like('id_aktalahir', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kia', $q);
        $this->db->like('id_ayah', $q);
        $this->db->like('id_ibu', $q);
        $this->db->like('id_pemohon', $q);
	$this->db->or_like('tgl_input_kia', $q);
	$this->db->or_like('image_kia1', $q);
	$this->db->or_like('image_kia2', $q);
	$this->db->or_like('image_kia3', $q);
	$this->db->or_like('image_kia4', $q);
	$this->db->or_like('id_penduduk', $q);
	$this->db->or_like('id_aktalahir', $q);
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

/* End of file Tbl_kia_model.php */
/* Location: ./application/models/Tbl_kia_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-27 09:23:50 */
/* http://harviacode.com */