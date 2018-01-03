<?php
require_once('Model/Model.php') ;

class SqlModel extends Model{

	// insert du poste dans BDD
	public function createTransfert($filesName,$filesSize,$post,$today) {
					
	


		// on prépare l insert 
		// on prépare l insert avec pdo (bindparam ne fonctionne pas)
		$stmt=$this->pdoSql->prepare('INSERT INTO transfert(
		 					nom ,
		 					dateDepot,
							destinataire,
                            size
                            ) 
						    VALUES (
			 				:nom ,
		 					:dateDepot,
							:destinataire,
                            :size
						    )'
						  );
		// on execute le prépare
		$result = $stmt->execute(array(
		 	'nom'=>$filesName,
			'dateDepot'=>$today,
		 	'destinataire'=>$post['mail'],
		  	'size'=>$filesSize,
		 	));

		$lastID= $this->pdoSql->lastInsertId();

		
		return($result);
	}


}



	

?>