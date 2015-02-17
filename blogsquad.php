<?php

if(isset($_POST['email'])) {
 
     //it's working! :) Just character encoding is not good :(
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
   $email_to = "blogsquad@hrneurope.com";
 
    $email_subject = "New Blog Squad applicant";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
    //    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
      //  echo "These errors appear below.<br /><br />";
 
   //      echo $error."<br /><br />";
 
     //   echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 /*
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['phone']) ||
		
	    !isset($_POST['description']) ||
 
        !isset($_POST['company'])) {
			
			
 
       died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 */
     
 
    $first_name = utf8_decode($_POST['first_name']); // required
 
    $last_name = utf8_decode($_POST['last_name']); // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['phone']; // not required
 
    $comments = utf8_decode($_POST['description']); // required
	
	$company = utf8_decode($_POST['company']); // required
 
     
 /*
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
 /*
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }

 
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }

 */
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
	
   $email_message .= "Company: ".sanitize($company)."\n";
 
     
 
     

    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['phone']) ||
		
	    !isset($_POST['description']) ||
 
        !isset($_POST['company'])) {
			

 
    } else {
		// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);
header("Location: http://london.hrtecheurope.com/thankyou");
exit;

	}

}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="description" content="Some of today's leading bloggers on HR and management are part of the HR Tech Europe Blog Squad">
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Bloggers | HR Tech Europe</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/vendor/modernizr.js"></script>

