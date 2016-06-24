<style type="text/css">
	/* .red{border: 1px solid red;} */

	.lt-border{ padding: 10px; background-color: #F9F9F9;}
	.main{margin: 0 auto;    width: 100%; }
	.content{background-color: #FFF;}
</style>

<div class="content">
<div class="row">
  	<div class="col-md-3"> <!-- Menu Lateral esquerdo -->
  		<div class="tag-box-v3 lt-border">
  			<?php $this->load->view('menu_lateral'); ?>
  		</div>
  	</div>




	<div class="col-md-9"> <!-- Conteúdo direito -->
		<div class="lt-border">
			<?php $this->load->view('jcalendar'); ?>
		</div>
	</div>


</div> <!-- close ROW -->






  
</div>

