<?php
	foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover{	text-decoration: underline; }
</style>

<style type="text/css">
	.lt-border{padding: 10px;}
	.tag-box-v3{ border-radius:8px;}
	.box{width:92%; margin:0 auto;}
</style>

<div class="box">

	<div class="row">
	  	<div class="col-md-3"> <!-- Menu Lateral esquerdo -->
	  		<div class="tag-box-v3 lt-border">
	  			<?php $this->load->view('commons/dash_lateral'); ?>
	  		</div>
	  	</div>



		<div class="col-md-9"> <!-- Conteúdo direito -->
			<div class=" lt-border">
				<div style='height:20px;'></div>  
				    <div>
						<?php echo $output; ?>
				    </div>
			</div>
		</div>


	</div> <!-- close ROW -->


</div>




	


