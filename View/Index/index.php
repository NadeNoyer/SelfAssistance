<?php

ob_start();

?>

 

	
	<!-- liste déroulante -->
<div class="form-group" >
	<form class="formSearch" method="get">	
		<input type="hidden" name="controller" value="" />
		<input type="hidden" name="action" value=""/>
		<!--input type="hidden" name="page" value="1"/-->


<!--
     
        <nav class="navbar navbar-default" role="navigation">
		 <div class="collapse navbar-collapse" id="oNavigation">
            <ul class="nav navbar-nav  nav-justify">
             	<li><a href="#">Accueil</a></li>
      		 	<li class="dropdown">
      		 	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Section A <b class="caret"></b> </a>
			        <ul class="dropdown-menu">
			          <li><a href="#">Deuxième niveau</a></li>
			        </ul>
      </li>
            	    <li role="presentation" class=" "><a href="<?php echo $this->link('','movex');?>">Movex V 11 </a> 	
            	    	<div class='row'> 
			             	<ul class="nav nav-tabs  nav-justify">
			             		<li role="presentation" class=" "><a href="<?php echo $this->link('','vente');?>">Vente</a></li>
			            		<li role="presentation" class=""><a href="<?php echo $this->link('','prod');?>">Production</a></li>
		 						<li role="presentation" class="active"><a href="<?php echo $this->link('','achat');?>">Achat</a></li>
		 						<li role="presentation" class=""><a href="<?php echo $this->link('','compta');?>">Comptabilité</a></li>
		 						
		 					</ul>
		 				</div>
	 				</li> 
	 				<li role="presentation" class=" "><a href="<?php echo $this->link('','movex');?>"> M3 </li>
	 				<li role="presentation" class=" "><a href="<?php echo $this->link('','movex');?>"> Autre </li>
	 			</ul>
			</div>	 
			<div class="jumbotron" style="margin-top: 10%;text-align: center; ">
       				<h2 > B I E N V E N U E  </h2></br></br></br>
       				<p> V o t r e&nbsp&nbsp&nbspA S S I S T A N C E&nbsp&nbsp&nbspM O V E X&nbsp&nbsp&nbspd e&nbsp&nbsp&nbsp1 er&nbsp&nbsp&nbspN I V E A U </br></br>
        			 SUIVEZ LES INSTRUCTIONS 

        			</p>
      		</div>
-->			
	</form>		
</div>



<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>