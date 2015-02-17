  $(function() {
    $('#Blogsquads').sortable({
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
    		// change order in the database using Ajax
            $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"blogsquad_sort", list_order:list_sortable},
                success: function(data) {
                    //finished
                }
            });
        }
    }); // fin sortable
});


var Blogsquads = {};
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
             save_enablewhendirty : true,
             save_onsavecallback : "BioSave"
        });
   
}

function tiny_remove(id) {
    tinymce.remove("#"+id);
}


function BioSave() {
	save_data(Mce.first, '');
	location.reload();
}


function save_blog(B_id, blog_id, Title, URL) {
						  //------------------------------------------------------		
          $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"edit_blogsquad_blog_data", B_id:B_id, blog_id:blog_id, Title:Title, URL:URL},
                success: function(data) {
                    //finished
                }
            });
	
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
		
		var sId = $('#'+tag+'_BlogsquadId').val();
		
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
                data: {action:"new_blogsquad_link", sId:sId, typeid:typeid, newlink:newlink},
                success: function(data) {
                    //finished
                }
            });
 
				  } //if typeid > -1 end
				   
			  } //newlink length > 0 end

		} else  {

   ///save the data from the input boxes
   
		//Blogsquad data
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

	
	
	var sNId = $('#'+tag+'_BlogsquadNameId').val();
	
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
	 for (var k in Blogsquads) {
      if (Blogsquads.hasOwnProperty(k)) {
		  if (editarray[k] != Blogsquads[k]){
			  check = 1;
		     } //if edit array ends

          } //if blogsquad.has end
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
                data: {action:"blogsquad_edit", sNId:sNId, sId:sId, wat:wat, tag:tag, sName:sName, sTitle:sTitle, sBio:sBio, sBioImportant:sBioImportant, sCompany:sCompany, sCompanyLink:sCompanyLink, sTwitter:sTwitter, sFacebook:sFacebook, sLinkedin:sLinkedin, sFlickr:sFlickr, sGoogle:sGoogle, sRss:sRss},
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
				
			//get the original tag of the blogsquad what's in the database
		var tag_number = id.search("_");
		var tag = id.substr(0, tag_number);
		var wut = id.substr(tag_number+1,id.length); 

		// Save the content of the unchanged input boxes for later use
		
				//Blogsquad data
		Blogsquads.sName = $('#'+tag+'_NameEdit').val();
		Blogsquads.sTitle = $('#'+tag+'_TitleEdit').val();
		Blogsquads.sBioImportant = $('#'+tag+'_BioImportantEdit').val();    
		Blogsquads.sBio = $('#'+tag+'_BioEdit').val(); 
		//company data
		Blogsquads.sCompany = $('#'+tag+'_CompanyEdit').val();
		Blogsquads.sCompanyLink = $('#'+tag+'_CompanyLinkEdit').val();
		
		//Links
		
		  // twitter
		if (($('#'+tag+'_twitterEdit').length > 0)){
          Blogsquads.sTwitter = $('#'+tag+'_twitterEdit').val();
          } else {
			 Blogsquads.sTwitter = '';
		  }
		 // facebook 
	    if (($('#'+tag+'_facebookEdit').length > 0)){
		  Blogsquads.sFacebook = $('#'+tag+'_facebookEdit').val();
		  } else {
			Blogsquads.sFacebook = '';
		  }
		// linkedin  
   	    if (($('#'+tag+'_linkedinEdit').length > 0)){
		 Blogsquads.sLinkedin = $('#'+tag+'_linkedinkEdit').val();
		  } else {
			Blogsquads.sLinkedin = '';
		  }
		  
		 // flickr 
	    if (($('#'+tag+'_flickrEdit').length > 0)){
		Blogsquads.sFlickr = $('#'+tag+'_flickrkEdit').val();
		  } else {
			Blogsquads.sFlickr = '';
		  } 
		

		// google+  
   	    if (($('#'+tag+'_googleEdit').length > 0)){
		 Blogsquads.sGoogle = $('#'+tag+'_googlekEdit').val();
		  } else {
			Blogsquads.sGoogle = '';
		  }
		  
		 // rss 
	    if (($('#'+tag+'_rssEdit').length > 0)){
		  Blogsquads.sRss = $('#'+tag+'_rsskEdit').val();
		  } else {
			Blogsquads.sRss = '';
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
		
		 var BlogTitle = id.search("BlogTitle");
		 var BlogURL = id.search("BlogURL");
		 

		//If we edit a blog title or url
		if ((typeof BlogTitle != 'undefined' && BlogTitle != -1) || (typeof BlogURL != 'undefined' && BlogURL != -1 )) {
			   if (BlogTitle > -1) {
				   var temp = id.length;
				   var t = BlogTitle+9;
				   var dif = temp - t;
				   dif = dif - 4;
				   //this is the blog_id
				  var B_id = id.substr(BlogTitle+9, dif);
				  
				  //New title
				  var Title = sVal;
				  
				  //Old URL
				  var URL_elem = id.substr(0, BlogTitle-1)+"_BlogURL"+B_id+"Edit";
				  var URL = $('#'+URL_elem).val();
			   } else {
				   
				   	var temp = id.length;
				   var t = BlogURL+7;
				   var dif = temp - t;
				   dif = dif - 4;
				   
				   //this is the blog_id
				  var B_id = id.substr(BlogURL+7, dif);
				  
				  //New URL
				  var URL = sVal;
				  
				  //Old Title
				  
				  var Title_elem = id.substr(0, BlogURL-1)+"_BlogTitle"+B_id+"Edit";
				  var Title = $('#'+Title_elem).val();
			   }
			   
			   if ((typeof Title != 'undefined' && Title != "") || (typeof URL != 'undefined' && URL != "" )) {
				   
				      var tag_number = id.search("_");
				   	  var tag = id.substr(0, tag_number);
		              var sId = $('#'+tag+'_BlogsquadId').val();
					 
				   save_blog(B_id, sId, Title, URL);
			   }
			 
		} else {
		 //If we edit everything else	
		 
			 save_data(id, sVal);
		}
		
		  
		 var n = id.search("Edit");
         var res = id.substr(0, n);
//-----------------------------------------------------------	
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

  
   		 /// New Agenda icon stuff
		 
		 $('.Highlighted').on('click', function () {
	     		var id = $(this).attr('id');
						//get the original tag
		        var tag_number = id.search("_");
		        var tag = id.substr(0, tag_number)+"_"; 
 
			var n = $( "#"+id+":checked" ).length;
			
			if (n === 1) {
				 var i = 2;
				 var test = $('<button/>',{
                    text: '+',
                     click: function (e) { 
					    
					        e.preventDefault();
		                   	e.stopPropagation(); 
							 $('#'+tag+'BlogDiv').append('<br /><input class="AdminInputField" required="required" id="BlogTitle_'+i+'" name="BlogTitle_'+i+'" type="text" placeholder="Blog Title" />');							
							 $('#'+tag+'BlogDiv').append('<br /><input class="AdminInputField" required="required" id="BlogURL_'+i+'" name="BlogURL_'+i+'" type="text" placeholder="Blog URL" />');
							 $('#BlogVal').val(i);
							 i++;
							 $('#'+tag+'BlogDiv').append(test).end();

							}
                    });
				
				
				   $('#'+tag+'BlogDiv').show();
				   $('#'+tag+'BlogDiv').append('<br /><input class="AdminInputField" required="required" id="BlogTitle_1" name="BlogTitle_1" type="text" placeholder="Blog Title" />');							
				   $('#'+tag+'BlogDiv').append('<br /><input class="AdminInputField" required="required" id="BlogURL_1" name="BlogURL_1" type="text" placeholder="Blog URL" />');
				   $('#'+tag+'BlogDiv').append('<input id="BlogVal" name="BlogVal" type="hidden" value="1"/>');
				  
				  $('#'+tag+'BlogDiv').append(test).end();
				  

							   //disable enter button for this 
						$('#'+tag+'BlogDiv').keypress(function(e){
    
                          if ( e.which == 13 ) {
							   e.preventDefault();
							     var db = $('#BlogVal').val();
								 var title = [];
								 var url = [];
								 
                              var sId = $('#'+tag+'BlogsquadId').val();
							  
								for (var i = 1; i <= db; i++) {
                                    title[i-1] = $('#BlogTitle_'+i).val();
								    url[i-1] = $('#BlogURL_'+i).val();
							
                                     }
							   							   
							   if (typeof title[0] !='undefined') {
								$.ajax({
								  url: 'controllers/main.php',
								  type: 'POST',
								  data: {action:"AddNewBlogsquadBlogEdit", sId:sId, title:title, url:url},
								  success: function(data) {
									 location.reload();
								  }
							  });
							  

							   }//if title[0]
												 
						  }
                      });
						
				 
				  //<input type="button" name="AddAlaCarte" class="AddAlaCarte" value="+"> <br />
				  
				  //$('#AlaCarteDiv input').attr('required', 'required');
	   
			} else {
				
				//show everything as normal
				  $('#'+tag+'BlogDiv').hide();
		          $('#'+tag+'BlogDiv').children().remove();
			}

	     })
		 
		 
  
  
  
  	 /*-----------------------
		Blogsquad Delete
	------------------------	*/

		//Hide the element and show the input field associated with the element + focus the input box
    $('.BlogsquadDelete').bind('click', function () {
		
		//get the id of the activated element
		var id = $(this).attr('id');
				
			//get the original tag of the blogsquad what's in the database
		var tag_number = id.search("_");
		var sId = id.substr(tag_number+1, id.length); 
		
		var conf = confirm("Are you sure you want to delete this blogsquad?");
		  if (conf == true) {
			   $.ajax({
                url: 'controllers/main.php',
                type: 'POST',
                data: {action:"blogsquad_delete", sId:sId},
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
		var sId = $(this).data('socialsedit-blogsquad');
		var type = "blogsquad";

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