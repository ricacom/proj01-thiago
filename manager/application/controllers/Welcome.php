<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	

		function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg', 'funcutil'));
	//	$this->load->model(array('dominios_m','controle_cliente_m', 'meus_pagamentos_m'));	//MODEL
		$this->load->library(array('logged','session'));
		
		/*$this->lang->load('login','pt-br');				// Language
		$this->lang->load('user','pt-br');	
		$this->lang->load('cliente','pt-br');			// Language MENU
		*/
		//$this->logged->is_logged_in_user(); 			//Is USER Logged?
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
