  $(function() {
    $('#Speakers').sortable({
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
    		// change order in the database using Ajax
            $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"speaker_sort", list_order:list_sortable},
                success: function(data) {
                    //finished
                }
            });
        }
    }); // fin sortable
});


var Speakers = {};

var Mce = {};
function tiny_init(id) {
   
         tinymce.init({
            selector : "#"+id,
            theme : "modern",
			 plugins : "save",
			  toolbar: [
        "save | undo redo | paste | bold italic underline | alignleft aligncenter alignright alignjustify",
		"bullist numlist | outdent indent blockquote"
             ],
             theme_modern_buttons3_add : "save",
			 valid_styles : { '*' : 'color,font-size,font-weight,font-style,text-decoration' },
             save_enablewhendirty : true,
             save_onsavecallback : "BioSave"
        });
   
}

function tiny_remove(id) {
    tinymce.remove("#"+id);
}


function BioSave() {
	save_data(Mce.first, '');
}


function save_data(id, temp) {
		if (typeof temp != 'undefined' && temp != '') {
		var sVal = temp; 
	} else {
		var sVal = "None";
	}

					//get the original tag
		var tag_number = id.search("_");
		var tag = id.substr(0, tag_number); 
		
		var sId = $('#'+tag+'_SpeakerId').val();
		
		var second = id.substr(tag_number+1,id.length);
		
		if (second == "NewSocialLinkEdit"){
			 var newlink = sVal;
			 
			  if (newlink.length > 0) {
				  var typeid = -1;
				  var newtype = -1;
				  
				  ///We search for the correct link type
				  newtype = newlink.search("twitter");
				  if (newtype > -1) {
					  typeid = 2;
				  } else {
					  newtype = newlink.search("facebook");
					   if (newtype > -1) {
					      typeid = 1;
				      } else {
						newtype = newlink.search("linkedin");
						   if (newtype > -1) {
					          typeid = 3;
				           } else {
							   newtype = newlink.search("flickr");
						       if (newtype > -1) {
					             typeid = 4;
				               } else {
								   newtype = newlink.search("google");
						           if (newtype > -1) {
					                   typeid = 5;
				                    } else {
										newtype = newlink.search("rss");
						                if (newtype > -1) {
					                       typeid = 6;
				                        } else {
									       newtype = newlink.search("@");
						                    if (newtype > -1) {
					                       typeid = 2;
										   temp = newlink;
										   var atnumber = temp.search("@");
										   var handle = temp.substr(atnumber+1,temp.length);
										   newlink = "https://twitter.com/"+handle;
											}
										}
									}
								   
							   }
						   }
					  }
				  }
				  
				  if (typeid > -1){
					  
					  //------------------------------------------------------		
          $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"new_link", sId:sId, typeid:typeid, newlink:newlink},
                success: function(data) {
                    //finished
                }
            });
					  
					  
					  
				  } //if typeid > -1 end
				  
				  
			  } //newlink length > 0 end
			
		
		} else  {

   ///save the data from the input boxes
   
		//Speaker data
		var sName = $('#'+tag+'_NameEdit').val();
		var sTitle = $('#'+tag+'_TitleEdit').val();
		var sBioImportant = $('#'+tag+'_BioImportantEdit').val();    
		var sBio = $('#'+tag+'_BioEdit').val(); 
		//company data
		var sCompany = $('#'+tag+'_CompanyEdit').val();
		var sCompanyLink = $('#'+tag+'_CompanyLinkEdit').val();
		
		//Links
		var sTwitter = '';
		var sFlickr = '';
		var sFacebook = '';
		var sLinkedin = '';
		var sGoogle = '';
		var sRss = '';
		
		
		  // twitter
		if ($('#'+tag+'_twitterEdit').val() != '') {
			sTwitter = $('#'+tag+'_twitterEdit').val();
			
			if (typeof sTwitter != 'undefined' && sTwitter != ''){
				
				 newtype = sTwitter.search("@");
				  if (newtype > -1) {
						 temp = sTwitter;
						 var atnumber = temp.search("@");
						 var handle = temp.substr(atnumber+1,temp.length);
						 sTwitter = "https://twitter.com/"+handle;
						}
			}

		}
          

		 // facebook 
		if ($('#'+tag+'_facebookEdit').val() != '') {
			sFacebook = $('#'+tag+'_facebookEdit').val();
		}

		 
		  
		// linkedin  
		if ($('#'+tag+'_linkedinEdit').val() != '') {
			 sLinkedin = $('#'+tag+'_linkedinEdit').val();
		}
         

		 // flickr 
	   if ($('#'+tag+'_flickrEdit').val() != '') {
		   sFlickr = $('#'+tag+'_flickrEdit').val();
	   }
		  

		// google+  
		if ($('#'+tag+'_googleEdit').val() != '') {
			 sGoogle = $('#'+tag+'_googleEdit').val();
		}
		 

		  
		 // rss 
	/*	if ($('#'+tag+'_rssEdit').val() != '' ) {
			sRss = $('#'+tag+'_rssEdit').val();
		}
		  */

	
	
	var sNId = $('#'+tag+'_SpeakerNameId').val();
	
	//put the data into an array for compare purposes
       var editarray = new Array();
	  editarray['sName'] = sName;
	  editarray['sTitle'] = sTitle;
	   editarray['sBio'] = sBio;
	  editarray['sBioImportant'] = sBioImportant;
	   editarray['sCompany'] = sCompany;
	  editarray['sCompanyLink'] = sCompanyLink;
	   editarray['sTwitter'] = sTwitter;
	  editarray['sFacebook'] = sFacebook;
	  	editarray['sLinkedin'] = sLinkedin;
	  editarray['sFlickr'] = sFlickr;
	   editarray['sGoogle'] = sGoogle;
	  editarray['sRss'] = sRss;

	     //check if there's a difference between the original inputs (from on click) and these inputs
	 for (var k in Speakers) {
      if (Speakers.hasOwnProperty(k)) {
		  if (editarray[k] != Speakers[k]){
			  check = 1;
		     } //if edit array ends

          } //if speakers.has end
      } //for var k end
		 var n = id.search("Edit");
         var res = id.substr(0, n);
		 
		 var divide = res.search("_");
	     var wat = 's'+res.substr(divide+1, n);

      if (check == 1){    //if there is
	    		
				//Send and ajax query to store the modified data to PHP
//------------------------------------------------------		
          $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"speaker_edit", sNId:sNId, sId:sId, wat:wat, tag:tag, sName:sName, sTitle:sTitle, sBio:sBio, sBioImportant:sBioImportant, sCompany:sCompany, sCompanyLink:sCompanyLink, sTwitter:sTwitter, sFacebook:sFacebook, sLinkedin:sLinkedin, sFlickr:sFlickr, sGoogle:sGoogle, sRss:sRss},
                success: function(data) {
                    //finished
                }
            });
			
			
	       } //if check == 1 end
	  
	} //if newsocial else end	
}

