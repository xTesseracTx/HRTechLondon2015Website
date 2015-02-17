<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu, Benedek Nagy - trialshock@gmail.com">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Tech Europe 2015 | Europe's #1 Conference on the Future of HR</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/vendor/modernizr.js"></script>

<!-- Favicon setting -->
<link rel="shortcut icon" href="favicon.ico">

<!--Include Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,400,700' rel='stylesheet' type='text/css'>

<!--Include Font Awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- RANDOM FADE JS JQUERY libraries -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!--	Include Navigation Menu CSS Definitions -->
<link rel="stylesheet" href="css/navmenu.css" />

<!--	Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/press-kit.css" />

<!-- Footer -->
<link rel="stylesheet" href="css/footer.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!--- Platform Scanner -->
<script src="js/platform-scanner.js"></script>

<!--- Mobile Menu dropdown -->
<script src="js/mobile-menu-dropdown.js"></script>

<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-47508758-1']); /* ID */
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!-- Content packages checkbox handler -->
<script type="text/javascript">
/* If a package checkbox is checked (onClick="check();"), uncheck all the selected child content
for example:
If some of the photos are checked to download, but we would like to download the complete package,
check the Complete Pack checkbox and the individual photo checkboxes will be unchecked.  */
function check() {
/* Logo packages */  
	if(document.getElementById("LogoPack-HRTech-London-2015").checked){
		document.getElementById("Logo-HRTech-London-2015").checked = false;
	}
	if(document.getElementById("LogoPack-HRTech-WorldCongress").checked){
		document.getElementById("Logo-HRTech-WorldCongress").checked = false;
	}		
	if(document.getElementById("LogoPack-HRN-Europe").checked){
		document.getElementById("Logo-HRN-Europe").checked = false;
	}	
	if(document.getElementById("LogoPack-Whos-Who-In-HR").checked){
		document.getElementById("Logo-Whos-Who-In-HR").checked = false;
	}	
			  		   
	/* Fact sheets */ 			 			 	 
	if(document.getElementById("FactSheetsCompletePack").checked){
		document.getElementById("FactSheet").checked = false;
		document.getElementById("EventStatistic").checked = false;
	}
			 
	/* Event Photos */
	if(document.getElementById("EventPhotosCompletePack").checked){
		var EventPhotos = document.getElementsByClassName("EventPhotoItem");
		var i;
		for (i = 0; i < EventPhotos.length; i++){	
			EventPhotos[i].checked = false;
		}
	}
			 
	/* Speaker Photos */
	if(document.getElementById("SpeakerPhotosCompletePack").checked){
		var SpeakerPhotos = document.getElementsByClassName("SpeakerPhotoItem");
		var j;
		for (j = 0; j < SpeakerPhotos.length; j++){	
			SpeakerPhotos[j].checked = false;
		}
	}
};
</script>

<!-- SLIDES TAB JAVASCRIPTS -->
<script type="text/javascript">	
$(document).ready(function() {
/* Click on the FILTER text: Opens and closes the available tags list and changes the small arrow icon */
    $( "#FilterButton" ).click(function() {
        $("#TagsContainer").toggle();
        $("#FilterDown").toggle();
        $("#FilterUp").toggle();
     });
});
</script> 

<!-- Slides: Selects a tag from the Slides available tag list -->
<script type="text/javascript">
function selectTag(thisId){
	/* highlight the selected tag with grey background */
	$("#" + thisId ).addClass("SelectedTag");
											
	/* Opens the applied tags list section */
	$("#AppliedTags").show();
	$("#AvailableTags").css("padding-bottom", "5px");
	$("#AvailableTags").css("border-bottom", "1px solid #acacac");

	/* show the tag in the Applied tags list */
	$("#applied-" + thisId ).css("display", "inline-block");
};
</script>

<!-- Removes a tag from applied tags list. -->
<script type="text/javascript">										
function unSelectTag(thisId){
	/* hide the clicked tag */
	$("#" + thisId ).css("display", "none");
											
	/* cuts the "applied-" part off the start of the ID
	it selects the original available tag now and remove the grey highlighting of selecting */
	thisId = thisId.slice(8);
	$("#" + thisId ).removeClass("SelectedTag");
};
</script>
<!-- END SLIDES TAB JAVASCRIPTS -->	
								        
