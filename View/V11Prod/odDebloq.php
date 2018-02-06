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
    
	    	<form class="formDebloqOD" method="post">	    
        		<div class="col-sm-12" >  

        			<legend class="scheduler-border" style="font-weight: normal"> 
					Débloque une OD ou un OR
					</legend>

	 				<div class="col-sm-12" style="margin-top: 40px;">		
	 					<div class="form-group col-sm-2">	
	 					  	<input type="text" class="form-control" id="od" size="15" maxlength="15" name="od" placeholder="Numero OD" readonly >
				 		</div>
				 		<div class="form-group col-sm-2">
				 		 	<a href="" onclick="return(confirm('Le statut de l od sera modifié' ));">   
								<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2 col-sm-5" name="statutOD" value="Valider" readonly />
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