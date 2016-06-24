<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mycountsidebar {

    public function countCotas(){

    	$CI =& get_instance();
    	$CI->load->model('contato_model');

        $aCount['cota_casa_incompleto']          = $CI->contato_model->countCotacao('cota_casa','I');
        $aCount['cota_consorcio_incompleto']     = $CI->contato_model->countCotacao('cota_consorcio','I');
        $aCount['cota_empresa_incompleto']       = $CI->contato_model->countCotacao('cota_empresa','I');
        $aCount['cota_saude_incompleto']         = $CI->contato_model->countCotacao('cota_saude','I');
        $aCount['cota_veiculo_incompleto']       = $CI->contato_model->countCotacao('cota_veiculo','I');
        $aCount['cota_vida_incompleto']          = $CI->contato_model->countCotacao('cota_vida','I');
        //Contadores completos
        $aCount['cota_casa_completo']            = $CI->contato_model->countCotacao('cota_casa','C');
        $aCount['cota_consorcio_completo']       = $CI->contato_model->countCotacao('cota_consorcio','C');
        $aCount['cota_empresa_completo']         = $CI->contato_model->countCotacao('cota_empresa','C');
        $aCount['cota_saude_completo']           = $CI->contato_model->countCotacao('cota_saude','C');
        $aCount['cota_veiculo_completo']         = $CI->contato_model->countCotacao('cota_veiculo','C');
        $aCount['cota_vida_completo']            = $CI->contato_model->countCotacao('cota_vida','C');

        //EMPRESARIAL
        $aCount['cota_e_civsocial_completo']      = $CI->contato_model->countCotacao('cota_e_civsocial','C');
        $aCount['cota_e_cond_completo']           = $CI->contato_model->countCotacao('cota_e_cond','C');
        $aCount['cota_e_emp_completo']            = $CI->contato_model->countCotacao('cota_e_emp','C');
        $aCount['cota_e_reng_completo']           = $CI->contato_model->countCotacao('cota_e_reng','C');
        $aCount['cota_e_saude_completo']          = $CI->contato_model->countCotacao('cota_e_saude','C');
        $aCount['cota_e_tcarga_completo']         = $CI->contato_model->countCotacao('cota_e_tcarga','C');
        $aCount['cota_e_vida_completo']           = $CI->contato_model->countCotacao('cota_e_vida','C');
        $aCount['cota_e_frota_completo']          = $CI->contato_model->countCotacao('cota_e_frota','C');

        return $aCount;
			//echo "Gravei Log!";
    }

}

/* End of file Mylog.php */


// ORIGINAL

        //Contadores Incompletos
    /*  $aRecCount['cota_casa_incompleto']          = $this->contato_model->countCotacao('cota_casa','I');
        $aRecCount['cota_consorcio_incompleto']     = $this->contato_model->countCotacao('cota_consorcio','I');
        $aRecCount['cota_empresa_incompleto']       = $this->contato_model->countCotacao('cota_empresa','I');
        $aRecCount['cota_saude_incompleto']         = $this->contato_model->countCotacao('cota_saude','I');
        $aRecCount['cota_veiculo_incompleto']       = $this->contato_model->countCotacao('cota_veiculo','I');
        $aRecCount['cota_vida_incompleto']          = $this->contato_model->countCotacao('cota_vida','I');
        
        //Contadores completos
        $aRecCount['cota_casa_completo']            = $this->contato_model->countCotacao('cota_casa','C');
        $aRecCount['cota_consorcio_completo']       = $this->contato_model->countCotacao('cota_consorcio','C');
        $aRecCount['cota_empresa_completo']         = $this->contato_model->countCotacao('cota_empresa','C');
        $aRecCount['cota_saude_completo']           = $this->contato_model->countCotacao('cota_saude','C');
        $aRecCount['cota_veiculo_completo']         = $this->contato_model->countCotacao('cota_veiculo','C');
        $aRecCount['cota_vida_completo']            = $this->contato_model->countCotacao('cota_vida','C');
        */