<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');


class Calendar extends CI_Model{
	function __construct(){
		parent::__construct();
		}


	function Save($data){
		$this->db->insert('table',$data);
		if($this->db->insert_id()){
			return true;
		}else{
			return false;
		}
	}


	function get_eventCalendar(){
		//var_dump($id);
		//$this->db->where('id', $id);
		$query = $this->db->get('calendar');

		foreach ($query->result() as $row) {
			$events[] = array(
            'id' 			=> $row->id,
			'title' 		=> $row->title,
			'start' 		=> $row->startdate,
			'end' 			=> $row->enddate,
			'allDay' 		=> $row->allDay,
			'user' 			=> $row->user,
			);
		}

		return $events;
	}


	function up_eventCalendar($dt){
		//var_dump($dt); die;
		$this->db->where('id', $dt['id']);
		$doUP = $this->db->update('calendar', $dt);
		if($doUP){
			return TRUE;
		}else{
			return FALSE;
		}

	}






} //Close class