<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Home',
			'level' => $this->session->userdata('level'),
			'username' => $this->session->userdata('username'),
			'url' => $this->uri->rsegment(1),
			'login_by_username' => ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth')),
			'login_by_email' => $this->config->item('login_by_email', 'tank_auth'),
		);
		//$this->template->load('template/frontend/content', 'home', $data);
		$this->template->load('template/content', 'template/home', $data);
		//$this->template->load('template/frontend/content', 'fuzzy', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */