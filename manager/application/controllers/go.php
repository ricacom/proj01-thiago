<?php // ob_start();
class Go extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg'));
		$this->load->library(array('session', 'form_validation', 'mylog', 'mylogin'));

		// Load Model
		$this->load->model('go_model');

		//Seta a linguagem do sistema
		$this->lang->load('home','pt-br');
	}

	function index(){
			$this->load->view('go_v');

	}

	function check_credentials(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|prep_for_form');
		$this->form_validation->set_rules('pass', 'Senha', 'trim|required|min_length[6]|max_length[32]|callback_check_pass');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('go_v');
		}
		else{

			// VAlida com os dados da Base;
			$query = $this->go_model->get_data_user($this->input->post('email'));
			//var_dump($query); die();

			if($query != NULL) {// if the user's credentials validated...
				$aDadosUser = array(
					'level' 				=> $query->us_level,
					'id_conta_acesso' 		=> $query->us_id,
					'nome_conta_acesso' 	=> $query->us_nome,
					'is_logged_in'			=> TRUE,
				);
				// LOG o evento de autenticar | Envia os dados para o logar no DB
				$aDataLog = array(
					'cod' 				=> LOG_ID_LOGIN_SUCCESS,
					'msg' 				=> LOG_MSG_LOGIN_SUCCESS,
					'idUser'			=> $aDadosUser['id_conta_acesso'],
					'language'			=> 'pt-br',
				);

				//GravalOG
				$gravaLog 		= $this->mylog->writeLog($aDataLog);
				$gravaSession 	= $this->mylog->writeSessionAdm($aDadosUser);

				if($gravaLog AND $gravaSession){
					//sucesso
					redirect('admin', 'refresh');

				}else{
					/*var_dump($gravaLog);
					var_dump($gravaSession);
					var_dump($this->session->all_userdata());*/
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
				redirect('go/index/1', 'refresh');
			}
		} //Fecha ELSE FORM Validation

	}// CLose method check_credentials

	function checkSegureLogin(){
		$query = $this->go_model->segurityCheckLogin();	
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

		redirect('go/index/3', 'refresh');
		//$this->index();
	}


 	function checkSession(){
		var_dump($this->session->all_userdata());
	}


	function check_pass($pass){
		$hash = $this->go_model->get_hash($this->input->post('email')); // pega o password(hash) que foi armazenado na base.
		return $this->mylogin->check_password($hash, $pass);

	}




}
?>