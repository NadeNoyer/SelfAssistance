/* -----------------------------------------------------------------------------------/
/  commencer tjs par $(document).ready(function() => faire quand la DOM est chargée   /
/ -----------------------------------------------------------------------------------*/
 $(document).ready(function() {

  
 	$('form.formArticle').on('submit', function(e) { 
 
 		var erreur = false;
	 		
		var monCodArt = $("#codArt").val();

		if(monCodArt.length == 0) {
			erreur = true;
			monCodArt.addClass('alert-danger');
		} else {
	 		erreur = false ;
			monCodArt.rmvClass('alert-danger'); 	
    	}
 
    	// s'il y au moins une erreur 
		if (erreur) {
			e.preventDefault();
			$('.message').text('Veuillez saisir un code article');
		}
  		//$('#return').show() ;

  	}); // FIN $('form.formFile').on('submit', function(e)
	 

	 $('#updateStatut').on('click',function(e){
			// supprime ce qui il est cense faire
			e.preventDefault();
			// closest pour retourner l'ensemble d'élements contenant le parent "tr" le plus proche
			// find pour chercher dans le parent du Td la classe statNew pour changer le statut
			
			var monStatut = $(this).closest('tr').find('.statNew');
			
			var monBouton= $(this).closest('tr').find('.updateStat');
			
			var monId = $(this).closest('tr').find('.id');
			
						
				// appel ajax pour lancer la maj en bdd crÃ©er la fonction statutAjaxAction
				$.ajax('index.php', {
					method:'GET',
					data:{	controller:'index',
							action:'updateStatutOf',
							id:monId.data('id'),
							ajax:1
						 },
					dataType: 'json',
				    success: function(data) {
				    	if (data.result) {
				    		monStatut.text(data.statutUpdate);

				    		if (data.statutUpdate === '10')
				    	        {
 				    			 	monBouton.removeClass('btn-warning');
				    			 	monBouton.addClass('btn-info');
				    			 	monBouton.val("Bloquer");
	   			    	    }  else {
     				    	    	monBouton.removeClass('btn-info');
					    	    	monBouton.addClass('btn-warning');
					    	    	monBouton.val("Debloquer");
				    	    }
				  
						} else {
							alert("Modification impossible");
						}
				    }
				}); // Fin : $.ajax('index.php', {
				
							
		});  // Fin : $('.updateStat').on('click',function(e){

}); // FIN :  $(document).ready(function()

 



 
		
 