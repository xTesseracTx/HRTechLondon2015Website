$(document).ready(function(){
	 /*-----------------------
		Display Speaker modal
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SpeakerModalOpen').bind('click', function () {
		  //get the current speaker id
		//var sId = $(this).data("speakerid");
		var sTag = $(this).data("speakertag");
		
		     $.ajax({
                url: 'controllers/speakers_main.php',
                type: 'POST',
                data: {action:"modal_display", sTag:sTag},
                success: function(data) {
                    $('#EmptyModal').html(data);
                }
            });
		
		
       $('#EmptyModal').modal('toggle');
	  

  })
	
});
