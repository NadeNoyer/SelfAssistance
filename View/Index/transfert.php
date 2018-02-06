<?php

ob_start();

?>

 
<div class='container'	>
	<!-- liste déroulante -->
 	  
	<div class="col-sm-12"> &nbsp; </div>

	<div class="col-sm-12">
		<legend class="scheduler-border">
			<div class="well col-sm-12" >
	       		<h2  >
	       			<span style="padding-right: 30px" class="glyphicon glyphicon-pencil"></span> Application de Transfert de Fichiers Volumineux 
	       		</h2> 
			</div>
		</legend>
	</div>

	<fieldset class =  "thumbnail">

		<div class= 'col-sm-12' >
			<legend class="scheduler-border" style="font-weight: normal"> 
				Sélectionner un(des) fichier(s) et saisir votre adresse mail 
			</legend>

			<form class="transfert input-group" method='post' enctype="multipart/form-data"  >	
				<div class="col-sm-12"> &nbsp; </div>
				<div class="col-sm-12">
					<p>  Sélectionner un ou plusieurs fichiers.  </p>
				</div>
				<div class="col-sm-12"> &nbsp; </div>
				<div class="col-sm-12">
					<p> La saisie de votre email, vous permettra de recevoir le chemin des fichiers à télécharger et le faire suivre. </p>
				</div>	
				
				<div class="col-sm-12"> &nbsp; </div>
				<div class="col-sm-12"> &nbsp; </div>

				<!-- associer a=vec la fonction JS selectFiles -->
				<div class='col-sm-12' >
					<div class='col-sm-6' >
						<input name="selectFiles[]" id="selectFiles" type="file" multiple />
			        </div>
			        <div class='col-sm-6' >					 
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<div class="input-group-addon">@
						    </div>
			  				<input type="text" class="form-control" id="destinataire" name="mail" 
			  					   placeholder=" votre adresse mail " size="36" maxlength="36"  > 
			  			</div>	
			  		</div>
		   		</div>

				<!-- /*  de l'interface */ -->
				<div class='col-sm-12' > &nbsp; </div>

		 		<div class='col-sm-12' >
				 	<div class='col-sm-6' >
					  		<output id="list"></output>
					 </div>
				</div>
					 	  
 			
				<div class='col-sm-12 message' > &nbsp; </div>

				<div class='col-sm-12' > 
					<div class="col-sm-6  ">
		  	 	 		 
				 		<INPUT type="submit" class="btn btn-info pull-right" name="Valider" value="Télécharger et Envoyer"/>
						 
					</div>
		 		</div>

		 		<div class="col-sm-10" id="return"><p> <?php if (isset($post['Valider'])) {echo $returnMail;} ?></p></div> 

			</form>	

			
			 
			
		</div>
	</fieldset>
	
</div>



<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>