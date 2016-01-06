<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');

class M_save extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/*save DKM*/
	function add_dkm(){
		$user_id = $this->db->insert_id();
		$add_dkm = array(
			'id_users' => $user_id,
			'nama_dkm' => $this->input->post('nama_dkm'),
			'nomor_telepon_dkm' => $this->input->post('nomor_telepon_dkm'),
			'alamat_dkm' => $this->input->post('alamat_dkm'),
		);
		$save = $this->db->insert('data_dkm', $add_dkm);
		return $save;
	}
	function add_masjid($nama_foto){		
		$add_masjid = array(
			'id_dkm' => $this->input->post('id_dkm'),
			'id_users' => $this->input->post('id_users'),
			'activated_masjid' => $this->input->post('activated_masjid'),
			'nama_masjid' => $this->input->post('nama_masjid'),
			'tahun_berdiri_masjid' => $this->input->post('tahun_berdiri_masjid'),
			'alamat_masjid' => $this->input->post('alamat_masjid'),
			'jenis_masjid' => $this->input->post('jenis_masjid'),
			'status_tanah' => $this->input->post('status_tanah'),
			'deskripsi_masjid' => $this->input->post('deskripsi_masjid'),
			'nomor_telepon_masjid' => $this->input->post('nomor_telepon_masjid'),			
			'image_masjid' => $nama_foto,
		);
		$save = $this->db->insert('data_masjid', $add_masjid);
		return $save;
	}
	function add_jadwal(){
		$add_jadwal = array(
			'id_dkm' => $this->input->post('id_dkm'),
			'id_masjid' => $this->input->post('id_masjid'),
			'nama_jadwal' => $this->input->post('nama_jadwal'),
			'deskripsi_jadwal' => $this->input->post('deskripsi_jadwal'),
			'tempat' => $this->input->post('tempat'),
			'tanggal' => $this->input->post('tanggal'),
			'waktu' => $this->input->post('waktu'),
		);
		$save = $this->db->insert('data_jadwal', $add_jadwal);
		return $save;
	}
}