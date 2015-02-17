

$(document).ready(function(){
    
     /*-----------------------
		Edit request from agenda page by clicking on the edit button
	------------------------	*/
        $('.AgendaEditClick').bind('click', function (e) {
					e.preventDefault();
		            e.stopPropagation(); 
		
					
		var id = $(this).attr('id'); 
		var tag_number = id.search("_");
		var sId = id.substr(tag_number+1, id.length);

	
	
		  $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"AgendaEditSession", sId:sId},
                success: function(data) {
                    window.location.replace("agenda_edit");
                }
            });
	

  })
  
       /*-----------------------
		Edit request from agenda page by clicking on the edit button
	------------------------	*/
        $('.AgendaDeleteClick').bind('click', function (e) {
					e.preventDefault();
		            e.stopPropagation(); 
					
		var id = $(this).attr('id'); 
		var tag_number = id.search("_");
		var sId = id.substr(tag_number+1, id.length);
	
		
		  $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"agenda_delete", sId:sId},
                success: function(data) {
                  location.reload();
                }
            });
			

  })





});