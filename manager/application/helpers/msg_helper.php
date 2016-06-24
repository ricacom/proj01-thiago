<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function msgError($varError){
		echo "<div id='error'>";
			 	echo "<div class='ui-widget' style='font-size: 10px; float: left;'><div class='btnClose'>x</div>
					<div class='ui-state-error ui-corner-all' style='padding: 0 .7em;'> 
						<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>"; 
						 echo  "<b> Oops!</b><br>" .$varError; 
		echo "</div></div></div>";
	
}
function msgAtention($varError){
	echo "<div id='error'>";
		echo "<div class='ui-widget' style='font-size: 10px; float: left;'><div class='btnCloseA'>x</div>";
			echo "<div class='ui-state-highlight ui-corner-all' style='padding: 0 .7em;'>"; 
				echo "<p><span class='ui-icon ui-icon-info' style='float: left; margin-right: .3em;'></span>";
				echo "<b> Atenção!</b><br>" .$varError; 
echo "</div></div></div>";
}

function msgSuccess($varError){
	echo "<div id='error'>";
		echo "<div class='ui-widget' style='font-size: 10px; float: left;'><div class='btnCloseS'>x</div>";
			echo "<div class='ui-state-success ui-corner-all' style='padding: 0 .7em;'>"; 
				echo "<p><span class='ui-icon ui-icon-circle-check' style='float: left; margin-right: .3em;'></span>";
				echo  "<b> Ok!</b><br>" .$varError; 
echo "</div></div></div>";
}

/// --------------- BOOTSTRAP MODAL  ---------------------------\\\\

function modalBootstapError($title = '',$varError){
	echo			"<div class='modal fade' id='basicModal' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>";
	echo					"<div class='modal-dialog'>";
	echo						"<div class='modal-content'>";
	echo							"<div class='modal-header alert-danger'>";
	echo								"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'> X";
	echo								"</button>";
	echo								"<h4 class='modal-title' id='myModalLabel'>" .$title ." </h4>";
	echo							"</div>";
	echo							"<div class='modal-body'>";
	echo 							"<div class='alert alert-danger'>";	
	echo								"$varError";
	echo							"</div></div>";
	//echo							"<div class='modal-footer'>";
	//echo								"<button type='button' class='btn btn-default' data-dismiss='modal'> Fechar";
	//echo								"</button>							";
//	echo							"</div>";
	echo						"</div>";
	echo					"</div>";
	echo				"</div>";
}

function modalBootstapSuccess($title = '', $varError){
	echo			"<div class='modal fade' id='basicModal' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>";
	echo					"<div class='modal-dialog'>";
	echo						"<div class='modal-content'>";
	echo							"<div class='modal-header alert-success'>";
	echo								"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'> X";
	echo								"</button>";
	echo								"<h4 class='modal-title' id='myModalLabel'>" .$title ."</h4>";
	echo							"</div>";
	echo							"<div class='modal-body'>";
	echo 							"<div class='alert alert-success'>";	
	echo								"$varError";
	echo							"</div></div>";
	//echo							"<div class='modal-footer'>";
	//echo								"<button type='button' class='btn btn-default' data-dismiss='modal'> Fechar";
	//echo								"</button>							";
//	echo							"</div>";
	echo						"</div>";
	echo					"</div>";
	echo				"</div>";
}

function modalBootstapWarning($title = '',$varError){
	echo			"<div class='modal fade' id='basicModal' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'>";
	echo					"<div class='modal-dialog'>";
	echo						"<div class='modal-content'>";
	echo							"<div class='modal-header alert-warning'>";
	echo								"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'> X";
	echo								"</button>";
	echo								"<h4 class='modal-title' id='myModalLabel'>" .$title ." </h4>";
	echo							"</div>";
	echo							"<div class='modal-body'>";
	echo 							"<div class='alert alert-warning'>";	
	echo								"$varError";
	echo							"</div></div>";
	//echo							"<div class='modal-footer'>";
	//echo								"<button type='button' class='btn btn-default' data-dismiss='modal'> Fechar";
	//echo								"</button>							";
//	echo							"</div>";
	echo						"</div>";
	echo					"</div>";
	echo				"</div>";
}

function testError($varError){
	var_dump($varError);
}
