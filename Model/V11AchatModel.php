<?php
require_once('Model/Model.php') ;

class V11AchatModel extends Model{

	public function verificationOa($puno) {
		
	 	$query = "SELECT iapuno,iapusl FROM ".$this->biblioV11.".MPHEAD where IACONO =".$this->conoV11."  and iApuno ='".$puno."'";
	 	
		$stmt = $this->pdoV->query($query);
		 
		$result = $stmt->fetch();
 
	 	return $result;
	}

	public function selectOa($puno) {
		
	 	$query = "SELECT count(*) FROM ".$this->biblioV11.".MPLINE where IBCONO =".$this->conoV11." and ibidag = 1 and ibpuno ='".$puno."'";
	 	
		$stmt = $this->pdoV->query($query);
		 
		$result = $stmt->fetch();
 
	 	return $result;
	}
	
	public function updateLigneOa($puno) {
		 
		$messages = array();
		 

		$query = "UPDATE  ".$this->biblioV11.".MPLINE set IBIDAG = 0
					where IBCONO =".$this->conoV11." and IBPUNO ='".$puno."'";
					 
		$stmt = $this->pdoV->prepare($query);

		if ($stmt->execute()) {
			$result= $stmt->rowCount();
		} else {
			$messages['KoUpdLigOa'] = 'l\'oa '.$puno.' n\' a pas été modifiée !';
		}
 
		return isset($result)?$result:$messages;
	}
	 

	
}
?>