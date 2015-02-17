<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="description" content="Hear from more than 60 inspiring keynotes including Peter Hinssen, Rachel Botsman, and Costas Markides">
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Speakers | HR Tech Europe</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/foundation/foundation.orbit.js"></script>
<script src="js/vendor/modernizr.js"></script>

<!-- Include Bootstrap for SpeakersGrid Modals -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Favicon setting -->
<link rel="shortcut icon" href="favicon.ico">

<!--Include Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,400,700' rel='stylesheet' type='text/css'>
<!--Include Font Awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- jQUERY libraries -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>


<!--	Include Navigation Menu CSS Definitions -->
<link rel="stylesheet" href="css/navmenu.css" />

<!--	Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/speakers.css" />
<link rel="stylesheet" href="css/footer.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!-- Speakers  -->
<script src="js/speakers.js"></script>

<!--- Mobile Menu dropdown -->
<script src="js/mobile-menu-dropdown.js"></script>

<!-- Drag & Drop -->

<!-- Include Revoultion Slider -->
<link rel="stylesheet" type="text/css" href="vendor/SliderRevolution/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="vendor/SliderRevolution/css/extralayers.css" media="screen" />
<link rel="stylesheet" type="text/css" href="vendor/SliderRevolution/css/settings.css" media="screen" />
<script type="text/javascript" src="vendor/SliderRevolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="vendor/SliderRevolution/js/jquery.themepunch.revolution.min.js"></script>
<style type="text/css">

.ModalSpeakerBio .ModalSpeakerBioHighlight {
  font-family: 'Oswald', sans-serif !important;
  font-size: 20px !important;
  font-weight: 400 !important;
  line-height: 29px !important;
  padding-bottom: 0 !important;
  color: #323232 !important;
}
.ModalSpeakerBio p, .ModalSpeakerBio p span {
  font-family: 'Roboto', sans-serif !important;
  font-size: 17px !important;
  line-height: 29px !important;
  font-weight: 300 !important;
  text-align: left !important;
  color: #323232 !important;
}
</style>

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

</head>
<body>

    <?php 

		include_once('controllers/aaa.php');
		include_once('controllers/config.php');
		include_once('controllers/speakers_main.php');
		include_once('controllers/locations.php');

