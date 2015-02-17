<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="author" content="Develped by: TesseracT - bottyan.tamas@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Tech Europe - Speakers Edit</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/foundation/foundation.orbit.js"></script>
<script src="js/vendor/modernizr.js"></script>

<!-- Include Bootstrap for SpeakersGrid Modals -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
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

<!-- Drag & Drop -->

<?php 
  if(isset($_SESSION['admin']) && isset($_SESSION['speakers_admin'])) {
	echo '<!-- This needs jquery ui-->
<script src="js/admin_speakers_edit.js"></script>
<script src="js/admin_dropzone_main.js"></script>
<script src="js/admin_general.js"></script> 
<link rel="stylesheet" href="css/general.css" /> 
<link rel="stylesheet" href="css/admin_general.css" /> 
<link rel="stylesheet" href="css/admin_edit_general.css" />
<!-- TinyMCE -->
<script type="text/javascript" src="vendor/tinymce_alt/tinymce.min.js"></script>'; 
  }
?>


<!-- Include Revoultion Slider -->
<link rel="stylesheet" type="text/css" href="vendor/SliderRevolution/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="vendor/SliderRevolution/css/extralayers.css" media="screen" />
<link rel="stylesheet" type="text/css" href="vendor/SliderRevolution/css/settings.css" media="screen" />
<script type="text/javascript" src="vendor/SliderRevolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="vendor/SliderRevolution/js/jquery.themepunch.revolution.min.js"></script>
<style type="text/css"></style>
</head>
<body>
<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--HEADER--> 
    <!--Desktop Navigation Menu-->
  <?php 
   $speakers = new speakers_main();
  if(isset($_SESSION['admin']) && isset($_SESSION['speakers_admin'])) {
	 
	$content ='
    <nav id="MainNavigationMenu">
		        <div id="DesktopMenuContainer"><a id="HeaderLogoLink" href="index.php"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a>';
	
  
	if (isset($_SESSION['sponsors_admin'])) {
		

		 $content .= '<a href="sponsors"><img class="MenuIcon" src="img/admin/sponsors.png" onmouseover="this.src=';
		 $content .="'img/admin/sponsors_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/sponsors.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['speakers_admin'])) {
		
		 $content .= '<a href="speakers"><img class="MenuIcon" src="img/admin/speakers.png" onmouseover="this.src=';
		 $content .="'img/admin/speakers_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/speakers.png';";
		 $content .='" ></a>';
	 
	}
	
	if (isset($_SESSION['agenda_admin'])) {
		
		 $content .= '<a href="agenda"><img class="MenuIcon" src="img/admin/agenda.png" onmouseover="this.src=';
		 $content .="'img/admin/agenda_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/agenda.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['blogsquad_admin'])) {
		
		 $content .= '<a href="blogsquad"><img class="MenuIcon" src="img/admin/blogsquad.png" onmouseover="this.src=';
		 $content .="'img/admin/blogsquad_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/blogsquad.png';";
		 $content .='" ></a>';
	 
	}
	 
	if (isset($_SESSION['mediapartners_admin'])) {
		
		 $content .= '<a href="mediapartners"><img class="MenuIcon" src="img/admin/mediapartners.png" onmouseover="this.src=';
		 $content .="'img/admin/mediapartners_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/mediapartners.png';";
		 $content .='" ></a>';
	 
	}
  
  $content .='</div>';
  $content .='<div id="ResponseDiv">';
  
  			if (isset($_COOKIE['ResponseCookie'])){
				$content .= $speakers->response_generator($_COOKIE['ResponseCookie']);
				unset($_COOKIE['ResponseCookie']);
                setcookie('ResponseCookie', null, -1, '/');
			}
  
   $content .='</div>';
  $content .='</nav>';
  
  echo $content;
	  
  } else {
	echo '<!--Desktop Navigation Menu-->
    <nav id="MainNavigationMenu">
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" href="index.php"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="index.php" >Home</a>
        <div class="NavmenuDivider"></div>
        <a class="ActiveNavmenuItem" href="speakers">Speakers</a>
        <div class="NavmenuDivider"></div>
        <a href="agenda">Agenda</a>
        <div class="NavmenuDivider"></div>
        <a href="contact">Get in Touch</a> </div>
      <div id="DesktopSocialHeader"> <a target="_blank" href="https://www.facebook.com/hrtecheu"><img src="img/header-facebook.png"></a> <a target="_blank" href="https://twitter.com/hrtecheurope"> <img src="img/header-twitter.png"></a> <a target="_blank" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img src="img/header-linkedin.png"></a> <a target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/"><img src="img/header-flickr.png"></a> <a target="_blank"  href="http://www.slideshare.net/hrtecheurope"> <img src="img/header-slideshare.png"></a> <a href="tickets">
        <div id="HeaderGetTicketsButton">GET TICKETS</div>
        </a> </div>
    </nav>';  
	  
  }
