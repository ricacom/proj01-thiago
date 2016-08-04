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
		$this->logged->is_logged_in_user(); 			//Is USER Logged?
	}


	public function index()	{
		/*
		$dtRecords[] = NULL;
		$data['title'] = "Agath | Dashboard ";

		$dtfooter['footer_title'] = "Agath";
		$dtfooter['footer_msg'] = "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] = "Painel de Controle";

		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));


		$this->load->view('commons/header', $data);
		$this->load->view('dashboard_v', $dtRecords);
		$this->load->view('commons/footer',$dtfooter);
		*/
	die('Not allow to access direct');

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

	public function convenio_medico(){

		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('convenio_medico');
			$crud->set_subject('Convenio Médico');
			$crud->required_fields('description');
			$crud->display_as('description','Nome do convênio');
			$crud->columns('description','code','status');

			$crud->callback_add_field('status',array($this,'status_callback'));
			$crud->callback_edit_field('status',array($this,'status_callback'));

			//$crud->callback_add_field('status',array($this,'add_field_callback_1'));

			$output = $crud->render();
			$title = "Gerenciar Convênios Médicos";
			$this->_example_output($output, $title);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function status_callback(){
		return '<select name="status" class="form-control">
					<option value="N">Novo</option>
				  	<option value="A">Ativo</option>
		  			<option value="B">Bloqueado</option>
				</select>';
	}

		public function clinicas(){ //Nao está acabado

		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('convenio_medico');
			$crud->set_subject('Convenio Médico');
			$crud->required_fields('description');
			$crud->display_as('description','Nome do convênio');
			$crud->columns('description','code','status');

			$crud->callback_add_field('status',array($this,'status_callback'));
			$crud->callback_edit_field('status',array($this,'status_callback'));

			//$crud->callback_add_field('status',array($this,'add_field_callback_1'));

			$output = $crud->render();
			$title = "Gerenciar Convênios Médicos";
			$this->_example_output($output, $title);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	public function gruposAdmin(){ //Nao está acabado

		try{
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('group');
			$crud->set_subject('Grupos administrativos');
			$crud->required_fields('name');
			$crud->display_as('name','Nome do grupo');
			$crud->display_as('datacad','Cadastrado em');
			$crud->display_as('dataalter','Data de alteração');
			$crud->columns('name');
			$crud->fields('name', 'dataalter');

			$crud->callback_edit_field('dataalter',array($this,'gruposAdmin_callback_dataalter'));

			$output = $crud->render();
			$title = "Gerenciar Grupos de Administração";
			$this->_example_output($output, $title);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	function gruposAdmin_callback_dataalter($value, $primary_key){
		//var_dump(agora()); die;
		return '<input type="text" maxlength="50" value="'.agora().'" name="dataalter">';

	}














	public function _example_output($output = null, $title = null){
		$data['title'] = "Agath | Resource ";
		$dtfooter['footer_title'] = "Agath";
		$dtfooter['footer_msg'] = "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] = $title;

		$this->load->view('commons/header', $data);
		$this->load->view('resource',$output);
		$this->load->view('commons/footer',$dtfooter);
	}




} //close class
?>