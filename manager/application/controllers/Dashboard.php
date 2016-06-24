<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {


	

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


	public function index()	{
		$dtRecords[] = NULL;
		$data['title'] = "Agath | Dashboard ";

		$dtfooter['footer_title'] = "Agath";
		$dtfooter['footer_msg'] = "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] = "Painel de Controle";
		
		
		$this->load->view('commons/header', $data);
		$this->load->view('dashboard_v', $dtRecords);
		$this->load->view('commons/footer',$dtfooter);
		
	}






















} //close class
?>