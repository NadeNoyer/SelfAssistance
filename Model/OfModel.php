<?php
require_once('Model/Model.php') ;

class Db2Model extends Model{

		 
	
	public function getInfo($of) {
	 
			

		$query = "SELECT * FROM ".$this->biblio.".MWOHED
					WHERE VHCONO = 100 and VHMFNO=".$of; 
			 		
		 
		$stmt = $this->pdo->query($query);
		 
		return $stmt->fetch();
	}
	
	public function updateStatut($data,$statut) {
		 
		$erreurs = array();
	 
		if (empty($erreurs)) {
		
			$statut = '22';				
			$query = "UPDATE  ".$this->biblio.".MWOHED
					set VHWHST ='".$statut."'
					WHERE VHCONO = 100 and VHMFNO=".$of; 

			 		
			$stmt = $this->pdo->prepare($query);
				
			if ($stmt->execute()) {
				$result = $stmt->rowCount();
			} else {
				$erreurs['statutOf'] = 'Statut non modifie !';
			}
		}
		
		if (isset($result)) {
		 	return ($result);
		} else {
			return($erreurs);
		}
	}
	
	public function updateProjet($data,$statut) {
		 
		$erreurs = array();
	 
		if (empty($erreurs)) {
		
						
			$query = "UPDATE  ".$this->biblio.".ZSLEDG
						SET ZZSTATUT ='".$statut."'
							WHERE ZZSOURCE ='".$data[0]."' and ESDIVI ='".$data[4]."' and ESJRNO ='".$data[1]."' and ESJSNO ='".$data[2]."' and ESYEA4 =".$data[3]; 
			 		
			$stmt = $this->pdo->prepare($query);
			
				
			if ($stmt->execute()) {
				$result = $stmt->rowCount();
			} else {
				$erreurs['form'] = 'Pièce non modifiée !';
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