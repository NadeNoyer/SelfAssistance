<?php
require_once('Model/Model.php') ;

class Db2Model extends Model{

	public function listerDevise() {
			
		$query = "SELECT distinct(CCLOCD) FROM Mvxbdta.CMNDIV WHERE CCDIVI IN ('001','060','109','700','430','720',
							'750','760') ";		
		$stmt = $this->pdo->query($query);
					 
		return $stmt->fetchAll();
	}

	public function listerEntite() {
			
		$query = "SELECT * FROM Mvxbdta.CMNDIV WHERE CCDIVI IN ('001','060','109','700','430','720','750','760') ";		
		$stmt = $this->pdo->query($query);
					 
		return $stmt->fetchAll();
	} 

	public function selectOf($mfno) {
		
		$query = "SELECT VHWHST FROM ".$this->biblioV11.".MWOHED where VHCONO =".$this->biblioV11."  and vhmfno ='".$mfno."'";
	 
		$stmt = $this->pdo->query($query);
		 			 
		return $stmt->fetch();
	}
	
	public function updateStatutOf($data,$statut) {
		 
		$erreurs = array();
	 
		if (empty($erreurs)) {
		
			$query = "UPDATE  ".$this->biblio.".MWOHED 	SET ZZSTATUT ='".$statut."' 
						where VHCONO =100 and VHDIVI ='".$divi."' and vhmfno ='".$mfno."'";
			$stmt = $this->pdo->prepare($query);
	
			if ($stmt->execute()) {
				$result['statutOf'] = "le statut de l\ Of '".$mfno."est  maintenant en ".$statut;
			} else {
				$erreurs['form'] = 'le statut n\' a pas été modifié !';
			}
			
		}
		if (isset($result)) {
		 	return ($result);
		} else {
			return($erreurs);
		}
	}
	
}
?>