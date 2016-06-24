<?php  ob_start();
class Loga_cliente extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg'));
		$this->load->library(array('session', 'form_validation', 'mylog', 'mylogin'));

		$this->load->model('loga_cliente_m'); 		// Load Model
		$this->lang->load('login','pt-br');			// Language
	}

	function index(){
		$data['title'] = "Agath | Login ";
		$this->load->view('loga_cliente_v', $data);

	}

	function check_credentials(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pass', 'Senha', 'trim|required|min_length[6]|max_length[32]|callback_check_pass');

		if ($this->form_validation->run() == FALSE){
			 $this->load->view('loga_cliente_v');
			
		}
		else{

			// VAlida com os dados da Base;
			$query = $this->loga_cliente_m->get_data_user($this->input->post('email'));

			if($query != NULL) {// if the user's credentials validated...
				$aDadosUser = array(
						'id_cliente' 			=> $query->id,
						'fullname' 				=> $query->fullname,
						'email' 				=> $query->email,
						//'step'					=>	2,
						'is_logged_cli'			=> TRUE,
						//'sexo'					=> $query->sexo,

				);
				// LOG o evento de autenticar | Envia os dados para o logar no DB
				$aDataLog = array(
					'cod' 				=> LOG_ID_LOGIN_SUCCESS,
					'msg' 				=> LOG_MSG_LOGIN_SUCCESS,
					'idUser'			=> $aDadosUser['id_cliente'],
				);

				//GravalOG
				$gravaLog 		= $this->mylog->writeLog($aDataLog);
				$gravaSession 	= $this->mylog->writeSession($aDadosUser);

				if($gravaLog AND $gravaSession){
					//sucesso no login
					redirect('maincliente', 'refresh');

				}else{
					//var_dump($this->session->all_userdata());
					echo "Nao Gravei, o log e nao registrei a session"; die;
				}
			}

			else{ // incorrect username or password
				//Loga que errou dados SEGURANCA
				$aDataLog = array(
					'cod' 				=> LOG_ID_LOGIN_FAIL,
					'msg' 				=> LOG_MSG_LOGIN_FAIL,
				);

				//GravalOG
				$gravaLog = $this->mylog->writeLoginFail($aDataLog);
				//echo " Usuário e/ou senha incorreta!";
				redirect('loga_cliente/index/1', 'refresh');
			}
		} //Fecha ELSE FORM Validation
	}// CLose method check_credentials

	function checkSegureLogin(){
		$query = $this->loga_cliente_m->segurityCheckLogin();	
	}



	function logout()	{
		//log de saida
			$aDataLog = array(
					'cod' 				=> LOG_ID_LOGOUT,
					'msg' 				=> LOG_MSG_LOGOUT,
					'idUser'			=> $this->session->userdata('id_conta_acesso'),
				);

		$gravaLog = $this->mylog->writeLog($aDataLog);

		// DEstroi as variaveis q controla a autentica��o da sess�o
		$session_items = array('is_logged_in' => '', 'email' => '',  'id_conta_acesso' => '', 'admin' => '');
		$this->session->unset_userdata($session_items);

		//Destroi Sess�o  - alguns testes houve falha
		$this->session->sess_destroy();
		redirect('/', 'refresh');
		//$this->index();
	}


 	function checkSession(){
		var_dump($this->session->all_userdata());
	}


	function check_pass($pass){
		$hash = $this->loga_cliente_m->get_hash($this->input->post('email')); // pega o password(hash) que foi armazenado na base.
	
		return $this->mylogin->check_password($hash, $pass);

	}



}
?>