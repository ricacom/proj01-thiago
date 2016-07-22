<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Institucional extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->output->cache(1440);
	}

	public function index()	{
		$data['title'] = "Clínica Modelo | Home";
		$data['description'] = "Clinica Modelo - Tipo 1";
		$this->load->view('home', $data);
	}
	public function Exames(){
		$data['title'] = "Clínica Modelo | Exames";
		$data['description'] = "Informações sobre os exames";
		$this->load->view('exames', $data);
	}
	public function Especialidades(){
		$data['title'] = "Clínica Modelo | Especialidades";
		$data['description'] = "Informações sobre os exames";
		$this->load->view('especialidades', $data);
	}
	public function Dicas(){
		$data['title'] = "Clínica Modelo | A Empresa";
		$data['description'] = "Informações sobre a empresa";
		$this->load->view('dicas', $data);
	}

	public function MarcaConsulta(){
		$data['title'] = "Clínica Modelo | Marcar consulta";
		$data['description'] = "Informações sobre os serviços prestados";
		$this->load->view('marca_consulta', $data);
	}




















} //close class
?>