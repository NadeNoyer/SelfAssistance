<?php

ob_start();

?>

<div id="col-sm-12">
	<!-- Société -->
	
	<legend class="scheduler-border">
		<div class="well col-sm-12" >
       		<h2  >
       			<span style="padding-right: 30px" class="glyphicon glyphicon-pencil"></span> Application de  Mise à jour taux Devise
       		</h2> 
		</div>
	</legend>
	 
	<form method="post" action = ""  >
	<!--<input type="hidden" name="controller" value="index" /> 
	<input type="hidden" name="action" value="taux" />	 -->

		<div class= "col-sm-12" > 
			<div class= "col-sm-offset-4  col-sm-6" > 
			    <a href="" onclick="return(confirm('Confirmer la création de la fiche fournisseur'));" >   
				 	<INPUT TYPE="submit" class="btn btn-info col-sm-5 " name="Update" value="Mise à jour M3 "/>
				</a>
			</div>
		</div>

		<div class="col-sm-12"> &nbsp;  </div>
			
	 
		<div class='bootstrap-table' id="">
			<div class="fixed-table-container">
				 
				<table id="mesTaux"  class="tablesorter table table-striped table-bordered " >
					<thead> 
						<tr  class=".noExl"> 
							<th colspan="1" style="text-align:center">   Devise source </th>
							<th colspan="4" style="text-align:center">   Devise cible   </th>
						</tr>	
						<tr >
							<th> Nom</th>
							<th> title </th>
							<th> Devise </th>
							<th> Libell&eacute; </th>
							<th> taux </th>
						</tr>
					</thead> 
					<tbody>
				
					<?php
		 			foreach ($deviseAAfficher as $uneDeviseAAfficher) {
						?>

						<tr>
							<td class="text-center" colspan = "5" style="Font-Weight: Bold;"><h3><?php echo $uneDeviseAAfficher;?></h3></td> 
						</tr> 

						 
			 			<?php

		 				foreach ($tabFinal[$uneDeviseAAfficher]  as $uneligneTabFinal) {	
		 					
			 			 
		 					if ($uneligneTabFinal["baseCurrency"]  != "") {

		 						?>
						 		 <tr >	
							 		<td style="width: 20%;"   class="text-center"><?php echo $uneligneTabFinal["baseName"];?> </td>  
									<td style="width: 20%;"   class="text-center "><?php echo $uneligneTabFinal["title"];?> </td> 
									<td style="width: 20%;"  class="text-center "><?php echo $uneligneTabFinal["targetCurrency"];?></td> 
									<td style="width: 20%;"   class="text-center "><?php echo $uneligneTabFinal["targetName"];?> </td> 
									<td style="width: 20%;"  class="text-center">
										<input type="text" style="width:100%;text-align: right;" name="taux[]"   id="taux" value="<?php  echo $uneligneTabFinal["exchangeRate"] ; 	?>" >
										<input type="hidden" name="baseCurrency[]" value="<?php echo $uneligneTabFinal["baseCurrency"] ;?>">
										<input type="hidden" name="targetCurrency[]" value="<?php echo $uneligneTabFinal["targetCurrency"];?>">
								</td> 

							</tr>  
							<?php
					 		} //fin If
						} // fin foreach $tabFinal
					}  // fin foreach Devise 
					?>	  
					<tbody>	
				</table>  

				<div class="col-sm-12"> &nbsp;  </div>
				<div class= "col-sm-12" > 
					<div class= "col-sm-offset-4  col-sm-6" > 
					    <a href="" onclick="return(confirm('Confirmer la création de la fiche fournisseur'));" >   
						 	<INPUT TYPE="submit" class="btn btn-info col-sm-5 " name="Update" value="Mise à jour M3 "/>
						</a>
					</div>
				</div>
				<div class="col-sm-12"> &nbsp;  </div>
			
			</div> 
		</div>	
	</form>
</div>

<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>
