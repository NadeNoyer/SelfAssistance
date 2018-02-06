<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >
		<form class="formSearch" method="get">	
		 	<div class="col-sm-12" >
            	<h4> Movex V11 </h4>
            	<h5>  <?php echo "biblio : ".$this->getBiblioV11(). " - cono : ".$this->getConoV11() ;?> </h5>	  	 
			</div>
			<fieldset class =  "thumbnail">
				<div class= 'col-sm-12' >
				<legend class="scheduler-border" style="font-weight: normal"> 
					 Mise à jour du Projet de l' OF : ENCOURS DE DEVELOPPEMENT
				</legend>
				 


					<!-- ligne of et mettre à jour projet et élement projet -->
					<div class="col-sm-12 " style="margin-top: 20px;">		
					 	<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="ofProjet" placeholder="numero OF" data-toggle="tooltip" title="saisir le numero d'OF dont le code projet est à chnager" readonly>
						</div>
					
						<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="of" placeholder="Projet" data-toggle="tooltip" title="saisir le nouveau numero de projet" readonly>
					 	</div>
						 		<div class="form-group col-sm-2"> 
							<a href="" onclick="return(confirm('Le projet sera changé pour l of saisi ));">   
								<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2" name="projetOF" value="Changer Projet" readonly />
							</a>
						</div> 
				 	</div>
				 </div>
				</fieldset> 
			
		</form>		
	</div>
	
</div>	


<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>