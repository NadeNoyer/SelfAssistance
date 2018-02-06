<?php
require_once('Controller/Controller.php') ;

class V11indusController extends Controller {
	
	public function indexAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		$nomChamp='Code Article'; 
		require_once('Model/Db2IndusModel.php');
		$TabUnite=array();
	 	//var_dump($this->post);
	 	// si post

		if($this->post) {

			// si article renseigné et clic 
			//if (!empty($this->post['codeArt']) ) {
				
				// si clic sur bouton lire 
				if(isset($this->post['lecture'])) {	
				
					$nomChamp= $codArt = $this->post['codeArt'];
					 
					$articleModel = new Db2IndusModel(null,$this->getBiblioV11(),$this->getConoV11());
					$article = $articleModel->litUMbase($codArt);
					if($article){
						$listeUniteModel = new Db2IndusModel(null,$this->getBiblioV11(),$this->getConoV11());
						$TabUnite=$listeUniteModel->listeUnite();		
					} 
					else 	{ // fin if (!empty($this->post['CodeArt']) )
								echo 'article non trouvé ';
							}
					}
						// si clic bouton update
  				if (isset($this->post['update']) ){
  					$codArt=$this->post['codeArtSave'];

							if (!empty($this->post['unite'])) {
								 $CtrlUniteModel = new Db2IndusModel(null,$this->getBiblioV11(),$this->getConoV11());
								 $recu=$CtrlUniteModel->ExistUnite($this->post['unite']);
								 //var_dump($recu);
								 if($recu){								 

									if (!empty($this->post['coeff'])){
										$updateArticleModel = new Db2IndusModel(null,$this->getBiblioV11(),$this->getConoV11());
										$updateArticle = $updateArticleModel->updateUNM($codArt,$this->post['unite']);
										$updateQTArticle = $updateArticleModel->updateQTStk($codArt,$this->post['coeff'],$this->post['unite']);

									} else {
										echo "coefficient non saisi" ;
									} // fin if (!empty($this->post['coeff']) )
								}else{

									echo("<script> alert('Unité de mesure ".$this->post['unite']." inconnue!')</script>");
									//unset ($this->post['update']);
								}
							} else {

							 	echo "unité non saisie" ;
						 	} // fin if (!empty($this->post['unite']))
							 

			 		} // fin if (isset($this->post['update']) )
				

		} // fin $this->post

		require('View/V11indus/index.php') ; 
	 
	}

	
	 
	
}

 
?>




 

