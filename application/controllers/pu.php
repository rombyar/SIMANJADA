<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pu extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		redirect('su');
	}
	public function jadwal($id = FALSE){
		$level = $this->session->userdata('level');
		$search = $this->input->post('search');
		
		$data = array(
			'title' => 'Jadwal',
			'level' => $level,
			'username' => $this->session->userdata('username'),
			'url' => $this->uri->segment(2),
			'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
			'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
		);
		
		if($id){
			$data['djadwal'] = $this->m_view->get_jadwal_id_jadwal($id);
			$this->template->load('template/content', 'template/menu/pu/detail/pu-detail-jadwal', $data);
		}else{
			if($search){ $data['djadwal'] = $this->m_view->get_jadwal_search($search);}
			else { $data['djadwal'] = $this->m_view->get_jadwal();}
			$this->template->load('template/content', 'template/menu/pu/pu-jadwal', $data);
		}
	}
	public function masjid($id = FALSE){
		$level = $this->session->userdata('level');
		$search = $this->input->post('search');
			
		$data = array(
			'title' => 'Masjid',
			'level' => $level,
			'username' => $this->session->userdata('username'),
			'url' => $this->uri->segment(2),
			'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
			'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
			'dmasjid' => $this->m_view->get_masjid_pu(),
		);
		
		if($id){
			$data['dmasjid'] = $this->m_view->get_masjid_id_masjid($id);
			$data['djadwal'] = $this->m_view->get_jadwal_id_masjid($id);
			$this->template->load('template/content', 'template/menu/pu/detail/pu-detail-masjid', $data);
		}else{
			if($search){ $data['dmasjid'] = $this->m_view->get_masjid_pu_search($search);}
			else { $data['dmasjid'] = $this->m_view->get_masjid_pu();}
			$this->template->load('template/content', 'template/menu/pu/pu-masjid', $data);
		}
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/beranda.php */