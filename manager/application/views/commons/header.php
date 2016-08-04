
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="pt-br"> <!--<![endif]-->  
<head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content=" Agath é um serviço de agendamentos online que chegou para simplificar a sua vida. De forma simples e prática, você escolhe o seu médico, confere sua agenda de horários livres e agenda sua consulta.">
            <meta name="author" content="Ricardo Costa | Ricacom">

            <title><?php echo $title; ?></title>

            <?php
                echo link_tag(base_url()    .'assets/plugins/bootstrap/css/bootstrap.min.css') . "\n";
                // <!-- CSS Implementing Plugins -->
                echo link_tag(base_url()    .'assets/plugins/line-icons/line-icons.css') . "\n";
                echo link_tag(base_url()    .'assets/plugins/font-awesome/css/font-awesome.min.css') . "\n";

                // <!-- CSS Header and Footer -->
                //echo link_tag(base_url().'assets/css/custom-sky-forms.css') . "\n";

                // <!-- CSS Theme -->
                //echo link_tag(base_url().'assets/css/themes/default.css') . "\n";
                echo link_tag(base_url()    .'assets/css/style.css') . "\n"; 
                echo link_tag(base_url()    .'assets/css/themes/orange.css') . "\n";
                echo link_tag(base_url()    .'assets/css/headers/scrollHeader.css') . "\n";


            ?>
<!-- Fullcalendar -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.4/jquery.timepicker.min.css">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript"> <!-- DATA FROM BACKEND-->
    var urlbase = '<?php echo base_url(); ?>';
</script>


   <!--=== End Header ===-->

</head>
<body> <!-- class="servive-block-red" -->
    <ul>
        <li class="banner">
            <div class="main servive-block-red">
                <div class="row">
                  <div class="col-md-4 text-right">
                    <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo">
                  </div>
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">

                  </div>
                </div>
            </div>
        </li>
        <li class="header">
            <div class="main">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">   <?= $assunto; ?></div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-right">   
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url('Loga_cliente/Logout'); ?>" role="button">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="content ">







