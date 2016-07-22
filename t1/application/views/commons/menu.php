<?php 
	if($this->router->fetch_class() == 'Institucional' && $this->router->fetch_method() == 'index'){
?>
<ul class="nav masthead-nav">
	<?php } else {?>
<ul class="nav navbar-nav">
	<?php } ?>

<li class="<?=($this->router->fetch_class() == 'Institucional' && $this->router->fetch_method() == 'index') ? 'active' : null; ?>">
	<a href="<?=base_url()?>" >Início</a>
</li>

<li class="<?=($this->router->fetch_class() == 'institucional' && $this->router->fetch_method() == 'exames') ? 'active' : null; ?>">
	<a href="<?=base_url('institucional/exames')?>" >Exames</a>
</li>

<li class="<?=($this->router->fetch_class() == 'institucional' && $this->router->fetch_method() == 'especialidades') ? 'active' : null; ?>">
	<a href="<?=base_url('institucional/especialidades')?>" >Especialidades</a>
</li>

<li class="<?=($this->router->fetch_class() == 'institucional' && $this->router->fetch_method() == 'dicas') ? 'active' : null; ?>">
	<a href="<?=base_url('institucional/dicas')?>"> Dicas</a>
</li>

<li class="<?=($this->router->fetch_class() == 'institucional' && $this->router->fetch_method() == 'marcaconsulta') ? 'active' : null; ?>">
	<a href="<?=base_url('institucional/marcaconsulta')?>">Marque uma consulta</a>
</li>
<li class="<?=($this->router->fetch_class() == 'Contato' && $this->router->fetch_method() == 'FaleConosco') ? 'active' : null; ?>">
	<a href="<?=base_url('fale-conosco')?>">Fale Conosco</a>
</li>

</ul>