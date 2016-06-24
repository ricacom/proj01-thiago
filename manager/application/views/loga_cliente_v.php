<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<title><?=$title ?></title>
<!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- CSS Global Compulsory -->
    <?php
        echo link_tag('assets/plugins/bootstrap/css/bootstrap.min.css') . "\n";
        echo link_tag('assets/css/style.css') . "\n";
        //<!-- CSS Implementing Plugins -->
        echo link_tag('assets/plugins/line-icons/line-icons.css') . "\n";
        echo link_tag('assets/plugins/font-awesome/css/font-awesome.min.css') . "\n";
    //    <!-- CSS Page Style -->
        echo link_tag('assets/css/page_log_reg_v2.css') . "\n";
        //<!-- CSS Theme -->
        echo link_tag('assets/css/themes/default.css" id="style_color') . "\n";
        //<!-- CSS Customization -->
       //echo link_tag('assets/css/custom.css') . "\n";
        echo link_tag('assets/css/themes/orange.css') . "\n";
        echo link_tag('assets/css/login.css') . "\n";
        echo link_tag('assets/css/loga_cliente.css') . "\n";
    ?>
</head>
<body>
<!--=== Content Part ===-->
<?php //var_dump($this->session->all_userdata()); 

//if ($this->session->userdata('is_logged_cli')){
//     redirect('loga_cliente', 'refresh');//
//}
?>


<?php
    $aPropImg = array(
    'src' => 'assets/img/logo/logotipo.png',
    'class'     => 'profile-img',
    );
    $aPropForm = array('class' => 'form-signin');
    $f_email = array(
        'name' => 'email',
        'id' => 'email',
        //'value' => '',
        'value' => set_value('email'),
        'type' => 'text',
        'placeholder'=>'Email',
        'class' => 'form-control',
     );
    $f_pass = array(
        'name' => 'pass',
        'id' => 'pass',
        'value' => '',
        'type' => 'password',
        'class' => 'form-control',
        'placeholder'=>'Senha',
    );
    //echo img($aPropImg);
    
    echo form_open('loga_cliente/check_credentials', $aPropForm);
?>

<div class="container">
    <!--Reg Block-->
    <div class="reg-block">

        <div class="row">
          <div class="col-md-12">
              <?php echo anchor(base_url().'go/'.'', img($aPropImg)); ?>
               
          </div>
        </div>


        <div class="row box-silver">
            <div class="col-md-6">
              <div class="reg-block-header">
                <div class='text-center'><?php echo $this->lang->line('identificacao'); ?></div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <!--input type="text" class="form-control" placeholder="Email" -->
                    <?php echo form_input($f_email); ?>
                </div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <!-- input type="text" class="form-control" placeholder="Password" -->
                    <?php   echo form_password($f_pass); ?>
                </div>
                <button type="submit" class="btn-u btn-block">Login</button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row margin-bottom-10">
                    <div class="col-md-10 col-md-offset-1">
                    <div class="text-center"> Sou novo no site </div>
                    <a href='<?php echo base_url()."cadastra_cliente/"; ?>'
                         class="btn-u btn-u-green btn100 text-center" role="button">Criar cadastro
                    </a>
                    </div>
                    <br><br>
                </div>
                <div class="row margin-bottom-10">
                    <div class="col-md-10 col-md-offset-1">
                    <div class="text-center"> Cadastrar usando a sua conta </div>
                    <a href='<?php echo base_url()."cadastra_cliente/"; ?>' class="btn-u btn-u-red btn100 text-center" role="button">
                        <i class="fa fa-google-plus"> </i> Google
                    </a>
                    </div>
                     
                </div>
                <div class="row margin-bottom-10">
                    <div class="col-md-10 col-md-offset-1">
                    <div class="text-center"> Cadastrar usando a sua conta </div>
                    <a href='<?php echo base_url()."cadastra_cliente/"; ?>'class="btn-u btn-u-dark-blue btn100 text-center" role="button">
                    <i class="fa fa-facebook"> </i> acebook
                    </a>
                    
                    </div>
                </div>




            </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                
                   <?php
                    echo "<a href='" . base_url() . "maillost' class='pull-right need-help'>
                    <p class='text-right'><strong>Recuperar</strong> a senha </p>
                    </a>";
                 ?>
                </div>
            </div>    

    </div>    <!--End Reg Block-->

</div><!--/container-->
<!--=== End Content Part ===-->
<?php
	// -- Carregado o Helper msg, Envia a variavel de erro para o error
	if (validation_errors() != NULL) {
		$FormError = validation_errors();
		$title = 'Falta algo!';
		modalBootstapError($title, $FormError);
	}
    $informa = $this -> uri -> segment(3, 0);
            //var_dump($informa); die();
            if (is_numeric($informa)) {
                switch ($informa) {
                    case 1 :
                        $title = 'Ooops! ';
                        $msg = "Usuário e/ou senha estão incorretos!<br><br> <a href='" . base_url() . "maillost'> Recuperar senha por e-mail </a>";
                        modalBootstapError($title, $msg);
                        break;
                    case 2 :
                        $title = 'Ooops! ';
                        $msg = "Para <b>acesso</b> ao sistema <br>É necessário realizar o <b>login!</b>";
                        modalBootstapError($title, $msg);
                        break;
                    case 3 :
                        $title = 'Sucesso!';
                        $msg = "<b>Deslogado</b> com sucesso, para novo acesso, refaça o login!</b>";
                        modalBootstapWarning($title, $msg);
                        break;
                    case 4 :
                        $title = 'Sucesso!';
                        $msg = "<b>Email ENVIADO </b> com sucesso, para RESET de senha.</b>";
                        modalBootstapSuccess($title, $msg);
                        break;
                    case 5 :
                        $title = 'Sucesso!';
                        $msg = "Nova <b> SENHA </b>foi gravada com sucesso.</b>";
                        modalBootstapSuccess($title, $msg);
                        break;
                    case 6 :
                        $title = 'Ooops! ';
                        $msg = "Tive problemas e <b>NÃO</b> pude gravar a senha.";
                        modalBootstapError($title, $msg);
                        break;
                    case 7 :
                        $title = 'Sucesso! ';
                        $msg = "Cadastro <b> ativado. </b>";
                        modalBootstapSuccess($title, $msg);
                        break;
                    case 8 :
                        $title = 'Ooops! ';
                        $msg = "Tive problemas e <b>NÃO</b> ativei a canta <br> solcite a geração de outro. <a href='" . base_url(). 'maincliente/resend_codigo' ."'>" ."Gerar outro codigo"."</a>";
                        modalBootstapError($title, $msg);
                        break;

                    default :
                    //redirect('user/adduser/index/', 'refresh');  msgSuccess
                }
            }
?>
<!-- JS Global Compulsory -->
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jquery/jquery.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jquery/jquery-migrate.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.min.js' ?>"></script> 
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/back-to-top.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/smoothScroll.js' ?>"></script>


<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jquery.backstretch.min.js' ?>"></script>
<script type="text/javascript">
var url  = '<?php echo base_url(); ?>';
console.log(url);
    $.backstretch([
      url+"assets/img/bg/5.jpg",
      url+"assets/img/bg/4.jpg",
      ], {
        fade: 1000,
        duration: 7000
    });

</script>
<!-- JS Page Level -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/app.js' ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
    });
</script>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
<![endif]-->
<script language="javascript">
	var options = {
		"backdrop" : "static"
	}
	$('#basicModal').modal(options);
</script>
</body>
</html>