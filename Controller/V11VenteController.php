<?php
require_once('Controller/Controller.php') ;

class V11VenteController extends Controller {


	
	public function debloqueCdvAction() {
		$app_title="Maj MOVEX";
		$app_desc="Comeca" ;
		$app_body="body_Vente" ;
		
		require('View/V11Vente/cdvDebloq.php') ; 
		 
	}

	public function projetCdvAction() {
		$app_title="Maj MOVEX";
		$app_desc="Comeca" ;
		$app_body="body_Vente" ;
		
		require('View/V11Vente/cdvUpdateProjet.php') ; 


	}
 
	
}

 
?>




 

