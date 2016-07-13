<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logged {

	public $ci;

	function __construct(){
		//Instancia a SUperClasse a vari�vel ci
		$this->ci =& get_instance();
	}

	function is_logged_in()	{
		//Carrega a Classe SESSION
		$this->ci->load->library('session');

		$is_logged_in = $this->ci->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('/go/index/2', 'refresh');
			die();
		}
	}
		function is_logged_in_user()	{
		//Carrega a Classe SESSION
		$this->ci->load->library('session');

		$is_logged_in = $this->ci->session->userdata('id_cliente');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{	
			$this->ci->session->set_userdata('msg_login', '2');
			redirect('loga_cliente', 'refresh');
			die();
		}
	}

	function is_logged_Admin()	{
		//Carrega a Classe SESSION
		$this->ci->load->library('session');

		$is_admin_in = $this->ci->session->userdata('admin');
		if(!isset($is_admin_in) || $is_admin_in != 1)
		{
			$this->ci->session->set_flashdata('error','notAdmin');
			redirect('go/index/2', 'refresh');
			die();
		}
	}














	
}

/* End of file Logged.php */