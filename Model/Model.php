<?php

// classe Model qui fait la connection à la BDD
Class Model {
	// proteced : accessible classe et enfants si extends
	protected $pdo;
	protected $pdoV;
	protected $biblio;
	protected $biblioV11;
	protected $conoV11;

	/* constructeur appelé automatiquement lors de la création de l instance 
		=> il faudra passer les 3 params récupérés dans le controller  */
	public function __construct($biblio=null,$biblioV11=null,$conoV11=null) {  
		// à déclarer dans Controller
		$this->biblio = $biblio;
		$this->biblioV11 =  $biblioV11;  
		$this->conoV11 = $conoV11;

		// connexion à maiao
		try {
			$this->pdo = new PDO(PDO_DSN,PDO_USERNAME,PDO_PASSWORD);
		} catch (PDOException $e) {
			echo 'la Connexion à ODBC de M3 a échouée : ' . $e->getMessage();
		}

 		// connexion à comeca
		try {
			$this->pdoV = new PDO(PDOV_DSN,PDOV_USERNAME,PDOV_PASSWORD);
		} catch (PDOException $e) {
			echo 'la Connexion à ODBC de V11 a échouée : ' . $e->getMessage();
		}

		// connexion à sqlserver
	 	try {
			$this->pdoSql = new PDO(PDOS_DSN,PDOS_USERNAME,PDOS_PASSWORD);
			$this->pdoSql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'la Connexion à ODBC de SQL a échouée : ' . $e->getMessage();
		}
 	 	 
		$this->pdo->exec('SET NAMES "utf8"');
		$this->pdoV->exec('SET NAMES "utf8"');

	}
	 
} 

?>