<?php 

class Loga_cliente extends CI_Controller{
	private $fb;

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg'));
		$this->load->library(array('form_validation', 'mylog', 'mylogin', 'logged'));
		$this->load->model(array('loga_cliente_m', 'cadastra_cliente_m')); 		// Load Model
		$this->lang->load('login','pt-br');			// Language

		$this->fb = new Facebook\Facebook([
		    'app_id' => FB_ID,
		    'app_secret' => FB_APP_SECRET,
		    'default_graph_version' => FB_DF_GRAPH_V,
		    'persistent_data_handler'=>'session'
		]);
	}



/*
	function index2(){
	
		require_once(APPPATH.'../../vendor/autoload.php');
		$fb = new Facebook\Facebook([
		  'app_id' 					=> FB_ID,
		  'app_secret' 				=> FB_APP_SECRET,
		  'default_graph_version' 	=> FB_DF_GRAPH_V,
		]);
		

		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes', 'public_profile']; // optional
		$loginUrl = $helper->getLoginUrl(base_url('Loga_cliente/login_callback_fb'), $permissions);

		$data['title'] = "Agath | Login ";
		$this->load->view('login/loga_cliente_head', $data);
	?>
	<?php
	    $aPropImg 	= array('src' => 'assets/img/logo/logotipo.png', 'class' => 'profile-img');
	    $aPropForm 	= array('class' => 'form-signin');
	    $f_email 	= array('name' => 'email','id' => 'email', 'value' => set_value('email'), 'type' => 'text', 'placeholder'=>'Email','class' => 'form-control');
	    $f_pass = array('name' => 'pass', 'id' => 'pass', 'value' => '', 'type' => 'password', 'class' => 'form-control','placeholder'=>'Senha');
	    echo form_open('loga_cliente/check_credentials', $aPropForm);
	?>
	<script type="text/javascript"> <!-- DATA FROM BACKEND-->
    	var urlbase = '<?php echo base_url(); ?>';
	</script>
	<div class="container">
    	<div class="reg-block">
	        <div class="row">
	          <div class="col-md-12">
	              <?php echo anchor(base_url().'go/'.'', img($aPropImg)); ?>
	          </div>
	        </div>
	        <div class="row box-silver">
	            <div class="col-md-6">
	              <div class="reg-block-header">
	                <div class='text-center'><?php echo $this->lang->line('identificacao'); ?></div>
	                <div class="input-group margin-bottom-20">
	                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	                    <!--input type="text" class="form-control" placeholder="Email" -->
	                    <?php echo form_input($f_email); ?>
	                </div>
	                <div class="input-group margin-bottom-20">
	                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
	                    <!-- input type="text" class="form-control" placeholder="Password" -->
	                    <?php   echo form_password($f_pass); ?>
	                </div>
	                <button type="submit" class="btn-u btn-block">Login</button>
	                </div>
	            </div>
            	<div class="col-md-6">
	                <div class="row margin-bottom-10">
	                    <div class="col-md-10 col-md-offset-1">
	                    <div class="text-center"> Sou novo no site </div>
	                    <a href='<?php echo base_url()."cadastra_cliente/"; ?>'
	                         class="btn-u btn-u-green btn100 text-center" role="button">Criar cadastro
	                    </a>
	                    </div>
	                    <br><br>
	                </div>
	                <!--div class="row margin-bottom-10">
	                    < div class="col-md-10 col-md-offset-1">
	                    <div class="text-center"> Cadastrar usando a sua conta </div>
	                    <a href='<?php //echo base_url()."cadastra_cliente/"; ?>' class="btn-u btn-u-red btn100 text-center" role="button">
	                        <i class="fa fa-google-plus"> </i> Google
	                    </a>
	                    </div>
	                </div -->

	                <div class="row margin-bottom-10">
	                    <div class="col-md-10 col-md-offset-1">
	                    	<div class="text-center"> Cadastrar usando a sua conta </div>
	                    	<a href='<?php echo $loginUrl; ?>' class="btn-u btn-u-dark-blue btn100 text-center" role="button">
	                    		<i class="fa fa-facebook"> </i> acebook
	                    	</a>
	                    </div>
	                </div>
	            </div>
	            </div>
	            <div class="row">
	                <div class="col-md-12">
	                   <?php
	                    echo "<a href='" . base_url() . "maillost' class='pull-right need-help'>
	                    <p class='text-right'><strong>Recuperar</strong> a senha </p>
	                    </a>";
	                 ?>
	                </div>
	            </div>
	    </div>    <!--End Reg Block-->
	</div><!--/container-->
	<!--=== End Content Part ===-->
	<?php
		$this->load->view('login/loga_cliente_footer');
	}  //Close Index Method
*/	

	/*
	function index(){
		$user = $this->session->userdata('id_cliente');
		//var_dump($user);
		if($user){
			redirect('dashboard', 'refresh');
		}else{ //Nao está logado, precisa ver a tela de login.
			$this->logged->is_logged_in_pagelogin();
		}

	}
	*/
