<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {


	

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'path', 'html', 'msg', 'funcutil'));
		$this->load->model(array('calendar'));	//MODEL
		$this->load->library(array('logged','session', 'fullcalendar'));
		
		/*$this->lang->load('login','pt-br');				// Language
		$this->lang->load('user','pt-br');	
		$this->lang->load('cliente','pt-br');			// Language MENU
		*/
		//$this->logged->is_logged_in_user(); 			//Is USER Logged?
	}


	public function index()	{
		$dtRecords[] = NULL;
		$data['title'] = "Agath | Dashboard ";

		$dtfooter['footer_title'] = "Agath";
		$dtfooter['footer_msg'] = "Aqui pode ser adicionado uma mensgam, promocional talvez... ";
		$data['assunto'] = "Painel de Controle";


		$this->load->view('commons/header', $data);
		$this->load->view('dashboard_v', $dtRecords);
		$this->load->view('commons/footer',$dtfooter);

	}

/*
	function get_calendar_data(){
		//if($this->input->post('type') == 'fetch'){
			//FROM LIBRARY - FULLCALENDAR
			
			//$events	= $this->fullcalendar->get_eventCalendar();
		//	$events	= $this->calendar->get_eventCalendarDetail();
			//$events	= $this->calendar->get_eventCalendar(); //get_eventCalendarDetail
			//array_push($events, $e);
		//	echo json_encode($events);
	//	}

	}
*/
	function eventClick(){
		if($this->input->post('type') == 'changetitle'){

			$id = (int)$this->input->post('eventid', TRUE);
			$dataUpdate = array(
				'id' 		=> $id,
				'title' 	=> $this->input->post('title', TRUE),
			);

			$isUpdate = $this->fullcalendar->up_eventCalendar($dataUpdate);

			if($isUpdate){
				echo json_encode(array('status'=>'success'));
			}else{
				echo json_encode(array('status'=>'failed'));
			}

		}
	}


	function eventReceive(){
		if($this->input->post('type') == 'changetitle'){

			$id = (int)$this->input->post('eventid', TRUE);
			$dataUpdate = array(
				'id' 		=> $id,
				'title' 	=> $this->input->post('title', TRUE),
			);

			$isUpdate = $this->fullcalendar->up_eventCalendar($dataUpdate);

			if($isUpdate){
				echo json_encode(array('status'=>'success'));
			}else{
				echo json_encode(array('status'=>'failed'));
			}

		}
	}
















} //close class
?>