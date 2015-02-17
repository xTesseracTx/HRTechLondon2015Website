<?php

if(isset($_POST['email'])) {
 
     //it's working! :) Just character encoding is not good :(
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "mediapartners@hrneurope.com";
 
    $email_subject = "New Media Partner applicant";
 
     
	 // Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
	 
 
     
 
    function died($error) {
 
        // your error code can go here
 
    //    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
      //  echo "These errors appear below.<br /><br />";
 
   //      echo $error."<br /><br />";
 
     //   echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 

 
    $first_name = utf8_decode($_POST['first_name']); // required
 
    $last_name = utf8_decode($_POST['last_name']); // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['phone']; // not required
 
    $comments = utf8_decode($_POST['description']); // required
	
	$company = utf8_decode($_POST['company']); // required
 
     

    $email_message = "Form details below.\n\n";
 
 
  function sanitize($data){
       //$data = htmlentities(strip_tags(trim($data)));
		
		$bad = array("content-type","bcc:","to:","cc:","href","$","SELECT","<",">",";","INSERT INTO","UPDATE","DELETE");
		
		$data = str_replace($bad,"",$data);
		
        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
                   '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
                   '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
                   '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
    ); 
    $data = preg_replace($search, '', $data); 
        return $data;
    }
 
     
 
    $email_message .= "First Name: ".sanitize($first_name)."\n";
 
    $email_message .= "Last Name: ".sanitize($last_name)."\n";
 
    $email_message .= "Email: ".sanitize($email_from)."\n";
 
    $email_message .= "Telephone: ".sanitize($telephone)."\n";
 
    $email_message .= "Comments: ".sanitize($comments)."\n";
	
   $email_message .= "Publication Website: ".sanitize($company)."\n";
 
     
 
     

    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['phone']) ||
		
	    !isset($_POST['description']) ||
 
        !isset($_POST['company'])) {
			

 
    } else {
		// create email headers
		
	$ip = get_client_ip();	
	
	
	$text = "First Name: ".sanitize($first_name)." | "."Last Name: ".sanitize($last_name)." | "."Email: ".sanitize($email_from)." | "."Telephone: ".sanitize($telephone)." | "."Comments: ".sanitize($comments)." | "."Publication Website: ".sanitize($company)." | "."IP: ".$ip."\n";
	
	file_put_contents("mediaformsubmits.txt", $text, FILE_APPEND);
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);
header("Location: http://london.hrtecheurope.com/thankyou");
exit;

	}

}


		include_once('controllers/aaa.php');
		include_once('controllers/config.php');
		include_once('controllers/mediapartners_main.php');
		include_once('controllers/locations.php');



?>

<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="description" content="Media coverage of HR Tech Europe comes from these globally recognized HR and technology magazines.">
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu, Myrrdhinn - myrrdhinn@gmail.com">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Media Partners | HR Tech Europe</title>

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
<link rel="stylesheet" href="css/mediapartners.css" />
<link rel="stylesheet" href="css/footer.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

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
</head>
<body>

