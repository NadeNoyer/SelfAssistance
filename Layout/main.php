<?php
	$admin = false;
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo  $app_title?> - Comeca </title>
		<meta charset="utf-8" />
		<!-- pour etre trouvé sur google -->
		<meta name="descriptif" content="comeca" <?php echo  $app_desc?> />
		<meta name="Author" content="nadine noyer">
		<!-- pour bootstrap -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
 		 
		<link rel="stylesheet" href="Ressources/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="Ressources/style.css">

		 
	</head>

	<body id="<?php echo  $app_body;?>">
		
		<div class="container" >
			<?php	
			//-- include header --
			require("Layout/header.php");	
			?>
			<div>
				<?php echo $app_html; ?>
			</div>
	 
		
			<!-- script JS si le fichier est chargé -->
			<script type="text/javascript" src="Ressources/jquery-2.1.3.js"> </script> 
			<script type="text/javascript" src="Ressources/bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="Ressources/script.js"> </script>
		 
		</div>
		 
	</body>
		
</html>