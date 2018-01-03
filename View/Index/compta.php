<?php

ob_start();

?>

<div id="container">

	
	<!-- liste déroulante -->
	<div class="form-group" >
		<form class="formSearch" method="get">	
			<input type="hidden" name="controller" value="" />
			<input type="hidden" name="action" value="compta"/>
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
				<div class="well" style="margin-top: 20px;text-align: center; ">	<h3> Domaine COMPTABILITE	</h3>
				</div>	
			</div>
			<fieldset class =  "thumbnail">
				<h4> a compléter  </h4> 
			</fieldset>
		</form>		
	</div>
	
</div>	


<?php

$app_html = ob_get_contents();
ob_end_clean();
require('Layout/main.php') ;

?>