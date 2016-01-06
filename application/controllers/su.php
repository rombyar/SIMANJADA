<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Su extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		//Pengecekan Login jika sudah logout

		//Pengecekan Login jika sudah logout
		if($this->session->userdata('username') == NULL ){redirect('user/login','refresh');}
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache"); 
		
		 $this->load->library('user_agent'); //This is the line you are adding
	}

	public function index(){ redirect('su/dashboard'); }
	
	public function dashboard(){
		if (!$this->tank_auth->is_logged_in()) { redirect('/user/login/'); } 
		else if ($this->tank_auth->is_logged_in()) {
			$level = $this->session->userdata('level');
			$user_id = $this->session->userdata('user_id');
				
			$data = array(
				'title' => 'Dashboard',
				'level' => $level,
				'user_id' => $user_id,
				'username' => $this->session->userdata('username'),
				'url' => $this->uri->rsegment(2),
				'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
				'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
				'dkm_a_num' => $this->m_row->get_dkm_a_num(),
				'dkm_n_num' => $this->m_row->get_dkm_n_num(),
				//'masjid_num' => $this->m_row->get_masjid_num($user_id),
				//'jadwal_num' => $this->m_row->get_jadwal_num(),
				//'jadwal_num_id' => $this->m_row->get_jadwal_num_id($user_id),
			);
			$this->template->load('template/content', 'template/menu/su/su-dashboard', $data);
		}
	}
	
	public function profile(){
		if (!$this->tank_auth->is_logged_in()) { redirect('/user/login/'); } 
		else if ($this->tank_auth->is_logged_in()) {
			$level = $this->session->userdata('level');
			$user_id = $this->session->userdata('user_id');
				
			$data = array(
				'title' => 'Profile',
				'level' => $level,
				'user_id' => $user_id,
				'username' => $this->session->userdata('username'),
				'url' => $this->uri->rsegment(2),
				'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
				'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
				'get_user' => $this->m_view->get_user($user_id),
			);
			$this->template->load('template/content', 'template/menu/su/su-profile', $data);
		}
	}
	
	public function dkm(){
		$level = $this->session->userdata('level');
		$user_id = $this->session->userdata('user_id');
		if($level == 1){
			if (!$this->tank_auth->is_logged_in()) { redirect('/user/login/'); } 
			else if ($this->tank_auth->is_logged_in()) {
					
				$data = array(
					'title' => 'DKM',
					'level' => $level,
					'user_id' => $user_id,
					'username' => $this->session->userdata('username'),
					'url' => $this->uri->rsegment(2),
					'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
					'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
					'ddkm' => $this->m_view->get_dkm(),
					'error' => $this->upload->display_errors('<span >','</span>')
				);
				
				$this->template->load('template/content', 'template/menu/su/su-table-all', $data);
			}
		}else{redirect('user/login');}
	}
	public function edkm(){
		$level = $this->session->userdata('level');
		$user_id = $this->session->userdata('user_id');
		$id_dkm = $this->input->post('id_dkm');
			
		$data = array(
			'title' => 'Ubah DKM',
			'level' => $level,
			'user_id' => $user_id,
			'username' => $this->session->userdata('username'),
			'url' => $this->uri->rsegment(2),
			'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
			'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
		);
		
		$this->form_validation->set_rules('nama_dkm', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nomor_telepon_dkm', 'Nomor telepon', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alamat_dkm', 'Alamat', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			redirect('su/dkm/');
		} else {
			$this->m_update->update_dkm($id_dkm);
			$this->session->set_flashdata('success', "Successfully"); 
			redirect('su/dkm/');
		}
	}
	
	
	public function acdkm(){
		$id_users = $this->uri->rsegment(3);
		if($id_users){
			$this->m_update->update_ac_dkm($id_users);
			$this->session->set_flashdata('success', "Aktif"); 
			redirect('su/dkm/');
		}else{
			$this->session->set_flashdata('danger', "No #ID"); 
			redirect('su/dkm/');
		}
	}
	public function nacdkm(){
		$id_users = $this->uri->rsegment(3);
		if($id_users){
			$this->m_update->update_no_dkm($id_users);
			$this->session->set_flashdata('success', "Non-Aktif"); 
			redirect('su/dkm/');
		}else{
			$this->session->set_flashdata('danger', "No #ID"); 
			redirect('su/dkm/');
		}
	}
	
	public function acmasjid(){
		$id_masjid = $this->uri->rsegment(3);
		if($id_masjid){
			$this->m_update->update_ac_masjid($id_masjid);
			$this->session->set_flashdata('success', "Aktif"); 
			redirect('su/masjid/');
		}else{
			$this->session->set_flashdata('danger', "No #ID"); 
			redirect('su/masjid/');
		}
	}
	public function nacmasjid(){
		$id_masjid = $this->uri->rsegment(3);
		if($id_masjid){
			$this->m_update->update_no_masjid($id_masjid);
			$this->session->set_flashdata('success', "Non-Aktif"); 
			redirect('su/masjid/');
		}else{
			$this->session->set_flashdata('danger', "No #ID"); 
			redirect('su/masjid/');
		}
	}
	
	// Banned Masjid
	public function banmasjid(){
		$id_masjid = $this->uri->rsegment(3);
		if($id_masjid){
			$this->m_update->update_ban_masjid($id_masjid);
			$this->session->set_flashdata('danger', "Banned"); 
			redirect('su/masjid/');
		}else{
			$this->session->set_flashdata('danger', "No #ID"); 
			redirect('su/masjid/');
		}
	}
	public function unbanmasjid(){
		$id_masjid = $this->uri->rsegment(3);
		if($id_masjid){
			$this->m_update->update_unban_masjid($id_masjid);
			$this->session->set_flashdata('warning', "UnBanned"); 
			redirect('su/masjid/');
		}else{
			$this->session->set_flashdata('danger', "No #ID"); 
			redirect('su/masjid/');
		}
	}
	
	public function masjid(){
		if (!$this->tank_auth->is_logged_in()) { redirect('/user/login/'); } 
		else if ($this->tank_auth->is_logged_in()) {
			$level = $this->session->userdata('level');
			$user_id = $this->session->userdata('user_id');
			
			$data = array(
				'title' => 'Jadwal Masjid',
				'level' => $level,
				'user_id' => $user_id,
				'username' => $this->session->userdata('username'),
				'url' => $this->uri->rsegment(2),
				'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
				'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
				'get_dkm_id' => $this->m_view->get_dkm_id($user_id),
				'dmasjid' => $this->m_view->get_masjid(),
				'get_masjid_id' => $this->m_view->get_masjid_id($user_id),
				'error' => $this->upload->display_errors('<span >','</span>')
			);
			
			$this->form_validation->set_rules('nama_masjid', 'Nama', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tahun_berdiri_masjid', 'Tahun berdiri', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alamat_masjid', 'Alamat', 'trim|required|xss_clean');
			$this->form_validation->set_rules('jenis_masjid', 'Jenis', 'trim|required|xss_clean');
			$this->form_validation->set_rules('status_tanah', 'Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('deskripsi_masjid', 'Deskripsi', 'trim|required|xss_clean');
			
			if($this->form_validation->run() == TRUE){
				//if (!empty($_FILES['userfile']['name'])) {
					$nama_asli = $_FILES['userfile']['name']; //Nama Asli File
					
					// Konfigurasi Upload Gambar
					$config['file_name'] = $this->encrypt->encode($nama_asli);
					$config['upload_path'] = 'assets/img/masjid/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					//$config['encrypt_name'] = TRUE;
					//$config['max_size']	= '300';
					//$config['max_width']  = '250';
					//$config['max_height']  = '250';
					
					// End Konfigurasi Upload Gambar	
					$this->upload->initialize($config);	
					
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload()) {
						$data = array(
							'title' => 'Jadwal Masjid',
							'level' => $level,
							'user_id' => $user_id,
							'username' => $this->session->userdata('username'),
							'url' => $this->uri->rsegment(2),
							'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
							'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
							'get_dkm_id' => $this->m_view->get_dkm_id($user_id),
							'dmasjid' => $this->m_view->get_masjid(),
							'get_masjid_id' => $this->m_view->get_masjid_id($user_id),
							'error' => $this->upload->display_errors('<span >','</span>')
						);
					} else {
						$get_name = $this->upload->data();
						$nama_foto = $get_name['file_name'];
						
						$this->load->library('image_lib');

						$config_res['source_image'] = 'assets/img/masjid/'.$this->upload->file_name;
						$config_res['maintain_ratio'] = TRUE;
						$config_res['width'] = 250;
						$config_res['height'] = 250;

						$this->image_lib->initialize($config_res);
						$this->image_lib->resize();
						$this->image_lib->clear();
						
						if (!empty($_FILES['userfile']['name'])) {
							$get_name = $this->upload->data();
							$nama_foto = $get_name['file_name'];
							
							$this->m_save->add_masjid($nama_foto);
							$this->session->set_flashdata('success', "Successfully");
							redirect('su/masjid/');
						}else{
							$this->m_save->add_masjid();
							$this->session->set_flashdata('success', "Successfully");
							redirect('su/masjid/');
						}
					}
				//}
			}
			
			$this->template->load('template/content', 'template/menu/su/su-table-all', $data);
		}
	}
	
	public function emasjid(){
		$level = $this->session->userdata('level');
		$user_id = $this->session->userdata('user_id');
		$id_masjid = $this->input->post('id_masjid');
			
		$data = array(
			'title' => 'Ubah Masjid',
			'level' => $level,
			'user_id' => $user_id,
			'username' => $this->session->userdata('username'),
			'url' => $this->uri->rsegment(2),
			'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
			'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
			'get_dkm_id' => $this->m_view->get_dkm_id($user_id),
			'dmasjid' => $this->m_view->get_masjid(),
			'get_masjid_id' => $this->m_view->get_masjid_id($user_id),
			'error' => $this->upload->display_errors('<span >','</span>')
		);
		
		$this->form_validation->set_rules('nama_masjid', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tahun_berdiri_masjid', 'Tahun berdiri', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alamat_masjid', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jenis_masjid', 'Jenis', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status_tanah', 'Status', 'trim|required|xss_clean');
		$this->form_validation->set_rules('deskripsi_masjid', 'Deskripsi', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == TRUE){
			if (!empty($_FILES['userfile']['name'])) {
				$nama_asli = $_FILES['userfile']['name']; //Nama Asli File
				
				// Konfigurasi Upload Gambar
				$config['file_name'] = $this->encrypt->encode($nama_asli);
				$config['upload_path'] = 'assets/img/masjid/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				//$config['encrypt_name'] = TRUE;
				//$config['max_size']	= '300';
				//$config['max_width']  = '250';
				//$config['max_height']  = '250';
				
				// End Konfigurasi Upload Gambar	
				$this->upload->initialize($config);	
				
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload()) {
					$data = array(
						'title' => 'Ubah Masjid',
						'level' => $level,
						'user_id' => $user_id,
						'username' => $this->session->userdata('username'),
						'url' => $this->uri->rsegment(2),
						'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
						'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
						'get_dkm_id' => $this->m_view->get_dkm_id($user_id),
						'dmasjid' => $this->m_view->get_masjid(),
						'get_masjid_id' => $this->m_view->get_masjid_id($user_id),
						'error' => $this->upload->display_errors('<span >','</span>')
					);
				} else {
					$get_name = $this->upload->data();
					$nama_foto = $get_name['file_name'];
					
					$this->load->library('image_lib');

					$config_res['source_image'] = 'assets/img/masjid/'.$this->upload->file_name;
					$config_res['maintain_ratio'] = TRUE;
					$config_res['width'] = 900;
					$config_res['height'] = 900;

					$this->image_lib->initialize($config_res);
					$this->image_lib->resize();
					$this->image_lib->clear();
					
					if (!empty($_FILES['userfile']['name'])) {
						$photo = $this->m_delete->hapus_link_photo($id_masjid);
						if($photo->num_rows() > 0)
						{
							$row = $photo->row();
							$file_photo = $row->image_masjid;
							$path_file = 'assets/img/masjid/';
							
							unlink($path_file.'/'.$file_photo);
						}
						
						$get_name = $this->upload->data();
						$nama_foto = $get_name['file_name'];
						
						$this->m_update->update_masjid($nama_foto);
						$this->session->set_flashdata('success', "Successfully");
					}
				}
			} else {
				$this->m_update->update_masjid();
				$this->session->set_flashdata('success', "Successfully");
			}
		}
		redirect('su/masjid/');
	}
	
	public function jadwal(){
		if (!$this->tank_auth->is_logged_in()) { redirect('/user/login/'); } 
		else if ($this->tank_auth->is_logged_in()) {
		$level = $this->session->userdata('level');
		$user_id = $this->session->userdata('user_id');
		$masjid_num = $this->m_row->get_ak_masjid_num();
		$data = array(
			'title' => 'Jadwal Masjid',
			'level' => $level,
			'user_id' => $user_id,
			'username' => $this->session->userdata('username'),
			'url' => $this->uri->rsegment(2),
			'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
			'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
			'djadwal' => $this->m_view->get_jadwal(),
			'djadwalid' => $this->m_view->get_jadwal_id($user_id),
			'ddkm' => $this->m_view->get_dkm(),
			'ddkm_id' => $this->m_view->get_dkm_id($user_id),
			'dmasjid' => $this->m_view->get_masjid(),
			'dmasjidid' => $this->m_view->get_masjid_id($user_id),
			'error' => "",
		);
		
			
			$this->form_validation->set_rules('id_dkm', 'DKM', 'trim|required|xss_clean');
			$this->form_validation->set_rules('id_masjid', 'Masjid', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nama_jadwal', 'Nama', 'trim|required|xss_clean');
			$this->form_validation->set_rules('deskripsi_jadwal', 'Deskripsi', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tempat', 'Tempat', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|xss_clean');
			$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required|xss_clean');
			
			if($this->form_validation->run() == FALSE){
				if($masjid_num){
					$nomasjid = $this->m_row->get_no_masjid_num($user_id);
					if($level == 2 and $nomasjid == 1){
						$this->template->load('template/content', 'template/menu/su/su-table-all', $data);
					}else if($level == 1){
						$this->template->load('template/content', 'template/menu/su/su-table-all', $data);
					}else{redirect('su/masjid/');}
				}else{redirect('su/masjid/');}
			} else {
				$this->m_save->add_jadwal();
				$this->session->set_flashdata('success', "Successfully"); 
				redirect('su/jadwal/');
			}
		}
	}
	
	public function ejadwal(){
		$level = $this->session->userdata('level');
		$user_id = $this->session->userdata('user_id');
			
		$data = array(
			'title' => 'Ubah Jadwal',
			'level' => $level,
			'user_id' => $user_id,
			'username' => $this->session->userdata('username'),
			'url' => $this->uri->rsegment(2),
			'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
			'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
			//'get_dkm_id' => $this->m_view->get_dkm_id($user_id),
			//'dmasjid' => $this->m_view->get_masjid(),
			//'get_masjid_id' => $this->m_view->get_masjid_id($user_id),
		);
		
		$this->form_validation->set_rules('nama_jadwal', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('deskripsi_jadwal', 'Deskripsi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tempat', 'Tempat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			redirect('su/jadwal/');
		} else {
			$this->m_update->update_jadwal();
			$this->session->set_flashdata('success', "Successfully"); 
			redirect('su/jadwal/');
		}
	}
	public function deljadwal($id_jadwal){
		$this->m_delete->delete_jadwal($id_jadwal);
		$this->session->set_flashdata('danger', "Successfully"); 
		redirect('su/jadwal/');
	}
	
	

	/**
	 * Register user on the site
	 *
	 * @return void
	 *
	function dkm(){
		$level = $this->session->userdata('level');
		$data = array(
			'title' => 'DKM',
			'level' => $level,
			'username' => $this->session->userdata('username'),
			'url' => $this->uri->rsegment(2),
			'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
			'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
			'ddkm' => $this->m_view->get_dkm(),
		);
		
		if ($this->tank_auth->is_logged_in(FALSE)) 
		{						// logged in, not activated
			redirect('/user/send_again/');

		} elseif (!$this->config->item('allow_registration', 'tank_auth')) {	// registration is off
			$this->_show_message($this->lang->line('auth_message_registration_disabled'));

		} else {
			$use_username = $this->config->item('use_username', 'tank_auth');
			if ($use_username) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
			}
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
			$this->form_validation->set_rules('nama_dkm', 'Nama', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nomor_telepon_dkm', 'Nomor', 'trim|required|xss_clean');
			$this->form_validation->set_rules('alamat_dkm', 'Alamat', 'trim|required|xss_clean');

			$level = 2;
			$data['use_username'] = $use_username;
			
			if ($this->form_validation->run() == FALSE){
				$this->template->load('template/content', 'template/menu/su/su-table-all', $data);
			}else{							// validation ok
				if (!is_null($data = $this->tank_auth->create_user( //Model create_user
						$use_username ? $this->form_validation->set_value('username') : '',
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password')
						))) {									// success

						$data['site_name'] = $this->config->item('website_name', 'tank_auth');


						unset($data['password']); // Clear password (just for any case)
						
						$this->m_save->add_dkm();
						$this->session->set_flashdata('success', "Successfully"); 
				} else {
					$data = array(
						'title' => 'Pendaftaran',
						'level' => $this->tank_auth->get_level(),
						'username' =>  $this->tank_auth->get_username(),
						'url' => $this->uri->rsegment(2),
						'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
						'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
					);
					$errors = $this->tank_auth->get_error_message();
					var_dump($errors);
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
				redirect('su/dkm/');
			}
		}
	}*/
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/beranda.php */