<?php
// Class qui va créer un objet authentification 
// et sera instancié dans Controller pour être accessible de tous les controlleurs
// manipule et renvoie la valeur du booleen dans $_session[app-auth]
class ActiveDirectoryModule {
	 
	// fonction qui s'exécute automatiquement
	// on peut y ajouter du code perso
	public function __construct() {
		// si l'authentification en Session n'est pas défini alors on met à null le booleen
	 
		// informations de connexions
		 
		$ldap_host = "10.20.21.61";  // l'adresse du serveur LDAP
		$base_dn = "DC=COMECA,DC=INTRA"; // nom du domaine
		 
		$user = "cn=".$_POST['user'];  //  on traite les information recoltées 
		$password = $_POST['pass']; 
		 
		$admin="admin";  // indiquez ici le groupe auquels appartient les admin et les membres. dans mon exemple, j'ai un o=admin et un o=membres.
		$membres="membres";
		 
		$connect = ldap_connect($ldap_host)  // connexion en anonymous
		    or exit(">>Connexion au serveur LDAP echoué<<");
	 
 
		ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);  // on passe le LDAP en version 3, necessaire pour travailler avec le AD
		ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);
		 
 
		$read = ldap_search($connect,$base_dn,$user)
		     or exit(">>erreur lors de la recherche<<");
		
		$info = ldap_get_entries($connect, $read);
 
		if ( preg_match("!".$admin."!",$info[0]["dn"] ) ) // si le user trouvé est admin :
			{
			$bind = ldap_bind($connect,$info[0]["dn"],$password);
			if ( $bind == FALSE )	// si le BIND est FALSE, le mot de passe est erronée
				// echo( " il est admin mais faux mdp");
				header("location: index.php");
			elseif ( $bind == TRUE )   // on peut ajouter d'autre traitement si l'identification est ok ( ex : $_SESSION['user'] = ... )
				{
					header("location: index.php");
				}
			} 
		elseif ( preg_match("!".$membres."!",$info[0]["dn"]) ) // si le user trouvé est membres :
			{
		    $bind = ldap_bind($connect,$info[0]["dn"],$password);
			if ( $bind == FALSE )  // si le BIND est FALSE, le mot de passe est erronée
				// echo( " il est membre mais faux mdp");
				header("location: index.php");
		 
			elseif ( $bind == TRUE )  // on peut ajouter d'autre traitement si l'identification est ok ( ex : $_SESSION['user'] = ... )
				{
					header("location: index.php");
				}
			}
		else // le user n'a pas pu être trouvé
		{
		// echo  "nom de user invalide";
		header("location: index.php");
		}
		ldap_close($connect);
		?>

	}

}

?>