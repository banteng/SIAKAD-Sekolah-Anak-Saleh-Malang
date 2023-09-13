<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_guru extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  
 function getMatpel($tahun, $user)
  {
    return $this->db->get_where('view_matpel', array('PENGAJAR'=>$user, 'TAHUN_AKTIF' =>$tahun))->result();
  }

  public function getSiswaMatpel($kelas){
    $this->db->select('*');
    $this->db->from('view_siswa');
    $this->db->like('kelas',$kelas);
    return $this->db->get()->result();
  }

  
  public function getAllSiswa()
  {
        return $this->db->get('view_siswa')->result();
  }

     public function geSiswa($id)
  {
        return $this->db->get_where('view_siswa', array('WALI_KELAS' => $id))->result();
  }


  public function getSiswaById($id)
  {
        return $this->db->get_where('tb_kelas', array('WALI_KELAS' => $id))->result();
  }

  public function getSiswaID($id)
  {
        return $this->db->get_where('tb_siswa', array('NIS' => $id))->row();
  }

  public function getSiswa($id)
  {
        return $this->db->get_where('view_enroll_kelas', array('WALI_KELAS' => $id))->result();
  }
  
  function pengumuman($id)
{
	$query = $this->db->get('pengumuman');
	return $query->result();
}
function getPengumumanById($id)
{
	return $this->db->get_where('view_pengumuman', array('ID' => $id))->row();
}
function setPengumuman($table, $data)
 	{   
		$this->db->insert($table, $data);
  }
  
  function getPengumumanByUser($id)
{
  return $this->db->get_where('pengumuman', array('ID_PENGIRIM' => $id))->result();
}
    
  function getPengumumanSiswa($id)
{
  return $this->db->get_where('pengumuman', array('SISWA' => $id))->result();
}
function getAllPengumuman()
{
  return $this->db->get('view_pengumuman2')->result();
}

public function getEnrollKelas($id)
  {
        return $this->db->get_where('view_enroll_kelas', array('WALI_KELAS' => $id))->result();
  }
    
      public function getGuru($id)
  {
        return $this->db->get_where('tb_kelas', array('WALI_KELAS' => $id))->result();
  }
    
    function countAllKelas($id)
    {
        $query = $this->db->query('SELECT * FROM view_kelas WHERE `WALI_KELAS`='.$id);
        return $query->num_rows();
    }
    
     function countAllSiswaKelas($id)
    {
        $query = $this->db->query('SELECT * FROM view_enroll_kelas WHERE `WALI_KELAS`='.$id);
        return $query->num_rows();
    }
    
    public function cekPassword($passlama)
	{
		return $this->db->get_where('a_user', array('PASSWORD' => $passlama))->row();
    }
    
    function updatePassword($where,$data,$table){
		$this->db->where($where);
        $this->db->update($table,$data);
        //$this->db->query("UPDATE `a_admin` SET `PASSWORD` = '$passlama'  WHERE ID='$username'");
	}
	
}
?>