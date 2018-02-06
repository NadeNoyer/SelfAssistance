<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >
	     
	    <div class="col-sm-12" >  
	        <h3>   Movex V11 	</h3>
	        <h5>  <?php echo "biblio : ".$this->getBiblioV11(). " - cono : ".$this->getConoV11() ;?> </h5>	  
 		</div>

		<fieldset class =  "thumbnail">

			<form class="formDebloqOf" method="post">	
	
				<div class= 'col-sm-12' >
				<legend class="scheduler-border" style="font-weight: normal"> 
					 ENCOURS de DEVELOPPEMENT 
				</legend>
				 
 				<!-- ligne of et mettre en statit 20 60 ou 80-->
			    <div class="col-sm-12 " style="margin-top: 20px;">		 
					 
					 
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