</head>
<body onload="BrwoserDetect()">
<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--HEADER--> 
    <!--Desktop Navigation Menu-->
    <nav id="MainNavigationMenu">
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);" href="index"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="index" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);">Home</a>
        <div class="NavmenuDivider"></div>
        <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" href="speakers">Speakers</a>
        <div class="NavmenuDivider"></div>
        <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" href="agenda">Agenda</a>
        <div class="NavmenuDivider"></div>
        <span class="DesktopMenuDropdown"><a href="venue">Expo</a>
        <ul id="ExpoDropdown">
          <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Venue']);" href="venue">
          <li class="FirstDropdownItem">Venue</li>
          </a> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Logistics']);" href="logistics">
          <li>Logistics</li>
          </a> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Hotels']);" href="hotels">
          <li>Hotels</li>
          </a>
        </ul>
        </span>
        <div class="NavmenuDivider"></div>
        <span class="DesktopMenuDropdown"><a href="sponsors">Partners</a>
        <ul id="PartnersDropdown">
          <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);" href="sponsors">
          <li class="FirstDropdownItem">Sponsors</li>
          </a> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MediaPartners']);" href="mediapartners">
          <li>Media Partners</li>
          </a> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'BlogSquad']);" href="blogsquad">
          <li>Blog Squad</li>
          </a>
          </a> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'SponsorAppendencies']);" href="sponsorappendencies">
          <li>Sponsor Appendencies</li>
          </a>          
        </ul>
        </span>
        <div class="NavmenuDivider"></div>
        <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="contact">Get in Touch</a> </div>
      <div id="DesktopSocialHeader"> <a onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'Facebook']);" target="_blank" href="https://www.facebook.com/hrtecheu"><img alt="facebook" src="img/header-facebook.png" /></a> <a onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'Twitter']);" target="_blank" href="https://twitter.com/hrtecheurope"> <img alt="twitter" src="img/header-twitter.png"/></a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'LinkedIn']);" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img alt="linkedin" src="img/header-linkedin.png"/></a> <a onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'Flickr']);" target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/"><img alt="flickr" src="img/header-flickr.png"/></a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'HeaderSocial', 'ExternalForward', 'SlideShare']);"  href="http://www.slideshare.net/hrtecheurope"> <img alt="slideshare" src="img/header-slideshare.png"/></a> <a  onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" href="tickets" target="_blank">
        <div id="HeaderGetTicketsButton">GET TICKETS</div>
        </a> </div>
    </nav>
    
    <!--END DESKTOP Navigation Menu--> 
    <!-- Mobile Navigation Menu-->
    <div id="MobileNavigation"> <img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-mobile-logo.png"> <a onClick="$('html, body').animate({scrollTop: 0}, 700);" role="button" class="right-off-canvas-toggle smoothScroll"><i class="fa fa-bars"></i></a> </div>
    <nav id="RightsideMobileNavigation" class="right-off-canvas-menu">
      <ul>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="index" class=" MobileNavigationMenuItem">Home</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" href="tickets" >Tickets</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" href="speakers">Speakers</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" href="agenda" >Agenda</a></li>
        <li id="ExpoMobileGroup">Expo <i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></li>
        <div id="ExpoMobileGroupContent">
          <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Venue']);" href="venue">Venue</a></li>
          <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Logistics']);" href="logistics">Logistics</a></li>
          <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Hotels']);" href="hotels">Hotels</a></li>
        </div>
        <li id="PartnersMobileGroup">Partners <i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></li>
        <div id="PartnersMobileGroupContent">
          <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);" href="sponsors">Sponsors</a></li>
          <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MediaPartners']);" href="mediapartners">Media Partners</a></li>
          <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'BlogSquad']);" href="blogsquad">Blog Squad</a></li>
          <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'SponsorAppendencies']);" href="sponsorappendencies">Sponsor Appendencies</a></li>
        </div>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Contact']);" href="contact" >Get in Touch</a></li>
      </ul>
    </nav>
    
    <!-- END Mobile Navigation Menu-->
    
    <div class="ImageHeader">
      <h1>Media Pack</h1>
    </div>
    <div class="colors-wrapper">
      <div class="columns colored-stripe red" ></div>
      <div class="columns colored-stripe yellow" ></div>
      <div class="columns colored-stripe green" ></div>
      <div class="columns colored-stripe blue" ></div>
    </div>
    <!--END HEADER--> 
    
    <!--MAIN CONTENT -->
    
    <div id="MainContent"> 
      
      <!-- Press Kit -->
      <div id="PressKitContainer">
        <div id="PressKitInnerContainer"> 
          
          <!-- Press Kit -->
          <ul class="tabs" data-tab>
            <li class="tab-title active"><a href="#LogoPackages">Logo Packages</a></li>
            <li class="tab-title"><a href="#FactSheets">Fact sheets</a></li>
            <li class="tab-title"><a href="#Photos">Photos</a></li>
            <li class="tab-title"><a href="#Videos">Videos</a></li>
            <li class="tab-title"><a href="#MobileApp">Mobile app</a></li>
            <li class="tab-title" id="LastTab"><a href="#Slides">Slides</a></li>
          </ul>
          <div id="PressKitContent" class="tabs-content"> 
          	<a href="#">
            	<!-- Just add .DownloadButtonReady class to the DownloadButton when at least 1 downloadable item is selected -->
            	<div class="DownloadButton">Download 123 items</div>
            </a> 
            <!-- Logo Packages -->
            <div class="content active" id="LogoPackages"> 
              	<!-- HR Tech Europe logo pack -->
                <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>HR Tech Europe - London 2015</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
                	<div class="CompletePack">
                    	<p>Complete logo pack kit <input type="checkbox" id="LogoPack-HRTech-London-2015" value="LogoPack-HRTech-London-2015" name="Files[]" onClick="check();"><br>
                        <span>(ZIP including eps and jpg files 1.2MB)</span></p>
                    </div>
                    <div class="LogoPack">
                    	<img src="img/press-kit/logo-packages/hr-tech-london-2015.jpg" alt="HR Tech Europe - London 2015 logo">
                    	<p><input type="checkbox" id="Logo-HRTech-London-2015" name="Files[]"> JPG, 800KB</p>
                    </div>
                 </div>
                <!-- end HR Tech Europe logo pack -->
              	<!-- HR Tech World Congress logo pack -->
                <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>HR Tech World Congress - Paris 2015</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
                	<div class="CompletePack">
                    	<p>Complete logo pack kit <input type="checkbox" id="LogoPack-HRTech-WorldCongress" value="LogoPack-HRTech-WorldCongress" name="Files[]" onClick="check();"><br>
                        <span>(ZIP including eps and jpg files 1.2MB)</span></p>
                    </div>
                    <div class="LogoPack">
                    	<img src="img/press-kit/logo-packages/hr-tech-world-congress.jpg" alt="HR Tech World Congress - Paris 2015 logo">
                    	<p><input type="checkbox" id="Logo-HRTech-WorldCongress" name="Files[]"> JPG, 750KB</p>
                    </div>                    
                 </div>
                 <!-- end HR Tech World Congress logo pack -->    
              	<!-- HRN Europe logo pack -->
                <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>HRN Europe</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
                	<div class="CompletePack">
                    	<p>Complete logo pack kit <input type="checkbox" id="LogoPack-HRN-Europe" value="LogoPack-HRN-Europe" name="Files[]" onClick="check();"><br>
                        <span>(ZIP including eps and jpg files 1.2MB)</span></p>
                    </div>
                    <div class="LogoPack">
                    	<img src="img/press-kit/logo-packages/hrn-europe.jpg" alt="HRN Europe logo">
                    	<p><input type="checkbox" id="Logo-HRN-Europe" name="Files[]"> JPG, 750KB</p>
                    </div>                     
                 </div>
                 <!-- end HRN Europe logo pack -->     
              	<!-- Who's Who in HR logo pack -->
                <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>Who's Who in HR</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
                	<div class="CompletePack">
                    	<p>Complete logo pack kit <input type="checkbox" id="LogoPack-Whos-Who-In-HR" value="LogoPack-Whos-Who-In-HR" name="Files[]" onClick="check();"><br>
                        <span>(ZIP including eps and jpg files 1.2MB)</span></p>
                    </div>
                    <div class="LogoPack">
                    	<img src="img/press-kit/logo-packages/whos-who.jpg" alt="Who's Who in HR logo">
                    	<p><input type="checkbox" id="Logo-Whos-Who-In-HR" name="Files[]"> JPG, 750KB</p>
                    </div>                      
                 </div>
                 <!-- end Who's Who in HR logo pack -->     
              	<!-- iRecruit logo pack -->
                <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>iRecruit Expo</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
                	<div class="CompletePack">
                    	<p>Complete logo pack kit <input type="checkbox" id="LogoPack-iRecruit" value="LogoPack-iRecruit" name="Files[]" onClick="check();"><br>
                        <span>(ZIP including eps and jpg files 1.2MB)</span></p>
                    </div>
                    <div class="LogoPack">
                    	<img src="img/press-kit/logo-packages/irecruit.jpg" alt="iRecruit logo">
                    	<p><input type="checkbox" id="Logo-iRecruit" name="Files[]"> JPG, 750KB</p>
                    </div>                      
                 </div>
                 <!-- end iRecruit logo pack -->     
              	<!-- disruptHR logo pack -->
                <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>disruptHR</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
                	<div class="CompletePack">
                    	<p>Complete logo pack kit <input type="checkbox" id="LogoPack-disruptHR" value="LogoPack-disruptHR" name="Files[]" onClick="check();"><br>
                        <span>(ZIP including eps and jpg files 1.2MB)</span></p>
                    </div>
                    <div class="LogoPack">
                    	<img src="img/press-kit/logo-packages/disrupthr.jpg" alt="disruptHR logo">
                    	<p><input type="checkbox" id="Logo-disruptHR" name="Files[]"> JPG, 750KB</p>
                    </div>                      
                 </div>
                 <!-- end disruptHR logo pack -->                                                                         
            </div>
            <!-- End Logo Packages --> 
            <!-- Fact sheets -->
            <div class="content" id="FactSheets">
                 <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>Fact sheet and event statistics infographic</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
                	<div class="CompletePack">
                    	<p>Complete pack <input type="checkbox" id="FactSheetsCompletePack" value="FactSheetsCompletePack" name="Files[]" onClick="check();"><br>
                        <span>(ZIP including jpg files 1.2MB)</span></p>
                    </div>
                    <div class="DocumentRow">
                    	<div class="Document">
                        	<img src="img/press-kit/fact-sheets/doc-icon.jpg" alt="DOC file">
                            <p><input type="checkbox" id="FactSheet" value="FactSheet"  name="Files[]"> DOC, 80KB<br>
                        		<span>(Fact sheet)</span></p>
                        </div>
                    	<div class="Document">
                        	<img src="img/press-kit/fact-sheets/pdf-icon.jpg" alt="PDF file">
                            <p><input type="checkbox" id="EventStatistic" value="EventStatistic"  name="Files[]"> PDF, 800KB<br>
                        		<span>(Event statistic infographic)</span></p>
                        </div>                        
                    </div>
				</div>
            </div>
            <!-- End Fact sheets --> 
            <!-- Photos -->
            <div class="content" id="Photos">
                 <!-- Event photos -->
                 <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>Event photos</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
                	<div class="CompletePack">
                    	<p>Complete pack <input type="checkbox" id="EventPhotosCompletePack" value="EventPhotosCompletePack" name="Files[]" onClick="check();"><br>
                        <span>(ZIP including jpg files 50MB)</span></p>
                    </div>
                    <!-- Event photo row 1 -->
                    <div class="EventPhotoRow">
                        <div class="EventPhoto">
                            <a href="press-kit/photos/event-photos/" target="_blank"><img class="BrightnessFilter" src="img/press-kit/photos/eventphoto-placeholder.jpg" alt="Event photo"> </a>
                            <h6>HR Tech Amsterdam photo title</h6>
                            <p><input type="checkbox" class="EventPhotoItem" value="EventPhoto1" name="Files[]"> JPG, 3MB</p>
                        </div>
                        <div class="EventPhoto">
                            <a href="press-kit/photos/event-photos/" target="_blank"><img class="BrightnessFilter" src="img/press-kit/photos/eventphoto-placeholder.jpg" alt="Event photo"> </a>
                            <h6>HR Tech Amsterdam photo title</h6>
                            <p><input type="checkbox" class="EventPhotoItem" value="EventPhoto2"  name="Files[]"> JPG, 3MB</p>
                        </div>
                        <div class="EventPhoto">
                            <a href="press-kit/photos/event-photos/" target="_blank"><img class="BrightnessFilter" src="img/press-kit/photos/eventphoto-placeholder.jpg" alt="Event photo"> </a>
                            <h6>HR Tech Amsterdam photo title</h6>
                            <p><input type="checkbox" class="EventPhotoItem" value="EventPhoto3"  name="Files[]"> JPG, 3MB</p>
                        </div>
                        <div class="EventPhoto LastPhoto">
                            <a href="press-kit/photos/event-photos/" target="_blank"><img class="BrightnessFilter" src="img/press-kit/photos/eventphoto-placeholder.jpg" alt="Event photo"> </a>
                            <h6>HR Tech Amsterdam photo title</h6>
                            <p><input type="checkbox" class="EventPhotoItem" value="EventPhoto4"  name="Files[]"> JPG, 3MB</p>
                        </div>                                                                        
                     </div>
                     <!-- end Event photo row 1 -->
                    <!-- Event photo row 2 -->
                    <div class="EventPhotoRow">
                        <div class="EventPhoto">
                            <a href="press-kit/photos/event-photos/" target="_blank"><img class="BrightnessFilter" src="img/press-kit/photos/eventphoto-placeholder.jpg" alt="Event photo"> </a>
                            <h6>HR Tech Amsterdam photo title</h6>
                            <p><input type="checkbox" class="EventPhotoItem" value="EventPhoto5" name="Files[]"> JPG, 3MB</p>
                        </div>
                        <div class="EventPhoto">
                            <a href="press-kit/photos/event-photos/" target="_blank"><img class="BrightnessFilter" src="img/press-kit/photos/eventphoto-placeholder.jpg" alt="Event photo"> </a>
                            <h6>HR Tech Amsterdam photo title</h6>
                            <p><input type="checkbox" class="EventPhotoItem" value="EventPhoto6" name="Files[]"> JPG, 3MB</p>
                        </div>
                        <div class="EventPhoto">
                            <a href="press-kit/photos/event-photos/" target="_blank"><img class="BrightnessFilter" src="img/press-kit/photos/eventphoto-placeholder.jpg" alt="Event photo"> </a>
                            <h6>HR Tech Amsterdam photo title</h6>
                            <p><input type="checkbox" class="EventPhotoItem" value="EventPhoto7" name="Files[]"> JPG, 3MB</p>
                        </div>
                        <div class="EventPhoto LastPhoto">
                            <a href="press-kit/photos/event-photos/" target="_blank"><img class="BrightnessFilter" src="img/press-kit/photos/eventphoto-placeholder.jpg" alt="Event photo"> </a>
                            <h6>HR Tech Amsterdam photo title</h6>
                            <p><input type="checkbox" class="EventPhotoItem" value="EventPhoto8" name="Files[]"> JPG, 3MB</p>
                        </div>                                                                        
                     </div>
                     <!-- end Event photo row 2 -->                     
                </div>
                <!-- end Event photos -->
                <!-- Speaker photos -->
                <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>Speaker photos</strong></p>
                    </div>
                </div>
                <div class="ContentContainer" id="SpeakerPhotoContainer">
                	<div class="CompletePack">
                    	<p>Complete pack <input type="checkbox" id="SpeakerPhotosCompletePack" name="Files[]" onClick="check();"><br>
                        <span>(ZIP including jpg files 50MB)</span></p>
                    </div>
                    <div id="SpeakerPhotoList">
                    	<ul>
                        	<li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-1" value="speaker-1"> <a href="press-kit/photos/speaker-photos/MauricioL.zip" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-2" value="speaker-2"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-3" value="speaker-3"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-4" value="speaker-4"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-5" value="speaker-5"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-6" value="speaker-6"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-7" value="speaker-7"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-8" value="speaker-8"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-9" value="speaker-9"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-10" value="speaker-10"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-11" value="speaker-11"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>
                            <li><input type="checkbox" class="SpeakerPhotoItem" name="Files[]" id="speaker-12" value="speaker-12"> <a href="press-kit/photos/speaker-photos/" target="_blank">Lindsey Mauricio</a>

                        </ul>
                    </div>
                </div>                
                <!-- end Speaker photos -->
            </div>
            <!-- End Photos --> 
            <!-- Videos -->
            <div class="content" id="Videos">
               <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>Our videos</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
					<!-- video R "Ray" Wang and Andrew Marritt at HR Tech Europe 2014 -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=LfVqHVJfAek" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/01.jpg" alt='R "Ray" Wang and Andrew Marritt at HR Tech Europe 2014'></a>
                            <h6>R "Ray" Wang and Andrew Marritt at HR Tech Europe 2014</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=LfVqHVJfAek" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/LfVqHVJfAek" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video R "Ray" Wang and Andrew Marritt at HR Tech Europe 2014 -->
					<!-- video Gary Hamel and Alexandre Pachulski at HR Tech Europe -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=a90WVSsqWqg" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/02.jpg" alt='Gary Hamel and Alexandre Pachulski at HR Tech Europe'></a>
                            <h6>Gary Hamel and Alexandre Pachulski at HR Tech Europe </h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=a90WVSsqWqg" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/a90WVSsqWqg" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video Gary Hamel and Alexandre Pachulski at HR Tech Europe -->
					<!-- video Gary Hamel at HR Tech Europe 2014 -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=VkEFP0Qrajw" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/03.jpg" alt='Gary Hamel at HR Tech Europe 2014'></a>
                            <h6>Gary Hamel at HR Tech Europe 2014</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=VkEFP0Qrajw" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/VkEFP0Qrajw" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video Gary Hamel at HR Tech Europe 2014 -->      
					<!-- video Yves Morieux and Rawn Shah at HR Tech Europe 2014 -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=cTOyB3KJSuQ" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/04.jpg" alt='Yves Morieux and Rawn Shah at HR Tech Europe 2014 '></a>
                            <h6>Yves Morieux and Rawn Shah at HR Tech Europe 2014 </h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=cTOyB3KJSuQ" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/cTOyB3KJSuQ" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video Yves Morieux and Rawn Shah at HR Tech Europe 2014 --> 
					<!-- video David McCandless and Alexandre Pachulski at HR Tech Europe 2014 -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=6v50H4TSupE" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/05.jpg" alt='David McCandless and Alexandre Pachulski at HR Tech Europe 2014'></a>
                            <h6>David McCandless and Alexandre Pachulski at HR Tech Europe 2014</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=6v50H4TSupE" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/6v50H4TSupE" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video David McCandless and Alexandre Pachulski at HR Tech Europe 2014 --> 
					<!-- video HR Tech Europe 2014 - 2015 -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=2ZCgi2L2eNU" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/06.jpg" alt='HR Tech Europe 2014 - 2015'></a>
                            <h6>HR Tech Europe 2014 - 2015</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=2ZCgi2L2eNU" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/2ZCgi2L2eNU" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video HR Tech Europe 2014 - 2015 --> 
					<!-- video Robert Hohman, Founder and CEO of Glassdoor, at HR Tech Europe -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=RGnJMlp0KhE" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/07.jpg" alt='Robert Hohman, Founder and CEO of Glassdoor, at HR Tech Europe'></a>
                            <h6>Robert Hohman, Founder and CEO of Glassdoor, at HR Tech Europe</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=RGnJMlp0KhE" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/RGnJMlp0KhE" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video Robert Hohman, Founder and CEO of Glassdoor, at HR Tech Europe --> 
					<!-- video Bruno Tourme at HR Tech Europe 2014 -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=DuUYSFFyFFs" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/08.jpg" alt='Bruno Tourme at HR Tech Europe 2014 '></a>
                            <h6>Bruno Tourme at HR Tech Europe 2014 </h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=DuUYSFFyFFs" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/DuUYSFFyFFs" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video Bruno Tourme at HR Tech Europe 2014 -->    
					<!-- video Jason Averbook and Ward Christman - HR Tech Europe 2014 -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=0GZ43WoWa5o" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/09.jpg" alt='Jason Averbook and Ward Christman - HR Tech Europe 2014'></a>
                            <h6>Jason Averbook and Ward Christman - HR Tech Europe 2014</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=0GZ43WoWa5o" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/0GZ43WoWa5o" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video Jason Averbook and Ward Christman - HR Tech Europe 2014 -->  
					<!-- video Dan Pontefract and William Tincup - HR Tech Europe 2014 -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=CDqH6akVL1Q" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/10.jpg" alt='Dan Pontefract and William Tincup - HR Tech Europe 2014'></a>
                            <h6>Dan Pontefract and William Tincup - HR Tech Europe 2014</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=CDqH6akVL1Q" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/CDqH6akVL1Q" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video Dan Pontefract and William Tincup - HR Tech Europe 2014 -->                    
					<!-- video iRecruit World Congress Clients  -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=m5v2NP0xCEQ" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/11.jpg" alt='iRecruit World Congress Clients'></a>
                            <h6>iRecruit World Congress Clients</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=m5v2NP0xCEQ" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/m5v2NP0xCEQ" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video iRecruit World Congress Clients  -->
					<!-- video HR Tech Europe 2013 I Statistics -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=WvpbDfMxDzs" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/12.jpg" alt='HR Tech Europe 2013 I Statistics'></a>
                            <h6>HR Tech Europe 2013 I Statistics</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=WvpbDfMxDzs" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/WvpbDfMxDzs" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end video HR Tech Europe 2013 I Statistics -->
					<!-- video iRecruit 2013 HD  -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=tJnOGXSBBSw" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/13.jpg" alt='iRecruit 2013 HD'></a>
                            <h6>iRecruit 2013 HD</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=tJnOGXSBBSw" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/tJnOGXSBBSw" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end iRecruit 2013 HD  -->   
					<!-- video HRTV I William Tincup talks with Dan Pink -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=cFcLQxTfMD8" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/14.jpg" alt='HRTV I William Tincup talks with Dan Pink'></a>
                            <h6>HRTV I William Tincup talks with Dan Pink</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=cFcLQxTfMD8" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/cFcLQxTfMD8" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end HRTV I William Tincup talks with Dan Pink --> 
					<!-- video HR Tech Europe 2013 Teaser  -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=HaD35IlYOpE" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/15.jpg" alt='HR Tech Europe 2013 Teaser '></a>
                            <h6>HR Tech Europe 2013 Teaser</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=HaD35IlYOpE" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/HaD35IlYOpE" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end HR Tech Europe 2013 Teaser  --> 
					<!-- video  HR Tech Europe 2013 - Interview with Brian Bowden, Aer Lingus, NGAHR  -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=WWTaP1AXucA" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/16.jpg" alt='HR Tech Europe 2013 - Interview with Brian Bowden, Aer Lingus, NGAHR '></a>
                            <h6>HR Tech Europe 2013 - Interview with Brian Bowden, Aer Lingus, NGAHR </h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=WWTaP1AXucA" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/WWTaP1AXucA" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end HR Tech Europe 2013 - Interview with Brian Bowden, Aer Lingus, NGAHR  -->
					<!-- video HR Tech Europe 2012  -->
                    <div class="VideoRow">
                    	<div class="VideoImage">
                        	<a href="https://www.youtube.com/watch?v=kjnHAsaQJEk" target="_blank"><img class="BrightnessFilter" src="img/press-kit/videos/17.jpg" alt='HR Tech Europe 2012'></a>
                            <h6>HR Tech Europe 2012</h6>
                        </div>
                        <div class="VideoLinks">
                        	<strong>URL</strong>
                            <input type="text" value="https://www.youtube.com/watch?v=kjnHAsaQJEk" onclick="this.select()" readonly>
                            <strong>Embed</strong>
                            <textarea rows="1" cols="50" onclick="this.select()" readonly><iframe width="560" height="315" src="https://www.youtube.com/embed/kjnHAsaQJEk" frameborder="0" allowfullscreen></iframe></textarea>
                        </div>
                    </div>
                    <!-- end HR Tech Europe 2012 -->                                                                                                                                          
                </div>
            </div>
            <!-- End Videos --> 
            <!-- Mobile app -->
            <div class="content" id="MobileApp">
                <div class="ContentHeader">
                    <div class="ContentHeaderTitle">
                      <p>2015.01.22<br>
                        <strong>Download the app</strong></p>
                    </div>
                </div>
                <div class="ContentContainer">
                	<img id="QRCode" src="img/press-kit/mobile-app/qr-code.jpg" alt="QR Code">
                	<p>The HR Tech Europe app is the best way to find event information, track your schedule and connect with other attendees.</p>
                    <div>
                    	<a href="https://itunes.apple.com/us/app/id904011179" target="_blank"><img src="img/press-kit/mobile-app/mac.png" alt="Mac Appstore download"></a>
                        <a href="https://play.google.com/store/apps/details?id=me.doubledutch.hrtecheurope" target="_blank"> <img src="img/press-kit/mobile-app/android.png" alt="Android Play Store download"></a>
                        <a href="https://webapp.doubledutch.me/?appId=aeaeabfc-02c9-46d2-9073-b7fa25fa3e1c" target="_blank"><img src="img/press-kit/mobile-app/html5.png" alt="HTML5 app download"></a>
                    </div>
                </div>
            </div>
            <!-- End Mobile app --> 
            <!-- Slides -->
            <div class="content" id="Slides">
              <!-- Content Header -->
              <div class="ContentHeader">
                <div class="ContentHeaderTitle">
                  <p>2015.01.22<br>
                    <strong>Slideshare presentations</strong></p>
                </div>
                <div id="Filter"> 
                	<span id="FilterButton">Filter</span> <i class="fa fa-caret-down" id="FilterDown"></i><i class="fa fa-caret-up" id="FilterUp"></i>
                  	<input type="" name="search" placeholder="Search...">
                </div>
                <!-- Tags -->
                <div id="TagsContainer">
                  <div id="AvailableTags">
                    <ul id="AvailableTagsList">
                        <li class="Tag" onClick="selectTag(this.id)" id="tag-HR-Technology">HR Technology</li>
                        <li class="Tag" onClick="selectTag(this.id)" id="tag-Cloud">Cloud</li>
                        <li class="Tag" onClick="selectTag(this.id)" id="tag-Fastest-Growing">Fastest Growing</li>
                        <li class="Tag" onClick="selectTag(this.id)" id="tag-World-Congress">World Congress</li>
                        <li class="Tag" onClick="selectTag(this.id)" id="tag-Unleash">Unleash</li>
                    </ul>
                  </div>
    
                  <div id="AppliedTags">
                    <p>Applied filters</p>
                    <ul id="AppliedTagsList">
                        <li class="AppliedTag" onClick="unSelectTag(this.id)" id="applied-tag-HR-Technology">HR Technology</li>
                        <li class="AppliedTag" onClick="unSelectTag(this.id)" id="applied-tag-Cloud">Cloud</li>
                        <li class="AppliedTag" onClick="unSelectTag(this.id)" id="applied-tag-Fastest-Growing">Fastest Growing</li>
                        <li class="AppliedTag" onClick="unSelectTag(this.id)" id="applied-tag-World-Congress">World Congress</li>
                        <li class="AppliedTag" onClick="unSelectTag(this.id)" id="applied-tag-Unleash">Unleash</li>
                    </ul>
                  </div>
                </div>
                <!-- end Tags --> 
              </div>
              <!-- end Content Header -->
              <!-- Slides list -->
              <div class="ContentContainer">
                <div class="Slide">
                <a href="http://www.slideshare.net/hrtecheurope/the-evolution-of-hr-from-art-to-science-integration-of-technology-analytics-and-lean-six-sigma-cocacola" target="_blank">
                <img  src="img/press-kit/slides/1.jpg" alt="HR Tech Slideshare presentation">
                </a>
                  <p>the-evolution-of-hr-from-art-to-science-integration-of-technology-analytics-and-lean-six-sigma-cocacola</p>
                  <a href="#">
                  <div class="SlideButton">Embed</div>
                  </a> <a href="#">
                  <div class="SlideButton">Share</div>
                  </a> <a href="press-kit/slides/">
                  <div class="SlideButton">Download</div>
                  </a> 
                 </div>
                <div class="Slide"> <a href="http://www.slideshare.net/hrtecheurope/the-evolution-of-hr-from-art-to-science-integration-of-technology-analytics-and-lean-six-sigma-cocacola" target="_blank"><img  src="img/press-kit/slides/2.jpg" alt="HR Tech Slideshare presentation"></a>
                  <p>Presentation title</p>
                  <a href="#">
                  <div class="SlideButton">Embed</div>
                  </a> <a href="#">
                  <div class="SlideButton">Share</div>
                  </a> <a href="press-kit/slides/">
                  <div class="SlideButton">Download</div>
                  </a> 
                 </div>
                <div class="Slide"> <a href="http://www.slideshare.net/hrtecheurope/the-evolution-of-hr-from-art-to-science-integration-of-technology-analytics-and-lean-six-sigma-cocacola" target="_blank"><img  src="img/press-kit/slides/3.jpg" alt="HR Tech Slideshare presentation"></a>
                  <p>Presentation title</p>
                  <a href="#">
                  <div class="SlideButton">Embed</div>
                  </a> <a href="#">
                  <div class="SlideButton">Share</div>
                  </a> <a href="press-kit/slides/">
                  <div class="SlideButton">Download</div>
                  </a> 
                 </div>
                <div class="Slide LastSlide"> <a href="http://www.slideshare.net/hrtecheurope/the-evolution-of-hr-from-art-to-science-integration-of-technology-analytics-and-lean-six-sigma-cocacola" target="_blank"><img src="img/press-kit/slides/4.jpg" alt="HR Tech Slideshare presentation"></a>
                  <p>Presentation title</p>
                  <a href="#">
                  <div class="SlideButton">Embed</div>
                  </a> <a href="#">
                  <div class="SlideButton">Share</div>
                  </a> <a href="press-kit/slides/">
                  <div class="SlideButton">Download</div>
                  </a> 
                 </div>

                <div class="Slide"> <a href="http://www.slideshare.net/hrtecheurope/the-evolution-of-hr-from-art-to-science-integration-of-technology-analytics-and-lean-six-sigma-cocacola" target="_blank"><img  src="img/press-kit/slides/5.jpg" alt="HR Tech Slideshare presentation"></a>
                  <p>Presentation title</p>
                  <a href="#">
                  <div class="SlideButton">Embed</div>
                  </a> <a href="#">
                  <div class="SlideButton">Share</div>
                  </a> <a href="press-kit/slides/">
                  <div class="SlideButton">Download</div>
                  </a> 
                 </div>
                <div class="Slide"><a href="http://www.slideshare.net/hrtecheurope/the-evolution-of-hr-from-art-to-science-integration-of-technology-analytics-and-lean-six-sigma-cocacola" target="_blank"> <img  src="img/press-kit/slides/6.jpg" alt="HR Tech Slideshare presentation"></a>
                  <p>Presentation title</p>
                  <a href="#">
                  <div class="SlideButton">Embed</div>
                  </a> <a href="#">
                  <div class="SlideButton">Share</div>
                  </a> <a href="press-kit/slides/">
                  <div class="SlideButton">Download</div>
                  </a> 
                 </div>
                <div class="Slide"> <a href="http://www.slideshare.net/hrtecheurope/the-evolution-of-hr-from-art-to-science-integration-of-technology-analytics-and-lean-six-sigma-cocacola" target="_blank"><img  src="img/press-kit/slides/7.jpg" alt="HR Tech Slideshare presentation"></a>
                  <p>Presentation title</p>
                  <a href="#">
                  <div class="SlideButton">Embed</div>
                  </a> <a href="#">
                  <div class="SlideButton">Share</div>
                  </a> <a href="press-kit/slides/">
                  <div class="SlideButton">Download</div>
                  </a> 
                 </div>
                <div class="Slide LastSlide"> <a href="http://www.slideshare.net/hrtecheurope/the-evolution-of-hr-from-art-to-science-integration-of-technology-analytics-and-lean-six-sigma-cocacola" target="_blank"><img src="img/press-kit/slides/8.jpg" alt="HR Tech Slideshare presentation"></a>
                  <p>Presentation title</p>
                  <a href="#">
                  <div class="SlideButton">Embed</div>
                  </a> <a href="#">
                  <div class="SlideButton">Share</div>
                  </a> <a href="press-kit/slides/">
                  <div class="SlideButton">Download</div>
                  </a> 
                 </div>
                 
                 
              </div>
              <!-- end Slides list --> 
            </div>
            <!-- End Slides --> 
          </div>
          <!-- End Press Kit Tabs -->
        </div>
      </div>
      <!-- End Press Kit --> 
      
    </div>
    <!--END MAIN CONTENT--> 
    
    <!--FOOTER-->
    <footer> 
      <!--GREYFOOTER-->
      <div id="GreyFooterContainer">
        <h1 id="GreyFooterHeader">Contact</h1>
        <div id="LeftGreyFooterItems">
          <div id="FollowUs">
            <h6 class="FooterSectionTitle">Follow Us</h6>
            <div id="FollowUsSocialIcons"> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'Facebook']);" target="_blank" href="https://www.facebook.com/hrtecheu"><img src="img/header-facebook.png" /></a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'Twitter']);"  href="https://twitter.com/hrtecheurope"> <img src="img/header-twitter.png"/></a> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'LinkedIn']);"  target="_blank" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img src="img/header-linkedin.png"/></a> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'Flickr']);"  target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/"><img src="img/header-flickr.png"/></a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'SlideShare']);"   href="http://www.slideshare.net/hrtecheurope"> <img src="img/header-slideshare.png"/></a> </div>
          </div>
          <div id="HRNEvents">
            <h6 class="FooterSectionTitle">HRN Events</h6>
            <p id="HRNEventsList"> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'LondonSite']);"  href="http://london.hrtecheurope.com" target="_blank">HR Tech Europe London</a><br>
              <a href="http://paris.hrtecheurope.com" onClick="_gaq.push(['_trackEvent', 'Footer', 'ExternalForward', 'ParisSite']);"  target="_blank">HR Tech World Congress</a> </p>
          </div>
        </div>
        <div id="RightGreyFooterItems">
          <div id="FooterButtons"> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'InternalForward', 'Contact']);" href="contact">
            <div id="GetInTouchButton" class="FooterButton">Get in Touch</div>
            </a> <a onClick="_gaq.push(['_trackEvent', 'Footer', 'InternalForward', 'Tickets']);" href="tickets">
            <div id="RegisterNowButton" class="FooterButton">Register Now</div>
            </a> </div>
          <div id="GetInTouch">
            <h6 class="FooterSectionTitle">Get in Touch</h6>
            <p id="GeneralEnquiries"> <i class="fa fa-phone"></i>+36 1 201 1469<br>
              <i class="fa fa-phone"></i>UK/ IE +44 20 34 689 689<br>
              <i class="fa fa-envelope"></i>hrn@hrneurope.com </p>
          </div>
        </div>
        <div style="clear: both;"></div>
      </div>
      <!--END GREYFOOTER-->
      <div class="colors-wrapper">
        <div class="columns colored-stripe red" ></div>
        <div class="columns colored-stripe yellow" ></div>
        <div class="columns colored-stripe green" ></div>
        <div class="columns colored-stripe blue" ></div>
      </div>
      <!--BLACKFOOTER-->
      <div id="BlackFooterContainer">
        <div id="BlackFooterItems">
          <div id="FooterHRNLogo"><img src="img/footer-hrtogo.png"></div>
          <div id="Copyright">Copyright © 2014 HRN Europe. All Rights Reserved.</div>
          <div id="Privacy">Privacy Policy | Terms and Conditions</div>
        </div>
      </div>
      <!--END BLACKFOOTER--> 
    </footer>
    <!--END FOOTER--> 
    
    <!-- close the off-canvas menu --> 
    <a class="exit-off-canvas"></a> </div>
</div>
<!-- GO TOP SCROLL --> 
<a href="#" class="GoTopButton smoothScroll"><img id="GoTopImg" src="img/gotop/gotop.png" alt="Go top"></a> 
<!-- END GO TOP SCROLL -->
</div>

<!--Foundation Scripts --> 
<script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation();
</script> 
<!--End Foundation Scripts --> 

<!-- Start of Async HubSpot Analytics Code --> 
<script type="text/javascript">
    (function(d,s,i,r) {
      if (d.getElementById(i)){return;}
      var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
      n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/412210.js';
      e.parentNode.insertBefore(n, e);
    })(document,"script","hs-analytics",300000);
  </script> 
<!-- End of Async HubSpot Analytics Code -->

</body>
</html>
