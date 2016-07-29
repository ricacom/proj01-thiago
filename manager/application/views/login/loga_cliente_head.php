<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="pt-br"> <!--<![endif]-->
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
