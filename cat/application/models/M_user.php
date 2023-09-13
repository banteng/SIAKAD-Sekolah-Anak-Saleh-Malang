<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class m_user extends CI_Model{
	function login($data){
		$this->db->select('tb_siswa.NAMA_SISWA, tb_siswa.NIS, tb_siswa.ID_KELAS, tb_kelas.*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_kelas', 'tb_siswa.ID_KELAS=tb_kelas.ID');
		$this->db->where($data);
		return $this->db->get();
        
        /*$this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->where('NIS', $username);
        $this->db->where('PASSWORD', $password);
        $query = $this->db->get();

        return $query->row();*/
        
	}
	
	function ceknis($whr){
		$this->db->select('nis, pertanyaan');
		return $this->db->get_where('siswa', $whr);
	}
	function cekjawab($whr){
		$this->db->select('nis, jawaban');
		return $this->db->get_where('siswa', $whr);
	}
    
	function resetpasswd($table, $where, $data){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function cekdefpass($id){
		$this->db->select('password, pertanyaan, jawaban');
		return $this->db->get_where('siswa', $id);
	}
	function cekpass($whr){
		$this->db->select('password');
		return $this->db->get_where('siswa', $whr);
	}
	
	function gantipass($data, $whr){
		$this->db->where($whr);
		$this->db->update('siswa', $data);
	}

	//Jadwal Ujian
	// function jadwal_ujian($where){
	// 	$this->db->select('ujian.*, kelas.id_kelas, kelas.kode_kelas, mapel.*');
 //        $this->db->from('ujian');
 //        $this->db->join('kelas', 'ujian.id_kelas=kelas.id_kelas');
 //        $this->db->join('mapel', 'ujian.id_mapel=mapel.id_mapel');
 //        $this->db->where($where);
 //        return $this->db->get();
	// }
	function jadwal_ujian($id_siswa){
		return $this->db->query("SELECT ujian.*, (SELECT count(id_tes) FROM ikut_ujian WHERE ikut_ujian.id_siswa=".$id_siswa." AND ikut_ujian.id_ujian=ujian.id_ujian) AS sudah_ikut, (SELECT mapel FROM mapel WHERE mapel.id_mapel=ujian.id_mapel) AS mapel, (SELECT status FROM ikut_ujian WHERE ikut_ujian.id_siswa=".$id_siswa." AND ikut_ujian.id_ujian=ujian.id_ujian) AS status FROM ujian, siswa WHERE ujian.id_kelas=siswa.kelas AND siswa.id_siswa=".$id_siswa." ORDER BY sudah_ikut ASC");
	}

	//Ujian
	function ujian($whr){
		$this->db->select('*');
		$this->db->from('ujian');
		$this->db->join('mapel', 'ujian.id_mapel=mapel.id_mapel');
		$this->db->where($whr);
		return $this->db->get();
	}
	function cek_selesai_ujian($whr){
		return $this->db->get_where('ikut_ujian', $whr);
	}
	function cek_detil_tes($whr){
		return $this->db->get_where('ujian', $whr);
	}
	function cek_sdh_ujian($whr){
		return $this->db->get_where('ikut_ujian', $whr);
	}
	function q_soal($mapel, $kelas){
	//function q_soal($mapel, $kelas, $section){
		//return $this->db->get_where($mapel, $id_siswa);
		return $this->db->query('SELECT * FROM soal WHERE mapel='.$mapel.' AND kelas='.$kelas.'');
	}
	function tambah_ujian($data){
		$this->db->insert('ikut_ujian', $data);
	}
	function detil_soal($whr){
		$this->db->select('ujian.*, guru.nama AS guru, mapel.mapel AS mapel, kelas.kode_kelas AS kelas');
		$this->db->from('ujian');
		$this->db->join('guru', 'ujian.id_guru=guru.id_guru');
		$this->db->join('mapel', 'ujian.id_mapel=mapel.id_mapel');
		$this->db->join('kelas', 'ujian.id_kelas=kelas.id_kelas');
		$this->db->where($whr);
		return $this->db->get();
	}
	function detil_tes($whr){
		return $this->db->get_where('ikut_ujian', $whr);
	}

	function log_auth($id){
		/*$this->db->select('*');
		$this->db->from('log_auth');
		$this->db->where('log_user', $id);
		$this->db->order_by('log_time', 'DESC');
		$this->db->limit(5);
		$query=$this->db->get();*/

		//return $this->db->get_where('log_auth', array('log_user' => $id))->result();
		return $this->db->query("SELECT * FROM `log_auth` WHERE log_user = '".$id."' ORDER BY log_time DESC LIMIT 5")->result();
	}
}