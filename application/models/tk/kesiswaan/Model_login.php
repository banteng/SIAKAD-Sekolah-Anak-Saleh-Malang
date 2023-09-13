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
    $this->db->from('a_user');
    $this->db->where('USERNAME', $username);
    $this->db->where('PASSWORD', $password);
    $query = $this->db->get();
    
    return $query->row();
  } 
  
  public function dataPengguna($username)
  {
   $this->db->select('USERNAME');
   $this->db->select('USERNAME');
   $this->db->where('USERNAME', $username);
   $query = $this->db->get('a_user');
   
   return $query->row();
  } 
}
?>