?>
    
    <!--END DESKTOP Navigation Menu--> 
    <!-- Mobile Navigation Menu-->
    <div id="MobileNavigation"> <img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-mobile-logo.png"> <a onclick="location.href='#top'"  role="button" class="right-off-canvas-toggle smoothScroll"><i class="fa fa-bars"></i></a> </div>
    <nav id="RightsideMobileNavigation" class="right-off-canvas-menu">
      <ul>
        <li> <a href="index" class="MobileNavigationMenuItem">Home</a></li>
        <li> <a href="tickets" >Tickets</a></li>
        <li> <a  class="ActiveNavmenuItem" href="speakers">Speakers</a></li>
        <li> <a href="agenda" >Agenda</a></li>
        <li> <a href="contact" >Get in Touch</a></li>
      </ul>
    </nav>
    
    <!-- END Mobile Navigation Menu--> 
    
    <!-- STICKY SOCIAL ICON SIDEBAR
    <div id="StickySocialIconSidebar"> <a href="https://www.facebook.com/hrtecheu" target="_blank">
      <div class="StickySocialIcon StickyFacebookIcon"><i class="fa fa-facebook"></i></div>
      </a> <a href="https://twitter.com/hrtecheurope" target="_blank">
      <div class="StickySocialIcon StickyTwitterIcon"><i class="fa fa-twitter"></i></div>
      </a> <a href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about" target="_blank">
      <div class="StickySocialIcon StickyLinkedinIcon"><i class="fa fa-linkedin"></i></div>
      </a> <a href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/" target="_blank">
      <div class="StickySocialIcon StickyFlickrIcon"><img src="img/StickyFlickrIcon.png" alt=""></div>
      </a> <a href="http://www.slideshare.net/hrtecheurope" target="_blank">
      <div class="StickySocialIcon StickySlideshareIcon"><img src="img/StickySlideshareIcon.png" alt=""></div>
      </a> </div>
     END STICKY SOCIAL ICON SIDEBAR --> 
    
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
    <?php 
  if(isset($_SESSION['admin']) && isset($_SESSION['speakers_admin'])) {
	echo '<a href="new_speakers">
        <div class="AdminNavigateButton">New Speaker</div>
        </a> </div><div id="tinyDiv"></div>';  
  }