?>
<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--HEADER--> 
      <!--Desktop Navigation Menu-->


    <nav id="MainNavigationMenu">
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);" href="index"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="index" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);">Home</a>
        <div class="NavmenuDivider"></div>
        <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);"  class="ActiveNavmenuItem" href="speakers">Speakers</a>
        <div class="NavmenuDivider"></div>
        <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" href="agenda">Agenda</a>
        <div class="NavmenuDivider"></div>
        <span class="DesktopMenuDropdown"><a href="venue">Expo</a>
            <ul id="ExpoDropdown">
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Venue']);" href="venue"><li class="FirstDropdownItem">Venue</li></a>
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Logistics']);" href="logistics"><li>Logistics</li></a>
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Hotels']);" href="hotels"><li>Hotels</li></a>
            </ul>
        </span>
          
        <div class="NavmenuDivider"></div>
        
        <span class="DesktopMenuDropdown"><a href="sponsors">Partners</a>
            <ul id="PartnersDropdown">
            <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);" href="sponsors"><li  class="FirstDropdownItem">Sponsors</li></a>
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MediaPartners']);" href="mediapartners"><li>Media Partners</li></a>
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'BlogSquad']);" href="blogsquad"><li>Blog Squad</li></a>
                 <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'SponsorAppendencies']);" href="sponsorappendencies"><li>Sponsor Appendencies</li></a>
            </ul>
        </span>  
        <div class="NavmenuDivider"></div>
        <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', Blog']);" href="http://blog.hrtecheurope.com">Blog</a>
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
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="index" >Home</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" href="tickets" >Tickets</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" href="speakers" class="ActiveNavmenuItem MobileNavigationMenuItem">Speakers</a></li>
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
           <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', Blog']);" href="http://blog.hrtecheurope.com">Blog</a> </li>  
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Contact']);" href="contact" >Get in Touch</a></li>
      </ul>
    </nav>
    
    <!-- END Mobile Navigation Menu-->
       
    <!-- SLIDESHOW -->
    
    <div class="tp-banner-container" >
      <div class="tp-banner" >
        <ul>
          <!-- SLIDE  -->
          <li data-transition="fade" data-slotamount="7" data-masterspeed="500"   data-saveperformance="on"  data-title="Rachel Botsman"> 
            <!-- MAIN IMAGE --> 
            <img src="img/slides/rachel-slide.png"  alt="Rachel Botsman" data-lazyload="img/slides/rachel-slide.png" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            <!-- LAYERS --> 
            
          </li>
          <!-- SLIDE  -->
          <li data-transition="fade" data-slotamount="7" data-masterspeed="500"   data-title="Peter Hinssen"> 
            <!-- MAIN IMAGE --> 
            <img src="img/slides/hinsen-slide.png" alt="Peter Hinssen" data-lazyload="img/slides/hinsen-slide.png" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> </li>
          
          <!-- SLIDE  -->
          <li data-transition="fade" data-slotamount="7" data-masterspeed="500"   data-title="Costas Markides"> 
            <!-- MAIN IMAGE --> 
            <img src="img/slides/costas-slide.png"  alt="3dbg" data-lazyload="img/slides/costas-slide.png" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            <!-- LAYERS --> 
            
          </li>
          <!-- SLIDE  -->
          
        </ul>
        <div class="tp-bannertimer"></div>
      </div>
    </div>
    <script type="text/javascript">

				jQuery(document).ready(function() {
				
								
					jQuery('.tp-banner').show().revolution(
					
					{
						dottedOverlay:"none",
						delay:16000,
						startwidth:1920,
						startheight:405,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:5,
						
						navigationType:"bullet",
						navigationArrows:"solo",
						navigationStyle:"preview1",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						swipe_velocity: 0.7,
						swipe_min_touches: 1,
						swipe_max_touches: 1,
						drag_block_vertical: false,
												
					
												
						keyboardNavigation:"off",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,
								
						shadow:0,
						fullWidth:"on",
						fullScreen:"off",

						spinner:"spinner4",
						
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						shuffle:"off",
						
						autoHeight:"off",						
						forceFullWidth:"off",						
												
												
							
						hideThumbsOnMobile:"off",
						hideNavDelayOnMobile:1500,						
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,
						
					});
							
					
									
				});	
				
			</script> 
    
    <!-- END REVOLUTION SLIDER --> 
    
    <!-- END SLIDESHOW --> 
    
    <!--MAIN CONTENT -->
    <h1 id="SpeakerHeadline">Speakers</h1>
    <section id="Speakers"> 
      	<?php
		$speakers = new speakers_main();
		$content = $speakers->speakers();
		  /*
		  
		 				$content[$i][0] = Speaker name
		  				$content[$i][1] = Speaker Title
						$content[$i][2] = Speaker Bio important
						$content[$i][3] = Speaker Bio
						$content[$i][4] = Speaker modal tag
						
						$content[$i][5] = Link type
						$content[$i][6] = Link URL

						$content[$i][7] = Company name
						$content[$i][8] = Company URL
						$content[$i][9] = Company Bio

						$content[$i][10] = Picture name
						$content[$i][11] = Picture URL
						
						
						$content[$i][12] = Agenda Title
						$content[$i][13] = Agenda Starts
						$content[$i][14] = Agenda Ends
						$content[$i][15] = Agebda Abstract
						$content[$i][16] = Agenda Day
						$content[$i][17] = Agenda Location
						$content[$i][18] = Speakers id
						$content[$i][19] = speakers name id;
		  */
		if (isset($content)) {
		  foreach ($content as $speaker) {
			     $num = 0;
			 	foreach ($speaker as $set) {
						if (!isset($speaker[$num])){
				        $speaker[$num] = ' ';
			             }	
						 $num++;		
					}
					
			 
			 if (!isset($speaker[13]) || $speaker[13] == ' '){
				 $speaker[13] = '';
				 $time = '';
			 } else {
				 $time = ' - ';
			 }
			 
			 if (!isset($speaker[16]) || $speaker[16] == ' '){
				 $speaker[16] = '';
				 $day = 'VIEW PROFILE';
			 } else {
				 $day =  'DAY '.$speaker[16];
			 }
			 

			 $output = '';
			$output .= '<div id="'.$speaker[18].'" data-speakerdatatag="'.$speaker[4].'"><!-- '.$speaker[0].' Speakergrid-->';
			
			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'SpeakerProfile', 'ModalOpen', '".$speaker[4]."']);";
			$google .= '"';

     /*$output.= '<a '.$google.' data-toggle="modal" data-target="#EmptyModal" href="#">
      <div class="Speaker">';*/
	  
	  $output.= '<a '.$google.' data-speakertag="'.$speaker[4].'" class="SpeakerModalOpen">
      <div class="Speaker">';
	  
	  if (isset($speaker[11])) {
		  $output .= '<div class="SpeakerPhoto" style="background-image:url(img/speakers/'.$speaker[11].');">';
	  } else {
				    $output .= '<div class="SpeakerPhoto">';
			  }
       
         $output .='<div class="EventDetails">
            <p class="EventTitle">'.$speaker[12].'</p>
            <p class="EventDay">'.$day.'</p>
            <p class="EventLocation">'.$speaker[17].'</p>
            <p class="EventTime">'.$speaker[13].$time.$speaker[14].'</p>
          </div>
        </div>
        <div class="SpeakerInfo">
          <p class="SpeakerName OswaldText HRNBlue">'.$speaker[0].'</p>
          <p class="SpeakerCompanyName RobotoText">'.$speaker[7].'</p>
        </div>
      </div>
      </a>'; 
	  
      $output .= '<!-- end '.$speaker[0].' Speakergrid --></div> ';
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
		 }
	} 

	   ?>
    </section>
    <!--END MAIN CONTENT-->
 
    
