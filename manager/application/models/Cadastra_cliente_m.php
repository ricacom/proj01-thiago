<?php
class Cadastra_cliente_m extends CI_Model{

	private $agora;
	private $ip;
	private $url;

	function __contruct(){
		// call the Model constructor
		parent::__construct();
	}
	//Minor methods
	private function set_agora(){
		return $this->agora  = date('Y-m-d h:i:s');
	}


	function gravaCliente($dataSQL){
		$this->db->trans_start();

		$dataSQL['datacad'] = $this->set_agora();
		// var_dump($dataSQL);die;
		$gr_user = $this->db->insert('users', $dataSQL);
		$id 		= $this->db->insert_id();
		$cr_cli 	= $this->set_controle_cliente($id);
		$df_grp 	= $this->set_default_group($id);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE){
		        $this->db->trans_rollback();
		        return FALSE;
		}else{
		        $this->db->trans_commit();
		        return  $id;
		}
		/*
		if ($gr_user AND $cr_cli AND $df_grp){
			return  $id;
		}else{
			return FALSE; // nao gravou
		}
		*/
	}

	function grava_user_fb($aDados){
		$this->db->trans_start();
	//var_dump($aDados); die;
	$sexo = ($aDados['gender'] == 'female') ? 'F' : 'M';
  	$aDadosUser = array(
		'id' 					=> $aDados['id_cliente'],
		'fullname' 				=> $aDados['fullname'],
		'email' 				=> $aDados['email'],
		'fb_age_range' 			=> $aDados['age_range'],
		'sexo' 					=> $sexo,
		'datacad' 				=> $this->set_agora(),
		'fb_is_verified' 		=> $aDados['is_verified'],
		'fb_locale' 			=> $aDados['locale'],
		'tipo_cadastro'			=> 'facebook',
		'status'				=> 'N',

	);

  	// ARRAY para Inset no banco  | utf8_general_ci
		$gravaDados = $this->db->insert('users', $aDadosUser);
		$id 		= $this->db->insert_id();
		$cr_cli 	= $this->set_controle_cliente($id);
		$df_grp 	= $this->set_default_group($id);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE){
		        $this->db->trans_rollback();
		        return FALSE;
		}else{
		        $this->db->trans_commit();
		        return  $id;
		}
		/*
		$id = $this->db->insert_id();
		if ($gravaDados){
			$this->set_controle_cliente($id);
			return  $id;
		}else{
			return FALSE; // nao gravou
		}
		*/


}


	function set_controle_cliente($id_cliente){
		$dataSQL = array( // ARRAY para Inset no banco
		'users_id' 				=> $id_cliente,
		'cad_completo' 			=> 0,
	);

		$gravaDados = $this->db->insert('user_control', $dataSQL);
		if($gravaDados){ return TRUE;}else{return  FALSE;}
	}

function set_default_group($id_cliente){
		$dataSQL = array( // ARRAY para Inset no banco
		'users_id' 				=> $id_cliente,
		'group_id' 				=> 4, //PACIENTE
		'datacad' 				=> $this->set_agora(),
	);

		$gravaDados = $this->db->insert('user2group', $dataSQL);
		if($gravaDados){ return TRUE;}else{return  FALSE;}
		//$sexo = ($aDados['gender'] == 'female') ? 'F' : 'M';
	}

	function get_dataClient($id){
		//var_dump($id);
		$this->db->where('id', $id);
		$query = $this->db->get('users');

		foreach ($query->result() as $row) {
			$cliente[] = array(
            'fullname' 		=> $row->fullname,
			'email' 		=> $row->email,
			'sexo' 			=> $row->sexo,
			);
		}

		return $cliente;
	}














}