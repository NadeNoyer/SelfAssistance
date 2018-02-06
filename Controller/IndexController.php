<?php
require_once('Controller/Controller.php') ;

class IndexController extends Controller {
	
	public function indexAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
				
		// Affiche le menu 
		 
		require('View/Index/index.php') ; 
	}

	public function aideAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Aide" ;
				
		// Affiche le menu 
		 
		require('View/Index/aide.php') ; 
	}

	


	public function tauxAction() {

		$app_title="Taux Devise Maj M3 et V11";
		$app_desc="Comeca" ;
		$app_body="body_Taux" ;

		require_once('Model/M3Model.php');
		
		$today = date("Ymd");
		$todayU=$today;
		$todayC=$today;
		$deviseModel = new M3Model(); 
		$deviseM3 = $deviseModel->listerDevise();

		$entiteModel = new M3Model(); 
		$entite = $entiteModel->listerEntite();
		

 	  
 	  	$deviseAAfficher = array();
 	  	$i =0;
 	  	// chargement des devises
 		foreach ($deviseM3 as $uneDeviseM3) {
 
	 		$devise=$uneDeviseM3['CCLOCD'];
 	 	//	$dom = new DOMDocument;
		//	$dom->load("http://www.floatrates.com/daily/".$devise.".xml");
		//	$dom->save($devise.".xml");  
			$deviseAAfficher[$i] =  $devise ;
			$i++;
		} 
		 
		$nbrDevise=0; 
		$tabFinal = array();
 		foreach ($deviseAAfficher as $uneDeviseAAfficher) {

 			$nameFile = $uneDeviseAAfficher.'.xml';
 			
			// télecharger les fichiers devis.xml 
			if (file_exists($nameFile)) {

				$deviselocaleM3 = $uneDeviseAAfficher;
			 
				$xml = simplexml_load_file($nameFile);
				$i=0;
				$tabInterm = array();
				foreach ($xml as $unXml) {
					if (!empty($unXml)) {
						$tabInterm[$i]['title']= $unXml->title;	
						$tabInterm[$i]['baseCurrency']= $unXml->baseCurrency;	
						$tabInterm[$i]['baseName']= $unXml->baseName;
						$tabInterm[$i]['targetCurrency']= $unXml->targetCurrency;
						$tabInterm[$i]['targetName']= $unXml->targetName;
						//$tabInterm[$i]['exchangeRate']= $unXml->exchangeRate ;
						$tauxAFormater =  floatval ( $unXml->exchangeRate) ;
						$tabInterm[$i]['exchangeRate'] = number_format($tauxAFormater ,6 , '.', '');  
					}
					$i++;
				}
				 
				$tabFinal += array($deviselocaleM3 => $tabInterm);
  				

			}  else {

			} // fin if (file_exists($nameFile))
		
		}// fin foreach ($deviseAAfficher as $uneDeviseAAfficher)
		 
				
		if ($this->post ) {
 
			$post = $this->post;
			 
			if(isset($post['Update'])) {
			 
			 	$tauxPourUpdate= array(); 

			 	$baseCurrency = $post['baseCurrency'];
			 	$targetCurrency =$post['targetCurrency'];
			 	$taux = $post['taux'];


			 	// on fusionne dans un array pour la maj
				foreach ($targetCurrency as $key=>$target) {
					$tauxPourUpdate[] = array (	'targetCurrency'=>$target,
												'baseCurrency'=>$baseCurrency[$key],
												'taux'=>$taux[$key]);
				} // fin $targetCurrency
				
				//print_r($tauxPourUpdate);
				$nbrEnreg=0;
				foreach ($entite as $uneEntite) {
			 		//var_dump($uneEntite);

			 		foreach ($tauxPourUpdate as $unTauxPourUpdate) {

			 			$divi = $uneEntite['CCDIVI'];
			   			$newBase = $unTauxPourUpdate['baseCurrency'] ;
			  			$newTarget = $unTauxPourUpdate['targetCurrency'] ;
						$newTaux = $unTauxPourUpdate['taux'] ;
						
					 	$addDeviseModel = new M3Model(); 
						$addDevise = $addDeviseModel->creationDeviseM3($divi,$newBase,$newTarget,$newTaux,$today);  
						if($addDevise) {
							$nbrEnreg++;
						}
 
			 		} // foreach $tauxPourUpdate

			 	} // foreach $entite
			 var_dump($nbrEnreg);
			} // fin if(isset($post['Update']))

		} // fin if($this->post)
		
	require('View/Index/taux.php') ; 

	}
		
	 
	public function deletePaveOaAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Achat" ;
		
		require('View/Index/oaPave.php') ; 

	}

	

	public function testAction() {
		$app_title="Maj MOVEX" ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
				
	 
   		require('View/Index/test2.php') ; 
	}
	
}

 
?>




 

