<?php

class Model_admin extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function cekPassword($passlama)
	{
		return $this->db->get_where('a_admin', array('PASSWORD' => $passlama))->row();
    }
    
    function updatePassword($where,$data,$table){
		$this->db->where($where);
        $this->db->update($table,$data);
        //$this->db->query("UPDATE `a_admin` SET `PASSWORD` = '$passlama'  WHERE ID='$username'");
	}
	
}
?>