<?php 

class Loga_cliente extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg'));
		$this->load->library(array('session', 'form_validation', 'mylog', 'mylogin'));

		$this->load->model('loga_cliente_m'); 		// Load Model
		$this->lang->load('login','pt-br');			// Language
	}

	function index(){
		require_once(APPPATH.'../../vendor/autoload.php'); 
		$fb = new Facebook\Facebook([
		  'app_id' 					=> FB_ID,
		  'app_secret' 				=> FB_APP_SECRET,
		  'default_graph_version' 	=> FB_DF_GRAPH_V,
		]);

		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes', 'public_profile']; // optional
		$loginUrl = $helper->getLoginUrl(base_url('Loga_cliente/login_callback_fb'), $permissions);

		//echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
		//echo "<br>".base_url('Loga_cliente/login_callback');

		$data['title'] = "Agath | Login ";
		$data['fb_url'] = $loginUrl ;
		$this->load->view('loga_cliente_v', $data);

	}



	public function login_callback_fb(){
		require_once(APPPATH.'../../vendor/autoload.php'); 
		$fb = new Facebook\Facebook([
		  'app_id' 					=> FB_ID,
		  'app_secret' 				=> FB_APP_SECRET,
		  'default_graph_version' 	=> FB_DF_GRAPH_V,
		]);
		$helper = $fb->getRedirectLoginHelper();
		//var_dump($helper); die;

		try {
		  $accessToken = $helper->getAccessToken();
		  //var_dump($accessToken); die;
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error : ' . $e->getMessage();
		  exit;
		}

		if (! isset($accessToken)) {
		  if ($helper->getError()) {
		    header('HTTP/1.0 401 Unauthorized');
		    echo "Error: " . $helper->getError() . "\n";
		    echo "Error Code: " . $helper->getErrorCode() . "\n";
		    echo "Error Reason: " . $helper->getErrorReason() . "\n";
		    echo "Error Description: " . $helper->getErrorDescription() . "\n";
		  } else {
		    header('HTTP/1.0 400 Bad Request');
		    echo 'Bad request';
		  }
		  // exit;
		}


/*

		// Logged in
		echo '<h3>Access Token</h3>';
		var_dump($accessToken->getValue());

		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

		// Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);
		echo '<h3>Metadata</h3>';
		var_dump($tokenMetadata);

		// Validation (these will throw FacebookSDKException's when they fail)
		$tokenMetadata->validateAppId('1057411391033802'); // Replace {app-id} with your app id
		// If you know the user ID this access token belongs to, you can validate it here
		//$tokenMetadata->validateUserId('123');
		$tokenMetadata->validateExpiration();

		if (! $accessToken->isLongLived()) {
		  // Exchanges a short-lived access token for a long-lived one
		  try {
		    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		  } catch (Facebook\Exceptions\FacebookSDKException $e) {
		    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
		    exit;
		  }

		  echo '<h3>Long-lived</h3>';
		  var_dump($accessToken->getValue());
		}
		*/

		$_SESSION['fb_access_token'] = (string) $accessToken;
			if(isset($_SESSION['fb_access_token'])){
				redirect('Loga_cliente/status_fb');	
			}


		}





	function status_fb(){

		require_once(APPPATH.'../../vendor/autoload.php'); 
		$fb = new Facebook\Facebook([
		  'app_id' 					=> FB_ID,
		  'app_secret' 				=> FB_APP_SECRET,
		  'default_graph_version' 	=> FB_DF_GRAPH_V,
		]);

		if(isset($_SESSION['fb_access_token'])){ //Está logado.
			try {
			  // Returns a `Facebook\FacebookResponse` object
			  $response = $fb->get('/me?fields=id,name,email', $_SESSION['fb_access_token']);
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}
		$user = $response->getGraphUser();

		echo "<hr>";
		echo "id: " . $user['id'] ."<br>";
		echo "Nome: " . $user['name'] ."<br>";
		echo "Email: " . $user['email'] ."<br>";
		}else{ //Não está logado.. será redirecionado.
			//redirect('Loga_cliente');
			 var_dump($this->session->userdata());
			
		}

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
					redirect('dashboard', 'refresh');

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
				$this->session->set_userdata('msg_login', '1');
				redirect('loga_cliente', 'refresh');
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
					'idUser'			=> $this->session->userdata('id_cliente'),
				);

		$gravaLog = $this->mylog->writeLog($aDataLog);

		//Destroi as variaveis q controla a autentica��o da sess�o
		$session_items = array('is_logged_in' => '', 'email' => '',  'id_cliente' => '', 'admin' => '');
		$this->session->unset_userdata($session_items);

		//Destroi Sessao  - alguns testes houve falha
		$this->session->sess_destroy();
		redirect('/', 'refresh');
		//$this->index();
	}


 	function checkSession(){
		var_dump($this->session->all_userdata());
	}


	function check_pass($pass){
		$hash = $this->loga_cliente_m->get_hash($this->input->post('email',TRUE)); // pega o password(hash) que foi armazenado na base.
		$check = $this->mylogin->check_password($hash, $pass);
		if($check){
			return $check;
		}else{
			$this->form_validation->set_message('check_pass', 'Usuário e/ou {field} inválidos.');
			return FALSE;
		}

	}





















}
?>