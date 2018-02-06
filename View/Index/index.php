<?php

ob_start();

?>

 

	
	<!-- liste déroulante -->
<div class="form-group" >
	 
</div>



<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>