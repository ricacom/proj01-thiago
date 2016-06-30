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

echo 'ricacom'.'<br>';

$fb = new Facebook\Facebook([
			  'app_id' => '944241645688491',
			  'app_secret' => 'd30e1cf0fcf4241a9f025caccc2a70bc',
			  'default_graph_version' => 'v2.6',
			]);
	
/*
$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

*/
			

	# login.php
//		$fb = new Facebook\Facebook([Helpers\FacebookRedirectLoginHelper]);
		//Facebook\Helpers\FacebookRedirectLoginHelper 
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes']; // optional
		$loginUrl = $helper->getLoginUrl(base_url('Facebook/login_callback'), $permissions);

		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	
		}

		function login_callback(){
			//var_dump($_REQUEST); die;
			# login-callback.php
		$fb = new Facebook\Facebook([
			  'app_id' => '944241645688491',
			  'app_secret' => 'd30e1cf0fcf4241a9f025caccc2a70bc',
			  'default_graph_version' => 'v2.6',
			]);
/*
			$fb = new Facebook\Facebook([
		  'app_id' => '{app-id}', // Replace {app-id} with your app id
		  'app_secret' => '{app-secret}',
		  'default_graph_version' => 'v2.2',
		  ]);
*/
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
		$tokenMetadata->validateAppId('944241645688491'); // Replace {app-id} with your app id
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

		// User is logged in with a long-lived access token.
		// You can redirect them to a members-only page.
		//header('Location: https://example.com/members.php');

}






	}// close class
?>