<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Fullcalendar {

	
 




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


public function get_eventCalendar(){
        $CI =& get_instance();  
        $CI->load->model('calendar');

        //MODEL , Method get_eventCalendar
        $gravaLog = $CI->calendar->get_eventCalendar();
       return  $gravaLog;

    }

public function up_eventCalendar($dataUpdate){
    $CI =& get_instance();  
    $CI->load->model('calendar');

    $updateDataToDb = $CI->calendar->up_eventCalendar($dataUpdate);
        return  $updateDataToDb;




}











}

/* End of file Mylog.php */
