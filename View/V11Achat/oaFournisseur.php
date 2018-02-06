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

	        	<div class="col-sm-12" >     
	          
					<legend class="scheduler-border" style="font-weight: normal"> 
						Mettre à jour le code Fournisseur (le satut doit être inférieur ou égal à 35) : ENCOURS DE DEVELOPPEMENT
					</legend>	
			
			 

					<!-- Changer Fournisseur sur OA -->
					<div class="col-sm-12 " style="margin-top: 20px;">		
					 	<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="oaFrs" placeholder="numero OA" data-toggle="tooltip" title="saisir le numero d'OA dont le fournisseur est à changer" readonly>
						</div>
					
						<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="frs" placeholder="Fourniseur" data-toggle="tooltip" title="saisir le nouveau numero de fournisseur" readonly>
					 	</div>
						 		<div class="form-group col-sm-2"> 
							<a href="" onclick="return(confirm('Le projet sera changé pour l oa saisi ));">   
								<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2" name="frsOA" value="Changer Fournisseur sur OA" readonly />
							</a>
						</div> 
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