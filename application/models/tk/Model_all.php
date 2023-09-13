<?php

class Model_all extends CI_Model
{
    var $table = 'view_siswa1';
	var $column_order = array(null, 'NIS','NISN','NAMA_SISWA','NAMA_KELAS','JENIS_KELAMIN'); 
    var $order = array('ID_KELAS' => 'asc'); // default order 

	public function __construct()
	{
		$this->load->database();
	}

	public function getTahunAktif()
	{
		return $this->db->get_where('tb_tahun_aktif', array('STATUS' => 1, 'LEVEL' => "TK"))->row();
	}

	
	/*function updateTahunAjaran($tahun,$semster){
		$this->db->query("UPDATE `tb_tahun_aktif` SET `TAHUN` = '$tahun' AND `SEMESTER` ='$semster' WHERE ID='1'");
	}*/
    
    function LogAuth($id)
    {
	 return $this->db->query("SELECT * FROM `log_auth` WHERE LOG_USER = '".$id."' ORDER BY LOG_TIME ASC LIMIT 10")->result();
    }

	function updateTahunAjaran($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function getCMS()
	{
		$query = $this->db->get('cms');
		return $query->row();
	}

	function setCMS($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function getSettingIP()
	{
		$query = $this->db->get('tb_setting_fingerprint');
		return $query->row();
	}

	function setIP($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}


//START MODEL SISWA
	public function getAllSiswa()
	{
		$query = $this->db->get_where('view_siswa1', array('LEVEL' => "TK"));
		return $query->result();
	}
    
      public function getSiswaByKelas($kelas)
	{
		$query = $this->db->get_where('view_siswa1', array('ID_KELAS' => $kelas,'LEVEL' => "TK"));
		return $query->result();
	}

	public function getAllKelas()
	{
		$query = $this->db->get('tb_kelas');
		return $query->result();
	}
    
    public function getAllKelasTK()
	{
		$query = $this->db->get_where('tb_kelas', array('LEVEL' => "TK"));
		return $query->result();
	}

	function setSiswa($table, $data)
 	{   
		$this->db->insert($table, $data);
	}

	function setEnrollKelasSiswa($table, $data)
 	{   
		$this->db->insert($table, $data);
	}


	public function getSiswaById($id)
    {
        return $this->db->get_where('tb_siswa', array('NIS' => $id))->row();
	}
	
	function updateSiswa($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function deleteSiswa($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function deleteEnrollSiswa($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function deleteEnrollSPP($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function deleteEnrollKelas($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function deleteUser($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

// END MODEL SISWA

// START MODEL PEGAWAI
public function getAllPegawai()
	{
		$query = $this->db->get_where('view_pegawai1', array('LEVEL' => "SD"));
		return $query->result();
	}

	public function getAllStatusPeg()
	{
		$query = $this->db->get('tb_status_kepegawaian');
		return $query->result();
	}

    public function setStatusPeg($table, $data)
	{
		$this->db->insert($table, $data);
	}
    
	function setPegawai($table, $data)
 	{   
		$this->db->insert($table, $data);
	}

	public function getPegawaiById($id)
    {
        return $this->db->get_where('tb_pegawai', array('NIP' => $id))->row();
	}
	
	function updatePegawai($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function deletePegawai($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
//END MODEL PEGAWAI


// START MODEL KELAS
	function getViewAllKelas()
	{
		$query = $this->db->get_where('view_kelas1', array('LEVEL' => "TK"));
		return $query->result();
	}

	function setKelas($table, $data)
 	{   
		$this->db->insert($table, $data);
	}

	public function getKelasById($id)
    {
        //return $this->db->get_where('tb_kelas', array('ID' => $id, 'TAHUN_AKTIF' => $tahun))->row();
        return $this->db->get_where('tb_kelas', array('ID' => $id))->row();
	}

	public function getEnrollKelas($id, $tahun)
    {
        return $this->db->get_where('view_enroll_kelas', array('ID_KELAS' => $id, 'TAHUN_AKTIF' => $tahun))->result();
	}
	
	function updateKelas($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function deleteKelas($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
//END MODEL KELAS

//START MODEL PRESENSI
function getViewAllPresensiSiswa()
{
	$query = $this->db->get('view_presensi_siswa');
	return $query->result();
}

function getViewAllPresensiPegawai()
{
	$query = $this->db->get('view_presensi_pegawai');
	return $query->result();
}

function cekPresensiSiswa($id)
{
	return $this->db->get_where('tb_presensi_siswa', array('NIS' => $id))->row();
}

function setPresensi($table, $data)
 	{   
		$this->db->insert($table, $data);
	}
	
function setPresensiManual($table, $data)
 	{   
		$this->db->insert($table, $data);
	}

	function updatePresensiManual($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}


//END MODEL PRESENSI 

//START MODEL PENGUMUMAN
function getPengumuman()
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
//END MODEL PENGUMUMAN

//START MODEL PEMBAYARAN
function setPembayaranLain($table, $data)
 	{   
		$this->db->insert($table, $data);
	}
function getAllPembayaranLain()
{
	$query = $this->db->get('tb_pembayaran_lain');
	return $query->result();
}
    
function getTagihanSPPByID($id)
{
	return $this->db->get_where('view_enroll_spp_2', array('NIS' => $id))->row();
}

function cekSPP($id, $bulan)
{
	return $this->db->get_where('view_pembayaran', array('NIS' => $id, 'BULAN' => $bulan))->row();
}
    
public function LaporanPembayaran($tahun)
{
	$query = $this->db->get_where('view_pembayaran', array('LEVEL' => "TK", "TAHUNAKTIF" => $tahun));
	return $query->result();
}
    
function getTagihanSPP()
{
	/*$this->db->select('
	tb_enroll_spp.*, tb_siswa.NIS AS NIS, tb_siswa.NAMA_SISWA
	');
	$this->db->join('tb_siswa', 'tb_enroll_spp.NIS = tb_siswa.NIS');
	$this->db->from('tb_enroll_spp');
	$query = $this->db->get();
	return $query->result();*/
	$query = $this->db->get_where('view_enroll_spp_2', array('LEVEL' => "TK"));
		return $query->result();
}
function getBulanSPP()
{
	$query = $this->db->get('tb_bulan_spp');
	return $query->result();
}
function setBayarSPP($table, $data)
 	{   
		$this->db->insert($table, $data);
	}

function getPembayaranTK($tahun)
{
	$query = $this->db->get_where('view_pembayaran', array('LEVEL' => "TK", 'TAHUNAKTIF' => $tahun));
	return $query->result();
}
 

function cekTahunAktif()
{
	$query = $this->db->get('tb_tahun_aktif');
	return $query->result();
}

public function getEnrollSPP()
	{
		$query = $this->db->get('view_enroll_spp');
		return $query->result();
	}

	function updateKustomSPP($nis,$spp){
		$this->db->query("UPDATE `tb_enroll_spp` SET `NOMINAL_SPP` = '$spp' WHERE NIS='$nis'");
		//$this->db->where($where);
		//$this->db->update($table,$data);
	}

//END MODEL PEMBAYARAN

function getMatkul()
	{
		$query = $this->db->get('view_matpel');
		return $query->result();
	}

function setMatkul($table, $data)
	{   
	   $this->db->insert($table, $data);
   }

   

public function getAllUser()
	{
		$query = $this->db->get('a_user');
		return $query->result();
	}

	public function getUserById($id)
	{
		$query = $this->db->get_where('a_user', array('ID' => $id));
		return $query->row();
	}


	public function getPesanUserById($id)
	{
		$query = $this->db->get_where('pesan', array('ID_PENERIMA' => $id));
		return $query->result();
	}

	public function getPesanPribadi($id)
	{
		$query = $this->db->get_where('pesan', array('ID_PENERIMA' => $id));
		return $query->row();
	}

	public function getPesan()
	{
		$query = $this->db->get('pesan');
		return $query->result();
	}
    
    function countAllSiswa()
    {
        $query = $this->db->query('SELECT * FROM view_siswa1');
        return $query->num_rows();
    }
    
     function countAllKelas()
    {
        $query = $this->db->query('SELECT * FROM view_kelas');
        return $query->num_rows();
    }
    
     function countAllPegawai()
    {
        $query = $this->db->query('SELECT * FROM view_pegawai');
        return $query->num_rows();
    }
    
     function countAllMatpel()
    {
        $query = $this->db->query('SELECT * FROM view_matpel');
        return $query->num_rows();
    }
     
     function countAllKelasKosong()
    {
        $query = $this->db->query('SELECT * FROM view_siswa1 WHERE ID_KELAS=" " AND LEVEL="TK" ');
        return $query->num_rows();
    }
    
    function countAllDataCek()
    {
        $query = $this->db->query('SELECT * FROM view_siswa1 WHERE NISN=" "');
        return $query->num_rows();
    }
    
     function LaporanPembayaranSPPLimit()
    {
        return $this->db->query("SELECT * FROM `view_pembayaran` WHERE LEVEL = 'TK' ORDER BY TANGGAL ASC LIMIT 10")->result();
    }
    
    private function _get_datatables_query()
	{
		
		//add custom filter here
		if($this->input->post('kelas'))
		{
			$this->db->where('NAMA_KELAS', $this->input->post('kelas'));
		}

		$this->db->from('view_kelas');
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('view_siswa1');
		return $this->db->count_all_results();
	}

	public function get_list_countries()
	{
		$this->db->select('NAMA_KELAS');
		$this->db->from('view_siswa1');
		$this->db->order_by('NAMA_KELAS','asc');
		$query = $this->db->get();
		$result = $query->result();

		$countries = array();
		foreach ($result as $row) 
		{
			$countries[] = $row->NAMA_KELAS;
		}
		return $countries;
	}
    
    
function LaporanPembayaranSPP($id, $bulan)
{
	return $this->db->get_where('view_pembayaran', array('NIS' => $id, 'BULAN'=> $bulan))->row();
}

}
?>