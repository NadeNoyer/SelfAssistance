<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >
	
			<!--input type="hidden" name="page" value="1"/-->
	    <div class="col-sm-12" >  
	        <h3> M3 <?php echo $this->getBiblio(); ?> </h3>	 
 		</div>

		<fieldset class =  "thumbnail">

			<form class="formArticle" method="post">	

				<div class= 'col-sm-12' >
					<legend class="scheduler-border" style="font-weight: normal"> 
						Mise A jour Unité de Base 
					</legend>
					 
	 				<!-- ligne of et mettre en statit 20 60 ou 80-->
				    <div class="col-sm-12 " style="margin-top: 20px;">		 
						<div class="form-group col-sm-4">
						  	<input type="text" class="form-control" id="codeArt" size="15" maxlength="15" name="codeArt" placeholder="<?php echo $nomChamp; ?>"  
						  	<?php if($nomChamp != "Code Article" ){ ?>  value=" <?php echo $nomChamp; ?>"  readonly <?php } ?> data-toggle="tooltip" title="saisir le Code Article"  >
						  	
						</div>
						<div class="form-group col-sm-3"> 		
		 				  	<a href=""  >   
								<INPUT TYPE="submit" id="lecture" class="btn btn-info col-sm-offset-2" name="lecture" value="LireUmBase" data-toggle="tooltip" 	title="Lire le produit dans M3"  >
							</a> 
						</div>
					<div class="col-md-12 message" style="color: red">&nbsp; </div> 
				</div>
			</form>
			<?php
			if (isset($this->post['lecture'])  && ($this->post['codeArt']) ) {
			?>
			<form class="formUnite" method="post">	
				<input type="hidden" class="form-control" id="codeArtSave" size="15" name='codeArtSave' value="<?php echo $this->post['codeArt'];?>">
				<div class='bootstrap-table' style="margin-top: 3%;" id="">
					<div class="fixed-table-container  col-sm-6">  
						<table id=""  class="table table-bordered table-hover" >	
							<thead>
								<th> Unité Base</th> 
								<th> Unité Prix HA</th>
								<th> Unité QT HA</th>
							</thead>
							<tbody>
								<td> <?php echo $article['MMUNMS'] ; ?></td> 
								<td> <?php echo $article['MMPPUN'] ; ?></td>
								<td> <?php echo $article['MMPUUN'] ; ?></td>
							</tbody>
						</table>
					</div>
				</div>
				 
				<div class= 'col-sm-12' >
					<div class="form-group col-sm-3">
				    	<label for="formGroupExampleInput2">Nouvelle Unité</label>
				    	<select name="unite"  class="form-control " id="unite"  data-toggle="tooltip" 
				    	        title="saisir la nouvelle unité"  > 
							<option value = "-1"  selected disabled> Sélection unité </option>
								<?php var_dump($TabUnite);
								foreach ($TabUnite as $unUnite) {
								?>
									<option value=<?php  echo $unUnite["CTSTKY"];?>><?php echo $unUnite["CTSTKY"].'- '.$unUnite["CTTX15"];?></option> 
								<?php 
								}
								?>
	                    </select> 						
					<!--<input type="text" class="form-control" id="unite" size="15" maxlength="15" name="unite" 	placeholder="Unite de Mesure" required data-toggle="tooltip" title="saisir la nouvelle unité">
					-->
					</div>
					<div class="form-group col-sm-3">
						<label for="formGroupExampleInput2">Coef multiplicateur</label>
						<input type="text" class="form-control" id="coeff" size="15" maxlength="15" name="coeff" placeholder="Coefficient" required data-toggle="tooltip" title="saisir le coefficient de conversion">
					</div>
					<div class="form-group col-sm-2"> 
					  	<a href=""  >   
							<INPUT TYPE="submit" id="updateUM" class="btn btn-info col-sm-offset-2" name="update" value="Mettre à jour" data-toggle="tooltip"	title="mettre à jour la table M3"  >
						</a> 
					</div>
				</div>
				<?php
				}
				?>
			</form>
				
		</fieldset> 
			
	</div>
	
</div>	


<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>