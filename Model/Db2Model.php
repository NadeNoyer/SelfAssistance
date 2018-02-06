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

	
}
?>