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
