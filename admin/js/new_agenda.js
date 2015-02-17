   $(document).ready(function(){ 
 
     /*-----------------------
		Input lost focus
	------------------------	*/
        $('#AgendaTitle').bind('focusout', function () {

		var name = $('#AgendaTitle').val();
		
		var andrep = name.replace("&", "and"); 
		 andrep = andrep.replace("í", "i"); 
		 andrep = andrep.replace("ó", "o"); 
		 andrep = andrep.replace("ő", "o");
		 andrep = andrep.replace("ü", "u");
		 andrep = andrep.replace("ű", "u");
		 andrep = andrep.replace("ú", "u");
		 andrep = andrep.replace("é", "e");
		 andrep = andrep.replace("á", "a");

		//var tag = name.replace(/^\s+|\s+$/gm,'-');
		var tag = andrep.replace(/[^A-Z0-9]+/gi, "-");
		
		var tag_formed = tag.toLowerCase();
		var tag_final = '';
		
		var tag_last = tag_formed.substr(tag_formed.length-1, tag_formed.length);
		
		  if (tag_last == "-") {
			  tag_final = tag_formed.substr(0, tag_formed.length-1);
		  } else {
			  tag_final = tag_formed;
		  }
		
		var tag_first = tag_formed.substr(tag_formed.length-1, tag_formed.length);
		
		  if (tag_first == "-") {
			  tag_final = tag_formed.substr(1, tag_formed.length);
		  } else {
			  tag_final = tag_formed;
		  }
		
		
	   $('#AgendaTag').val(tag_final);

  })
 
 
		 
		 /// New Agenda icon stuff
		 
		 		//If user clicks the "no picture" checkbox
   $('#Highlighted').on('click', function () {
	   
          // save the button and the select elements in to a variable

 
			var n = $( "#Highlighted:checked" ).length;
			if (n === 1) {
					$('#AgendaIcon').show();
					$('#SpeakersDiv').hide();
	   
			} else {
				//show everything as normal
	            $('#AgendaIcon').hide();
				$('#SpeakersDiv').show();
			}

	     })
		 
	
var SelectedSpeaker = {};
	      	/*-----------------------
		 Change inside the element
	    ------------------------	*/
      $('#Alphabet').bind('change', function () {
		  
		  var asd = this;
		  var sh = []; //this will contain all the speakers form the speakers hidden list
		  var sh_val = [];  //this stores the speakers id-s form the hidden list
		  
		/*-------------------------------------------------------  */
		// Backup the selected values
		   var sp_backup = []; //this is a backup for the speakers (the actual selected list)
		   var sp_backup_val = []; //this is a value backup for the spakers
		    
		  //save the speaker list content if it has any
		  
		  var sp_backup_l = document.getElementById("Speakers").length;
		  
		  if (sp_backup_l > 0) {
			   for(var spc = 0; spc<sp_backup_l; spc++) {
			      sp_backup[spc] = $('#Speakers option').eq(spc).text();
			    sp_backup_val[spc] = $('#Speakers option').eq(spc).val();
		      } 
			  
			  SelectedSpeaker.SelText = sp_backup; 
			  SelectedSpeaker.SelValue = sp_backup_val;
		  }

		 /*--------------------------------------------------------*/ 
		  var slh_lenght = document.getElementById("SpeakersListHidden").length;;
		  
		  for(var slh = 0; slh<slh_lenght; slh++) {
			sh[slh] = $('#SpeakersListHidden option').eq(slh).text();
			sh_val[slh] = $('#SpeakersListHidden option').eq(slh).val();
		  } 
		   
		   
    $('#SpeakersList')
	.find('option')
    .remove()
    .end();
		


   var items = new Array();
   for (var i = 0, j = asd.options.length; i < j; i++)
   {
       if (asd.options[i].selected)
       {
           items.push(asd.options[i].value);
       }
   }
   // selectObject.id holds the "id"
   var itemsToString = items.toString();
   
   //split and get values.
   var s = itemsToString.split(',');
   for(var k=0; k<s.length; k++)
      {
   
   for (var i = 0, j = sh.length; i < j; i++)
   {	 
   
   
   //to check the last name instead of first name
      var last = sh[i].split(' ');
	  var part_count = last.length -1;

       if (last[part_count][0].toLowerCase() == s[k].toLowerCase())
       {
		   $('#SpeakersList')
         .append($("<option></option>")
         .attr("value",sh_val[i])
         .text(sh[i])); 
		 
          
       }
   } //for var i
		 
      } //for var k

	
  })
	
	
	
	      	/*-----------------------
		 Change inside the element
	    ------------------------	*/
      $('#SpeakersList').bind('change', function () {
		  
		  var asd = this;
		  var sh = [];
		  var sh_val = [];
		  
		 $('#Speakers')
	       .find('option')
           .remove()
            .end();
			var HiddenSpeakersVal = '';
		

		//	 We add the already selected values to the speaker select
		
		if (typeof SelectedSpeaker.SelText != 'undefined' && SelectedSpeaker.SelText[0] != '') {
			
			  for (var i = 0, j = SelectedSpeaker.SelText.length; i < j; i++){	 
				 if (SelectedSpeaker.SelText[i] != '') {
					 
					  $('#Speakers')
					 .append($('<option></option>')
					 .attr("value",SelectedSpeaker.SelValue[i])
					 .text(SelectedSpeaker.SelText[i])); 
					 
					 HiddenSpeakersVal += SelectedSpeaker.SelValue[i]+"|";
					 
				 }
		     
				   } //for var i
					  SelectedSpeaker.SelText = "" 
	                  SelectedSpeaker.SelValue = "";
			} //type not undefined
		
		  var slh_lenght = document.getElementById("SpeakersList").length;;
		  
		  for(var slh = 0; slh<slh_lenght; slh++) {
			   var err = 0;
			   if (typeof SelectedSpeaker.SelText != 'undefined' && SelectedSpeaker.SelText[0] != '') {  
				   for (var i = 0, j = SelectedSpeaker.SelText.length; i < j; i++){	 
					 if (typeof SelectedSpeaker.SelValue[i] != 'undefined') {
							if ($('#SpeakersList option:selected').eq(slh).val() == SelectedSpeaker.SelValue[i]) {
								err = 1;
							}
						 
					 }
				 
					   } //for var i
					 } //type not undefined
			  
			  if (err == 0) {
					sh[slh] = $('#SpeakersList option:selected').eq(slh).text();
					sh_val[slh] = $('#SpeakersList option:selected').eq(slh).val();
					if (typeof sh_val[slh] != 'undefined') {
						HiddenSpeakersVal += sh_val[slh]+"|";
					}
			
			  }

			
			
			
			 
		  } 
		   
		  
   for (var i = 0, j = sh.length; i < j; i++)
   {	 
		 if (sh[i] !== '') {
			  $('#Speakers')
			 .append($('<option></option>')
			 .attr("value",sh_val[i])
			 .attr("class","SpeakerSelectOption")
			 .text(sh[i]))
			 .on('click', function () {
				   var ids = '';
               $('#Speakers option:selected').remove();
			  		/*-------------------------------------------------------  */
		// Backup the selected values
		   var sp_backup = []; //this is a backup for the speakers (the actual selected list)
		   var sp_backup_val = []; //this is a value backup for the spakers
		    
		  //save the speaker list content if it has any
		  
		  var sp_backup_l = document.getElementById("Speakers").length;
		  
		  if (sp_backup_l > 0) {
			   for(var spc = 0; spc<sp_backup_l; spc++) {
			      sp_backup[spc] = $('#Speakers option').eq(spc).text();
			      sp_backup_val[spc] = $('#Speakers option').eq(spc).val();
				  if ( sp_backup_val[spc] > -1) {
					  ids +=  sp_backup_val[spc] + "|";
				  }
		      } 
			  
			  SelectedSpeaker.SelText = sp_backup; 
			  SelectedSpeaker.SelValue = sp_backup_val;
			  $('#SelectedSpeakers').val(ids); 
		  } else {
			   $('#SelectedSpeakers').val("-1"); 
			   	  SelectedSpeaker.SelText = "" 
	              SelectedSpeaker.SelValue = "";
		  }

	     }); 
		 }
      

		 
          
 
   } //for var i
   if (HiddenSpeakersVal != '') {
	   $('#SelectedSpeakers').val(HiddenSpeakersVal);
   } else {
	  $('#SelectedSpeakers').val("-1"); 
	  SelectedSpeaker.SelText = "" 
	  SelectedSpeaker.SelValue = "";
   }
 

	
  })
	

	
			 		//If user clicks the "no picture" checkbox
   $('#SpeakerSearch').bind('keyup', function () {
	   
		 // var Starget = $(this).val()+String.fromCharCode(event.keyCode);
		 var Starget = $(this).val();

		  var sh = []; //this will contain all the speakers form the speakers hidden list
		  var sh_val = [];  //this stores the speakers id-s form the hidden list
		  
		/*-------------------------------------------------------  */
		// Backup the selected values
		  var sp_backup = []; //this is a backup for the speakers (the actual selected list)
		   var sp_backup_val = []; //this is a value backup for the spakers
		    
		  //save the speaker list content if it has any
		  
		  var sp_backup_l = document.getElementById("Speakers").length;
		  
		  if (sp_backup_l > 0) {
			   for(var spc = 0; spc<sp_backup_l; spc++) {
			      sp_backup[spc] = $('#Speakers option').eq(spc).text();
			    sp_backup_val[spc] = $('#Speakers option').eq(spc).val();
		      } 
			  
			  SelectedSpeaker.SelText = sp_backup; 
			  SelectedSpeaker.SelValue = sp_backup_val;
		  }

		 /*--------------------------------------------------------*/ 
		  var slh_lenght = document.getElementById("SpeakersListHidden").length;;
		  
		  for(var slh = 0; slh<slh_lenght; slh++) {
			sh[slh] = $('#SpeakersListHidden option').eq(slh).text();
			sh_val[slh] = $('#SpeakersListHidden option').eq(slh).val();
		  } 
		   
		   
    $('#SpeakersList')
	.find('option')
    .remove()
    .end();
		


   var items = new Array();
   
     for (var i = 0, j = sh.length; i < j; i++){	
	    var temp = (sh[i].toLowerCase()).search(Starget.toLowerCase());
	       if (temp > -1) {
	          items.push(sh[i]);
		   }
    	 } //for i till sh.leng
   
   // selectObject.id holds the "id"
   var itemsToString = items.toString();

   //split and get values.
   var s = itemsToString.split(',');
   
   for(var k=0; k<s.length; k++)
      {
   
   for (var i = 0, j = sh.length; i < j; i++){	 
   
   
   //to check the last name instead of first name


       if (sh[i] == s[k])
       {
		   $('#SpeakersList')
         .append($("<option></option>")
         .attr("value",sh_val[i])
         .text(sh[i])); 
		 
          
       }
   } //for var i
		 
      } //for var k

			
			
	     })
 
	   
   });