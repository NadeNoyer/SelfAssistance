<?php
require_once('Controller/Controller.php') ;

class V11AchatController extends Controller {
	
 	public function UpdateIbidagAction() {

	$app_title="Maj MOVEX" ;
	$app_desc="Comeca" ;
	$app_body="body_Achat" ;

	 
	$result = array();
	$messages = array();

	if ($this->post) {
		 
		$post=$this->post;
	 
		/* si on clic sur Valider */
		if (isset($post)) {

			$oa = $post['oa'];
			
			require_once('Model/V11AchatModel.php') ;
			$v11AchatModel = new V11AchatModel(null,$this->getBiblioV11(),$this->getConoV11());
			// vérification que l oa existe et statut inférieur <= 20
			$oaValide = $v11AchatModel->verificationOa($oa);

			 

			if ($oaValide['IAPUSL'] <= '20') {

				// recherche du statut Oa
		 		$count = $v11AchatModel->selectOa($oa);

		 		if ($count > 0 ) {
		 			$result = $v11AchatModel->updateLigneOa($oa);	
		 			// si c'est un array c'est qu il y a eu une erreur sinon = compteur
		 			var_dump('$result : ', $result) ;
		 			if ( $result > 0 ) {
						$messages = $result.'ligne a modifier';
					}  else {
						$messages = array('OkUpdLigOa' => 'l oa :'.$oa.' a été modifiée ');
					}
			  			
			  	} else {
			  		$messages = array('KoLigOa' => 'aucun problème sur l\' oa  : '.$oa);
			  	}
			} else {
				$messages = array('KoOa' => 'L\' commande'.$oa. ' n\' existe pas ou son statut est supérieur à 20 ... Veuillez vérifier votre OA ');
			}

		}  // fin : if (isset($post)) {

	} // fin if ($this->post)

	require('View/V11Achat/oaPave.php') ; 

	}

	public function fournisseurOaAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Achat" ;
		
		require('View/V11Achat/oaFournisseur.php') ; 

	}

	public function projetOaAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Achat" ;
		
		require('View/V11Achat/oaProjet.php') ; 

	}

	public function depotOaAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Achat" ;
		
		require('View/V11Achat/oaDepot.php') ; 

	}
	
	}

 
?>




 

