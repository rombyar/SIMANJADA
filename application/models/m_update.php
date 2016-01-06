<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');

class M_update extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/*save DKM*/
	function update_user(){
		$user_id = $this->db->insert_id();
		$update_user = array(
			'activated' => 0,
		);
		$this->db->where('id_users', $user_id);
		$update = $this->db->update('users', $update_user);
		return $update;
	}
	
	function update_dkm($id_dkm){
		$update_dkm = array(
			'id_dkm' => $this->input->post('id_dkm'),
			'nama_dkm' => $this->input->post('nama_dkm'),
			'nomor_telepon_dkm' => $this->input->post('nomor_telepon_dkm'),
			'alamat_dkm' => $this->input->post('alamat_dkm'),
		);
		$this->db->where('id_dkm', $id_dkm);
		$update = $this->db->update('data_dkm', $update_dkm);
		return $update;
	}
	function update_ac_dkm($id_users){
		$update_dkm = array(
			'activated' => 1,
		);
		$this->db->where('id_users', $id_users);
		$update = $this->db->update('users', $update_dkm);
		return $update;
	}
	function update_no_dkm($id_users){
		$update_dkm = array(
			'activated' => 0,
		);
		$this->db->where('id_users', $id_users);
		$update = $this->db->update('users', $update_dkm);
		return $update;
	}
	
	function update_masjid($nama_foto = FALSE){
		$level = $this->session->userdata('level');
		$id_masjid = $this->input->post('id_masjid');
		if($level == 1){$activated_masjid = 0;}else{$activated_masjid = 0;} // ubah activated masjid
		
		if($nama_foto){
			$update_masjid = array(
				'activated_masjid' => $activated_masjid,
				'nama_masjid' => $this->input->post('nama_masjid'),
				'tahun_berdiri_masjid' => $this->input->post('tahun_berdiri_masjid'),
				'alamat_masjid' => $this->input->post('alamat_masjid'),
				'jenis_masjid' => $this->input->post('jenis_masjid'),
				'status_tanah' => $this->input->post('status_tanah'),
				'deskripsi_masjid' => $this->input->post('deskripsi_masjid'),
				'nomor_telepon_masjid' => $this->input->post('nomor_telepon_masjid'),		
				'image_masjid' => $nama_foto,
			);
		}else{
			$update_masjid = array(
				'activated_masjid' => $activated_masjid,
				'nama_masjid' => $this->input->post('nama_masjid'),
				'tahun_berdiri_masjid' => $this->input->post('tahun_berdiri_masjid'),
				'alamat_masjid' => $this->input->post('alamat_masjid'),
				'jenis_masjid' => $this->input->post('jenis_masjid'),
				'status_tanah' => $this->input->post('status_tanah'),
				'deskripsi_masjid' => $this->input->post('deskripsi_masjid'),
				'nomor_telepon_masjid' => $this->input->post('nomor_telepon_masjid'),	
			);
		}
		
		$this->db->where('id_masjid', $id_masjid);
		$update = $this->db->update('data_masjid', $update_masjid);
		return $update;
	}
	function update_ac_masjid($id_masjid){
		$update_masjid = array(
			'activated_masjid' => 1,
		);
		$this->db->where('id_masjid', $id_masjid);
		$update = $this->db->update('data_masjid', $update_masjid);
		return $update;
	}
	function update_no_masjid($id_masjid){
		$update_masjid = array(
			'activated_masjid' => 0,
		);
		$this->db->where('id_masjid', $id_masjid);
		$update = $this->db->update('data_masjid', $update_masjid);
		return $update;
	}
	function update_ban_masjid($id_masjid){
		$update_masjid = array(
			'activated_masjid' => 2,
		);
		$this->db->where('id_masjid', $id_masjid);
		$update = $this->db->update('data_masjid', $update_masjid);
		return $update;
	}
	function update_unban_masjid($id_masjid){
		$update_masjid = array(
			'activated_masjid' => 0,
		);
		$this->db->where('id_masjid', $id_masjid);
		$update = $this->db->update('data_masjid', $update_masjid);
		return $update;
	}
	
	
	function update_jadwal(){
		$id_jadwal = $this->input->post('id_jadwal');
		$update_jadwal = array(
			'id_dkm' => $this->input->post('id_dkm'),
			'nama_jadwal' => $this->input->post('nama_jadwal'),
			'deskripsi_jadwal' => $this->input->post('deskripsi_jadwal'),
			'tempat' => $this->input->post('tempat'),
			'tanggal' => $this->input->post('tanggal'),
			'waktu' => $this->input->post('waktu'),
		);
		$this->db->where('id_jadwal', $id_jadwal);
		$update = $this->db->update('data_jadwal', $update_jadwal);
		return $update;
	}
	function delete_jadwal($id_jadwal){
		$this->db->where('id_jadwal', $id_jadwal);
		$delete = $this->db->delete('data_jadwal');
	}
}