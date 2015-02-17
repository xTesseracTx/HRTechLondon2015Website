    <?php 

		include_once('controllers/aaa.php');
		include_once('controllers/config.php');
		include_once('controllers/sponsors_main.php');
		include_once('controllers/locations.php');

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="description" content="HR Tech Europe is sponsored by some of the biggest names in HR Technology, including Oracle, IBM, Ceridian, Workday and Cornerstone">
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu, Myrrdhinn - myrrdhinn@gmail.com">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sponsors | HR Tech Europe</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
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

<!-- TinyMCE -->
<script type="text/javascript" src="vendor/tinymce/tinymce.min.js"></script>

<!--	Include Navigation Menu CSS Definitions -->
<link rel="stylesheet" href="css/navmenu.css" />

<!--	Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/sponsors.css" />
<link rel="stylesheet" href="css/footer.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!--- Mobile Menu dropdown -->
<script src="js/mobile-menu-dropdown.js"></script>

<style type="text/css">
.ModalSponsorBio p span {
	font-family: 'Roboto', sans-serif !important;
	font-size: 17px !important;
	font-weight: 400 !important;
	line-height: 23px !important;
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

<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--HEADER--> 
    <!--Desktop Navigation Menu-->
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
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Venue']);" href="venue"><li class="FirstDropdownItem">Venue</li></a>
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Logistics']);" href="logistics"><li>Logistics</li></a>
                <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Hotels']);" href="hotels"><li>Hotels</li></a>
            </ul>
        </span>
          
        <div class="NavmenuDivider"></div>
        
        <span class="DesktopMenuDropdown ActiveNavmenuItem"><a href="sponsors">Partners</a>
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
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="index">Home</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" href="tickets" >Tickets</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" href="speakers">Speakers</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" href="agenda" >Agenda</a></li>
                  <li id="ExpoMobileGroup">Expo <i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></li>
       	  <div id="ExpoMobileGroupContent">
                <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Venue']);" href="venue">Venue</a></li>
                <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Logistics']);" href="logistics">Logistics</a></li>
                <li><a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Hotels']);" href="hotels">Hotels</a></li>
          </div>
          
          <li id="PartnersMobileGroup" class="ActiveNavmenuItem MobileNavigationMenuItem">Partners <i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></li>
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
    
    <!--MAIN CONTENT -->
    <div id="SponsorsHeaderContainer">
      <div id="SponsorsHeaderInnerContainer">
        <h1>Sponsors</h1>
        <p>A Who's Who of HR software leaders will showcase the best solutions, services and products on the market for you to optimise, enable and unleash your people! </p>
      </div>
    </div>
    <div class="colors-wrapper">
      <div class="colored-stripe red" ></div>
      <div class="colored-stripe yellow" ></div>
      <div class="colored-stripe green" ></div>
      <div class="colored-stripe blue" ></div>
    </div>
    <div style="clear: both;"></div>

    <section id="Sponsors">
      <?php
		$plus_sponsor = 0;
		$Sp = new sponsors_main();
		$content = $Sp->sponsors();
		
		if (isset($content)) {
			$s_type = -1;
		 foreach ($content as $sponsor) {
			       $num = 0;
			      foreach ($sponsor As $set) {
						if (!isset($set)){
				        $sponsor[$num] = '';
			             }	
						 $num++;		
					}

			 
			 		  /*
		  							    $content[$i][0] =  sponsors_id
										$content[$i][1] =  sponsors_url
										$content[$i][2] =  sponsors_type_id (platinum, gold etc)
										$content[$i][3] =  sponsors_bio
										$content[$i][4] =  sponsors_tag
										$content[$i][5] =  sponsors_link_types
										$content[$i][6] =  sponsors_link_urls
										$content[$i][7] =  sponsors_picture
										$content[$i][8] =  sponsors_name
										$content[$i][9] =  sponsors_name_id
										$content[$i][10] = sponsor_type_name
										$content[$i][11] = //sponsors_id (HTML id tag)
										$content[$i][12] = AlaCarte sponsor text
										$content[$i][13] = Alacarte or not? :D
									    $content[$i][14] = //alacarte connection id
			 
			 */
			 
		  $output = '';
		  
		  
		 if ($s_type != $sponsor[2]){
			 if ($s_type > -1) {
				 $output = '</div></section>';
			  }
			  $s_type = $sponsor[2];

			  $output .= '<section class="SponsorSection"><h1>'.$sponsor[10].'</h1><div class="SponsorsTypeDiv">';
			  //This way we can give a fix width to the sponsor block container and we can always position it to center :)
		  }
		  		
				 
  if ($sponsor[0] != -55){ //if there's no a la carte sponsor uploaded, the array will come back with sponsor id -55, so we must chek this first because we don't want to display this!
	  $output .= '<div class="SponsorMain" id="'.$sponsor[11].'"><!-- '.$sponsor[8].' Sponsor Grid-->';
	  
	  					$sponsor_tag = "";
						$sa = preg_replace('/[^A-Za-z]/', '', $sponsor[8]); // Removes special chars.
						$sponsor_tag_array = explode(" ",$sa);
						foreach ($sponsor_tag_array as $comp) {
							$sponsor_tag .= ucfirst($comp); 
						}
						
	  			
  			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'SponsorProfile', 'ModalOpen', '".$sponsor_tag."']);";
			$google .= '"';

     $output.= '<a '.$google.' data-toggle="modal" data-target="#'.$sponsor[4].'" href="#">
      <div class="Sponsor">';
	  if (isset($sponsor[7])) {
		  $output .= '<div class="SponsorLogo" style="background-image:url(img/sponsors/'.$sponsor[7].');">';
	  } else {
				    $output .= '<div class="SponsorLogo">';
			  }
         $output .='<div class="SponsorLogoHoverInfo">

            <p class="SponsorViewProfile">VIEW PROFILE</p>
			<p class="SponsorName">'.$sponsor[8].'</p>
          </div>
        </div>';
              		// If the sponsor is an A La Carte Sponsor, print out the sponsored product 
             if($sponsor[13] == 1) {
      			$output .= '<p class="ALaCarte">'.$sponsor[12].'</p>';
      		}

      $output .= '</div>';

      		
      $output .= '</a>'; 
	  
      $output .= '<!-- end '.$sponsor[0].' Sponsor grid --></div> ';
	  
  } //if is it -55 end
               
		
			
		  /*  foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
		 }
		 echo '</div></section>';
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

<!-- MODALS -->

<?php

if (isset($content)) {
   foreach ($content as $sponsor) {
			 $go = 1;
			 
			 if (isset($sponsor[6])){ //we break down the links to an array
				  $links = explode(';',$sponsor[6]);
			      $link_types = explode(';',$sponsor[5]);
			 }
			 
			 
			 $num = 0;
			  foreach ($sponsor As $set) {
			      if (!isset($set)){
				        $sponsor[$num] = '';
			        }	
				  $num++;		
			   }
			   
			   //We check if we already printed this modal or not. If we do, we won't print it agian.
			 if(isset($displayed)) {
				 $i = 0;
				   foreach ($displayed As $value) {
						if ($value == $sponsor[0]){
							 $go = 0;
						 } //if value = sponsor
						$i++;
					  }//forech displayed
					  
					if ($go == 1){
						$displayed[$i] = $sponsor[0];
						$i++;
					}
			
			 }else { //if isset displayed
				$displayed[0] =  $sponsor[0];
			 }//else
				
				

			 			 		  /*
		  							    $content[$i][0] =  sponsors_id
										$content[$i][1] =  sponsors_url
										$content[$i][2] =  sponsors_type_id (platinum, gold etc)
										$content[$i][3] =  sponsors_bio
										$content[$i][4] =  sponsors_tag
										$content[$i][5] =  sponsors_link_types
										$content[$i][6] =  sponsors_link_urls
										$content[$i][7] =  sponsors_picture
										$content[$i][8] =  sponsors_name
										$content[$i][9] =  sponsors_name_id
										$content[$i][10] = sponsor_type_name
										$content[$i][11] = //sponsors_id (HTML id tag)
										$content[$i][12] = AlaCarte sponsor text
										$content[$i][13] = Alacarte or not? :D
										$content[$i][14] = // alacarte connection id
			 
			 */
if ($sponsor[0] != -55 && $go == 1){	//if we already displayed the modal or the modal don't contain data then we don't print it out		 			

 /*------------------------
  Normal user
 -------------------------
 */
					$output = '<!-- '.$sponsor[8].' Modal -->
<div class="modal fade" id="'.$sponsor[4].'" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
			  if (isset($sponsor[7])) {
		  $output .= '<div class="ModalSponsorPhoto" style="background-image:url(img/sponsors/'.$sponsor[7].')"></div>';
	          } else {
				   $output .= '<div class="ModalSpeakerPhoto"></div>';
			  }
       
	   
			  $sponsor_tag = "";
			  $sa = preg_replace('/[^A-Za-z]/', '', $sponsor[8]); // Removes special chars.
			  $sponsor_tag_array = explode(" ",$sa);
			  foreach ($sponsor_tag_array as $comp) {
				  $sponsor_tag .= ucfirst($comp); 
			  }
						
	  			
  			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'SponsorCompanySite', 'ExternalForward', '".$sponsor_tag."']);";
			$google .= '"';
        
       $output .='<div class="ModalSponsorBioContainer">
	   <form class="SponsorModalEdit">
	      
          <p id="'.$sponsor[4].'_Name" class="ModalSponsorName">'.$sponsor[8].'</p>
		

		  <a '.$google.' id="'.$sponsor[4].'_CompanyLink" class="ModalSponsorCompanyLink" target="_blank" href="'.$sponsor[1].'">Visit Company Website <i class="fa fa-angle-double-right"></i></a>
		
          <div class="ModalDivider"></div>';		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				   if ($links[$s] != ''){
				
			$comp_social = ucfirst($types).'-'.$sponsor_tag;	   
			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'SponsorSocialSite', 'ExternalForward', '".$comp_social."']);";
			$google .= '"';
					   
					   $url_raw = $Sp->social_link_decode($links[$s]); //this is needed to decode the link from the database
					   
				    //$output .='<p class="SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					$output .='<p id="'.$sponsor[4].'_'.$types.'" class="SocialIcons"><a '.$google.' href="'.$url_raw.'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
				   }
					   $s++;
			         }
				}
				unset($link_types);
				unset($links);
		  }	   
		
          $output .='<div id="'.$sponsor[4].'_Bio" class="ModalSponsorBio RobotoText"> '.$sponsor[3].'</div>';

  $output .='</form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$sponsor[0].' Modal --> ';			
						
						 


} //if sponsor[0] != -55

		echo $output; 
		 
	}//foreach content ends
		} //if isset content ends
?>
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