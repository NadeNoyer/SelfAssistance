<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >
		<div class="col-sm-12" >
		    <h4> Movex V11 </h4>	
		    <h5>  <?php echo "biblio : ".$this->getBiblioV11(). " - cono : ".$this->getConoV11() ;?> </h5>	  	 
		</div>
		<fieldset class =  "thumbnail">

			<form class="formProjetCdv" method="post">	
	   
	        	
				<div class= 'col-sm-12' >
					<legend class="scheduler-border" style="font-weight: normal"> 
						Mise A jour  Projet et element sur commande client : ENCOURS DE DEVELOPPEMENT
					</legend>
				 
					<div class="col-sm-12 " style="margin-top: 20px;">		
					 	<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="cdv" placeholder="numero CDE" data-toggle="tooltip" title="saisir le numero d'OF dont le code projet est à changer" readonly>
						</div>
					
						<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="proj" placeholder="Projet" data-toggle="tooltip" title="saisir le nouveau numero de projet" readonly>
					 	</div>
					 	<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="elem" placeholder="Element de Projet" data-toggle="tooltip" title="saisir le nouveau numero d'élément de projet" readonly>
					 	</div>
						 <div class="form-group col-sm-4"> 
							<a href="" onclick="return(confirm('Le projet sera changé pour la commande ));">   
								<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2" name="projetOF" value="Modifier" readonly >
							</a>
						</div> 
				 	</div>
				</fieldset> 	
			</div>		
		</form>		
	</div>
	
</div>	


<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>