function datainsert() {
	var id = 0;
		 id =  $('#SecretAgendaEditId').val();
		if (id.length > 0){

		          $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
				dataType: "json",
                data: {action:"agenda_edit", id:id},
                success: function(data) {
					
					
					var decodedTitle = data[6].replace(/&amp;/g, '&');
					var decodedTitle = decodedTitle.replace(/&quot;/g, '"');

					
                 $('[name="AgendaTitle"]').val(decodedTitle);
				 $('[name="AgendaTag"]').val(data[11]);
				 
				 				 /// Set location
			  $("#AgendaTimeEnd option").filter(function() {
				  //may want to use $.trim in here
				  return $(this).text() == data[2]; 
			  }).attr('selected', true);
					
					
									 /// Set location
			  $("#AgendaTimeStart option").filter(function() {
				  //may want to use $.trim in here
				  return $(this).text() == data[1]; 
			  }).attr('selected', true);
					
					if (data[7] == 1) {
					   $('#Highlighted').attr('checked', 'checked');
					   	 $('#AgendaIcon').show();
					     $('#SpeakersDiv').hide();
					   $("#Icons option").filter(function() {
				    //may want to use $.trim in here
				      return $(this).text() == data[8]; 
			            }).attr('selected', true);
					}
					


var htmlEnDeCode = (function() {
    var charToEntityRegex,
        entityToCharRegex,
        charToEntity,
        entityToChar;

    function resetCharacterEntities() {
        charToEntity = {};
        entityToChar = {};
        // add the default set
        addCharacterEntities({
            '&amp;'     :   '&',
            '&gt;'      :   '>',
            '&lt;'      :   '<',
            '&quot;'    :   '"',
            '&#39;'     :   "'"
        });
    }

    function addCharacterEntities(newEntities) {
        var charKeys = [],
            entityKeys = [],
            key, echar;
        for (key in newEntities) {
            echar = newEntities[key];
            entityToChar[key] = echar;
            charToEntity[echar] = key;
            charKeys.push(echar);
            entityKeys.push(key);
        }
        charToEntityRegex = new RegExp('(' + charKeys.join('|') + ')', 'g');
        entityToCharRegex = new RegExp('(' + entityKeys.join('|') + '|&#[0-9]{1,5};' + ')', 'g');
    }

    function htmlEncode(value){
        var htmlEncodeReplaceFn = function(match, capture) {
            return charToEntity[capture];
        };

        return (!value) ? value : String(value).replace(charToEntityRegex, htmlEncodeReplaceFn);
    }

    function htmlDecode(value) {
        var htmlDecodeReplaceFn = function(match, capture) {
            return (capture in entityToChar) ? entityToChar[capture] : String.fromCharCode(parseInt(capture.substr(2), 10));
        };

        return (!value) ? value : String(value).replace(entityToCharRegex, htmlDecodeReplaceFn);
    }

    resetCharacterEntities();

    return {
        htmlEncode: htmlEncode,
        htmlDecode: htmlDecode
    };
})();


             var decoded_text = htmlEnDeCode.htmlDecode(data[4]);

					if (decoded_text != '' && typeof decoded_text != 'undefined') {
						tinymce.activeEditor.execCommand('mceInsertContent', false, decoded_text);
					}
					
					
					//$("#SpeakersDiv textarea").val(data[4]);
				// $('[name="Abstract"]').val(data[4]);
				 
				 /// Set location
			  $("#Locations option").filter(function() {
				  //may want to use $.trim in here
				  return $(this).text() == data[5]; 
			  }).attr('selected', true);
					
					
				var day = "Day "+data[3];

				/// day selection
			  $("#Day option").filter(function() {
				  //may want to use $.trim in here
				  return $(this).text() == day;  
			  }).attr('selected', true);
				
				
				//Speakers
				 if (data[10] != ''){
					 
					var Snames = data[10].split(";");
					var Sids = data[9].split(";");
					var ids = '';
					var start_ids = '';
					for (var i = 0, j = Snames.length; i < j; i++){	 
								 
					     if (typeof Snames[i] != 'undefined' && Snames[i] != ''){
							 if (typeof Sids[i] != 'undefined' && Sids[i] != ''){

								   $('#Speakers')
									 .append($("<option></option>")
									 .attr("value",Sids[i])
									 .attr("class","SpeakerSelectOption")
									 .on('click', function () {
											 var ids = '';
											 
											 $('#Speakers option:selected').remove();
											 
																		  // Backup the selected values
											 var sp_backup_val = []; //this is a value backup for the spakers
											  
											//save the speaker list content if it has any
											
											var sp_backup_l = document.getElementById("Speakers").length;
											
											if (sp_backup_l > 0) {
												 for(var spc = 0; spc<sp_backup_l; spc++) {
								  
													sp_backup_val[spc] = $('#Speakers option').eq(spc).val();
													if ( sp_backup_val[spc] > -1) {
														ids +=  sp_backup_val[spc] + "|";
													}
												} 
												
								  
											 if (ids != '') {
											   $('#SelectedSpeakers').val(ids);  
								  
												} else {
													$('#SelectedSpeakers').val(" ");
												}
											} else {
												$('#SelectedSpeakers').val("-1");
											}
											 
											 
										})
												
									.text(Snames[i])); 
									
								  if (Sids[i] > -1) {
										start_ids +=Sids[i]+"|";
									}
								
								 Sids[i] = '';
						      }//if type of sid
							 }//if type of name
						   } //for var i

						if (start_ids != '') {
						  $('#SelectedSpeakers').val(start_ids);  
								  
						} else {
							$('#SelectedSpeakers').val(" ");
						}
				 }
				 
                }
            });
			
		} //if id.length > 0	
	
}


$(document).ready(function(){

	
 datainsert();

	
  	 /*-----------------------
		Agenda edit
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
 /*  setTimeout(function () {
		
       } , 1000); //set timeout function end
  */
 


});