/*
	public function index(){
		if($this->session->userdata('id_cliente')){
			redirect('dashboard', 'refresh');
		}else{ //Nao está logado, precisa ver a tela de login.
			$this->logged->is_logged_in_pagelogin();
		}
	}
	*/

	public function index(){
	    $helper = $this->fb->getRedirectLoginHelper();
	    //$permissions = ['email'];
	    $permissions = ['email', 'user_likes', 'public_profile']; // optional
	    $loginUrl = $helper->getLoginUrl(base_url('/loga_cliente/logado'), $permissions);

	    $data['url_fb'] = '<a href="' . htmlspecialchars($loginUrl) . '">Logar com Facebook!</a>';
	    $this->load->view('welcome_message', $data);
	    //$this->load->view('loga_cliente_v', $data);
	    
	}

	public function logado(){

	    $helper = $this->fb->getRedirectLoginHelper();

	    try {
	        $accessToken = $helper->getAccessToken();
	    } catch(Facebook\Exceptions\FacebookResponseException $e) {
	        echo 'Erro da Graph API: ' . $e->getMessage();
	        exit;
	    } catch(Facebook\Exceptions\FacebookSDKException $e) {
	        echo 'Erro da Facebook SDK: ' . $e->getMessage();
	        exit;
	    }

	    if (isset($accessToken)) {
	        $this->session->set_userdata('facebook_access_token', (string) $accessToken);
	        try {
	            //$response = $this->fb->get('/me?fields=id,name,email,picture', $accessToken);
	             $response = $this->fb->get('/me?fields=id,name,email,age_range,gender,is_verified,locale,birthday', $accessToken);
	        } catch(Facebook\Exceptions\FacebookResponseException $e) {
	            echo 'Erro da Graph API: ' . $e->getMessage();
	            exit;
	        } catch(Facebook\Exceptions\FacebookSDKException $e) {
	            echo 'Erro da Facebook SDK: ' . $e->getMessage();
	            exit;
	        }
	    } elseif ($helper->getError()) {
	        echo "Requisição negada para o usuário.";
	        exit;
	    }else{
	        echo "Erro desconhecido.";
	        exit;
	    }

	   // $user = $response->getGraphUser();

	    //var_dump($response);
			$user = $response->getGraphUser()->asArray();
			//var_dump($user); die;

			//Dados vindo do facebook API
			$aDadosUser = array(
				'id_cliente' 			=> $user['id'],
				'fullname' 				=> $user['name'],
				'email' 				=> $user['email'],
				'age_range' 			=> $user['age_range']['min'],
				'gender' 				=> $user['gender'],
				'is_verified' 			=> $user['is_verified'],
				'locale' 				=> $user['locale'],
				'is_logged_cli'			=> TRUE,

			);
			//var_dump($aDadosUser); die;

			$userExist = $this->loga_cliente_m->id_user_exist($user['id']);
		//	var_dump($userExist);

			if($userExist){ //Esse user vindo do Facebook está cadastrado, Devo Logar o usuário
				$aDataLog = array( // LOG o evento de autenticar | Envia os dados para o logar no DB
					'cod' 				=> LOG_ID_LOGIN_SUCCESS,
					'msg' 				=> LOG_MSG_LOGIN_SUCCESS,
					'idUser'			=> $aDadosUser['id_cliente'],
				);
				//GravalOG
				$gravaLog 		= $this->mylog->writeLog($aDataLog);
				$gravaSession 	= $this->mylog->writeSession($aDadosUser);

				if($gravaLog AND $gravaSession){	//sucesso no login
					redirect('dashboard', 'refresh');

				}else{		//var_dump($this->session->all_userdata());
					echo "Nao Gravei, o log e nao registrei a session"; die;
				}

			}else{			//Devo gravar o user na Dase.
				$gravaUserFb = $this->cadastra_cliente_m->grava_user_fb($aDadosUser);

				$aDataLog = array( // LOG o evento de autenticar | Envia os dados para o logar no DB
					'cod' 				=> LOG_ID_LOGIN_SUCCESS,
					'msg' 				=> LOG_MSG_LOGIN_SUCCESS,
					'idUser'			=> $aDadosUser['id_cliente'],
				);
				$gravaLog 		= $this->mylog->writeLog($aDataLog);
				$gravaSession 	= $this->mylog->writeSession($aDadosUser);

				if($gravaUserFb AND $gravaLog AND $gravaSession){	//sucesso no login
					redirect('dashboard', 'refresh');

				}else{		//var_dump($this->session->all_userdata());
					echo "Nao Gravei, o log e nao registrei a session"; die;
				}
			}


			/*
	    foreach ($user as $key => $value) {
	        echo $key.": ".$value." ";
	    }
	    */

}























