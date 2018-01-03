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
	                
		        <div class="row">    	 
	            	<ul class="nav nav-tabs  nav-justify" style="margin-top: 20px;text-align: center; ">
	            		<li role="presentation" class=""><a href="<?php echo $this->link('','vente');?>">Vente</a></li>
	            		<li role="presentation" class="active"><a href="<?php echo $this->link('','prod');?>">Production</a></li>
						<li role="presentation class=""><a href="<?php echo $this->link('','achat');?>">Achat</a></li>
						<li role="presentation" class=""><a href="<?php echo $this->link('','compta');?>">Comptabilité</a></li>
						<li role="presentation" class=""><a href="<?php echo $this->link('','autre');?>">Autre Movex</a></li>
					</ul>
				</div> 
				<div class="well" style="margin-top: 20px;text-align: center; ">	<h3> Domaine Divers 	</h3>
				</div>
			</div>
			<fieldset class =  "thumbnail">
				<h4> Chargement de fichier </h4>
 				<!-- ligne of et mettre en statit 22 -->
			    <div class="col-sm-12 " style="margin-top: 20px;">		 
					<div class="form-group col-sm-2">
					  	<input type="text" class="form-control" id="of" size="7" maxlength="7" name="of" placeholder="numero OF" data-toggle="tooltip" title="saisir le numero d'OF">
					</div>
					<div class="form-group col-sm-3"> 		
	 				  	<a href="" onclick="return(confirm('Le statut de l of sera mis à 22' ));">   
							<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2 " name="statutOF" value="Mettre en statut à 22" data-toggle="tooltip" title="cliquer pour passer l'of en 22"  > 
						</a>
			 		</div>
				</div>
				<!-- ligne of et mettre en statit 22 -->
				 
			 
		</form>		
	</div>
	
</div>	


<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>