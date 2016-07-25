<?php
class Go_model extends CI_Model{

	private $agora;
	private $ip;
	private $url;

	function __contruct(){
		// call the Model constructor  d
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
			'us_ativo' 		=> 'S',
			'us_email' 		=> $this->input->post('email'), 
			'us_pass' 		=> $this->input->post('pass'),
		);
		//var_dump($status); die;
		
		$this->db->where($status);
		$query = $this->db->get('user');
		$row = $query->row(1);
		
		//var_dump($row); die();
		return $row;
	}

*/
	function get_data_user($email){
		//Checa status, se loga, e se status for == S
		$ask = array(
			'us_email' 			=> trim($email), 
		);
		$this->db->where($ask);
		$query = $this->db->get('user');
		$row = $query->row(1);

		//var_dump($row->password); die();
		return $row;

	}

	function get_hash($email){
		//Checa status, se loga, e se status for == S
		$status = array(
			'us_ativo !=' 		=> 'N',
			'us_email' 			=> trim($email), 
		);
		$this->db->where($status);
		$query = $this->db->get('user');
		$row = $query->row(1);

		//var_dump($row->password); die();
		return $row->us_pass;
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


	

} //Close class