<!--FOOTER-->
<footer> 
<!--GREYFOOTER-->
<div id="GreyFooterContainer">
  <h1 id="GreyFooterHeader">Contact</h1>
  <div id="LeftGreyFooterItems">
    <div id="FollowUs">
      <h6 class="FooterSectionTitle">Follow Us</h6>
      <div id="FollowUsSocialIcons">
	<a target="_blank" href="https://www.facebook.com/hrtecheu"><img src="img/header-facebook.png" /></a>
	<a target="_blank" href="https://twitter.com/hrtecheurope"> <img src="img/header-twitter.png"/></a>
	<a target="_blank" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img src="img/header-linkedin.png"/></a>
	<a target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/"><img src="img/header-flickr.png"/></a>
	<a target="_blank"  href="http://www.slideshare.net/hrtecheurope"> <img src="img/header-slideshare.png"/></a>
      </div>
    </div>
    <div id="HRNEvents">
      <h6 class="FooterSectionTitle">HRN Events</h6>
      <p id="HRNEventsList">
	<a href="http://london.hrtecheurope.com" target="_blank">HR Tech Europe London</a><br>
	<a href="http://paris.hrtecheurope.com" target="_blank">HR Tech Europe Paris</a>
      </p>
    </div>
  </div>
  <div id="RightGreyFooterItems">
    <div id="FooterButtons">
      <a href="contact"><div id="GetInTouchButton" class="FooterButton">Get in Touch</div></a>
      <a href="tickets"><div id="RegisterNowButton" class="FooterButton">Register Now</div></a>
    </div>
    <div id="GetInTouch">
      <h6 class="FooterSectionTitle">Get in Touch</h6>
      <p id="GeneralEnquiries">
	General Enquiries<br>
	<i class="fa fa-phone"></i>+36 1 201 1469<br>
	<i class="fa fa-envelope"></i>hrn@hrneurope.com
      </p>
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

<!--Foundation Scripts --> 

<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation();
</script> 
<!--End Foundation Scripts --> 
<script type="text/javascript">
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


</script> 

<!--Call modified Bootstrap -->
<script src="js/bootstrap.js"></script>





<!-- MODAL --> 
<div class="modal fade" id="EmptyModal" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true"></div>
 <!-- MODAL Ends--> 
 
 
 <!--Call modified Bootstrap -->
<script src="js/bootstrap.js"></script>
<!-- MODAL OPEN FROM EXTERNAL LINK -->
<script type="text/javascript">
 $(document).ready(function() {
	 
	    var parentURL = window.parent.location.href;
    	var tag_number = parentURL.search("#");
		var tag = parentURL.substr(tag_number, parentURL.length);
		
		var tagLast = tag.substr(tag.length - 1);
		var tagFirst = tag.substr(1,1);
 		var sTag = tagFirst.toUpperCase()+tag.substr(2, tag.length-3)+tagLast.toUpperCase();
		

  if(window.location.href.indexOf(tag) != -1 && tag_number !=-1) {
	  
	ExternalModal (sTag);
			
   }
});
 
 
 </script>
<!-- END MODAL OPEN FROM EXTERNAL LINK -->
 
<script type="text/javascript">
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


</script>

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