?>
    

    <!--MAIN CONTENT -->
    <h1 id="SpeakerHeadline">Speakers</h1>
    <section id="Speakers"> 
      	<?php
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
					
			 
			 if (!isset($speaker[13]) || $speaker[13] == ''){
				 $speaker[13] = '';
				 $time = '';
			 } else {
				 $time = ' - ';
			 }
			 
			 if (!isset($speaker[16]) || $speaker[16] == ''){
				 $speaker[16] = '';
				 $day = '';
			 } else {
				 $day =  'DAY '.$speaker[16];
			 }
			 
			 if (isset($speaker[20]) && $speaker[20] == 2){
				 $extraSpeakerClass = ' InvisibleSpeakers';
			 } else {
				 $extraSpeakerClass = "";
			 }
			 
			 if(!isset($_SESSION['admin']) && $speaker[20] == 2) {
				 $extraSpeakerClass .= " HiddenSpeaker";
			 }
			 $output = '';
			$output .= '<div id="'.$speaker[18].'"><!-- '.$speaker[0].' Speakergrid-->';
	if(isset($_SESSION['admin']) && isset($_SESSION['speakers_admin'])) {
	    $output .= '<div id="SpeakerDel_'.$speaker[18].'" class="SpeakerDelete"><i class="fa fa-trash fa-2x"></i></div>';
		}
     $output.= '<a data-toggle="modal" data-target="#'.$speaker[4].'" href="#">
      <div class="Speaker'.$extraSpeakerClass.'">';
	  if (isset($speaker[11])) {
		  $output .= '<div class="SpeakerPhoto" style="background-image:url(../img/speakers/'.$speaker[11].');">';
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
	   if(isset($_SESSION['admin']) && isset($_SESSION['speakers_admin'])) {
	
       }
	  
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
 
    <!-- FOOTER -->
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
            <p id="GeneralEnquiries"> General Enquiries<br>
              <i class="fa fa-phone"></i>+36 1 201 1469<br>
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
    <!--End FOOTER--> 

    
    <!-- close the off-canvas menu --> 
    <a class="exit-off-canvas"></a> </div>
</div>
<!-- GO TOP SCROLL --> 
<a href="#" class="GoTopButton smoothScroll"><img id="GoTopImg" src="img/gotop/gotop.png" alt="Go top"></a> 
<!-- END GO TOP SCROLL -->

<!--Foundation Scripts --> 

<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation({
        orbit: {
          timer_speed: 4000,
          next_on_click: false
        }
        });
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
<!--Form Scripts --> 
<script type='text/javascript' src='http://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='NAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[2]='PHONE';ftypes[2]='text';fnames[3]='COMPANY';ftypes[3]='text';fnames[4]='SORUCE';ftypes[4]='text';fnames[5]='MSG';ftypes[5]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script> 
<script type="text/javascript">
$(function() {
  $('form').submit(function(){
    $.post('http://hrneurope.us4.list-manage.com/subscribe/post?u=c03cb8f11b1f34771fdd1747c&amp;id=acc85bbd71', function() {
      window.location = 'http://loondon.hrtecheurope.com/thankyou';
    });
    return false;
  });
});
</script> 

<!-- MODAL OPEN FROM EXTERNAL LINK --> 
<script type="text/javascript">
 $(document).ready(function() {
  if(window.location.href.indexOf('#HinssenP') != -1) {
    $('#HinssenP').modal('show');
  }
});
</script> 
<!-- END MODAL OPEN FROM EXTERNAL LINK --> 

<!-- MODALS --> 

      	<?php
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
		  */
		if (isset($content)) {
		 foreach ($content as $speaker) {
			 if (isset($speaker[6])){
				  $links = explode(';',$speaker[6]);
			      $link_types = explode(';',$speaker[5]);
			 }
			 
			     $num = 0;
			 	 foreach ($speaker As $set) {
						if (!isset($set)){
				        $speaker[$num] = '';
			             }	
						 $num++;		
					}
			 
	if(isset($_SESSION['admin']) && isset($_SESSION['speakers_admin'])) {
	 /*
	 --------------------------
	 Admin
	 -------------------
	 */			 
	 
	 	if (isset($speaker[20]) && $speaker[20] == 2){
				 $makeItVisible = '<div class="InvisibleDiv" data-makeitvisible="'.$speaker[18].'">Show it live<br /></div>';
			 } else {
				 $makeItVisible = "";
			 }
			 
			$output = '<!-- '.$speaker[0].' Modal -->
<div class="modal fade" id="'.$speaker[4].'" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
		
			 $output .= ' <form class="dropzone SpeakerImageForm" name="SpeakerImageForm" method="post" action="controllers/main.php" enctype="multipart/form-data">';
			$output .='<input name="SpeakerImageSecret" type="hidden" value="ThisIsASecret">';
			$output .='<input name="SpeakerImageModifyId" type="hidden" value="'.$speaker[18].'">';
			  if (isset($speaker[11])) {
		  $output .= '<div class="ModalSpeakerPhoto" style="background-image:url(../img/speakers/'.$speaker[11].')"></div>';
	          } else {
				   $output .= '<div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/drag_and_drop_220.png)"></div>';
			  }
           $output .='</form>';
		   
        $output.= $makeItVisible;
       $output .='<div class="ModalSpeakerBioContainer">';
	   
	    $output .='<div class="ResponseContainer" style="display:none"></div>';
		
	     $output .='<form class="SpeakerModalEdit">
	       <input id="'.$speaker[4].'_SpeakerId" style="display:none;" name="'.$speaker[4].'_SpeakerId" type="text" value="'.$speaker[18].'">
		   <input id="'.$speaker[4].'_SpeakerNameId" style="display:none;" name="'.$speaker[4].'_SpeakerNameId" type="text" value="'.$speaker[19].'">
          <p id="'.$speaker[4].'_Name" class="ClickClick ModalSpeakerName OswaldText">'.$speaker[0].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_NameEdit" style="display:none;" name="'.$speaker[4].'_NameEdit" type="text" value="'.$speaker[0].'">';
		  
		   if (!isset($speaker[1]) || $speaker[1] == '' || $speaker[1] == ' '){
			  $placeholder = 'Type the title here';
		  } else {
			  $placeholder = "";
		  }
		  
           $output .='<p id="'.$speaker[4].'_Title" class="ClickClick ModalSpeakerJobtitle RobotoText">'.$placeholder.$speaker[1].'</p>
		   <input class="ClickEdit" id="'.$speaker[4].'_TitleEdit" style="display:none;" name="'.$speaker[4].'_TitleEdit" type="text" value="'.$speaker[1].'">
		   
          <p id="'.$speaker[4].'_Company" class="ClickClick ModalSpeakerCompanyLink">'.$speaker[7].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_CompanyEdit" style="display:none;" name="'.$speaker[4].'_CompanyEdit" type="text" value="'.$speaker[7].'">';
		  
		  if (!isset($speaker[8]) || $speaker[8] == '' || $speaker[8] == ' '){
			  $placeholder = 'Type the company link here';
		  } else {
			  $placeholder = "";
		  }
		  
		  $output .='<p id="'.$speaker[4].'_CompanyLink" class="ClickClick ModalSpeakerCompanyLink">'.$placeholder.$speaker[8].'</p>
		  <input class="ClickEdit" id="'.$speaker[4].'_CompanyLinkEdit" style="display:none;" name="'.$speaker[4].'_CompanyLinkEdit" type="text" value="'.$speaker[8].'">
          <div class="ModalDivider"></div>';		  
		  $s = 0;
		  
         $output .='<p><span data-socialsedit-speakers="'.$speaker[18].'" class="SocialLinkEdit"><i class="fa fa-comment fa-2x"></i>Social Links</span></p>';
		 
		   if (!isset($speaker[2]) || $speaker[2] == '' || $speaker[2] == ' '){
			  $placeholder = 'Type the highlighted bio here';
		  } else {
			  $placeholder = "";
		  }
		 
          $output .='<div class="ModalSpeakerBio RobotoText"><span id="'.$speaker[4].'_BioImportant" class="ClickClick ModalSpeakerBioHighlight OswaldText">'.$placeholder.$speaker[2].' </span></div>
		  <textarea class="ClickEdit" id="'.$speaker[4].'_BioImportantEdit" style="display:none;" name="'.$speaker[4].'_BioImportantEdit" >'.$speaker[2].'</textarea>';
		  
		  if (!isset($speaker[3]) || $speaker[3] == '' || $speaker[3] == ' '){
			  $placeholder = 'Type the bio here';
		  } else {
			  $placeholder = "";
		  }
		  
		  $output .=' <div id="'.$speaker[4].'_Bio" class="ClickClick ModalSpeakerBio RobotoText"> '.$placeholder.$speaker[3].'</div>
		  <textarea class="ClickEdit" id="'.$speaker[4].'_BioEdit" style="display:none;" name="'.$speaker[4].'_BioEdit">'.$speaker[3].'</textarea>
		  
		  
		  
		  </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$speaker[0].' Modal --> ';
 /// If admin set end
	} else {  
	/*
	 --------------------------
	 Normal user
	 -------------------
	 */		
				$output = '<!-- '.$speaker[0].' Modal -->
<div class="modal fade" id="'.$speaker[4].'" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
			  if (isset($speaker[11])) {
		  $output .= '<div class="ModalSpeakerPhoto" style="background-image:url(..img/speakers/'.$speaker[11].')"></div>';
	          } else {
				   $output .= '<div class="ModalSpeakerPhoto"></div>';
			  }
       
        
       $output .='<div class="ModalSpeakerBioContainer">
	   <form class="SpeakerModalEdit">

          <p id="'.$speaker[4].'_Name" class=" ModalSpeakerName OswaldText">'.$speaker[0].'</p>

          <p id="'.$speaker[4].'_Title" class="ModalSpeakerJobtitle RobotoText">'.$speaker[1].'</p>
		
		  <a href="'.$speaker[8].'" id="'.$speaker[4].'_CompanyLink" class="ModalSpeakerCompanyLink">'.$speaker[7].'</a>
		
          <div class="ModalDivider"></div>';		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				    //$output .='<p class="SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					//$output .='<p id="'.$speaker[4].'_'.$types.'" class="SocialIcons"><a><i class="fa fa-'.$types.' "></i></a></p>';
					
					 $url_raw = $speakers->social_link_decode($links[$s]); //this is needed to decode the link from the database
					  
			         $output .='<p id="'.$speaker[4].'_'.$types.'" class="SocialIcons"><a href="'.$url_raw.'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>';
					  
					   $s++;
			         }

				}
				unset($link_types);
				unset($links);
		  }

          $output .='<div class="ModalSpeakerBio RobotoText"><span id="'.$speaker[4].'_BioImportant" class="ModalSpeakerBioHighlight OswaldText">'.$speaker[2].' </span></div>
		  
		  <div id="'.$speaker[4].'_Bio" class=" ModalSpeakerBio RobotoText"> '.$speaker[3].'</div>

		  </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$speaker[0].' Modal --> ';	
		
		
	} //normal user end
	
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
	}
		}?>

</body>
</html>