<!-- Include Bootstrap for BlogsquadsGrid Modals -->
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
<link rel="stylesheet" href="css/blogsquad.css" />
<link rel="stylesheet" href="css/footer.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

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
.ModalBlogsquadBio .ModalBlogsquadHighlight {
	font-family: 'Oswald', sans-serif !important;
	font-size: 20px !important;
	font-weight: 400 !important;
	line-height: 29px !important;
	padding-bottom: 0 !important;
	color: #323232 !important;
}
.ModalBlogsquadBio p, .ModalBlogsquadBio p span {
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
		include_once('controllers/blogsquad_main.php');
		include_once('controllers/locations.php');

?>
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
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="index" >Home</a></li>
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
    <div id="BlogsquadHeaderContainer">
      <div id="BlogsquadHeaderInnerContainer">
        <h1>Blog Squad</h1>
        <p>Our bloggers provide insight, interviews, news and
          opinion on everything HR.</p>
        <a onClick="_gaq.push(['_trackEvent', 'BlogSquad', 'ScrollToAnchor', 'JoinTheBlogSquadButton']);" href="#join-the-blog-squad">
        <div id="JoinTheBlogSquadButton">Join the Blog Squad</div>
        </a> </div>
    </div>
    <div class="colors-wrapper">
      <div class="colored-stripe red" ></div>
      <div class="colored-stripe yellow" ></div>
      <div class="colored-stripe green" ></div>
      <div class="colored-stripe blue" ></div>
    </div>
    <div style="clear: both;"></div>
    <!--MAIN CONTENT -->
    <h1 id="BlogsquadHeadline">Blog Squad</h1>
    <section id="Blogsquads">
      <?php
		$speakers = new blogsquad_main();
		$content = $speakers->blogsquad();
		  /*
		  
		 				$content[$i][0] = Blogsquad name
		  				$content[$i][1] = Blogsquad Title
						$content[$i][2] = Blogsquad Bio important
						$content[$i][3] = Blogsquad Bio
						$content[$i][4] = Blogsquad modal tag
						
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
						$content[$i][18] = Blogsquads id
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
				 $time = ' ';
			 }
			 
			 if (!isset($speaker[16]) || $speaker[16] == ''){
				 $speaker[16] = '';
				 $day = '';
			 } else {
				 $day =  'DAY '.$speaker[16];
			 }
			 

			 $output = '';
			$output .= '<div id="'.$speaker[18].'"><!-- '.$speaker[0].' Blogsquadgrid-->';
			
			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'BloggerProfile', 'ModalOpen', '".$speaker[4]."']);";
			$google .= '"';
			

     $output.= '<a '.$google.' data-toggle="modal" data-target="#'.$speaker[4].'" href="#">
      <div class="Blogsquad">';
	  if (isset($speaker[11])) {
		  $output .= '<div class="BlogsquadPhoto" style="background-image:url(img/blogsquad/'.$speaker[11].');">';
	  } else {
				    $output .= '<div class="BlogsquadPhoto">';
			  }
       
         $output .='<div class="EventDetails">
            <p class="ViewProfile">VIEW PROFILE</p>
          </div>
        </div>
        <div class="BlogsquadInfo">
          <p class="BlogsquadName OswaldText HRNBlue">'.$speaker[0].'</p>
          <p class="BlogsquadCompanyName RobotoText">'.$speaker[7].'</p>
        </div>
      </div>
      </a>'; 
	  
      $output .= '<!-- end '.$speaker[0].' Blogsquadgrid --></div> ';
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
		 }
	} 

	   ?>
    </section>
    <div id="BlogSquadFormContainer">
      <div id="BlogSquadFormInnerContainer"> <a id="join-the-blog-squad"></a>
        <h1>Join the Blog Squad</h1>
        <!-- BEGINNING of : JOIN THE BLOG SQUAD FORM -->
        <form action="" method="POST">
          <input type=hidden name="retURL" value="http://london.hrtecheurope.com/thankyou">
          
          <div class="row">
            <div class="large-6 columns">
              <input required placeholder="First Name *"  id="first_name" maxlength="40" name="first_name" size="20" type="text" />
              <input required placeholder="Last Name *" id="last_name" maxlength="80" name="last_name" size="20" type="text" />
              <input required placeholder="Email Address *"  id="email" maxlength="80" name="email" size="20" type="text" />
              <input required placeholder="Phone Number *"  id="phone" maxlength="40" name="phone" size="20" type="text" />
              <input required placeholder="Company Site *"  id="company" maxlength="40" name="company" size="20" type="text" />
              <input required placeholder="Job Title *" id="title" maxlength="40" name="title" size="20" type="text" />
              <select style="display:none;"   id="lead_source" name="lead_source" placeholder="Lead Source">
                <option selected="selected" value="HRTechLondon2015-JoinTheBlogSquad">HRTechLondon2015-JoinTheBlogSquad</option>
              </select>
            </div>
            <div class="large-6 columns">
              <textarea placeholder="Message" name="description"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="large-12 column">
              <input onClick="_gaq.push(['_trackEvent', 'BlogSquad', 'FormSubmission', 'InquirySent']);" type="submit" id="JoinBlogSquadButton" name="submit" value="Send">
            </div>
          </div>
        </form>
        <!-- END of : JOIN THE BLOG SQUAD FORM --->
      </div>
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
            <div id="FollowUsSocialIcons"> <a target="_blank" href="https://www.facebook.com/hrtecheu"><img src="img/header-facebook.png" /></a> <a target="_blank" href="https://twitter.com/hrtecheurope"> <img src="img/header-twitter.png"/></a> <a target="_blank" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img src="img/header-linkedin.png"/></a> <a target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/"><img src="img/header-flickr.png"/></a> <a target="_blank"  href="http://www.slideshare.net/hrtecheurope"> <img src="img/header-slideshare.png"/></a> </div>
          </div>
          <div id="HRNEvents">
            <h6 class="FooterSectionTitle">HRN Events</h6>
            <p id="HRNEventsList"> <a href="http://london.hrtecheurope.com" target="_blank">HR Tech Europe London</a><br>
              <a href="http://paris.hrtecheurope.com" target="_blank">HR Tech Europe Paris</a> </p>
          </div>
        </div>
        <div id="RightGreyFooterItems">
          <div id="FooterButtons"> <a href="contact">
            <div id="GetInTouchButton" class="FooterButton">Get in Touch</div>
            </a> <a href="tickets">
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
		  
		 				$content[$i][0] = Blogsquad name
		  				$content[$i][1] = Blogsquad Title
						$content[$i][2] = Blogsquad Bio important
						$content[$i][3] = Blogsquad Bio
						$content[$i][4] = Blogsquad modal tag
						
						$content[$i][5] = Link type
						$content[$i][6] = Link URL

						$content[$i][7] = Company name
						$content[$i][8] = Company URL
						$content[$i][9] = Company Bio

						$content[$i][10] = Picture name
						$content[$i][11] = Picture URL
						
						  $content[$i][21] .= $blog ['title'].'|';
						  $content[$i][22] .= $blog ['url'].'|';
		  */
		if (isset($content)) {
		 foreach ($content as $speaker) {
			 if (isset($speaker[6])){
				  $links = explode(';',$speaker[6]);
			      $link_types = explode(';',$speaker[5]);
			 }
			 
			 if (isset($speaker[21]) && isset($speaker[22])){
				  $blog_title = explode('|',$speaker[21]);
			      $blog_url = explode('|',$speaker[22]);
			 }
			 
			 
			     $num = 0;
			 	 foreach ($speaker As $set) {
						if (!isset($set)){
				        $speaker[$num] = '';
			             }	
						 $num++;		
					}
			 

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
		  $output .= '<div class="ModalBlogsquadPhoto" style="background-image:url(img/blogsquad/'.$speaker[11].')"></div>';
	          } else {
				   $output .= '<div class="ModalBlogsquadPhoto"></div>';
			  }
       
        
			        $company_tag = "";
			$ca = preg_replace('/[^A-Za-z0-9]/', '', $speaker[7]); // Removes special chars.
	        $company_tag_array = explode(" ",$ca);
			foreach ($company_tag_array as $comp) {
				$company_tag .= ucfirst($comp); 
			}
			
        
			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'BloggerCompanySite', 'ExternalForward', '".$company_tag."']);";
			$google .= '"';
		
		
       $output .='<div class="ModalBlogsquadBioContainer">
	   <form class="BlogsquadModalEdit">

          <p id="'.$speaker[4].'_Name" class=" ModalBlogsquadName OswaldText">'.$speaker[0].'</p>

          <p id="'.$speaker[4].'_Title" class="ModalBlogsquadJobtitle RobotoText">'.$speaker[1].'</p>';
		  
		  				if (isset($speaker[8])) {
					 $Http = strpos($speaker[8], "http://");
					 $Https = strpos($speaker[8], "https://");
					
					 if ($Http === false && $Https === false) {
						$speaker[8] = "http://".$speaker[8];
				    	}
				   }
		
		  $output .='<a '.$google.' href="'.$speaker[8].'" id="'.$speaker[4].'_CompanyLink" class="ModalBlogsquadCompanyLink">'.$speaker[7].'</a>';
		  
		  
		  		  	 if (isset($blog_title) && isset($blog_url)){
				 $blognum = 0;
				 $output .= '<br />';
			 foreach ($blog_title As $titles) {
			   if ($titles) {
				   
						$company_tag = "";
						$ca = preg_replace('/[^A-Za-z0-9]/', '', $titles); // Removes special chars.
						$company_tag_array = explode(" ",$ca);
						foreach ($company_tag_array as $comp) {
							$company_tag .= ucfirst($comp); 
						}
						
						
										   if (isset($blog_url[$blognum])) {
					 $Http = strpos($blog_url[$blognum], "http://");
					 $Https = strpos($blog_url[$blognum], "https://");
					
					 if ($Http === false && $Https === false) {
						$blog_url[$blognum] = "http://".$blog_url[$blognum];
				    	}
				   }

						
					
						$google = 'onClick="_gaq.push([';
						$google .= "'_trackEvent', 'BloggerBlogSite', 'ExternalForward', '".$company_tag."']);";
						$google .= '"';
				   
				   
				     $output .='<a '.$google.' href="'.$blog_url[$blognum].'" id="'.$speaker[4].'_BlogLink'.$blognum.'" class="ModalBlogsquadCompanyLink">'.$titles.'</a><br/ >';
				     $blognum++;
				   
			         }

				}
				unset($blog_title);
				unset($blog_url);
		  }
		  
		
          $output.='<div class="ModalDivider"></div>';		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				   
				   if (isset($links[$s])) {
					 $Http = strpos($links[$s], "http://");
					 $Https = strpos($links[$s], "https://");
					
					 if ($Http === false && $Https === false) {
						$links[$s] = "http://".$links[$s];
				    	}
				   }

						    $social_tag = ucfirst($types).'-'.$speaker[4];
				   			$google = 'onClick="_gaq.push([';
			                $google .= "'_trackEvent', 'BloggerSocialSite', 'ExternalForward', '".$social_tag."']);";
			                $google .= '"';
							
				    //$output .='<p class="SocialIcons"><a '.$google.' href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					//$output .='<p id="'.$speaker[4].'_'.$types.'" class="SocialIcons"><a><i class="fa fa-'.$types.' "></i></a></p>'; 
					
					  $url_raw = $speakers->social_link_decode($links[$s]); //this is needed to decode the link from the database
							
				    $output .='<p class="SocialIcons"><a '.$google.' href="'.$url_raw.'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 

					   $s++;
			         }

				}
				unset($link_types);
				unset($links);
		  }

          $output .='<div class="ModalBlogsquadBio RobotoText"><span id="'.$speaker[4].'_BioImportant" class="ModalBlogsquadBioHighlight OswaldText">'.$speaker[2].' </span><!--</div>
		  
		  <div id="'.$speaker[4].'_Bio" class=" ModalBlogsquadBio RobotoText"> '.$speaker[3].'</div>-->
		  <span id="'.$speaker[4].'_Bio"> '.$speaker[3].'</span>
		  </div>

		  </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$speaker[0].' Modal --> ';	
		
		

	
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
	}
		}?>

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
