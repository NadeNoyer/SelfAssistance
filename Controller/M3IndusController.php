<?php
require_once('Controller/Controller.php') ;

class M3IndusController extends Controller {
	
	public function indexAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		$recu=true;
		$erreur=array();
		
		$nomChamp='Code Article'; 
		require_once('Model/M3IndusModel.php');
	 	//var_dump($this->post);
	 	// si post
		if($this->post) {

			// si article renseigné et clic 
			//if (!empty($this->post['codeArt']) ) {

				// si clic sur bouton lire 
				if(isset($this->post['lecture'])) {	
				
					$nomChamp= $codArt = $this->post['codeArt'];
					 
					$articleModel = new M3IndusModel($this->getBiblio(),null,null);
					$article = $articleModel->litUMbase($codArt);
					if($article){
						$listeUniteModel = new M3IndusModel($this->getBiblio(),null,null);
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
								 $CtrlUnite = new M3IndusModel($this->getBiblio(),null,null);
								 $recu=$CtrlUnite->ExistUnite($this->post['unite']);
								 //var_dump($recu);
								 if($recu){
									if (!empty($this->post['coeff'])){
										$updateArticleModel = new M3IndusModel($this->getBiblio(),null,null);
										// $updateArticle = $updateArticleModel->updateUNM($codArt,$this->post['unite']);
										$updateQTArticle = $updateArticleModel->updateQTStk($codArt,$this->post['coeff'],$this->post['unite']);

									} else {
										echo "coefficient non saisi" ;
									} // fin if (!empty($this->post['coeff']) )
								}else{

									//$erreur['img']="Unité de mesure ".$this->post['unite']." inconnue!";
									//var_dump($erreur);
									echo("<script> alert('Unité de mesure ".$this->post['unite']." inconnue!')</script>");
									//unset ($this->post['update']);
									
								}

							} else {

							 	echo "unité non saisie" ;
						 	} // fin if (!empty($this->post['unite']))
							 

			 		} // fin if (isset($this->post['update']) )
				

	/*		}	else {
				    echo 'aucun article saisi';
			}	
	*/	 
		} // fin $this->post

		require('View/M3Indus/index.php') ; 
	 
	}

	
	 
	
}

 
?>




 

