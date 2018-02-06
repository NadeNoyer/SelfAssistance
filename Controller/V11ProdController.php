<?php
require_once('Controller/Controller.php') ;

class V11ProdController extends Controller {
	
 	public function debloqueOfAction() {

	$app_title="Maj MOVEX" ;
	$app_desc="Comeca" ;
	$app_body="body_Prod" ;

	$newStatut = "";
	$result = array();
	$messages = array();

	if ($this->post) {
		 
		$post=$this->post;
	 
		/* si on clic sur Valider */
		if (isset($post)) {

			$of = $post['of'];
			
				require_once('Model/V11ProdModel.php') ;
				$v11ProdModel = new V11ProdModel(null,$this->getBiblioV11(),$this->getConoV11());
				// recherche du statut Of
		 		$statutOf = $v11ProdModel->selectOf($of);
		 	 
		 		 
		 		if (isset($statutOf['VHWHST'])) {


			 		if ($statutOf['VHWHST'] == '22' || $statutOf['VHWHST'] == '62' || $statutOf['VHWHST'] == '82' ) {

			 			switch ($statutOf['VHWHST']) {
			 				case '22':
			 					$newStatut = '20';
			 					break;
			 				case '62':
			 					$newStatut = '60';
			 					break;
			 				case '82':
			 					$newStatut = '80';
			 					break;
	
			 				}
 
			 			$result = $v11ProdModel->updateStatutOf($of,$newStatut);	
			 			// si c'est un array c'est qu il y a eu une erreur sinon = compteur
			 			
			 			if (is_array($result)) {
							$messages = $result;
						}  else {
							$messages = array('OkUpdOf' => 'l\' of : ".$of." est maintenant en statut : '.$newStatut);
						}
			  			
			  		} else {
			  			$messages = array('KoStatutOf' => 'le statut ne peut être modifié car l\' of est en statut : '.$statutOf['VHWHST']);
			  		}
			  		 

			  	} 

		}  // fin : if (isset($post)) {

	} // fin if ($this->post)

	require('View/V11Prod/ofDebloq.php') ; 


	}

	public function debloqueODAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Achat" ;
		
		require('View/V11Prod/odDebloq.php') ; 

	}

	public function projetOfAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Achat" ;
		
		require('View/V11Prod/ofUpdateProjet.php') ; 

	}
	
}

 
?>




 

