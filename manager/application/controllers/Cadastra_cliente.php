<?php

//https://www.youtube.com/watch?v=cKUKIe8bB6w
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Cadastra_cliente extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg', 'funcutil'));
		$this->load->library(array('session', 'form_validation', 'email','mylogin'));
		$this->load->model(array('cadastra_cliente_m')); 		// Load Model
		
	}

	function index(){

		$dtRecords[] 				= NULL;
		$data['title'] 				= "Agath | Cadastro ";
		$dtfooter['footer_title'] 	= "Agath";
		$dtfooter['footer_msg'] 	= "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] 			= "Identificação";

		$this->load->view('commons/header', $data);
		//$this->load->view('scrollFixed', $data);
		$this->load->view('cadastra_cliente_v', $dtRecords);
		$this->load->view('commons/footer',$dtfooter);
	}

	function grava(){

		//Validation
		$this->form_validation->set_rules('fullname', 'Nome completo', 'trim|required|min_length[2]|max_length[32]');
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required|exact_length[1]');
		$this->form_validation->set_rules('phone', 'Telefone residencial', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('mphone', 'Telefone celular', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[6]|max_length[32]'); //matches[form_item]
		$this->form_validation->set_rules('cpassword', 'Repita a Senha', 'trim|required|matches[password]'); //matches[form_item]

		if ($this->form_validation->run() == FALSE){
			// $this->session->set_flashdata('error_form', validation_errors());
			// $url = base_url() .'cotacao/index/1';
			// redirect('http://localhost/seguros/#contact','refresh');
			// redirect($url,'refresh');
			//var_dump($_REQUEST); die;
			$this->index();
		}
		else{
			$dataContato = array(
				'fullname' 				=> $this->input->post('fullname', TRUE),
				'sexo' 					=> $this->input->post('sexo', TRUE),
			    'phone' 				=> $this->input->post('phone', TRUE),
				'mphone' 				=> $this->input->post('mphone', TRUE),
				'email' 				=> $this->input->post('email', TRUE),
				'whatsapp' 				=> $this->input->post('whatsapp', TRUE),
				'password' 				=> $this->mylogin->myhash($this->input->post('password',TRUE), $this->mylogin->unique_salt()),
				'idade' 				=> $this->input->post('idade', TRUE),
				'status' 				=> 'N', // N, novo | L Lido | E Excluido
				'datacad' 				=> agora(),
				'tipo_cadastro' 		=> 'form_site',
			);

			//var_dump($dataContato); die;

			$id_user_cadastro 	= $this->cadastra_cliente_m->gravaCliente($dataContato); //deve retornar o ID ao gravar
			//var_dump($id_user_cadastro); die;
		//	$dataClient 		= $this->cadastra_cliente_m->get_dataClient($id_user_cadastro);
			//var_dump($dataClient); die;

			if ($id_user_cadastro){
				//Dados do  FORM com o ID da tabela
				/*
				  'id_cliente' => string '111922449250362' (length=15)
				  'fullname' => string 'Donna Alabighbahhig Sadansen' (length=28)
				  'email' => string 'aslmpoo_sadansen_1469755789@tfbnw.net' (length=37)
				  'age_range' => int 21
				  'gender' => string 'female' (length=6)
				  'is_verified' => boolean false
				  'locale' => string 'pt_BR' (length=5)
				  'is_logged_cli' => boolean true
				 */
				$dadosForm = array(
					'id_cliente' 		=> 	$id_user_cadastro,
					'fullname' 			=> 	$dataContato['fullname'],
					'email' 			=> 	$dataContato['email'],
					'is_logged_cli' 	=> 	TRUE
				);
				$this->session->set_userdata($dadosForm);

				//echo 'Gravei com Sucesso!';
				 redirect('/dashboard/', 'refresh');
			}else{
				///redirect('user/adduser/index/2', 'refresh');
				echo 'NAO Gravei com Sucesso!';
			}

		}//close else
	} //close SendDATA


} //close class

//base_url()