/*


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
		$_SESSION['fb_access_token'] = (string) $accessToken;
			if(isset($_SESSION['fb_access_token'])){
				redirect('Loga_cliente/status_fb');	
			}else{
				echo "Login Facebook fail!";
			}
		}

*/

/*

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
			  //$response = $fb->get('/me?fields=id,name,email', $_SESSION['fb_access_token']);
			  $response = $fb->get('/me?fields=id,name,email,age_range,gender,is_verified,locale,birthday', $_SESSION['fb_access_token']);
			  //$response = $fb->get('/me', $_SESSION['fb_access_token']);
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}
			//var_dump($response);
			$user = $response->getGraphUser()->asArray();

			//Dados vindo do facebook API
			$aDadosUser = array(
				'id_cliente' 			=> $user['id'],
				'fullname' 				=> $user['name'],
				'email' 				=> $user['email'],
				'age_range' 			=> $user['age_range']['min'],
				'gender' 				=> $user['gender'],
				'is_verified' 			=> $user['is_verified'],
				'locale' 				=> $user['locale'],
				'is_logged_cli'			=> TRUE,

			);
			//var_dump($aDadosUser); die;

			$userExist = $this->loga_cliente_m->id_user_exist($user['id']);
		//	var_dump($userExist);

			if($userExist){ //Esse user vindo do Facebook está cadastrado, Devo Logar o usuário
				$aDataLog = array( // LOG o evento de autenticar | Envia os dados para o logar no DB
					'cod' 				=> LOG_ID_LOGIN_SUCCESS,
					'msg' 				=> LOG_MSG_LOGIN_SUCCESS,
					'idUser'			=> $aDadosUser['id_cliente'],
				);
				//GravalOG
				$gravaLog 		= $this->mylog->writeLog($aDataLog);
				$gravaSession 	= $this->mylog->writeSession($aDadosUser);

				if($gravaLog AND $gravaSession){	//sucesso no login
					redirect('dashboard', 'refresh');

				}else{		//var_dump($this->session->all_userdata());
					echo "Nao Gravei, o log e nao registrei a session"; die;
				}

			}else{			//Devo gravar o user na Dase.
				$gravaUserFb = $this->cadastra_cliente_m->grava_user_fb($aDadosUser);

				$aDataLog = array( // LOG o evento de autenticar | Envia os dados para o logar no DB
					'cod' 				=> LOG_ID_LOGIN_SUCCESS,
					'msg' 				=> LOG_MSG_LOGIN_SUCCESS,
					'idUser'			=> $aDadosUser['id_cliente'],
				);
				$gravaLog 		= $this->mylog->writeLog($aDataLog);
				$gravaSession 	= $this->mylog->writeSession($aDadosUser);

				if($gravaUserFb AND $gravaLog AND $gravaSession){	//sucesso no login
					redirect('dashboard', 'refresh');

				}else{		//var_dump($this->session->all_userdata());
					echo "Nao Gravei, o log e nao registrei a session"; die;
				}
			}
	}//close se está logado
}// close status_fb
*/
	function check_credentials(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pass', 'Senha', 'trim|required|min_length[6]|max_length[32]|callback_check_pass');

		if ($this->form_validation->run() == FALSE){
			/* $this->load->view('loga_cliente_v');
			 $data['title'] = "Agath | Login ";
			$this->load->view('login/loga_cliente_head', $data);
			*/
		$this->session->set_userdata('msg', 1); //Nao conseguiu logar | Veja as demais msgs em view/log/loga_cliente_footer
		//redirect('Loga_cliente/index2', 'refresh');
		}
		else{
			// VAlida com os dados da Base;
			$query = $this->loga_cliente_m->get_data_user($this->input->post('email'));
		//	var_dump($this->input->post('email'));
		//	var_dump($query); die;

			if($query != NULL) {// if the user's credentials validated...
				$aDadosUser = array(
						'id_cliente' 			=> $query->id,
						'fullname' 				=> $query->fullname,
						'email' 				=> $query->email,
						'is_logged_cli'			=> TRUE,
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
				//var_dump($_SESSION);
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
		//var_dump($check); die;
		if($check){
			return $check;
		}else{
			$this->form_validation->set_message('check_pass', 'Usuário e/ou {field} inválidos.');
			return FALSE;
		}

	}



















}
?>
