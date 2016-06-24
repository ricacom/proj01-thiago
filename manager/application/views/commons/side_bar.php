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
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
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









        