<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--HEADER--> 
    <!--Desktop Navigation Menu-->
    <nav id="MainNavigationMenu">
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);" href="index"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="index" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" >Home</a>
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
        <span class="DesktopMenuDropdown ActiveNavmenuItem"><a href="sponsors">Partners</a>
        <ul id="PartnersDropdown">
          <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Sponsors']);" href="sponsors">
          <li  class="FirstDropdownItem">Sponsors</li>
          </a> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MediaPartners']);" href="mediapartners">
          <li>Media Partners</li>
          </a> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'BlogSquad']);" href="blogsquad">
          <li>Blog Squad</li>
          </a> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'SponsorAppendencies']);" href="sponsorappendencies">
          <li>Sponsor Appendencies</li>
          </a>
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
    <div id="MediapartnersHeaderContainer">
      <div id="MediapartnersHeaderInnerContainer">
        <h1>Media Partners</h1>
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
    <section id="Mediapartners">
      <?php
		$plus_mediapartner = 0;
		$Sp = new mediapartners_main();
		$content = $Sp->mediapartners();
		
		if (isset($content)) {
			$s_type = -1;
		 foreach ($content as $mediapartner) {
			       $num = 0;
			      foreach ($mediapartner As $set) {
						if (!isset($set)){
				        $mediapartner[$num] = '';
			             }	
						 $num++;		
					}

			 
			 		  /*
		  							    $content[$i][0] =  mediapartners_id
										$content[$i][1] =  mediapartners_url
										$content[$i][2] =  mediapartners_type_id (platinum, gold etc)
										$content[$i][3] =  mediapartners_bio
										$content[$i][4] =  mediapartners_tag
										$content[$i][5] =  mediapartners_link_types
										$content[$i][6] =  mediapartners_link_urls
										$content[$i][7] =  mediapartners_picture
										$content[$i][8] =  mediapartners_name
										$content[$i][9] =  mediapartners_name_id
										$content[$i][10] = mediapartner_type_name
										$content[$i][11] = //mediapartners_id (HTML id tag)
										$content[$i][12] = AlaCarte mediapartner text
										$content[$i][13] = Alacarte or not? :D
									    $content[$i][14] = // alacarte connection id
			 
			 */
			 
		  $output = '';
		  
		  
		 if ($s_type != $mediapartner[2]){
			 if ($s_type > -1) {
				 $output = '</div></section>';
			  }
			  $s_type = $mediapartner[2];

			  $output .= '<section class="MediapartnerSection"><h1>'.$mediapartner[10].'</h1><div class="MediapartnersTypeDiv">';
			  //This way we can give a fix width to the mediapartner block container and we can always position it to center :)
		  }
		  		
				 
  if ($mediapartner[0] != -55){ //if there's no a la carte mediapartner uploaded, the array will come back with mediapartner id -55, so we must chek this first because we don't want to display this!
	  $output .= '<div class="MediapartnerMain" id="'.$mediapartner[11].'"><!-- '.$mediapartner[8].' Mediapartner Grid-->';
  				  	    
						$mediapartner_tag = "";
						$mp = preg_replace('/[^A-Za-z]/', '', $mediapartner[8]); // Removes special chars.
						$mediapartner_tag_array = explode(" ",$mp);
						foreach ($mediapartner_tag_array as $comp) {
							$mediapartner_tag .= ucfirst($comp); 
						}
						
	  			
  			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'MediaPartnerProfile', 'ModalOpen', '".$mediapartner_tag."']);";
			$google .= '"';


     $output.= '<a '.$google.' data-toggle="modal" data-target="#'.$mediapartner[4].'" href="#">
      <div class="Mediapartner">';
	  if (isset($mediapartner[7])) {
		  $output .= '<div class="MediapartnerLogo" style="background-image:url(img/mediapartners/'.$mediapartner[7].');">';
	  } else {
				    $output .= '<div class="MediapartnerLogo">';
			  }
         $output .='<div class="MediapartnerLogoHoverInfo">

            <p class="MediapartnerViewProfile">VIEW PROFILE</p>
			<p class="MediapartnerName">'.$mediapartner[8].'</p>
          </div>
        </div>';
              		// If the mediapartner is an A La Carte Mediapartner, print out the mediapartnered product 
             if($mediapartner[13] == 1) {
      			$output .= '<p class="ALaCarte">'.$mediapartner[12].'</p>';
      		}

      $output .= '</div>';

      		
      $output .= '</a>'; 
	  
      $output .= '<!-- end '.$mediapartner[0].' Mediapartner grid --></div> ';
	  
  } //if is it -55 end
               
		
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
		 }
		 echo '</div></section>';
	} 

	   ?>
    </section>
    <!--END MAIN CONTENT-->
    <div id="MediaPartnersFormContainer">
      <div id="MediaPartnersFormInnerContainer"> <a id="join-the-media-partners"></a>
        <h1>Join Our Media Partners</h1>
        <!-- BEGINNING of : JOIN OUR MEDIA PARTNERS FORM -->
        <form action="" method="POST">
          <input type=hidden name="retURL" value="http://london.hrtecheurope.com/thankyou">
          <div class="row">
            <div class="large-6 columns">
              <input required placeholder="First Name *"  id="first_name" maxlength="40" name="first_name" size="20" type="text" />
              <input required placeholder="Last Name *" id="last_name" maxlength="80" name="last_name" size="20" type="text" />
              <input required placeholder="Email Address *"  id="email" maxlength="80" name="email" size="20" type="text" />
              <input required placeholder="Phone Number *"  id="phone" maxlength="40" name="phone" size="20" type="text" />
              <input required placeholder="Publication Site *"  id="company" maxlength="40" name="company" size="20" type="text" />              
              <select style="display:none;"   id="lead_source" name="lead_source" placeholder="Lead Source">
                <option selected="selected" value="HRTechLondon2015-JoinTheMediaPartners">HRTechLondon2015-JoinTheMediaPartners</option>
              </select>
            </div>
            <div class="large-6 columns">
              <textarea placeholder="Message" name="description"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="large-12 column">
              <input onClick="_gaq.push(['_trackEvent', 'MediaPartners', 'FormSubmission', 'InquirySent']);" type="submit" id="JoinMediaPartnersButton" name="submit" value="Send">
            </div>
          </div>
        </form>
        <!-- END of : JOIN OUR MEDIA PARTNERS FORM --> 
      </div>
    </div>
    <!-- End Blog Squad Form --> 
    
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
   foreach ($content as $mediapartner) {
			 $go = 1;
			 
			 if (isset($mediapartner[6])){ //we break down the links to an array
				  $links = explode(';',$mediapartner[6]);
			      $link_types = explode(';',$mediapartner[5]);
			 }
			 
			 
			 $num = 0;
			  foreach ($mediapartner As $set) {
			      if (!isset($set)){
				        $mediapartner[$num] = '';
			        }	
				  $num++;		
			   }
			   
			   //We check if we already printed this modal or not. If we do, we won't print it agian.
			 if(isset($displayed)) {
				 $i = 0;
				   foreach ($displayed As $value) {
						if ($value == $mediapartner[0]){
							 $go = 0;
						 } //if value = mediapartner
						$i++;
					  }//forech displayed
					  
					if ($go == 1){
						$displayed[$i] = $mediapartner[0];
						$i++;
					}
			
			 }else { //if isset displayed
				$displayed[0] =  $mediapartner[0];
			 }//else
				
				

			 			 		  /*
		  							    $content[$i][0] =  mediapartners_id
										$content[$i][1] =  mediapartners_url
										$content[$i][2] =  mediapartners_type_id (platinum, gold etc)
										$content[$i][3] =  mediapartners_bio
										$content[$i][4] =  mediapartners_tag
										$content[$i][5] =  mediapartners_link_types
										$content[$i][6] =  mediapartners_link_urls
										$content[$i][7] =  mediapartners_picture
										$content[$i][8] =  mediapartners_name
										$content[$i][9] =  mediapartners_name_id
										$content[$i][10] = mediapartner_type_name
										$content[$i][11] = //mediapartners_id (HTML id tag)
										$content[$i][12] = AlaCarte mediapartner text
										$content[$i][13] = Alacarte or not? :D
										$content[$i][14] = // alacarte connection id
			 
			 */
if ($mediapartner[0] != -55 && $go == 1){	//if we already displayed the modal or the modal don't contain data then we don't print it out		 			

 /*------------------------
  Normal user
 -------------------------
 */
					$output = '<!-- '.$mediapartner[8].' Modal -->
<div class="modal fade" id="'.$mediapartner[4].'" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
			  if (isset($mediapartner[7])) {
		  $output .= '<div class="ModalMediapartnerPhoto" style="background-image:url(img/mediapartners/'.$mediapartner[7].')"></div>';
	          } else {
				   $output .= '<div class="ModalSpeakerPhoto"></div>';
			  }
       
	   
	   						$mediapartner_tag = "";
						$mp = preg_replace('/[^A-Za-z]/', '', $mediapartner[8]); // Removes special chars.
						$mediapartner_tag_array = explode(" ",$mp);
						foreach ($mediapartner_tag_array as $comp) {
							$mediapartner_tag .= ucfirst($comp); 
						}
						
	  			
  			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'MediaPartnerCompanySite', 'ExternalForward', '".$mediapartner_tag."']);";
			$google .= '"';
        
       $output .='<div class="ModalMediapartnerBioContainer">
	   <form class="MediapartnerModalEdit">
	      
          <p id="'.$mediapartner[4].'_Name" class="ClickClick ModalMediapartnerName">'.$mediapartner[8].'</p>
		

		  <a '.$google.' id="'.$mediapartner[4].'_CompanyLink" class="ClickClick ModalMediapartnerCompanyLink" target="_blank" href="'.$mediapartner[1].'">Visit Company Website <i class="fa fa-angle-double-right"></i></a>
		
          <div class="ModalDivider"></div>';		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				   if ($links[$s] != ''){
					   
						$mp_social = ucfirst($types).'-'.$mediapartner_tag;	   
						$google = 'onClick="_gaq.push([';
						$google .= "'_trackEvent', 'MediaPartnerSocialSite', 'ExternalForward', '".$mp_social."']);";
						$google .= '"';
					   
				    //$output .='<p class="SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					//$output .='<p id="'.$mediapartner[4].'_'.$types.'" class="SocialIcons"><a '.$google.' href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>';
					
					$url_raw = $Sp->social_link_decode($links[$s]); //this is needed to decode the link from the database
					$output .='<p id="'.$mediapartner[4].'_'.$types.'" class="SocialIcons"><a '.$google.' href="'.$url_raw.'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>';  
					
				   }
					   $s++;
			         }
				}
				unset($link_types);
				unset($links);
		  }	   
		
          $output .='<div id="'.$mediapartner[4].'_Bio" class="ClickClick ModalMediapartnerBio RobotoText"> '.$mediapartner[3].'</div>';

  $output .='</form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$mediapartner[0].' Modal --> ';			
						
						 


} //if mediapartner[0] != -55

		echo $output; 
		 
	}//foreach content ends
		} //if isset content ends
?>

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