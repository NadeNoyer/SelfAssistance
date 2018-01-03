<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >
		<form class="formSearch" method="get">	
			<input type="hidden" name="controller" value="" />
			<input type="hidden" name="action" value="prod"/>
			<!--input type="hidden" name="page" value="1"/-->
	
	        <div class="col-sm-12" >     
	          <div class="row">  <p> Movex V11 	 </p>
	            	<ul class="nav nav-tabs  nav-justify" style="margin-top: 20px;text-align: center; ">
	            		<li role="presentation" class="active"><a href="<?php echo $this->link('','vente');?>">Vente</a></li>
	            		<li role="presentation" class=" "><a href="<?php echo $this->link('','prod');?>">Production</a></li>
	            		<li role="presentation" class=""><a href="<?php echo $this->link('V11indus','index');?>">Données Techniques</a></li>
						<li role="presentation class=""><a href="<?php echo $this->link('','achat');?>">Achat</a></li>
						<li role="presentation" class=""><a href="<?php echo $this->link('','compta');?>">Comptabilité</a></li>
					</ul>
				</div> 
				<div class="well" style="margin-top: 20px;text-align: center; ">	
					<h3> Domaine ACHAT	</h3> 	
				</div>
			</div>	
			<fieldset class =  "thumbnail">
				<h4>Ordre Achat </h4>

 				<!-- ligne of et mettre en statut 22 -->
			    <div class="col-sm-12 " style="margin-top: 20px;">		 
					<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="oA" placeholder="numero OA" data-toggle="tooltip" title="saisir le numero d'OA concerné">
					</div>
					<div class="form-group col-sm-3"> 		
	 				  	<a href="" onclick="return(confirm('Le statut de l of sera mis à 22' ));">   
							<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2 " name="statutOA" value="Supprimer Entête Aléatoire" data-toggle="tooltip" title="cliquer pour supprimer l'entête"  > 
						</a>
			 		</div>
				</div>

				<!-- Changer Fournisseur sur OA -->
				<div class="col-sm-12 " style="margin-top: 20px;">		
				 	<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="oaFrs" placeholder="numero OA" data-toggle="tooltip" title="saisir le numero d'OA dont le fournisseur est à changer">
					</div>
				
					<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="frs" placeholder="Fourniseur" data-toggle="tooltip" title="saisir le nouveau numero de fournisseur">
				 	</div>
					 		<div class="form-group col-sm-2"> 
						<a href="" onclick="return(confirm('Le projet sera changé pour l oa saisi ));">   
							<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2" name="frsOA" value="Changer Fournisseur sur OA"/>
						</a>
					</div> 
			 	</div>

				<!-- ligne of et mettre en statut 22 -->
				<div class="col-sm-12 " style="margin-top: 20px;">		
				 	<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="oaProjet" placeholder="numero OA" data-toggle="tooltip" title="saisir le numero d'OF dont le code projet est à changer">
					</div>
				
					<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="projet" placeholder="Projet" data-toggle="tooltip" title="saisir le nouveau numero de projet">
				 	</div>
					 		<div class="form-group col-sm-2"> 
						<a href="" onclick="return(confirm('Le projet sera changé pour l oa saisi ));">   
							<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2" name="projetOA" value="Changer Projet sur OA"/>
						</a>
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