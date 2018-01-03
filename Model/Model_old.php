<?php

// classe Model qui fait la connection à la BDD
Class Model {
	// proteced : accessible classe et enfants si extends
	protected $pdo;
	protected $pdoV;
	
	protected $biblio;

	// constructeur appelé automatiquement lors de la création de l instance 
	public function __construct($biblio=null,$biblioV11=null) {

		$this->biblio = $biblio;
		try {
			$this->pdo = new PDO(PDO_DSN,PDO_USERNAME,PDO_PASSWORD);
		} catch (PDOException $e) {
			echo 'la Connexion à ODBC de DB2 a échouée : ' . $e->getMessage();
		}
		
		$this->biblioV11 = $biblioV11;  // à déclarer dans Controller
		try {
			$this->pdoV = new PDO(PDO_DSN,PDO_USERNAME,PDO_PASSWORD);
		} catch (PDOException $e) {
			echo 'la Connexion à ODBC de V11 a échouée : ' . $e->getMessage();
		}

		// connexion à sqlserver
		/*
		try {
			$this->pdoSql = new PDO(PDOS_DSN,PDOS_USERNAME,PDOS_PASSWORD);
			$this->pdoSql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'la Connexion à ODBC de SQL a échouée : ' . $e->getMessage();
		} */
		
		 
		$this->pdo->exec('SET NAMES "utf8"');
	}
	 
} 

?>