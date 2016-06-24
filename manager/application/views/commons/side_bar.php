<?php
$page = $this -> uri -> segment(1, 0); 
//echo $page;
switch ($page) {
case 'admin':
  $activeAdmin = TRUE;
 break;
case 'contato':
  $activeSitePublic = TRUE;
  $activeContato = TRUE;
  break;

case 'admcotado':
  $activeCotado = TRUE;
  # code...
  break;
case 'value':
  # code...
  break;
default:
  # code...
  break;
}
//SUB Pages COtacao
$subpage = $this -> uri -> segment(3, 0); 
switch ($subpage) {
  case 'vda': //Vida
    $spVda = TRUE;
    break;
  case 'csa': //Casa  - Residencial
    $spCsa = TRUE;
    break;
  case 'cio': //Consórcio
    $spCio = TRUE;
    break;
  case 'emp': //Empresarial
    $spEmp = TRUE;
    break;
  case 'sde': //Saude
    $spSde = TRUE;
    break;
  case 'vdo': //Veículo
    $spVdo = TRUE;
    break;

    //EMPRESARIAL
  case 's_empr': //EMpresa
    $spS_empr = TRUE;
    break;
  case 's_svda': 
    $spS_svda = TRUE;
    break;
  case 's_reng': 
    $spS_reng = TRUE;
    break;
  case 's_csoc': 
    $spS_csoc = TRUE;
    break;
  case 's_cond': 
    $spS_cond = TRUE;
    break;
  case 's_stca': 
    $spS_stca = TRUE;
    break;
  case 's_spls': 
    $spS_spls = TRUE;
    break;
    case 's_frta': 
    $spS_frta = TRUE;
    break;
  default:
  //spS_frta

    break;
}
?>




  <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav  sidebar-nav-default navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="index.html"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                       
                        <li>
                            <a href="#"><i class="fa fa-envelope fa-fw"></i> Contatos recebidos</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Cadastro Geral<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-plus"></i> Clínica</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-plus"></i> Convênio</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-plus"></i> Médico</a>
                                </li>
                                <li>
                                     <a href="#"><i class="fa fa-plus"></i> Paciente</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                      
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Relatórios<span class="fa arrow"></span></a>
                            <ul class="nav navbar-default nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-file-o fa-fw"></i> Agendamentos</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-file-o fa-fw"></i> Usuários</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-file-o fa-fw"></i> Acessos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>









        