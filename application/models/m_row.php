<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');

class M_row extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function get_dkm_num(){
		$this->db->from('data_dkm');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_dkm_a_num(){
		$this->db->join('users', 'users.id_users = data_dkm.id_users');
		$this->db->where('users.activated', 1);
		$this->db->where('users.level', 2);
		$query = $this->db->get('data_dkm');
		return $query->num_rows();
	}
	function get_dkm_n_num(){
		$this->db->join('users', 'users.id_users = data_dkm.id_users');
		$this->db->where('users.activated', 0);
		$this->db->where('users.level', 2);
		$query = $this->db->get('data_dkm');
		return $query->num_rows();
	}
	function get_no_masjid_num($user_id){
		$this->db->from('data_masjid');
		$this->db->where('data_masjid.id_users', $user_id);
		$this->db->where('data_masjid.activated_masjid', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_ak_masjid_num(){
		$this->db->from('data_masjid');
		$this->db->where('data_masjid.activated_masjid', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_masjid_num(){
		$this->db->from('data_masjid');
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_masjid_num_id($user_id = TRUE){
		$this->db->from('data_masjid');
		$this->db->where('data_masjid.id_users', $user_id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_jadwal_num(){
		$this->db->join('data_masjid', 'data_masjid.id_masjid = data_jadwal.id_masjid');
		$this->db->where('data_masjid.activated_masjid', 1);
		$query = $this->db->get('data_jadwal');
		return $query->num_rows();
	}
	function get_jadwal_num_id($user_id){
		$this->db->join('data_masjid', 'data_masjid.id_masjid = data_jadwal.id_masjid');
		$this->db->where('data_masjid.activated_masjid', 1);
		$this->db->where('data_masjid.id_users', $user_id);
		$query = $this->db->get('data_jadwal');
		return $query->num_rows();
	}
}