<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >
		<form class="formSearch" method="get">	
			<input type="hidden" name="controller" value="" />
			<input type="hidden" name="action" value="autre"/>
			<!--input type="hidden" name="page" value="1"/-->
	     
	        <div class="col-sm-12" >  
		        <div class="row">
		            <p> Movex V11 	 </p>	 
	            	<ul class="nav nav-tabs  nav-justify" style="margin-top: 20px;text-align: center; ">
	            		<li role="presentation" class="active"><a href="<?php echo $this->link('','vente');?>">Vente</a></li>
	            		<li role="presentation" class=" "><a href="<?php echo $this->link('','prod');?>">Production</a></li>
	            		<li role="presentation" class=""><a href="<?php echo $this->link('V11indus','index');?>">Données Techniques</a></li>
						<li role="presentation class=""><a href="<?php echo $this->link('','achat');?>">Achat</a></li>
						<li role="presentation" class=""><a href="<?php echo $this->link('','compta');?>">Comptabilité</a></li>
					</ul>
				</div> 
				<div class="well" style="margin-top: 20px;text-align: center; "><h3> Domaine PRODUCTION </h3>
				</div>
			</div>
			<fieldset class =  "thumbnail">
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
		 				  	<a href="" onclick="return(confirm('Le statut de l of sera mmodifié' ));">   
								<INPUT TYPE="submit" id="updateStatut" class="btn btn-info col-sm-offset-2" name="statutOF" value="Modifier Statut" data-toggle="tooltip"
								title="cliquer pour modifier le statut de l'of de 22 il passera en 20 , de 62 en 60 et de 82 en 80 "  >
							</a> 
						</div>
						<div class="form-group col-sm-12"> 
							<?php
								if (!empty($erreurs['statutOf'])) {
									echo '<div class="form-group error col-sm-4"> '.$this->afficheErreurs($erreurs['statutOf']).'</div>';
								}
							?>
						</div>
					</div>

					<!-- ligne of et mettre à jour projet et élement projet -->
					<div class="col-sm-12 " style="margin-top: 20px;">		
					 	<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="ofProjet" placeholder="numero OF" data-toggle="tooltip" title="saisir le numero d'OF dont le code projet est à chnager">
						</div>
					
						<div class="form-group col-sm-2">
						  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="of" placeholder="Projet" data-toggle="tooltip" title="saisir le nouveau numero de projet">
					 	</div>
						 		<div class="form-group col-sm-2"> 
							<a href="" onclick="return(confirm('Le projet sera changé pour l of saisi ));">   
								<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2" name="projetOF" value="Changer Projet"/>
							</a>
						</div> 
				 	</div>
				 </div>
				</fieldset> 
			<fieldset class =  "thumbnail">
				<div class= 'col-sm-12' >
					<legend class="scheduler-border" style="font-weight: normal"> 
						 Mise à jour d'un OD ou OR 
					</legend>
					  
	 				<div class="col-sm-12" style="margin-top: 40px;">		
	 					<div class="form-group col-sm-2">	
	 					  	<input type="text" class="form-control" id="telephone" size="15" maxlength="15" name="telephone" placeholder="Numero OD">
				 		</div>
				 		<div class="form-group col-sm-2">
				 		 	<a href="" onclick="return(confirm('Le statut de l od sera mis à 22' ));">   
								<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2 col-sm-5" name="statutOF" value="Numero OF"/>
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