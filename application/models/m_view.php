<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');

class M_view extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/*view masjid*/
	function get_user($user_id){
		$this->db->join('users', 'users.id_users = data_dkm.id_users');
		$this->db->where('users.activated', 1);
		$this->db->where('users.id_users', $user_id);
		$query = $this->db->get('data_dkm');
		return $query->result();
	}
	function get_masjid(){
		$this->db->join('users', 'users.id_users = data_masjid.id_users');
		$this->db->join('data_dkm', 'users.id_users = data_dkm.id_users');
		$this->db->where('users.activated', 1);
		$this->db->order_by('data_masjid.id_masjid','desc');
		$this->db->from('data_masjid');
		$query = $this->db->get();
		return $query->result();
	}
	function get_masjid_id($user_id){
		$this->db->join('users', 'users.id_users = data_masjid.id_users');
		$this->db->where('users.activated', 1);
		$this->db->where('users.id_users', $user_id);
		$this->db->from('data_masjid');
		$query = $this->db->get();
		return $query->result();
	}
	function get_masjid_pu(){
		$this->db->join('users', 'users.id_users = data_masjid.id_users');
		$this->db->where('users.activated', 1);
		$this->db->where('data_masjid.activated_masjid', 1);
		$this->db->order_by('data_masjid.nama_masjid','asc');
		$this->db->from('data_masjid');
		$query = $this->db->get();
		return $query->result();
	}
	function get_masjid_pu_search($search){
		$this->db->join('users', 'users.id_users = data_masjid.id_users');
		$this->db->where('users.activated', 1);
		$this->db->where('data_masjid.activated_masjid', 1);
		$this->db->order_by('data_masjid.nama_masjid','asc');
		$this->db->like('data_masjid.nama_masjid', $search);
		$this->db->or_like('data_masjid.alamat_masjid', $search); 
		$query = $this->db->get('data_masjid');
		return $query->result();
	}
	function get_masjid_id_masjid($id = TRUE){
		$this->db->join('users', 'users.id_users = data_masjid.id_users');
		$this->db->join('data_dkm', 'users.id_users = data_dkm.id_users');
		$this->db->where('users.activated', 1);
		$this->db->where('data_masjid.activated_masjid', 1);
		$this->db->where('data_masjid.id_masjid', $id);
		$query = $this->db->get('data_masjid');
		return $query->result();
	}
	/*Jadwal*/
	function get_jadwal(){
		$this->db->join('data_dkm', 'data_dkm.id_dkm = data_jadwal.id_dkm');
		$this->db->join('data_masjid', 'data_masjid.id_masjid = data_jadwal.id_masjid');
		$this->db->where('data_masjid.activated_masjid', 1);
		$this->db->order_by('tanggal','desc');
		$this->db->from('data_jadwal');
		$query = $this->db->get();
		return $query->result();
	}
	function get_jadwal_id($user_id = TRUE){
		$this->db->join('data_dkm', 'data_dkm.id_dkm = data_jadwal.id_dkm');
		$this->db->join('data_masjid', 'data_masjid.id_masjid = data_jadwal.id_masjid');
		$this->db->order_by('tanggal','desc');
		$this->db->from('data_jadwal');
		$query = $this->db->get();
		return $query->result();
	}
	function get_jadwal_search($search){
		$this->db->join('data_dkm', 'data_dkm.id_dkm = data_jadwal.id_dkm');
		$this->db->join('data_masjid', 'data_masjid.id_masjid = data_jadwal.id_masjid');
		$this->db->order_by('tanggal','asc');
		$this->db->like('data_jadwal.nama_jadwal', $search);
		$this->db->or_like('data_jadwal.deskripsi_jadwal', $search); 
		$this->db->or_like('data_masjid.nama_masjid', $search); 
		$query = $this->db->get('data_jadwal');
		return $query->result();
	}
	function get_jadwal_id_jadwal($id = TRUE){
		$this->db->join('data_dkm', 'data_dkm.id_dkm = data_jadwal.id_dkm');
		$this->db->join('data_masjid', 'data_masjid.id_masjid = data_jadwal.id_masjid');
		$this->db->where('data_jadwal.id_jadwal', $id);
		$query = $this->db->get('data_jadwal');
		return $query->result();
	}
	function get_jadwal_id_masjid($id = TRUE){
		$this->db->join('data_jadwal', 'data_jadwal.id_masjid = data_masjid.id_masjid');
		$this->db->where('data_masjid.activated_masjid', 1);
		$this->db->where('data_masjid.id_masjid', $id);
		$query = $this->db->get('data_masjid');
		return $query->result();
	}
	/*view dkm*/
	function get_dkm(){
		$this->db->from('data_dkm');
		$this->db->join('users', 'users.id_users = data_dkm.id_users');
		$query = $this->db->get();
		return $query->result();
	}
	function get_dkm_id($user_id){
		$this->db->from('data_dkm');
		$this->db->join('users', 'users.id_users = data_dkm.id_users');
		$this->db->where('data_dkm.id_users', $user_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	/*
	function get_dkma(){
		$this->db->join('users', 'users.id_users = data_dkm.id_users');
		$this->db->where('users.activated', 1);
		$this->db->where('users.level', 2);
		$query = $this->db->get('data_dkm');
		return $query->result();
	}
	function get_dkma_id($user_id){
		$this->db->join('users', 'users.id_users = data_dkm.id_users');
		$this->db->where('users.activated', 1);
		$this->db->where('users.level', 2);
		if($user_id == TRUE){$this->db->where('users.id_users', $user_id);}
		$query = $this->db->get('data_dkm');
		return $query->result();
	}
	function get_dkmn(){
		$this->db->join('users', 'users.id_users = data_dkm.id_users');
		$this->db->where('users.activated', 0);
		$this->db->where('users.level', 2);
		$query = $this->db->get('data_dkm');
		return $query->result();
	}*/
}