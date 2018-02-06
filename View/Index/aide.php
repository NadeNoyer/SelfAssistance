<?php

ob_start();
 
 
?> 
 
    <fieldset class =  "thumbnail">
         
      <div class='col-sm-12' >
          
          <legend class="scheduler-border" style="font-weight: normal"> 
             <h3>Aide de l'application </h3>
          </legend>
          <div class='col-offset-sm-2 col-sm-10' >

              <h4> 1- Sélectionner une option du menu </h4>

            <img id="menu" src="Ressources/aide/Menu.jpg" alt="menu"  height="100" /> 

              <h4> 2- Sélectionner un domaine pour V11 ou M3  </h4>

              <h4> 3 - Sélectionner un traitement  </h4>
          </div>
      </div>

    </fieldset>   

  <?php 
  $app_html = ob_get_contents();
  ob_end_clean();
  require('Layout/main.php') ;

?>