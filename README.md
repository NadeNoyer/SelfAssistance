#SelfAssistance


1/	attention : ne pas installer en PROD sur le C: ni le D: car permet de déterminer que l'on est en test
	exemple : 	// permet de récupérer la biblio V11 dans le fichier Controller.php
		public function getBiblioV11() {
			if (substr($_SERVER['DOCUMENT_ROOT'], 0, 2) == 'C:' !! substr($_SERVER['DOCUMENT_ROOT'], 0, 2) == 'D:' ) )  {
				return ('mvxbdtatst');
			} else {
				return ('mvxbdta');
			}		 
		}
2/ ajouter en mysql le dossier assistances utile pour le transfert de fichiers et mdp:netglob
