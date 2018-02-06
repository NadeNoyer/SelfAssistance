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
						Modifier le Dépôt de l'OA : ENCOURS DE DEVELOPPEMENT
					</legend>	
		 

					<!-- ligne of et mettre en statut 22 -->
					<div class="col-sm-12 " style="margin-top: 20px;">		
					 	<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="oa" size="7" maxlength="7" name="oa" placeholder="Numero OA" data-toggle="tooltip" title="saisir le numero d'OA dont le code projet est à changer" readonly>
						</div>
					
						<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="depot" size="3" maxlength="3" name="depot" placeholder="Depot" data-toggle="tooltip" title="saisir le nouveau projet"  readonly >
					 	</div>

					 	 
						
						<div class="form-group col-sm-2"> 
							<a href="" onclick="return(confirm(L'\oa sera modifiée  ));">   
								<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2" name="depotOA" value="Changer Depôt sur OA" readonly>
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