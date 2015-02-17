   $(document).ready(function(){ 
		 
		 /// New Agenda icon stuff
		 
		    $('#Highlighted').on('click', function () {
	   
          // save the button and the select elements in to a variable

 
			var n = $( "#Highlighted:checked" ).length;
			if (n === 1) {
				 var i = 2;
				 var test = $('<button/>',{
                    text: '+',
					class: "AdminSubmitButton",
                     click: function (e) { 
					    
					        e.preventDefault();
		                   	e.stopPropagation(); 
							 $('#BlogDiv').append('<br /><input class="AdminInputField" required="required" id="BlogTitle_'+i+'" name="BlogTitle_'+i+'" type="text" placeholder="Blog Title" />');							
							 $('#BlogDiv').append('<br /><input class="AdminInputField" required="required" id="BlogURL_'+i+'" name="BlogURL_'+i+'" type="text" placeholder="Blog URL" />');
							 $('#BlogVal').val(i);
							 i++;
							 $('#BlogDiv').append(test).end();
							}
                    });
				
				
				  $('#BlogDiv').show();

				  $('#BlogDiv').append('<br /><input class="AdminInputField" required="required" id="BlogTitle_1" name="BlogTitle_1" type="text" placeholder="Blog Title" />');							
				  $('#BlogDiv').append('<br /><input class="AdminInputField" required="required" id="BlogURL_1" name="BlogURL_1" type="text" placeholder="Blog URL" />');
				   $('#BlogDiv').append('<input id="BlogVal" name="BlogVal" type="hidden" value="1"/>');
				  
				  $('#BlogDiv').append(test).end();
				 
				  //<input type="button" name="AddAlaCarte" class="AddAlaCarte" value="+"> <br />
				  
				  //$('#BlogDiv input').attr('required', 'required');
	   
			} else {
				//show everything as normal
				  $('#BlogDiv').hide();
		          $('#BlogDiv').children().remove();
			}

	     });
		 
		 

		 
	   
   });
