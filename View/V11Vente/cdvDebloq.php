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
			<form class="formSearch" method="post">	
				 <div class="col-sm-12 ">
				 	<legend class="scheduler-border" style="font-weight: normal"> 
						Débloque la commande de vente  : ENCOURS DE DEVELOPPEMENT
					</legend>
	     
	 				<!-- ligne of et mettre en statit 22 -->
				    <div class="col-sm-12 " style="margin-top: 20px;">		 
						<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="cde" placeholder="numero OV" data-toggle="tooltip" title="saisir le numero d'OV" readonly>
						</div>
						<div class="form-group col-sm-3"> 		
		 				  	<a href="" onclick="return(confirm('la commande sera débloquée0' ));">   
								<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2 " name="statutOF" value="Valider le déblocage" data-toggle="tooltip" title="cliquer pour débloquer la commande de vente"  > 
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