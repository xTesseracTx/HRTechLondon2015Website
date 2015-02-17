$(document).ready(function(){
	
	
	  	 /*-----------------------
		Display next or previous Speaker
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
		
		
       $('#EmptyModal').modal('show');
	  

  })
	
	
  	/*-----------------------
		 Key pressed
	------------------------	*/
  	   $('body').keyup(function(event) {
        if ((event.keyCode == 37) || (event.keyCode == 39))  {
			
			
		  //get the current speaker id
		var sId = $("#ModalLeftArrow").data("speakerid");
		
		 if (event.keyCode == 37) {
			 	var type = 1 //prev
		 }
	
		if (event.keyCode == 39) {
			 	var type = 2 //next
		 }
		
		//get the element index data (witch child is it) :)
		var Sindex = $('#'+sId).index();
		
		
		if (type == 1) {
			var sTag = $('#Speakers').children().eq(Sindex-1).data("speakerdatatag");
		} 
		
		if (type == 2) {
			var sTag = $('#Speakers').children().eq(Sindex+1).data("speakerdatatag");
		}
		
		   
		   if (typeof sTag != "undefined" && sTag != null) {
				  $.ajax({
					url: 'controllers/speakers_main.php',
					type: 'POST',
					data: {action:"modal_display", sTag:sTag},
					success: function(data) {
						$('#EmptyModal').html(data);
					}
				});
			   
		   }
	   
        } //if left or right arrow pressed end
		
    }) //.keypress ends
  
	
});


  	 /*-----------------------
		Display next or previous Speaker
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
function Modalchange(Elem) {
		
		  //get the current speaker id
		var sId = $(Elem).data("speakerid");
		var type = $(Elem).data("speaker-arrow"); //get if it's next or previous
		
		
		//get the element index data (witch child is it) :)
		var Sindex = $('#'+sId).index();
		
		
		//current tag for close modal :D
		var CurrentTag = $('#Speakers').children().eq(Sindex).data("speakerdatatag");
		
		
		//close the current modal
		$('#'+CurrentTag).modal('hide');
		
		if (type == 1) {
			var sTag = $('#Speakers').children().eq(Sindex-1).data("speakerdatatag");
		} 
		
		if (type == 2) {
			var sTag = $('#Speakers').children().eq(Sindex+1).data("speakerdatatag");
		}
		
		   
		   if (typeof sTag != "undefined" && sTag != null) {
				  $.ajax({
					url: 'controllers/speakers_main.php',
					type: 'POST',
					data: {action:"modal_display", sTag:sTag},
					success: function(data) {
						$('#EmptyModal').html(data);
					}
				});
			   
		   }
		



}
	
function ExternalModal (sTag) {

	
			 $.ajax({
                url: 'controllers/speakers_main.php',
                type: 'POST',
                data: {action:"modal_display", sTag:sTag},
                success: function(data) {
                         $('#EmptyModal').html(data);
                }
            });
		

			 $('#EmptyModal').modal('show');

}
