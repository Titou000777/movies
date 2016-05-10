/*********************************
*			SOMMAIRE             *
* DROPBOX						 *
* ... 							 *
*********************************/
/*********************************
*			$...	 			 *
*********************************/
$(document).ready(function() {
	
	/*********************************
	*			$DROPBOX	 		 *
	*********************************/
	$('.btn-drop').on("click", function() {
		$('.content-drop').toggleClass('hide');
	});


	/*********************************
	*			$CHECKBOX	 		 *
	*********************************/
	$('#selectionner').on("click", function() {
        if($("#selectionner").is(':checked')){
            $(".header-form-drop").find(':checkbox').attr('checked', true); 
        }else{ 
            $(".header-form-drop").find(':checkbox').attr('checked', false);
        }      
	});
});