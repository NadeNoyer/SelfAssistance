<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >

		 <div class="col-sm-12" >  
	        <h4> Movex V11 	 </h4>	 
	        <h5>  <?php echo "biblio : ".$this->getBiblioV11(). " - cono : ".$this->getConoV11() ;?> </h5>	  	
 		</div>
 		<fieldset class =  "thumbnail">

			<form class="formOAPave" method="post">	

	        	<div class= 'col-sm-12' >
				<legend class="scheduler-border" style="font-weight: normal"> 
					 Supprimer Entête entre les lignes sur OA pdf
				</legend>
				 
 				<!-- ligne of et mettre en statit 20 60 ou 80-->
			    <div class="col-sm-12 " style="margin-top: 20px;">		 
					<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="oa" size="7" maxlength="7" name="oa" placeholder="numero OA" data-toggle="tooltip" title="saisir le numero d'OA">
					</div>
					<div class="form-group col-sm-3"> 		
	 				  	<a href=""  >   
							<INPUT TYPE="submit" id="updateOa" class="form-control btn btn-info col-sm-offset-2" name="Valider" value="Modifier Statut" data-toggle="tooltip"
							title="cliquer pour supprimer l entete aléatoire de l oa "  >
						</a> 
					</div>
					<div class="form-group col-sm-12 message" style="color: red"> &nbsp;</div>
					<div class="form-group col-sm-12" style="color: red"> 
						<?php
						//var_dump($messages)	; 
						if (is_array($messages)) {
							if (!empty($messages['KoligOa'])) {
								echo '<div class="form-group  col-sm-12 text-danger"> '.$this->afficheMessage($messages['KoligOa']).'</div>';
							}
							if (!empty($messages['KoUpdOa'])) {
								echo '<div class="form-group col-sm-12 text-danger"> '.$this->afficheMessage($messages['KoUpdOa']).'</div>';
							} 
							if (!empty($messages['OkUpdOa'])) {
								echo '<div class="form-group col-sm-12 text-success"> '.$this->afficheMessage($messages['OkUpdOa']).'</div>';
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