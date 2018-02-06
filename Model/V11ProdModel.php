<?php
require_once('Model/Model.php') ;

class V11ProdModel extends Model{

		 
	public function selectOf($mfno) {
		
	 	$query = "SELECT VHWHST FROM ".$this->biblioV11.".MWOHED where VHCONO =".$this->conoV11."  and vhmfno ='".$mfno."'";
	 	

		$stmt = $this->pdoV->query($query);
		 
		$ofExist = $stmt->fetch();

 
	 	return $ofExist;
	}
	
	public function updateStatutOf($mfno,$statut) {
		 
		$messages = array();
		 

		$query = "UPDATE  ".$this->biblioV11.".MWOHED set VHWHST ='".$statut."' 
					where VHCONO =".$this->conoV11." and vhmfno ='".$mfno."'";
					 
		$stmt = $this->pdoV->prepare($query);

		if ($stmt->execute()) {
			$result= $stmt->rowCount();
		} else {
			$messages['KoUpdOf'] = 'l\'of n\' a pas été modifié !';
		}
 
		return isset($result)?$result:$messages;
	}
	 

	
}
?>