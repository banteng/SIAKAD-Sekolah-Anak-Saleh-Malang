<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_login extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  
  public function ambilPengguna($username, $password)
  {
    $this->db->select('*');
    $this->db->from('tb_pegawai');
    $this->db->where('NIP', $username);
    $this->db->where('PASSWORD', $password);
    $query = $this->db->get();
    
    return $query->row();
  }  
  
  public function dataPengguna($username)
  {
   $this->db->select('*');
   $this->db->where('NIP', $username);
   $query = $this->db->get('tb_pegawai');
   
   return $query->row();
  } 
}
?>