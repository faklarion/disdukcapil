<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_perceraian_model extends CI_Model
{

    public $table = 'tbl_perceraian';
    public $id = 'id_perceraian';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_perceraian,a.nama as namasuami, b.nama as namaistri,tgl_input_cerai,ayah_laki,ibu_laki,ayah_wanita,ibu_wanita,tgl_perkawinan,tgl_perceraian,penyebab_cerai,negara_laki,negara_istri,imagecerai1,imagecerai2,imagecerai3,dt_penduduk.id_penduduk,dt_penduduk.nik,dt_penduduk.no_kk,dt_penduduk.tempat_lahir,dt_penduduk.nama,dt_penduduk.tgl_lahir,dt_penduduk.agama,dt_penduduk.pekerjaan,dt_penduduk.pendidikan,dt_penduduk.alamat');
        $this->datatables->from('tbl_perceraian');
        //add this line for join
        $this->datatables->join('dt_penduduk a', 'tbl_perceraian.id_cerai_suami = a.id_penduduk', 'LEFT');
        $this->datatables->join('dt_penduduk b', 'tbl_perceraian.id_cerai_istri = b.id_penduduk', 'LEFT');
        $this->datatables->join('dt_penduduk', 'tbl_perceraian.id_penduduk = dt_penduduk.id_penduduk');

        $this->datatables->add_column('action', anchor(site_url('tbl_perceraian/read/$1'),'<i class="fa fa-print" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('tbl_perceraian/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('tbl_perceraian/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_perceraian');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_perceraian,a.nama as namasuami, b.nama as namaistri,tgl_input_cerai,ayah_laki,ibu_laki,ayah_wanita,ibu_wanita,tgl_perkawinan,tgl_perceraian,penyebab_cerai,negara_laki,negara_istri,imagecerai1,imagecerai2,imagecerai3,dt_penduduk.id_penduduk,dt_penduduk.nik,dt_penduduk.no_kk,dt_penduduk.tempat_lahir,dt_penduduk.nama,dt_penduduk.tgl_lahir,dt_penduduk.agama,dt_penduduk.pekerjaan,dt_penduduk.pendidikan,dt_penduduk.alamat');
        $this->db->join('dt_penduduk a', 'tbl_perceraian.id_cerai_suami = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_perceraian.id_cerai_istri = b.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk', 'tbl_perceraian.id_penduduk = dt_penduduk.id_penduduk');

        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_bulan($bulan,$tahun)
    {
        $this->db->select('id_perceraian,a.nama as namasuami, b.nama as namaistri,tgl_input_cerai,ayah_laki,ibu_laki,ayah_wanita,ibu_wanita,tgl_perkawinan,tgl_perceraian,penyebab_cerai,negara_laki,negara_istri,imagecerai1,imagecerai2,imagecerai3,dt_penduduk.id_penduduk,dt_penduduk.nik,dt_penduduk.no_kk,dt_penduduk.tempat_lahir,dt_penduduk.nama,dt_penduduk.tgl_lahir,dt_penduduk.agama,dt_penduduk.pekerjaan,dt_penduduk.pendidikan,dt_penduduk.alamat');
        $this->db->join('dt_penduduk a', 'tbl_perceraian.id_cerai_suami = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_perceraian.id_cerai_istri = b.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk', 'tbl_perceraian.id_penduduk = dt_penduduk.id_penduduk');
        $this->db->where('MONTH(tgl_input_cerai)', $bulan);
        $this->db->where('YEAR(tgl_input_cerai)', $tahun);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->select('id_perceraian,a.nama as namasuami, b.nama as namaistri,tgl_input_cerai,ayah_laki,ibu_laki,ayah_wanita,ibu_wanita,tgl_perkawinan,tgl_perceraian,penyebab_cerai,negara_laki,negara_istri,imagecerai1,imagecerai2,imagecerai3,dt_penduduk.id_penduduk,dt_penduduk.nik,dt_penduduk.no_kk,dt_penduduk.tempat_lahir,dt_penduduk.nama,dt_penduduk.tgl_lahir,dt_penduduk.agama,dt_penduduk.pekerjaan,dt_penduduk.pendidikan,dt_penduduk.alamat');
        $this->db->join('dt_penduduk a', 'tbl_perceraian.id_cerai_suami = a.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk b', 'tbl_perceraian.id_cerai_istri = b.id_penduduk', 'LEFT');
        $this->db->join('dt_penduduk', 'tbl_perceraian.id_penduduk = dt_penduduk.id_penduduk');

        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_perceraian', $q);
        $this->db->like('id_cerai_suami', $q);
        $this->db->like('id_cerai_istri', $q);
        $this->db->or_like('tgl_input_cerai', $q);
        $this->db->or_like('ayah_laki', $q);
        $this->db->or_like('ibu_laki', $q);
        $this->db->or_like('ayah_wanita', $q);
        $this->db->or_like('ibu_wanita', $q);
        $this->db->or_like('tgl_perkawinan', $q);
        $this->db->or_like('tgl_perceraian', $q);
        $this->db->or_like('penyebab_cerai', $q);
        $this->db->or_like('id_penduduk', $q);
        $this->db->or_like('negara_laki', $q);
        $this->db->or_like('negara_istri', $q);
        $this->db->or_like('imagecerai1', $q);
        $this->db->or_like('imagecerai2', $q);
        $this->db->or_like('imagecerai3', $q);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_perceraian', $q);
        $this->db->like('id_cerai_suami', $q);
        $this->db->like('id_cerai_istri', $q);
        $this->db->or_like('tgl_input_cerai', $q);
        $this->db->or_like('ayah_laki', $q);
        $this->db->or_like('ibu_laki', $q);
        $this->db->or_like('ayah_wanita', $q);
        $this->db->or_like('ibu_wanita', $q);
        $this->db->or_like('tgl_perkawinan', $q);
        $this->db->or_like('tgl_perceraian', $q);
        $this->db->or_like('penyebab_cerai', $q);
        $this->db->or_like('id_penduduk', $q);
        $this->db->or_like('negara_laki', $q);
        $this->db->or_like('negara_istri', $q);
        $this->db->or_like('imagecerai1', $q);
        $this->db->or_like('imagecerai2', $q);
        $this->db->or_like('imagecerai3', $q);
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

/* End of file Tbl_perceraian_model.php */
/* Location: ./application/models/Tbl_perceraian_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-28 15:27:13 */
/* http://harviacode.com */