$(document).ready(function() {
    $("form").click(function(e){
	    e.preventDefault();
	    var $form=$(this);
	    $('#confirm').modal({ backdrop: 'static', keyboard: false })
	        .on('click', '#delete-btn', function(){
	            $form.submit();
	        });
	}); 
});