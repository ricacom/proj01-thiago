<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profess extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg', 'funcutil'));
		$this->load->model(array('calendar'));	//MODEL
		$this->load->library(array('logged','session'));

		// $this->load->library('grocery_CRUD');
		/*$this->lang->load('login','pt-br');				// Language
		$this->lang->load('user','pt-br');
		$this->lang->load('cliente','pt-br');			// Language MENU
		*/
		$this->logged->is_logged_in_user(); 			//Is USER Logged?
	}


	public function index()	{

		$dtRecords[] = NULL;
		$data['title'] = "Agath | Profissionais ";

		$dtfooter['footer_title'] = "Agath";
		$dtfooter['footer_msg'] = "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] = "Médicos";

		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));

		$gravaDados = 1;
		var_dump($this->teste($gravaDados));

		$this->load->view('commons/header', $data);
		$this->load->view('commons/dash_lateral_profess');
		$this->load->view('profess_v', $dtRecords);
		$this->load->view('commons/footer',$dtfooter);

//	die('Not allow to access direct');

	}


	function validaSaidaDB($gravaDados){
		var_dump($gravaDados); 
		if($gravaDados){
			return TRUE;
		}else{
			return FALSE;
		}

	}










} //close class
?>