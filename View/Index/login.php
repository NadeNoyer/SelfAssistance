<?php

ob_start();
 
 
 
?> 
    <fieldset class =  "thumbnail">
    <div class= 'col-sm-12' >
      <legend class="scheduler-border" style="font-weight: normal"> 
        Merci de vous connecter avec votre user Windows
      </legend>
 
      <form method='post' action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
          
        <input type='hidden' name='oldform' value='1'>

         <input type='text' name='username' value='<?php echo ($username); ?>'><br>
         <input type='password' name='password'><br>
         <br>

        <input type='submit' name='submit' value='Submit'><br>
        
        <?php if ($failed){ echo ("<br>Login Failed!<br><br>\n"); } ?>
    

        <?php if ($logout=="yes") { echo ("<br>You have successfully logged out."); } ?>
      </form>
    </div>
 
    </fieldset>

 
  <?php 
  $app_html = ob_get_contents();
  ob_end_clean();
  require('Layout/main.php') ;

?>