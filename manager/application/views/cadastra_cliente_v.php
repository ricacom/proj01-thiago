<style>
.mrg{margin-bottom: 30px;}
</style>

<!-- Begin Content -->

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">


        <div class="tag-box tag-box-v3 margin-bottom-40 block-min">
                <!-- Titlulo da SUB-pagina -->
<!-- DADOS CONTATO -->
				<h3> <i class="icon-custom rounded-x icon-bg-u fa fa-user"></i>Cadastro  </h3>
					<!-- <form role="form"> -->
					<?php echo form_open('cadastra_cliente/grava');
					$fullname 		=  array('name' => 'fullname', 	'placeholder' => 'Nome completo', 'class' => 'form-control', 'value' => set_value('fullname') );
					//$sexof			=  array('name' => 'sexo', 		'class' => 'sexo', 'value' => 'F');
					//$sexom			=  array('name' => 'sexo', 		'class' => 'sexo', 'value' => 'M');
					$phone			=  array('name' => 'phone', 	'id'=>'phone', 'placeholder' => 'Telefone residencial', 	'class' => 'form-control', 'value' => set_value('phone') );
					$mphone 		=  array('name' => 'mphone', 	'id'=>'mphone','placeholder' => 'Telefone móvel',			'class' => 'form-control', 'value' => set_value('mphone') );
					$idade 		=  array('name' => 'idade', 	'id'=>'datapicker','placeholder' => 'Idade', 		'class' => 'form-control', 'value' => set_value('idade') );
					$email 			=  array('name' => 'email', 	'id'=>'email','placeholder' => 'E-mail', 'type' => 'email',	'class' => 'form-control', 'value' => set_value('email') );


					// (Nome , email , telefone , senha , Data de nascimento ou idade  )

					?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<span class="color-red">* </span><label  for="fullname">Nome completo</label>
									<?php echo form_input($fullname); ?>
								</div>
							</div>

							<div class="col-md-3 mrg">
								<span class="color-red">* </span><label  for="sexo">Sexo</label><br>
								<label class="radio-inline">
									 <?php// echo form_radio($sexof, set_radio('sexo', 'F')); ?> 
									<input type="radio" name="sexo" class="sexo" value="F" <?php echo set_radio('sexo', 'F')?> />Feminino
								</label>
								<label class="radio-inline">
									<input type="radio" name="sexo" class="sexo" value="M" <?php echo set_radio('sexo', 'M')?>/>Masculino
									<?php //echo form_radio($sexom, set_radio('sexo', 'M')); ?> 
								</label>
							</div>
							<div class="col-md-3 mrg">
							</div>

							<div class="clearfix"></div>

							<div class="col-md-3">
								<div class="form-group">
									<span class="color-red">* </span><label  for="phone">Telefone</label>
									<?php echo form_input($phone); ?>
									<!-- <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefone residencial"> -->
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
								<span class="color-red">* </span><label  for="mphone">Telefone celular</label>
									<?php echo form_input($mphone); ?>
								<!-- <input type="text" class="form-control" name="mphone" id="mphone" placeholder="Telefone móvel"> -->
									<h6><input type="radio" name="whatsapp" id="whatsApp" value="S"> Este número tem WhatsApp </h6>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label  for="age">Idade</label>
									<?php echo form_input($idade); ?>
									<!-- <input type="text" class="form-control" name="cphone" id="cphone" placeholder="Telefone comercial"> -->
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label  for="convenio">Convênio</label>
									<select class="form-control">
									  <option>Unimed</option>
									  <option>Allianz</option>
									  <option>Amil</option>
									  <option>Bradesco Saúde</option>
									  <option>Medical Health</option>
									</select>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="col-md-6">
								<div class="form-group">
									<span class="color-red">* </span><label  for="email">E-mail</label>
									<!-- <input type="email" class="form-control" name="email" id="email" placeholder="E-mail"> -->
									<?php echo form_input($email); ?>
									<div class="text-right"> Este e-mail será seu login</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<span class="color-red">* </span><label  for="password">Senha</label>
									<input type="password" class="form-control" name="password" id="password">
									<div class='text-right'>* Mínimo 6 caracteres</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<span class="color-red">* </span><label  for="cpassword">Repita a senha</label>
									<input type="password" class="form-control" name="cpassword" id="cpassword">
								</div>
							</div>

							<div class="col-md-12">
								<!-- <a href="<?php //echo base_url().'cotacao/index/2'; ?>"> -->
									<button type="submit" class="btn btn-primary">Continuar</button>
								<!-- </a> -->
							</div>

						</div> <!-- close row -->
					</form>

</div>
  <div class="col-md-2">
  </div>
</div>
<!-- CLOSE DADOS -->
	<?php
		$error = validation_errors();
		if ($error != NULL) {
			$title = 'Falta algo!';
			modalBootstapError($title, $error);
		}
	?>




  		</div> <!-- close  TAG-BOX -->
  	
	<div class="clearfix margin-bottom-30"></div>
<?php
    //Carrega o AJAX para modal
    $modal_cotacaoSeguroCarro = TRUE;
?>




















