<?php
  // -- Carregado o Helper msg, Envia a variavel de erro para o error
  if (validation_errors() != NULL) {
    $FormError = validation_errors();
    $title = 'Falta algo!';
    modalBootstapError($title, $FormError);
  }
    //$informa = $this -> uri -> segment(3, 0);
    $informa = $this->session->userdata('msg');

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
            $this->session->sess_destroy();
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
//console.log(url);
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
