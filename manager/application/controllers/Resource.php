<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Resource extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg', 'funcutil'));
		$this->load->model(array('calendar'));	//MODEL
		$this->load->library(array('logged','session', 'fullcalendar'));

		$this->load->library('grocery_CRUD');
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

		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));


		$this->load->view('commons/header', $data);
		$this->load->view('dashboard_v', $dtRecords);
		$this->load->view('commons/footer',$dtfooter);

	}

	public function _example_output($output = null){
		$data['title'] = "Agath | Resource ";
		$dtfooter['footer_title'] = "Agath";
		$dtfooter['footer_msg'] = "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] = "Painel de Controle";

		$this->load->view('commons/header', $data);
		$this->load->view('resource',$output);
		$this->load->view('commons/footer',$dtfooter);
	}

	public function events(){
		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('events');
			$crud->set_subject('Eventos');
			$crud->required_fields('title');
			//$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


} //close class
?>