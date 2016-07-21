<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Falecon extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html'));
		$this->load->model('Example_model');
		$this->load->library(array('form_validation', 'session'));
		$this->load->library('parser');
		

	}

	function Index(){
		$dtRecords[] = NULL;
		$data['title'] = "Agath | Fale Conosco ";

		$dtfooter['footer_title'] = "Agath";
		$dtfooter['footer_msg'] = "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] = "Página incical";


		$this->load->view('commons/header', $data);
		$this->load->view('falecon_v', $dtRecords);
		$this->load->view('commons/footer');
		//var_dump($data); die;
		

	}


} ///Close class