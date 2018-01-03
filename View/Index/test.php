<?php

ob_start();
 
 
/*
  $input = 1;

  $encrypted = encryptIt( $input );
  $decrypted = decryptIt( $encrypted );

  echo 'crypte : '.$encrypted . '<br /> décryoté : ' . $decrypted;

  function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp' ;
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

  function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
 */
?> 
<!--
  <script>

    function getFiles(evt)
    {
        // evt.target revient à:
        // document.getElementById('fileInput')
        // On récupère la liste de fichiers
        var files = evt.target.files;
         
        // files.length contient le nombre de fichiers
        var msg = files.length + " fichiers sélectionnés:\n\n";
         
        // On parcourt la liste des fichiers sélectionnées
        for( var i = 0; i < files.length; i++ )
        {
            // Example: "- avatar.png (1450 octets)"
            msg += "- " + files[i].name + " (" + files[i].size + " octets)\n";
        }
         
        // On affiche le message
        alert(msg);
    }
 
    window.onload = function()
    {
        // On assigne un gestionnaire pour l'événement "change",
        // c'est-à-dire quand des fichiers sont sélectionnés
        document.getElementById('fileInput').addEventListener( 'change', getFiles, false );
    };
    </script>
      <p>
            <label>
                Sélectionnez des fichiers à envoyer:
                <input type="file" name="files" id="fileInput" multiple="multiple" />
            </label>
        </p>
-->
         
      <div class='col-sm-6' >
          <label class="" for=""> Sélectioner un ou (des) fichier(s)  </label>   
          <input  type='file' class='input-ghost' name='selectFile[]' multiple style='visibility:hidden; height:0'
                  id="fileInput" onchange="$(this).next().find('input').val(($(this).val()).split('\\').pop());">
          <div class="input-group input-file"  >
          <?php

          if(isset($this->files['selectFile']) && !empty($this->files['selectFile']['name'])) {   
          
          $j=0;
        
          foreach ($this->files["selectFile"]["error"] as $i => $error) {

              if ($error == UPLOAD_ERR_OK) { ?>
                 <input type='text' value="<php echo $this->files['selectFile']['name'][$i];"?>
                }
          }
           
            <span class="input-group-btn">
              <button   class="btn btn-default btn-choose"
                    type="button"
                    onclick="$(this).parents('.input-file').prev().click();">Choisir
              </button>
            </span>
            <input  type="text" class="form-control" placeholder='Choisissez un fichier...' style="cursor:pointer"
                    onclick="$(this).parents('.input-file').prev().click(); return false;"  />
            <span class="input-group-btn">
              <button class="btn btn-warning btn-reset" type="button" 
                  onclick="$(this).parents('.input-file').prev().val(null);
                       $(this).parents('.input-file').find('input').val('');">Effacer
              </button>
            </span>
          </div>
        </div>

        <script>

        </script> 

  <?php 
  $app_html = ob_get_contents();
  ob_end_clean();
  require('Layout/main.php') ;

?>