
<?php

var_dump($_POST);

if(isset($_POST['submit_image']))
{

  $uploadfile=$_FILES["upload_file"]["tmp_name"];
  $folder="Ressources/files/";
  move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder.$_FILES["upload_file"]["name"]);
  
}



?>