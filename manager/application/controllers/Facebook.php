<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Facebook extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->library(array('form_validation','session', 'upload'));
			$this->load->helper('form');
		}



		public function index(){
			require_once(APPPATH.'../../vendor/autoload.php'); 
			$fb = new Facebook\Facebook([
			  'app_id' 					=> FB_ID,
			  'app_secret' 				=> FB_APP_SECRET,
			  'default_graph_version' 	=> FB_DF_GRAPH_V,
			]);

			$helper = $fb->getRedirectLoginHelper();
			$permissions = ['email', 'user_likes']; // optional
			$loginUrl = $helper->getLoginUrl(base_url('Facebook/login_callback'), $permissions);

			echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
			echo "<br>".base_url('Facebook/login_callback');

		}




		public function login_callback(){
			require_once(APPPATH.'../../vendor/autoload.php'); 
			$fb = new Facebook\Facebook([
			  'app_id' 					=> FB_ID,
			  'app_secret' 				=> FB_APP_SECRET,
			  'default_graph_version' 	=> FB_DF_GRAPH_V,
			]);
			$helper = $fb->getRedirectLoginHelper();

			try {
			  $accessToken = $helper->getAccessToken();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
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
			  exit;
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

		$_SESSION['fb_access_token'] = (string) $accessToken;
		*/
	redirect('Facebook/status');
		}





		function logout(){
			require_once(APPPATH.'../../vendor/autoload.php'); 
			$fb = new Facebook\Facebook([
			  'app_id' 					=> FB_ID,
			  'app_secret' 				=> FB_APP_SECRET,
			  'default_graph_version' 	=> FB_DF_GRAPH_V,
			]);

		 $fb->getLogoutUrl();

		}


	function status(){

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
			redirect('Facebook/index');
		}

	}




	}// close class
?>