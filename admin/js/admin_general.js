function generate_response(sId, reloadId) {
	 $.ajax({
		url: 'controllers/main.php',
		type: 'POST',
		data: {action:"GenerateResponseCookie", sId:sId},
		success: function(data) {
			if (reloadId == 1) {
				location.reload(); 
			}                 
		}
	});
	
}

function generate_instant_response(type, loc) {
	if (loc == 1) {
		var element = '.ResponseContainer';
	} else {
		var element = '#ResponseDiv';
	}
	
	$(element).show();
	   var reponse = document.createElement("p");
	   reponse.setAttribute('class', 'AdminResponseClass');
	$(element).append(reponse);
	 	 var reponse = document.createElement("i");
	   reponse.setAttribute('class', 'fa fa-check');
	 
	$('.AdminResponseClass').append(reponse);
	
	switch(type) {
    case 1:
        $( ".AdminResponseClass" ).append('Saved Successfully!');
        break;
    case 2:
        $( ".AdminResponseClass" ).append('Deleted Successfully!');
        break;
    default:
       $( ".AdminResponseClass" ).append('Saved Successfully!');
}
	  
	 
	 
	 $('.AdminResponseClass').css({"transition":"all 0.3s", "font-size":"18px", "background-color":"rgba(229, 229, 229, 0.33)"});
	 $('.AdminResponseClass i').css({"color":"#2A7813"});
	 
	  $( ".AdminResponseClass" ).fadeOut(3400);
	 
	 setTimeout(function () {
         $(element).remove('.AdminResponseClass');
            }, 2000); //will call the function after 4 secs.
	
}


   $(document).ready(function(){
	   var responsetext = $( ".AdminResponseClass" ).val(); 
	   if (typeof responsetext !='undefined') {
		   	setTimeout(function () {
          $( ".AdminResponseClass" ).fadeOut(800);
            }, 4000); //will call the function after 4 secs.
		   
	   }
   
      });