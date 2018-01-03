<?php
require_once('Model/Model.php') ;

class M3Model extends Model{



	public function listerDevise() {
			
		$query = "SELECT distinct(CCLOCD) FROM M3EDBPROD.CMNDIV WHERE CCDIVI IN ('001','060','109','700','430','720',
							'750','760')  ";		
		$stmt = $this->pdo->query($query);
					 
		return $stmt->fetchAll();
	}

	public function listerEntite() {
			
		$query = "SELECT CCDIVI FROM M3EDBPROD.CMNDIV WHERE CCDIVI IN ('001','060','109','700','430','720','750','760') ";		
		$stmt = $this->pdo->query($query);
					 
		return $stmt->fetchAll();
	} 


	public function creationDeviseM3($divi,$newBase,$newCible,$newTaux,$today) {
		
		if (!isset($newTaux))
		{
			$newTaux=1;
		}
		$tauxModif = str_replace('.','', $newTaux);
 
 		$query = "INSERT INTO M3EDBTEST.CCURRA (CUCONO,CUDIVI,CUGLOC,CUCUCD,CUCRTP,CUCUTD,CUARAT,CUTXID,CULOCD,CUDMCU,CURAFA,CURGDT,CURGTM,CULMDT,CUCHNO,CUCHID,CULMTS) 
 		VALUES (100,:divi,'',:target,1,:today,:taux,0,:base,2,4,:todayC,100000,:todayU,0,'API',1000000000001)";

 		//var_dump($query);
 		
 		$stmt=$this->pdo->prepare($query) ;

 		$result = $stmt->execute(array( 
 	                'divi'=>$divi,
                    'target'=>$newCible,
                    'today'=>$today,
                    'taux'=>$tauxModif,
                    'base'=>$newBase,
                    'todayC'=>$today,
                    'todayU'=>$today    
                ));
 		var_dump($result);
		return $result;

	}
 
	
 
	
}
?>