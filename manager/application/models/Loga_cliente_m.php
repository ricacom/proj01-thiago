<?php
class Loga_cliente_m extends CI_Model{

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
	private function set_ip(){
		return $this->ip  = $_SERVER["REMOTE_ADDR"];
	}
	private function set_url(){
		return $this->url  = $_SERVER["REQUEST_URI"];
	}


/*
	function validateUserToLogin(){
		//Checa status, se loga, e se status for == S
		$status = array(
			'status !=' 		=> 'B',
			'email' 			=> trim($this->input->post('email')), 
			'password' 			=> trim($this->input->post('pass')),
		);
		//var_dump($status); die;

		$this->db->where($status);
		$query = $this->db->get('users');
		$row = $query->row(1);

		//var_dump($row); die();
		return $row;
	}
*/

	function get_data_user($email){
		//Checa status, se loga, e se status for == S
		$status = array(
			'email' 			=> trim($email), 
			'tipo_cadastro'		=> 'form_site',
		);
		$this->db->where($status);
		$query = $this->db->get('users');
		$row = $query->row(1);

		//var_dump($row->password); die();
		return $row;

	}

// TODO FAZER O LOGIN RETORNAR O EMAIL/USER QUE NAO FOI ATIVADO
	function get_hash($email){
		//Checa status, se loga, e se status for == S
		$status = array(
			'status !=' 		=> 'B',
		//	'status !=' 		=> 'N',
			'email' 			=> trim($email), 
		);
		$this->db->where($status);
		$query = $this->db->get('users');
		$row = $query->row(1);

		//var_dump($row->password); die();
		if($row){
			return $row->password;
		}else{
			return FALSE;
		}
		
	}


	function gravaLogAcesso($dtCad){
		//$dateHora 	= date('Y-m-d h:i:s'); 
		// ARRAY para Inset no banco
		$dataSQL = array(
		'lg_id'		=> '' ,
		'lg_user'	=> $dtCad['idUser'],
		'lg_data'	=> $this->set_agora(),  
		'lg_cod'	=> $dtCad['cod'],
		'lg_msg'	=> $dtCad['msg'],
		'lg_url'	=> $this->set_url(),
		'lg_ip'		=> $this->set_ip(),
	);
		$gravaDados = $this->db->insert('log', $dataSQL);
		if   ($gravaDados){
			return TRUE; //Sucesso na gravacao
		}else{
			return FALSE; // nao gravou
		}
	}

function confirma_link_ativacao($cod){ //Checa se codigo existe
		$cod = array(
			'cod_ativacao' 			=> trim($cod), 
		);
		$this->db->where($cod);
		$query = $this->db->get('users');
		$row = $query->row(1);
	//		var_dump($row->id); die();
		if($row){
			return $row->id;	
		}else{
			return FALSE;
		}
}

function ativa_cliente_novo($id_cliente){
	$aData = array(
			'cod_ativacao' 		=> NULL, 
			'status'			=> 'N',
			'data_ativacao'		=> date('Y-m-d h:m:s'),
		);
	//var_dump($aData); die;
		$this->db->where('id', $id_cliente);
		$doUP = $this->db->update('users', $aData);
		if($doUP){
			return TRUE;
		}else{
			return FALSE;
		}


}

	function gravaLoginFail($dtCad){
		// ARRAY para Inset no banco
		$dataSQL = array(
		'lg_id'		=> '' ,
		'lg_user'	=> 0 ,
		'lg_data'	=> $this->set_agora(),
		'lg_cod'	=> $dtCad['cod'],
		'lg_msg'	=> $dtCad['msg'] ,
		'lg_url'	=> $this->set_url() ,
		'lg_ip'		=> $this->set_ip() ,
	);
		$gravaDados = $this->db->insert('log', $dataSQL);
		if   ($gravaDados){
			return TRUE; //Sucesso na gravacao
		}else{
			return FALSE; // nao gravou
		}
	}

	function segurityCheckLogin(){
			//Checa status, se loga, e se status for == S
		$ip = array(
			'lg_ip' 		=> $this->set_ip(),
			'lg_cod'		=> '404',
		);

		//var_dump($status); die;
		/*
		Possivel ideia, busco a maior data, mais recente
		subtraio 3min (tempo de expiração)
		e conto na base quantos registros tem, se tiver mais que o numero limite de tentativas
		bloqueia o cara por x min.

		<?php
$timestamp = strtotime("2010-07-15 07:58:23 -0700");
?>
then you can do your calculation

<?php
$difference = time() - $timestamp; // this will give you the number of seconds difference
		
		*/
		$this->db->where($ip);
		$this->db->select_min('lg_data');
		//$this->db->select_max('lg_data');
		$query = $this->db->get('log');
		$query->num_rows();
		
		var_dump($query->result()); die();
		return $row;
	
	}



function id_user_exist($id){
	$id = (int)$id;
	$this->db->where('id', $id);
	$query = $this->db->get('users');
	$row = $query->row(1);
	if($row){
		return $row->id;	
	}else{
		return FALSE;
	}

}

function user_exist($email){
	//$id = (int)$id;
		$this->db->where($email);
		$query = $this->db->get('users');
		$row = $query->row(1);
	//		var_dump($row->id); die();
		if($row){
			return $row->id;	
		}else{
			return FALSE;
		}

}





} //Close class