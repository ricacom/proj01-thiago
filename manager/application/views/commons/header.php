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
			    echo link_tag(base_url().'assets/plugins/bootstrap/css/bootstrap.min.css') . "\n";
			   	
			    // <!-- CSS Implementing Plugins -->
			    echo link_tag(base_url().'assets/plugins/line-icons/line-icons.css') . "\n";
			    echo link_tag(base_url().'assets/plugins/font-awesome/css/font-awesome.min.css') . "\n";

			   // <!-- CSS Header and Footer -->
			    
				// <!-- load css for cubeportfolio -->
			    //echo link_tag(base_url().'assets/css/custom-sky-forms.css') . "\n";

			   // <!-- CSS Theme -->
			   //echo link_tag(base_url().'assets/css/themes/default.css') . "\n";
			    echo link_tag(base_url().'assets/css/style.css') . "\n"; 
			    echo link_tag(base_url().'assets/css/themes/orange.css') . "\n";
			    echo link_tag(base_url(). 'assets/css/headers/scrollHeader.css') . "\n";


			?>
			<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jquery/jquery.min.js' ?>"></script>

			<script type="text/javascript" src="<?php echo base_url().'assets/js/plugins/jquery-scrolltofixed.js' ?>"></script>

         
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>


   <!--=== End Header ===-->

<script>
    $(document).ready(function() {
        $('.header').scrollToFixed();
        $('.footer').scrollToFixed( {           bottom: 0,            limit: $('.footer').offset().top        });

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    });
</script>
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
            	  	<div class="text-right">		  </div>
            	  </div>
            	</div>
            </div>
        </li>
        <li class="header">
            <div class="main">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="text-center">	<?= $assunto; ?></div>
                    </div>
                </div>
            </div>
        </li>
        <li class="content ">




