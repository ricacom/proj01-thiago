<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function SendEmailExternal($titulo ='', $msg = ''){
		$email = 'comercial@seguroscampinas.com';
		//$email = 'ricacom@gmail.com';
		//LOAD FUNCTIONS UPPER
		$CI =& get_instance();
    	$CI->load->library('email');
    	$CI->load->helper('email');
	

	if (valid_email($email)){

		$message  =  "----------------------------------------------------------";
		$message .=  "<br> |       		CONTATO - MSG do SITE 		    <br>";
		$message .=  "----------------------------------------------------------";
		$message .= "<br>Recebi de: " .$email;
		$message .= ",\n\n  \n";

		$CI->email->set_newline("\r\n\n");
		
		$message .= $msg;

		$CI->email->set_newline("\r\n\n");

		$CI->email->initialize();
		$CI->email->from('site@seguroscampinas.com', 'SegurosCampinas.com');

		$CI->email->to($email);
		$CI->email->subject('|-> Contato '.$titulo);
		$CI->email->message($message);

		if($CI->email->send()){
			//$this->session->set_userdata('valida', 'email-send');
			return TRUE;
			//redirect('maillostadm/check','refresh');
			
			//show_error($this->email->print_debugger());
		}else {
			echo "Nao fui capaz de enviar | Contate o suporte do servidor de E-mail.";
			//show_error($CI->email->print_debugger());
			return FALSE;
			die();

		}
	  

	}else{
	    echo '<br>Erro o e-mail NAO eh valido <br>';
	}





}// close function