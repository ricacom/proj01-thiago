<!DOCTYPE html>
	<html lang="pt_BR">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content=" Agath é um serviço de agendamentos online que chegou para simplificar a sua vida. De forma simples e prática, você escolhe o seu médico, confere sua agenda de horários livres e agenda sua consulta.">
			<meta name="author" content="Ricardo Costa | Ricacom">

			<title><?php echo $title; ?></title>

		    <?php
			    echo link_tag(base_url().'assets/plugins/bootstrap/css/bootstrap.css') . "\n";
			    // <!-- CSS Implementing Plugins -->
                echo link_tag(base_url().'assets/plugins/sb-admin/metisMenu.min.css') . "\n";
                echo link_tag(base_url().'assets/plugins/sb-admin/timeline.css') . "\n";
                echo link_tag(base_url().'assets/plugins/sb-admin/sb-admin-2.css') . "\n";
                echo link_tag(base_url().'assets/plugins/sb-admin/morris.css') . "\n";

			   // echo link_tag(base_url().'assets/plugins/line-icons/line-icons.css') . "\n";
			    echo link_tag(base_url().'assets/plugins/font-awesome/css/font-awesome.min.css') . "\n";
			   // <!-- CSS Theme -->
			   echo link_tag(base_url().'assets/css/styleAdmin.css') . "\n"; 
			   // echo link_tag(base_url().'assets/css/themes/orange.css') . "\n";
			   // echo link_tag(base_url(). 'assets/css/headers/scrollHeader.css') . "\n";


			?>
			<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jquery/jquery.min.js' ?>"></script>

			<script type="text/javascript" src="<?php echo base_url().'assets/js/plugins/jquery-scrolltofixed.js' ?>"></script>
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
         <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbarbrand">
                    <img src="<?php echo base_url(); ?>assets/img/logo_pp.png" alt="Logo">
                </div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Ver todas Memsages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->





                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Minha Conta</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout / Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->




