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

	public function transfertAction() {

		$app_title="Transfert de Fichier";
		$app_desc="Comeca" ;
		$app_body="body_Transfert" ;
		$today = date("Ymd");
		$url=array('adress'=> array(), 'name'=> array(), 'size'=> array());
		$returnMail = null;

		if ($this->post) {
			
			$post = $this->post;
			$files =$this->files;	
			$get=$this->get;	

			//$urlprivate = "http://private.comeca-group.com/TransfertFile/";
		 
		/*	$urlprivate = "C:\\xampp\\htdocs\\SelfAssistance\\Ressources\\files\\";
			$urlLogo = "C:\\xampp\\htdocs\\SelfAssistance\\Ressources\\logo.jpg";
			$urlTop = "C:\\xampp\\htdocs\\SelfAssistance\\Ressources\\BanniereTop.jpg";
			$urlRessources = "C:\\xampp\\htdocs\\SelfAssistance\\Ressources";  */
		
			$urlprivate = "Ressources/files/";
			$urlLogo = "Ressources/logo.jpg";
			$urlTop = "Ressources/BanniereTop.jpg";
			$urlRessources = "Ressources/";  
		
			$fileUpload = false ;
		
			if (isset($post['Valider'])) {

			
				if(isset($this->files['selectFiles']) && !empty($this->files['selectFiles']['name'])) { 	
					
					$j=0;
				
					foreach ($this->files["selectFiles"]["error"] as $i => $error) {

	   					if ($error == UPLOAD_ERR_OK) {
	     				    $tmp_name = $this->files["selectFiles"]["tmp_name"][$i];
	     			        $name = $this->files["selectFiles"]["name"][$i];
	     			        $size = $this->files["selectFiles"]["size"][$i];
	     			         
	       				   
	       				    $fileName=$today.'-'.$this->files['selectFiles']['name'][$i] ;
						    move_uploaded_file($this->files['selectFiles']['tmp_name'][$i],'Ressources/files/'.$fileName); 

						    require_once('Model/SqlModel.php');
							$transfertModel = new SqlModel();
							$transfert = $transfertModel->createTransfert($this->files['selectFiles']['name'][$i],
								                                          $this->files['selectFiles']['size'][$i],
								                                          $this->post,  $today);
   							 
   							$url[$j]=array('adress'=> $urlprivate.$fileName, 'name'=> $name,'size'=> $size);
					   		$j++;
   							 
					   		$fileUpload = true ;
		   					 

						} // fin 	if ($error == UPLOAD_ERR_OK)

					} // foreach 
	 
				
					if ($fileUpload) {

						$adresseMail = $this->post['mail'] ;
						$sujet = 'Fichiers Comeca ';

						// envoi mail au destinataire
						require('Module/envoiMail.php') ;
						$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion
						$mail->Subject = $sujet;
						$mail->AddAddress($adresseMail);
						$mail->From =$adresseMail;
					 
						//Contenu du  message en HTML : table  
				 		ob_start();
				 		?>
			 	 
						<fieldset >
							<div  > 	
								<img src="<?php echo $urlTop ; ?>" alt="top"  height="80" style="margin-bottom: 20px"/>
							 	<h4 style="font-style:italic ">Le (ou les) fichier(s) suivant(s) est(sont) disponible(s) pendant un mois. </h4>
							</div>	
							
							<div  style="margin: 10px; ">

								<div style="margin: 15px; ">
								<!-- envoi du mail en table pour générer du HTML -->
						 			<table border="1"  >
						 		 
										<tr style="padding : 8px; ">
											<th> Cliquer sur le lien pour afficher le fichier </th>
											<th> Nom du fichier  </th>		
											<th> taille   </th>					 
										</tr>
									 
										<?php
										$nbrFiles = 0 ;
										foreach ($url as $uneUrl) {
											if(isset($uneUrl['name'])) {
											?> 
											<tr border="2" style ="padding:6px; ">	
												<td> 
													<a href="<?php echo $uneUrl['adress']; ?>"><?php echo $uneUrl['name'];?></a> 
												</td>
												<td> <?php echo $uneUrl['name']; ?>  </td>
												<td style="position:right"> <?php echo $uneUrl['size'].' bytes '; ?>  </td>
											</tr>
											<?php
											$nbrFiles++;
									 		}
										} // fin foreach
										?>
									 
									</table >
								</div>
								 
							</div>

						</fieldset>
						
						<?php
						// concerne le HTML du contenu du mail 
						$mail->Body = ob_get_contents();
						ob_end_clean();

						$envoiMail = $mail->Send();

							$mail->SmtpClose();
			   		 	// ferme la connexion smtp et désalloue la mémoire...
			    		unset($mail); 


						if(!$envoiMail && $adresseMail == "") {
	                         //  echo 'Mailer Error: ' . $mail->ErrorInfo;
							if ($nbrFiles > 1) {
	                       		$returnMail = 'Les '.$nbrFiles. ' fichiers ont été copiés. ';
	                       	} else {
	                       		$returnMail = 'Le fichier a été copié. ';
	                       	}
	                    } 
	                    else if (!$envoiMail && $adresseMail != ""){
	                    	if ($nbrFiles > 1) {
	                    		$returnMail = 'Les '.$nbrFiles. ' fichiers ont été copiés mais pas envoyés '.$mail->ErrorInfo;
	                    	} else {
	                    		$returnMail = 'Le fichier a été copié mais pas envoyé '.$mail->ErrorInfo;
	                    	}
	                    } 
	                    else if ($envoiMail && $adresseMail != "")  {
	                    	if ($nbrFiles > 1) {
		                        $returnMail = 'Les '.$nbrFiles. ' fichiers ont été copiés et envoyés à : ' .$adresseMail ;
		                    } else {
	                    		$returnMail = 'Le fichier a été copié et envoyé à : '.$mail->ErrorInfo;
	                    	}
	                    } 

					} // fin if ($fileUpload)

				} // if(!empty($this->files['selectFile']['name']))

			} // fin if (isset($post['Valider'])) {

		} // fin if ($this->post) {
 	
 		
		require('View/Index/transfert.php') ; 

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




 

