<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function dateUsToPtBr($date){
		//$date 	= '2012-05-15 03:05:47';
		$pc 	= explode(" ", $date);
		$dia 	= explode("-",$pc[0]);
		$hora 	= explode(":",$pc[1]);
		return $ptDia = "$dia[2]/$dia[1]/$dia[0]" ."<br>".$pc[1];

	}
	function dateUsToPtBrSlash($date){
		//$date 	= '2012-05-15 03:05:47';
		$pc 	= explode(" ", $date);
		$dia 	= explode("-",$pc[0]);
		$hora 	= explode(":",$pc[1]);
		return $ptDia = "$dia[2]/$dia[1]/$dia[0]" ." ".$pc[1];

	}
	function datePtBrToUsDMY($date){
		//$date 	= '03/05/2014';
		$pc 	= explode(" ", $date);
		$dia 	= explode("/",$pc[0]);

		return $ptDia = "$dia[2]-$dia[1]-$dia[0] 00:00:00";

	}

	function dateUsToPtBrWithoutHours($date){
		//$date 	= '2012-05-15 03:05:47';
		$pc 	= explode(" ", $date);
		$dia 	= explode("-",$pc[0]);
		$hora 	= explode(":",$pc[1]);
		return $ptDia = "$dia[2]/$dia[1]/$dia[0]";

	}

	function showLessChar($string, $number =200){

		return substr($string, 0, $number).'...';
		//	return $string;

	}
	function agora(){
		return date('Y-m-d h:i:s');
	}
	function agoraPtBR(){
		return date('d/m/Y h:i:s');
	}

	function switchAtivo($str){
		if(($str == 1) OR ($str == 'S')){
			return "Sim";
		}
		if(($str == 0) OR ($str == 'N')){
			return "Não";
		}

	}
	function switchSexo($str){
		if($str == 'F'){
			return "Feminino";
		}
		if($str == 'M'){
			return "Masculino";
		}

	}

	function changeEstadoCivil($id){

    	$CI =& get_instance();
    	$CI->load->model('admcotado_m');

        $aDesc = $CI->admcotado_m->getEstadoCivilById($id);
       // $aCount['cota_casa_completo']            = $CI->contato_model->countCotacao('cota_casa','C');

        return $aDesc;
			//echo "Gravei Log!";
    }