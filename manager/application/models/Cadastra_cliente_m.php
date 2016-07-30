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
		$dataSQL['datacad'] = $this->set_agora();
		// -dumpARRAY para Inset no banco
		// var_dump($dataSQL);die;
		$gravaDados = $this->db->insert('users', $dataSQL);
		$id = $this->db->insert_id();
		if   ($gravaDados){
			$this->set_controle_cliente($id);
			return  $id;
		}else{
			return FALSE; // nao gravou
		}
	}

	function set_controle_cliente($id_cliente){
		$dataSQL = array( // ARRAY para Inset no banco
		'id_cliente' 			=> $id_cliente,
		'cad_completo' 			=> 0,
	//	'pagamento_vencido' 	=> 0,
	//	'id_plano_contratado'	=> 0,
	//	'pagou_plano'	=> 0,

	);

		$gravaDados = $this->db->insert('user_control', $dataSQL);
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

function grava_user_fb($aDados){
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
		$id = $this->db->insert_id();
		if ($gravaDados){
			$this->set_controle_cliente($id);
			return  $id;
		}else{
			return FALSE; // nao gravou
		}


}















}