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
    $this->db->from('tb_siswa');
    $this->db->where('NIS', $username);
    $this->db->where('PASSWORD', $password);
    $query = $this->db->get();
    
    return $query->row();
  } 
  
  public function dataPengguna($username)
  {
   $this->db->select('*');
   $this->db->where('NIS', $username);
   $query = $this->db->get('tb_siswa');
   
   return $query->row();
  } 
}
?>