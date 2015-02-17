   $(document).ready(function(){ 
		 
    	 /*-----------------------
		Sponsor Permission remove
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.PermRemove').bind('click', function () {
		
		//get the id of the activated element
		var user_id = $(this).data('sponsorpermission-user');
		var sId = $( "#SponsorName" ).data('sponsorpermission-sponsor');
				
		 $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"SponsorPermissionDelete", user_id:user_id, sId:sId},
                success: function(data) {
                    location.reload();
                }
            });
      

  })
  
  
      	 /*-----------------------
		Sponsor Permission add
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.PermAdd').bind('click', function () {
		
		//get the id of the activated element
		var user_id = $(this).data('sponsorpermission-user');
		var sId = $( "#SponsorName" ).data('sponsorpermission-sponsor');
				
		 $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"SponsorPermissionAdd", user_id:user_id, sId:sId},
                success: function(data) {
                    location.reload();
                }
            });
      

  })
  
		 
		 

		 
	   
   });
