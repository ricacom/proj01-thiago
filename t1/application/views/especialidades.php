<?php $this->load->view('commons/header'); ?>

<div class="container">
	<div class="page-header">
		<h1>Nossas Especialidades </h1>
	</div>
	
	<?php //var_dump($this->router->fetch_method()); ?>
	<?php //var_dump( $this->router->fetch_class()); ?> 


	<div class="row">
	  <div class="col-md-4">
	  		<p class="lead">
				Confira nossas especialidades
			</p>
			<li>Exames Cardiológicos</li>
			<li>Utrassom
				<ul>
					<li>Doppler</li>
					<li>Doppler colorido</li>
				</ul>
			</li>
			<li>Utrasonografia</li>

	  </div>
	  <div class="col-md-8">
	  	<img class="img-servico" src="<?=base_url();?>assets/img/especialidade.jpg">
	  </div>
	</div>
	
</div>

<?php $this->load->view('commons/footer'); ?>