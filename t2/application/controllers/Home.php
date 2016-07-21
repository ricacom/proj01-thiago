<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html'));
		$this->load->model('Example_model');
		$this->load->library('form_validation');
		$this->load->library('parser');
		

	}

	function Index(){
		$dtRecords[] = NULL;
		$data['title'] = "Agath | Clinica Modelo T2 ";

		$dtfooter['footer_title'] = "Agath";
		$dtfooter['footer_msg'] = "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] = "Página incical";


		$this->load->view('commons/header', $data);
		$this->load->view('home_v', $dtRecords);
		$this->load->view('commons/footer');
		//var_dump($data); die;
		

	}


} ///Close class