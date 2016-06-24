<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mylog {

	
    public function writeLog($aDataLog){	

    	$CI =& get_instance();	
    	$CI->load->model('go_model');

		//Grava os Dados de LOG
		$gravaLog = $CI->go_model->gravaLogAcesso($aDataLog);
		if($gravaLog){
			return TRUE;
			//echo "Gravei Log!";
		}else{
			echo "Não fui capaz de gravar o LOG de acesso!";
			return FALSE;
		}
    }

	public function writeLoginFail($aDataLog){	
		
    	$CI =& get_instance();	
    	$CI->load->model('go_model');

		//Grava os Dados de LOG
		$gravaLog = $CI->go_model->gravaLoginFail($aDataLog);
		if($gravaLog){
			return TRUE;
			//echo "Gravei Log!";
		}else{
			echo "Não fui capaz de gravar o LOG de acesso!";
			return FALSE;
		}
    }

    function writeSession($aDadosUser){
    	//var_dump($aDadosUser); die;
    	$CI =& get_instance();	
    	$CI->load->library('session');

    	$CI->session->set_userdata($aDadosUser);
    	if($CI->session->userdata('id_cliente')){ 
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }

  function writeSessionAdm($aDadosUser){
    	//var_dump($aDadosUser); die;
    	$CI =& get_instance();	
    	$CI->load->library('session');

    	$CI->session->set_userdata($aDadosUser);
    	if($CI->session->userdata('id_conta_acesso')){ 
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }


}

/* End of file Mylog.php */
