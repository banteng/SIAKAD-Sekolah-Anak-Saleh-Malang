<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_siswa extends CI_Model
{
   function __construct()
  {
    parent::__construct();
  }

   function getAbsensi($id)
  {
    return $this->db->get_where('tb_presensi_siswa', array('NIS' => $id))->result();
  } 
  
   function getPembayaran($id, $tahun)
  {
    return $this->db->get_where('tb_pembayaran_spp', array('NIS' => $id, 'TAHUNAKTIF' => $tahun))->result();
  } 

   function getKontakAdmin()
  {
    $query = $this->db->get('a_admin');
	return $query->result();
  } 
   function getKontakWaliKelas()
  {
    $query = $this->db->get('tb_pegawai');
	return $query->result();
  } 
  
  function getPengumumanSiswa($id)
  {
    return $this->db->get_where('view_pengumuman2', array('SISWA' => $id))->result();
  } 

  function getPengumumanKelas($id)
  {
    return $this->db->get_where('view_pengumuman2', array('KELAS' => $id))->result();
  } 
}
?>