      /*-----------------------
		click on remove
	------------------------	*/
       function SubmitRemove () {
		    document.getElementById("mediapartners").removeChild(document.getElementById("MediapartnerSubmit"));

  }
  
 
 
 // myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.DropDiv = {
	   sending: function(file, xhr, formData) {    
        formData.append("Mediapartner", $("#MediapartnerName").val());
		formData.append("MediapartnerURL", $("#MediapartnerURL").val());
		formData.append("MediapartnerBio", $("#MediapartnerBio").val());
		formData.append("MediapartnerTwitter", $("#MediapartnerTwitter").val());
		formData.append("MediapartnerFacebook", $("#MediapartnerFacebook").val());
		formData.append("MediapartnerLinkedin", $("#MediapartnerLinkedin").val());
		formData.append("MediapartnerFlickr", $("#MediapartnerFlickr").val());
		formData.append("MediapartnerGoogle", $("#MediapartnerGoogle").val());
		formData.append("Highlighted", $("#Highlighted").val());
		formData.append("MediapartnerTypes", $("#MediapartnerTypes").val());
		formData.append("MediapartnerTag", $("#MediapartnerTag").val());
    },
    init: function() {
      this.on("addedfile", function(file) {

        // Create the remove button
        var SubmitButton = Dropzone.createElement('<input class="AdminSubmitButton" id="MediapartnerSubmit" name="MediapartnerSubmit" type="submit" value="Save"/>');


        // Capture the Dropzone instance as closure.
        var dz = this;

        // Listen to the click event
        $('#mediapartners').on("submit", function(e) {
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
        document.location.href="mediapartners"; //will redirect to speakers
            }, 1000); //will call the function after 2 secs.
			
		 
        });

        // Add the button to the form
       document.getElementById("mediapartners").appendChild(SubmitButton);
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
        $('#MediapartnerName').bind('focusout', function () {

		var name = $('#MediapartnerName').val();
		var sp = name.split(" ");
		var x = Math.floor((Math.random() * 20) + 1);
		var tag = sp[0]+x;
	   $('#MediapartnerTag').val(tag);

  })
  
  
          $('#MediapartnerURL').bind('focusout', function () {
			  var sCompanyLink = $('#MediapartnerURL').val();
			  var httpval = sCompanyLink.search("http");
		      var httpsval = sCompanyLink.search("https");
			  
		     if (httpval == -1 && httpsval == -1) {
			    sCompanyLink = "http://"+sCompanyLink;
				 $('#MediapartnerURL').val(sCompanyLink);
		      }
  })
  

 
			//If user clicks the "no picture" checkbox
   $('#NoPicture').on('click', function () {
	   
          // save the button and the select elements in to a variable
        var SubmitButton = Dropzone.createElement('<input id="SpeakerSubmit" name="SpeakerSubmit" type="submit" value="Save"/>');
	    var AvatarSelect = Dropzone.createElement('<div id="AvatarSelect"><p>In order to generate an appropriate avatar, please select the gender of the speaker.</p><label>Gender <select name="Gender"> <option value="1">Male</option><option value="2">Female</option></select></label><br /><br /></div>');


        // Capture the Dropzone instance as closure.
        var _this = this;

        // if the checkbox is checked:
 
			var n = $( "#NoPicture:checked" ).length;
			if (n === 1) {
				        // Add the button and the select to the form
       document.getElementById("speakers").appendChild(SubmitButton);
	   document.getElementById("AvatarHelp").appendChild(AvatarSelect);
	   $(".dz-message").hide();
	   
			} else {
				//show everything as normal
	   document.getElementById("speakers").removeChild(document.getElementById("SpeakerSubmit"));
	   document.getElementById("AvatarHelp").removeChild(document.getElementById("AvatarSelect"));
	    $(".dz-message").show();
	   
			}

	   
	     })
		 
	
	   
   });