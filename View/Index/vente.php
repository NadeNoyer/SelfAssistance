<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >
		<form class="formSearch" method="get">	
			<input type="hidden" name="controller" value="" />
			<input type="hidden" name="action" value="vente"/>
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
				<div class="well" style="margin-top: 20px;text-align: center; ">	<h3> Domaine VENTES 	</h3>
				</div>
			</div>
			<fieldset class =  "thumbnail">
				<h4> Commande Client </h4>
 				<!-- ligne of et mettre en statit 22 -->
			    <div class="col-sm-12 " style="margin-top: 20px;">		 
					<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="cde" placeholder="numero OV" data-toggle="tooltip" title="saisir le numero d'OV">
					</div>
					<div class="form-group col-sm-3"> 		
	 				  	<a href="" onclick="return(confirm('la commande sera débloquée0' ));">   
							<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2 " name="statutOF" value="Valider le déblocage" data-toggle="tooltip" title="cliquer pour débloquer la commande de vente"  > 
						</a>
			 		</div>
				</div>
				<!-- ligne of et mettre en statit 22 -->
				<div class="col-sm-12 " style="margin-top: 20px;">		
				 	<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="ofProjet" placeholder="numero CDE" data-toggle="tooltip" title="saisir le numero d'OF dont le code projet est à chnager">
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
			</fieldset> 			
		</form>		
	</div>
	
</div>	


<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>