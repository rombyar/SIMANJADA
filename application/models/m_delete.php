<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');

class M_delete extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function hapus_link_photo($id_masjid){
		$this->db->where('data_masjid.id_masjid',$id_masjid);
		$query = $getData = $this->db->get('data_masjid');

		if($getData->num_rows() > 0)
		return $query;
		else
		return null;
	}
	function delete_jadwal($id_jadwal){
		$this->db->delete('data_jadwal', array('id_jadwal' => $id_jadwal)); 
	}
}