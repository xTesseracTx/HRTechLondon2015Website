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
							 $('#AlaCarteDiv').append('<br /><label>A La Carte title<input class="AdminInputField" required="required" id="AlaCarte_'+i+'" name="AlaCarte_'+i+'" type="text" /></label>');
							 $('#CarteVal').val(i);
							 i++;
							 $('#AlaCarteDiv').append(test).end();
							}
                    });
				
				
				  $('#AlaCarteDiv').show();
				  $('#AlaCarteDiv').append('<br /><label>A La Carte title<input class="AdminInputField" required="required" id="AlaCarte_1" name="AlaCarte_1" type="text" /><input id="CarteVal" name="CarteVal" type="hidden" value="1"/></label>');
				  $('#AlaCarteDiv').append(test).end();
				 
				  //<input type="button" name="AddAlaCarte" class="AddAlaCarte" value="+"> <br />
				  
				  //$('#AlaCarteDiv input').attr('required', 'required');
	   
			} else {
				//show everything as normal
				  $('#AlaCarteDiv').hide();
		          $('#AlaCarteDiv').children().remove();
			}

	     });
		 
		 

		 
	   
   });
