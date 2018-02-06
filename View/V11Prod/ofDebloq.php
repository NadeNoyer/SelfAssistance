<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >
	     
	    <div class="col-sm-12" >  
	        <h3> Movex V11 	 </h3>	 
 		</div>

		<fieldset class =  "thumbnail">

			<form class="formDebloqOf" method="post">	
	
				<div class= 'col-sm-12' >
				<legend class="scheduler-border" style="font-weight: normal"> 
					 Mise à jour d'un OF 
				</legend>
				 
 				<!-- ligne of et mettre en statit 20 60 ou 80-->
			    <div class="col-sm-12 " style="margin-top: 20px;">		 
					<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="of" placeholder="numero OF" data-toggle="tooltip" title="saisir le numero d'OF">
					</div>
					<div class="form-group col-sm-3"> 		
	 				  	<a href=""  >   
							<INPUT TYPE="submit" id="updateStatut" class="form-control btn btn-info col-sm-offset-2" name="Valider" value="Modifier Statut" data-toggle="tooltip"
							title="cliquer pour modifier le statut de l'of de 22 il passera en 20 , de 62 en 60 et de 82 en 80 "  >
						</a> 
					</div>
					<div class="form-group col-sm-12 message" style="color: red"> &nbsp;</div>
					<div class="form-group col-sm-12" style="color: red"> 
						<?php
						//var_dump($messages)	; 
						if (is_array($messages)) {
							if (!empty($messages['KoStatutOf'])) {
								echo '<div class="form-group  col-sm-12 text-danger"> '.$this->afficheMessage($messages['KoStatutOf']).'</div>';
							}
							if (!empty($messages['KoUpdOf'])) {
								echo '<div class="form-group col-sm-12 text-danger"> '.$this->afficheMessage($messages['KoUpdOf']).'</div>';
							} 
							if (!empty($messages['OkUpdOf'])) {
								echo '<div class="form-group col-sm-12 text-success"> '.$this->afficheMessage($messages['OkUpdOf']).'</div>';
							}
						}
							?>
					</div>
				 					 
				</div>
				 

			</form>			

		</fieldset> 
			 
		
	</div>
	
</div>	


<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>