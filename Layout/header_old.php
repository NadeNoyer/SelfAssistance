	
<div class="container">

	<div class="col-sm-12"> &nbsp; </div>
	<div class="row center-block col-sm-12">
		<div class="col-sm-4"><img id="logoTop" src="Ressources/logo.jpg" alt="logoTop"   height="50"/></div>
		<div class="col-sm-5"><h3> O  U  T  I  L  S  - A  S  S  I  S  T  A  N  C  E </h3></div>
	 	<div class="col-sm-3"><?php echo 'version : ' .$this->getVersion(); ?> </div>
	 		<!--<div class="col-sm-3"><?php echo $this->getVersion()."    Biblio : ".$this->getBiblio(); ?> </div> -->
	</div>


	<div class="col-sm-12"> &nbsp;  </div>
	<div class="col-sm-12"> &nbsp;  </div>

    <div class="col-sm-12">
		<nav class="navbar navbar-default " role="navigation">
		   	<div class="collapse navbar-collapse " id="oNavigation">
		     	<ul class="nav navbar-nav nav-justify">  <!-- 1er menu -->
		      
			       	<li class="dropdown">
				        <a href="" class="dropdown-toggle" data-toggle="dropdown"> Movex V11  <b class="caret"></b> </a>
				        <ul class="dropdown-menu">    <!-- sous menu -->
				         	<li><a href="<?php echo $this->link('','vente');?>"> Ventes </a></li>
				        	<li><a href="<?php echo $this->link('','prod');?>"> Production  </a></li>
				        	<li><a href="<?php echo $this->link('','achat');?>"> Achat </a></li>
				        	<li><a href="<?php echo $this->link('','compta');?>">  Comptabilite  </a></li>

				        </ul>  <!-- sousmenu -->
	      			</li>

		      		<li class="dropdown">
		      			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> M3 <b class="caret"></b> </a>
				        <ul class="dropdown-menu">
					        <li><a href="<?php echo $this->link('','venteM3');?>"> Ventes </a></li>
				        	<li><a href="<?php echo $this->link('','prodM3');?>"> Production  </a></li>
				        	<li><a href="<?php echo $this->link('','achatM3');?>"> Achat </a></li>
				        	<li><a href="<?php echo $this->link('','comptaM3');?>">  Comptabilite  </a></li>
				        </ul>
		      		</li>
				    <li><a href="<?php echo $this->link('','transfert');?>"> Transfert Fichiers Volumineux </a></li>
				 
		    </ul>  <!-- 1er menu -->
		  </div>
		</nav>
	</div> 
</div>		

	
		