$(document).ready(function(){
	
	
	
	    /*-----------------------
	     	if CLICK ON an ELEMENT
	    ------------------------	*/
		
		//Hide the element and show the input field associated with the element + focus the input box
    $('.ClickClick').bind('click', function () {
					   if (Mce.first){
				     tiny_remove(Mce.first);
				     $('#'+Mce.first).blur();
					 $('#'+Mce.first).attr('style', 'display:none');
					 var n = Mce.first.search("Edit");
                     var res = Mce.first.substr(0, n);
	                 $('#'+res).removeAttr("style"); 
				 }
		//get the id of the activated element
		var id = $(this).attr('id');
				
			//get the original tag of the speaker what's in the database
		var tag_number = id.search("_");
		var tag = id.substr(0, tag_number); 
		var wut = id.substr(tag_number+1,id.length);

		// Save the content of the unchanged input boxes for later use
		
				//Speaker data
		Speakers.sName = $('#'+tag+'_NameEdit').val();
		Speakers.sTitle = $('#'+tag+'_TitleEdit').val();
		Speakers.sBioImportant = $('#'+tag+'_BioImportantEdit').val();    
		Speakers.sBio = $('#'+tag+'_BioEdit').val(); 
		//company data
		Speakers.sCompany = $('#'+tag+'_CompanyEdit').val();
		Speakers.sCompanyLink = $('#'+tag+'_CompanyLinkEdit').val();
		
		//Links
		
		  // twitter
		if (($('#'+tag+'_twitterEdit').length > 0)){
          Speakers.sTwitter = $('#'+tag+'_twitterEdit').val();
          } else {
			 Speakers.sTwitter = '';
		  }
		 // facebook 
	    if (($('#'+tag+'_facebookEdit').length > 0)){
		  Speakers.sFacebook = $('#'+tag+'_facebookEdit').val();
		  } else {
			Speakers.sFacebook = '';
		  }
		// linkedin  
   	    if (($('#'+tag+'_linkedinEdit').length > 0)){
		 Speakers.sLinkedin = $('#'+tag+'_linkedinkEdit').val();
		  } else {
			Speakers.sLinkedin = '';
		  }
		  
		 // flickr 
	    if (($('#'+tag+'_flickrEdit').length > 0)){
		Speakers.sFlickr = $('#'+tag+'_flickrkEdit').val();
		  } else {
			Speakers.sFlickr = '';
		  } 
		

		// google+  
   	    if (($('#'+tag+'_googleEdit').length > 0)){
		 Speakers.sGoogle = $('#'+tag+'_googlekEdit').val();
		  } else {
			Speakers.sGoogle = '';
		  }
		  
		 // rss 
	    if (($('#'+tag+'_rssEdit').length > 0)){
		  Speakers.sRss = $('#'+tag+'_rsskEdit').val();
		  } else {
			Speakers.sRss = '';
		  } 

		
		//hide the original text show input field instead
		$(this).attr('style', 'display:none');

	   $('#'+id+'Edit').removeAttr("style");
	   	   		if (wut == "Bio" || wut == "BioImportant"){				 
			    var tmce = id+"Edit";
		        tiny_init(tmce);
				Mce.first = tmce;
		     }
	   $('#'+id+'Edit').focus();

  })
  
  
      	/*-----------------------
		 Change inside the element
	    ------------------------	*/
      $('.ClickEdit').bind('change', function () {
		  
		$(this).attr('style', 'display:none');
		
		//get the id of the input box
		var id = $(this).attr('id'); 
		
		 // get the value of the input box
	    var val = $('#'+id).val();
		
		//get the original tag
		var tag_number = id.search("_");
		var tag = id.substr(0, tag_number); 
		
		//the original element
        var edit_number = id.search("Edit");
        var original = id.substr(0, edit_number); 
		
		//show the original element
	   $('#'+original).removeAttr("style");
	   
	
  })
  
  	/*-----------------------
		 Enter pressed
	------------------------	*/
  	   $('.ClickEdit').keypress(function(event) {
        if (event.keyCode == 13) {
			
			//this variable is needed to check if there's a change inside the input box or not
	    var check = 0;  		
		var wat = ''; //this will contain what has changed	
			//get the id of the input box
		var id = $(this).attr('id'); 
		var sVal = $(this).val();
         
		 save_data(id, sVal);
//-----------------------------------------------------------	

		 var n = id.search("Edit");
         var res = id.substr(0, n);
     //after the ajax query, hide the input box and show the text		
	   $(this).attr('style', 'display:none');
	   $('#'+res).removeAttr("style");
	   $('#'+res).text($(this).val()); //replace the original text value with the inputbox value :)
	   
        } //if enter pressed end
		
    }) //.keypress ends
  
  
  	 /*-----------------------
		Input lost focus
	------------------------	*/
        $('.ClickEdit').bind('focusout', function () {
		
		$(this).attr('style', 'display:none');
		var id = $(this).attr('id');
        var n = id.search("Edit");
        var res = id.substr(0, n);
	   $('#'+res).removeAttr("style");
	   

	
  })

  
  	 /*-----------------------
		Speaker Delete
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SpeakerDelete').bind('click', function () {
		
		//get the id of the activated element
		var id = $(this).attr('id');
				
			//get the original tag of the speaker what's in the database
		var tag_number = id.search("_");
		var sId = id.substr(tag_number+1, id.length); 
		
		var conf = confirm("Are you sure you want to delete this speaker?");
		  if (conf == true) {
			   $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"speaker_delete", sId:sId},
                success: function(data) {
					location.reload();
                }
            });
			  
          
           }

  })
  
      	 /*-----------------------
		Sponsor social link edit
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.SocialLinkEdit').bind('click', function () {
		
		//get the id of the activated element
		var sId = $(this).data('socialsedit-speakers');
		var type = "speakers";

		  $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"SocialEdit", sId:sId, type:type},
                success: function(data) {
                    window.location.replace("social_links_edit");
                }
            });
       

  })
  



});