      /*-----------------------
		click on remove
	------------------------	*/
       function SubmitRemove () {
		    document.getElementById("speakers").removeChild(document.getElementById("SpeakerSubmit"));

  }
  
 
 
 // myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.DropDiv = {
	   sending: function(file, xhr, formData) {    
        formData.append("Speaker", $("#SpeakerName").val());
		formData.append("SpeakerTitle", $("#SpeakerTitle").val());
		formData.append("CompanyName", $("#CompanyName").val());
		formData.append("CompanyUrl", $("#CompanyUrl").val());
		formData.append("CompanyBio", $("#CompanyBio").val());
		formData.append("SpeakerTwitter", $("#SpeakerTwitter").val());
		formData.append("SpeakerFacebook", $("#SpeakerFacebook").val());
		formData.append("SpeakerLinkedin", $("#SpeakerLinkedin").val());
		formData.append("SpeakerFlickr", $("#SpeakerFlickr").val());
		formData.append("SpeakerGoogle", $("#SpeakerGoogle").val());
		formData.append("SpeakerBioImp", $("#SpeakerBioImp").val());
		
		if(document.getElementById("Moderator").checked == true) {
			 formData.append("Moderator", $("#Moderator").val());
			} 
		formData.append("SpeakerBio", $("#SpeakerBio").val());
		formData.append("Order", $("#Order").val());
		formData.append("Tag", $("#Tag").val());
    },
    init: function() {
      this.on("addedfile", function(file) {

        // Create the remove button
        var SubmitButton = Dropzone.createElement('<input class="AdminSubmitButton" id="SpeakerSubmit" name="SpeakerSubmit" type="submit" value="Save"/>');


        // Capture the Dropzone instance as closure.
        var dz = this;

        // Listen to the click event
        $('#speakers').on("submit", function(e) {
			
          // Make sure the button click doesn't submit the form:
          // Remove the file preview.
		    e.preventDefault();
            e.stopPropagation();
			
             dz.processQueue();
			 generate_response(0, 0);
		  

			
		  //maybe we send aaaaaaaall the data with ajax instead of post
          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.

	  
		  setTimeout(function () {
            document.location.href="speakers"; //will redirect to speakers
            }, 1000); //will call the function after 2 secs.
	
		 
        });

        // Add the button to the form
       document.getElementById("speakers").appendChild(SubmitButton);
      });
    }
  };
  
  
 $(document).ready(function(){ 
 
 $("#DropDiv").dropzone({ 
    url: "controllers/main.php"
   });
   

 
   	 /*-----------------------
		Input lost focus
	------------------------	*/
        $('#SpeakerName').bind('focusout', function () {

		var name = $('#SpeakerName').val();
		var sp = name.split(" ");
		if (sp[1]) {
			sp[1] = sp[1].replace(/[&\/\\#,+()$~%.'":*?<>{}]/g,'');
			var tag = sp[1]+sp[0][0];
		} else {
			sp[0] = sp[0].replace(/[&\/\\#,+()$~%.'":*?<>{}]/g,'');
			var tag = sp[0]+sp[0][0];
		}
		
	   $('#Tag').val(tag);

  })
  
  

 
			//If user clicks the "no picture" checkbox
   $('#NoPicture').on('click', function () {
	   
          // save the button and the select elements in to a variable
        var SubmitButton = Dropzone.createElement('<input class="AdminSubmitButton" id="SpeakerSubmit" name="SpeakerSubmit" type="submit" value="Save"/>');
	    var AvatarSelect = Dropzone.createElement('<div id="AvatarSelect"><p>In order to generate an appropriate avatar, please select the gender of the speaker.</p><label>Gender <select name="Gender"> <option value="1">Male</option><option value="2">Female</option></select></label><br /><br /></div>');


        // Capture the Dropzone instance as closure.
        var _this = this;

        // if the checkbox is checked:
 
			var n = $( "#NoPicture:checked" ).length;
			if (n === 1) {
				        // Add the button and the select to the form
       document.getElementById("speakers").appendChild(SubmitButton);
	   document.getElementById("AvatarHelp").appendChild(AvatarSelect);
	   $("#DropDiv").hide();
	   
			} else {
				//show everything as normal
	   document.getElementById("speakers").removeChild(document.getElementById("SpeakerSubmit"));
	   document.getElementById("AvatarHelp").removeChild(document.getElementById("AvatarSelect"));
	    $("#DropDiv").show();
	   
			}

	   
	     })
		 
	
	   
   });