<?php

//https://www.youtube.com/watch?v=cKUKIe8bB6w
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Cadastra_cliente extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg', 'funcutil'));
		$this->load->library(array('session', 'form_validation', 'email'));
		
	}

	function index(){

		$dtRecords[] = NULL;
		$data['title'] = "Agath | Cadastro ";
		$dtfooter['footer_title'] = "Agath";
		$dtfooter['footer_msg'] = "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] = "Identificação";
		
		
		$this->load->view('commons/header', $data);
		//$this->load->view('scrollFixed', $data);
		$this->load->view('cadastra_cliente_v', $dtRecords);
		$this->load->view('commons/footer',$dtfooter);
		


	}

	function grava(){


		//Validation
		$this->form_validation->set_rules('fullname', 'Nome completo', 'trim|required|min_length[2]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required|exact_length[1]|xss_clean');
		$this->form_validation->set_rules('phone', 'Telefone residencial', 'trim|required|min_length[10]|xss_clean');
		$this->form_validation->set_rules('mphone', 'Telefone celular', 'trim|required|min_length[10]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[clientes.email]');
		$this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[6]|max_length[32]|md5|xss_clean'); //matches[form_item]
		$this->form_validation->set_rules('cpassword', 'Repita a Senha', 'trim|required|matches[password]'); //matches[form_item]

		if ($this->form_validation->run() == FALSE){
			//$this->session->set_flashdata('error_form', validation_errors());

			//$url = base_url() .'cotacao/index/1';
		//	redirect('http://localhost/seguros/#contact','refresh');
			//redirect($url,'refresh');
			$this->index();
		}
		else{
			$dataContato = array(
				'fullname' 				=> $this->input->post('fullname'),
				'sexo' 					=> $this->input->post('sexo'),
			    'phone' 				=> $this->input->post('phone'),
				'mphone' 				=> $this->input->post('mphone'),
				'cphone' 				=> $this->input->post('cphone'),
				'email' 				=> $this->input->post('email'),
				'whatsapp' 				=> $this->input->post('whatsapp'),
				'password' 				=> $this->input->post('password'),
				'status' 				=> 'N', // N, novo | L Lido | E Excluido
				'datacad' 				=> agora(),
			);


			$iDFormClient 	= $this->cotacao_m->set_cotVeiculoSt1($dataContato);
			$dataClient 	= $this->cotacao_m->get_dataClient($iDFormClient);
			//var_dump($dataClient); die;

			if ($iDFormClient){
				//Dados do  FORM com o ID da tabela
				$dadosForm = array(
					'fullname' 	=> 	$dataClient[0]['fullname'],
					'email' 	=> 	$dataClient[0]['email'],
					'id_cliente' 	=>	$iDFormClient,
					'step'		=>	2,
					'sexo'		=>	$dataClient[0]['sexo'],
					'is_logged_cli' => TRUE
				);
				$this->session->set_userdata($dadosForm);

				//echo 'Gravei com Sucesso!';
				 redirect('/cotacao_servico/', 'refresh');
			}else{
				///redirect('user/adduser/index/2', 'refresh');
				echo 'NAO Gravei com Sucesso!';
			}

		}//close else
	} //close SendDATA


} //close class

//base_url()