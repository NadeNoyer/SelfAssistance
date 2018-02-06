	
<div class="container">
	<div class="col-sm-12"> &nbsp; </div>
	<div class="row center-block col-sm-12">
		<div class="col-sm-4"><img id="logoTop" src="Ressources/logo.jpg" alt="logoTop"   height="50"/></div>
		<div class="col-sm-6"><h3> O  U  T  I  L  S  - A  S  S  I  S  T  A  N  C  E </h3></div>
	 	<div class="col-sm-2"><?php echo 'Version : ' .$this->getVersion(); ?> </div>
	 	
	</div>
	 
	<div class="col-sm-12"> &nbsp;  </div>
	<div class="col-sm-12"> &nbsp;  </div>

 	<div class="col-sm-12">  
		 

		<style>
		.dropdown-submenu
		{
			position:relative;
		}
		.dropdown-submenu>.dropdown-menu{
			top:0;
			left:100%;
			margin-top:-6px;
			margin-left:-1px;
			-webkit-border-radius:0 6px 6px 6px;
			-moz-border-radius:0 6px 6px 6px;
			border-radius:0 6px 6px 6px;
		}
		.dropdown-submenu:hover>.dropdown-menu{
			display:block;
		}
		.dropdown-submenu>a:after{
			display:block;
			content:" ";
			float:right;
			width:0;
			height:0;
			border-color:transparent;
			border-style:solid;
			border-width:5px 0 5px 5px;
			border-left-color:#cccccc;
			margin-top:5px;
			margin-right:-10px;
		}
		.dropdown-submenu.pull-left{
			float:none;
		}
		.dropdown-submenu.pull-left>.dropdown-menu{
			left:-100%;
			margin-left:10px;
			-webkit-border-radius:6px 0 6px 6px;
			-moz-border-radius:6px 0 6px 6px;
			border-radius:6px 0 6px 6px;
		}
		.blue{color:#1D38FC}
		.green{color:#0EC929}
		.red{color:#FF0000}
		.orange{color:#ffe100}
	</style>
		

		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hidden-md hidden-lg" href="#">Menu</a>
			</div>
				
			<div class="collapse navbar-collapse" id="main-menu" style="margin-bottom: 0px;">
				<ul class="nav navbar-nav">
					<!-- TRSF FICHIERS -->
					<li><a href="<?php echo $this->link('','transfert');?>"> Transfert Fichiers Volumineux </a></li>
					<!-- V11 -->
					<li class="dropdown">  
						<a data-toggle="dropdown" href="#">Movex V11<b class="caret"></b></a>
						<ul class="dropdown-menu jqueryFadeIn">
							<li class="dropdown-submenu"> <!-- sous menu vente -->
								<a data-toggle="dropdown"tabindex="-1" href="#"><span class="fa fa-cogs"></span> Vente</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $this->link('V11Vente','debloqueCdv');?>">
											<span class="fa fa-bar-chart-o"></span> Debloquer une Cdv
										</a>
									</li>  
									<li><a href="<?php echo $this->link('V11Vente','projetCdv');?>" >
										<span class="fa fa-bar-chart-o"></span> Modifier le code projet sur Cdv 
										</a>
									</li>  
								</ul>
							</li>
							<li class="dropdown-submenu">  <!-- sous menu Prod -->
								<a data-toggle="dropdown"tabindex="-1" href="#">
								<span class="fa fa-cogs"></span> Production </a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $this->link('V11Prod','debloqueOf');?>">
											<span class="fa fa-bar-chart-o"></span> Debloquer un Of
										</a>
									</li>  
						  			<li><a href="<?php echo $this->link('V11Prod','projetOf');?>" >
										<span class="fa fa-bar-chart-or"></span> Modifier le code projet sur Of
										</a>
									</li> 
									<li><a href="<?php echo $this->link('V11Prod','debloqueOd');?>">
											<span class="fa fa-bar-chart-o"></span> Debloquer un OD ou un OR
										</a>
									</li>   
						  		</ul>
		        			</li>
		        			<li class="dropdown-submenu">
								<a data-toggle="dropdown"tabindex="-1" href="#">
								<span class="fa fa-cogs"></span> Donnees Techniques </a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $this->link('V11Indus');?>">
											<span class="fa fa-bar-chart-o"></span> Modifier Unité pour un article
										</a>
									</li>  
						  		</ul>
		        			</li>
		        			<li class="dropdown-submenu">  <!-- sous menu Achat -->
								<a data-toggle="dropdown"tabindex="-1" href="#">
								<span class="fa fa-cogs"></span> Achats </a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $this->link('V11Achat','UpdateIbidag');?>">
											<span class="fa fa-bar-chart-o"></span> Supprimer le pavé sur OA papier
										</a>
									</li>  
						  			<li><a href="<?php echo $this->link('V11Achat','fournisseurOa');?>" >
										<span class="fa fa-bar-chart-or"></span> Modifier le fournisseur sur OA
										</a>
									</li> 
									<li><a href="<?php echo $this->link('V11Achat','projetOa');?>">
											<span class="fa fa-bar-chart-o"></span> Modifier le projet et l'elément sur OA
										</a>
									</li>   
									<li><a href="<?php echo $this->link('V11Achat','depotOa');?>">
											<span class="fa fa-bar-chart-o"></span> Modifier le dépôt sur OA
										</a>
									</li>   
						  		</ul>
		        			</li>
						</ul> <!-- fin <ul class="dropdown-menu jqueryFadeIn"> -->
					</li>		

					<li class="dropdown">  
						<a data-toggle="dropdown" href="#"> M3 <b class="caret"></b></a>
						<ul class="dropdown-menu jqueryFadeIn"> 
					 		<li class="dropdown-submenu">
								<a data-toggle="dropdown"tabindex="-1" href="#">
								<span class="fa fa-cogs"></span> Donnees Techniques </a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $this->link('M3Indus');?>">
											<span class="fa fa-bar-chart-o"></span> Modifier Unité pour un article
										</a>
									</li>  
						  		</ul>
		        			</li>
		        			<li class="dropdown-submenu">
								<a data-toggle="dropdown"tabindex="-1" href="#">
								<span class="fa fa-cogs"></span> Trésorerie  </a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $this->link('','taux');?>">
											<span class="fa fa-bar-chart-o"></span> Taux devise
										</a>
									</li>  
						  		</ul>
		        			</li>
	 					</ul>
	 				</li>
	 				<li  style="padding-right:20px;">
	 					<a href="<?php echo $this->link('','aide');?>" ><span class="glyphicon glyphicon-info-sign"> </span></a>
	 				</li>

	 			</ul>	 
				</div>
			</nav>

<!--<script>
	$(document).ready(function() {
		$(function() {
			// Affichage du sous menu en douceur
			jQuery('ul.nav li.dropdown').hover(function() {
			  jQuery(this).find('.jqueryFadeIn').stop(true, true).delay(200).fadeIn();
			}, function() {
			  jQuery(this).find('.jqueryFadeIn').stop(true, true).delay(200).fadeOut();
			});
 
		});	
	});	
	</script>  -->

	</div>
</div>		

	
		