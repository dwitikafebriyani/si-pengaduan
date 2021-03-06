<?php
/*
 * Generated by CRUDigniter v3.0 Beta
 * www.crudigniter.com
 */

class Riwayat_jabatan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_ketua_rt($idrt)
    {
      $this->db->select('*');

      $this->db->from('penduduk');

      $this->db->join('riwayat_alamat', 'penduduk.id_pdk = riwayat_alamat.id_pdk');
      $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
      $this->db->join('riwayat_jabatan', 'penduduk.id_pdk = riwayat_jabatan.id_pdk');
      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');

      $this->db->where('riwayat_jabatan.stts_rj', 'aktif');
      $this->db->where('jabatan.nama_j', 'rt'); // ID JABATAN
      $this->db->where('rt.id_rt', $idrt);

      return $this->db->get()->row_array();

    }

    function get_jabatan_penduduk($id_pdk)
    {
      $this->db->select('*');
      $this->db->from('riwayat_jabatan');

      $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
      $this->db->where('riwayat_jabatan.stts_rj', 'aktif');
      $this->db->where('riwayat_jabatan.id_pdk', $id_pdk);
      return $this->db->get()->row_array();
    }

    /*
     * Get riwayat_jabatan by id_riwayat_jabatan
     */
    function get_riwayat_jabatan($id_riwayat_jabatan)
    {
        return $this->db->get_where('riwayat_jabatan',array('id_riwayat_jabatan'=>$id_riwayat_jabatan))->row_array();
    }

    function get_riwayat_jabatan_pdk($id_pdk)
    {
        return $this->db->get_where('riwayat_jabatan',array('id_pdk'=>$id_pdk, 'stts_rj'=>'aktif'))->row_array();
    }

    /*
     * Get all riwayat_jabatan
     */
    function get_all_riwayat_jabatan()
    {
        return $this->db->get('riwayat_jabatan')->result_array();
    }

    /*
     * function to add new riwayat_jabatan
     */
    function add_riwayat_jabatan($params)
    {
        $this->db->insert('riwayat_jabatan',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update riwayat_jabatan
     */
    function update_riwayat_jabatan($id_riwayat_jabatan,$params)
    {
        $this->db->where('id_rj',$id_riwayat_jabatan);
        $response = $this->db->update('riwayat_jabatan',$params);
        if($response)
        {
            return "riwayat_jabatan updated successfully";
        }
        else
        {
            return "Error occuring while updating riwayat_jabatan";
        }
    }

    /*
     * function to delete riwayat_jabatan
     */
    function delete_riwayat_jabatan($id_riwayat_jabatan)
    {
        $response = $this->db->delete('riwayat_jabatan',array('id_riwayat_jabatan'=>$id_riwayat_jabatan));
        if($response)
        {
            return "riwayat_jabatan deleted successfully";
        }
        else
        {
            return "Error occuring while deleting riwayat_jabatan";
        }
    }
}
