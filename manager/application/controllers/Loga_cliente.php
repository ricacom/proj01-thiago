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
	                <div class="row margin-bottom-10">
	                    <div class="col-md-10 col-md-offset-1">
	                    <div class="text-center"> Cadastrar usando a sua conta </div>
	                    <a href='<?php echo base_url()."cadastra_cliente/"; ?>' class="btn-u btn-u-red btn100 text-center" role="button">
	                        <i class="fa fa-google-plus"> </i> Google
	                    </a>
	                    </div>
	                </div>

	                <div class="row margin-bottom-10">
	                    <div class="col-md-10 col-md-offset-1">
	                    <div class="text-center"> Cadastrar usando a sua conta </div>
	                    <a href='<?php echo $loginUrl; ?>' class="btn-u btn-u-dark-blue btn100 text-center" role="button">
	                    <i class="fa fa-facebook"> </i> acebook
	                    </a>
	                    <?php // echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>'; ?>
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
			  //$response = $fb->get('/me?fields=id,name,email', $_SESSION['fb_access_token']);
			  $response = $fb->get('/me?fields=id,name,email,age_range,gender,is_verified,locale', $_SESSION['fb_access_token']);
			  //$response = $fb->get('/me', $_SESSION['fb_access_token']);
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}
			//var_dump($response);
		$user = $response->getGraphUser();
		
/*
		echo "<hr>";
		echo "id: " . $user['id'] ."<br>";
		echo "Nome: " . $user['name'] ."<br>";
		echo "Email: " . $user['email'] ."<br>";
		    array (size=7)
      'id' => string '119349798504553' (length=15)
      'name' => string 'Ricacom User Teste' (length=18)
      'email' => string 'ricacom_kmuresj_teste@tfbnw.net' (length=31)
      'birthday' => 
        object(Facebook\GraphNodes\Birthday)[35]
          private 'hasDate' => boolean true
          private 'hasYear' => boolean true
          public 'date' => string '1980-08-08 00:00:00' (length=19)
          public 'timezone_type' => int 3
          public 'timezone' => string 'UTC' (length=3)
      'gender' => string 'female' (length=6)
      'is_verified' => boolean false
      'locale' => string 'pt_BR' (length=5)
*/

		// Procura esse id na Base, se existir loga o cara
		/*
		$aDadosUser = array(
				'id_cliente' 			=> $query->id,
				'fullname' 				=> $query->fullname,
				'email' 				=> $query->email,
				'is_logged_cli'			=> TRUE,
		);
		*/
	var_dump($user['age_range']);
		if(isset($user['id'])){
		$aDadosUser = array(
			'id_cliente' 			=> $user['id'],
			'fullname' 				=> $user['name'],
			'email' 				=> $user['email'],
			'age_range' 				=> $user['age_range'],
			'gender' 				=> $user['gender'],
			'is_verified' 			=> $user['is_verified'],
			'locale' 				=> $user['locale'],
			'is_logged_cli'			=> TRUE,

		);
		var_dump($aDadosUser); die;
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



	function messagem(){
		// -- Carregado o Helper msg, Envia a variavel de erro para o error
		if (validation_errors() != NULL) {
			$FormError = validation_errors();
			$title = 'Falta algo!';
			modalBootstapError($title, $FormError);
		}
	    //$informa = $this -> uri -> segment(3, 0);
	    $informa = $this->session->userdata('msg_login');

            //var_dump($informa); die();
            if (is_numeric($informa)) {
                switch ($informa) {
                    case 1 :
                        $title = 'Ooops! ';
                        $msg = "Usuário e/ou senha estão incorretos!<br><br> <a href='" . base_url() . "maillost'> Recuperar senha por e-mail </a>";
                        modalBootstapError($title, $msg);
                        break;
                    case 2 :
                        $title = 'Ooops! ';
                        $msg = "Para <b>acesso</b> ao sistema <br>É necessário realizar o <b>login!</b>";
                        modalBootstapError($title, $msg);
                        break;
                    case 3 :
                        $title = 'Sucesso!';
                        $msg = "<b>Deslogado</b> com sucesso, para novo acesso, refaça o login!</b>";
                        modalBootstapWarning($title, $msg);
                        break;
                    case 4 :
                        $title = 'Sucesso!';
                        $msg = "<b>Email ENVIADO </b> com sucesso, para RESET de senha.</b>";
                        modalBootstapSuccess($title, $msg);
                        break;
                    case 5 :
                        $title = 'Sucesso!';
                        $msg = "Nova <b> SENHA </b>foi gravada com sucesso.</b>";
                        modalBootstapSuccess($title, $msg);
                        break;
                    case 6 :
                        $title = 'Ooops! ';
                        $msg = "Tive problemas e <b>NÃO</b> pude gravar a senha.";
                        modalBootstapError($title, $msg);
                        break;
                    case 7 :
                        $title = 'Sucesso! ';
                        $msg = "Cadastro <b> ativado. </b>";
                        modalBootstapSuccess($title, $msg);
                        break;
                    case 8 :
                        $title = 'Ooops! ';
                        $msg = "Tive problemas e <b>NÃO</b> ativei a canta <br> solcite a geração de outro. <a href='" . base_url(). 'maincliente/resend_codigo' ."'>" ."Gerar outro codigo"."</a>";
                        modalBootstapError($title, $msg);
                        break;

                    default :
                    //redirect('user/adduser/index/', 'refresh');  msgSuccess
                }
            }
  

           $this->session->sess_destroy();
	}

















}
?>
