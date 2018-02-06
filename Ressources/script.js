/* -----------------------------------------------------------------------------------/
/  commencer tjs par $(document).ready(function() => faire quand la DOM est chargée   /
/ -----------------------------------------------------------------------------------*/
 $(document).ready(function() {

 	$(function() {
		// Affichage du sous menu en douceur
		jQuery('ul.nav li.dropdown').hover(function() {
			  jQuery(this).find('.jqueryFadeIn').stop(true, true).delay(200).fadeIn();
				},  function() {
			 		jQuery(this).find('.jqueryFadeIn').stop(true, true).delay(200).fadeOut();
		});
 
	});	

  
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
			$('.message').text('Vous devez saisir un code article');
		}
  		//$('#return').show() ;

  	}); // FIN $('form.formFile').on('submit', function(e)
	 


	$('form.formDebloqOf').on('submit', function(e) { 
 
 		var erreur = false;
	 		
		var monOf = $("#of");

		if(monOf.val().length== 0) {
			erreur = true;
			monOf.addClass('alert-danger');
		} else {
	 		erreur = false ;
			monOf.rmvClass('alert-danger'); 	
    	}
 
    	// s'il y au moins une erreur 
    	if (erreur) {
			e.preventDefault();
			$('.message').text('Vous devez saisir un numero d of');
		}
  		//$('#return').show() ;

  	});

 	$('form.formOAPave').on('submit', function(e) { 
 
 		var erreur = false;
	 		
		var monOa = $("#oa");

		if(monOa.val().length== 0) {
			erreur = true;
			monOa.addClass('alert-danger');
		} else {
	 		erreur = false ;
			monOa.rmvClass('alert-danger'); 	
    	}
 
    	// s'il y au moins une erreur 
    	if (erreur) {
			e.preventDefault();
			$('.message').text('Vous devez saisir un numero d oa');
		}
  		//$('#return').show() ;

  	});

}); // FIN :  $(document).ready(function()

 



 
		
 