<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="author" content="Develped by: TesseracT - bottyan.tamas@web-developer.hu">
<meta name="developer" content="Develped by: Myrrdhinn - myrrdhinn@gmail.com">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Tech Europe - Sponsors Edit</title>

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

<!-- TinyMCE -->
<script type="text/javascript" src="vendor/tinymce_alt/tinymce.min.js"></script>

<!--	Include Navigation Menu CSS Definitions -->
<link rel="stylesheet" href="css/navmenu.css" />

<!--	Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/sponsors.css" />
<link rel="stylesheet" href="css/footer.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!-- Drag & Drop -->

<?php 
  if(isset($_SESSION['admin']) && isset($_SESSION['sponsors_admin'])) {
	echo '<!-- This needs jquery ui-->
<script src="js/admin_sponsors_edit.js"></script>  
<script src="js/admin_dropzone_main.js"></script>
<script src="js/admin_general.js"></script> 
<link rel="stylesheet" href="css/general.css" /> 
<link rel="stylesheet" href="css/admin_general.css" />
<link rel="stylesheet" href="css/admin_edit_general.css" />'; 

  }
?>
</head>
<body>

<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--HEADER--> 
    <!--Desktop Navigation Menu-->
  <?php 
  	  $Sp = new sponsors_main();
  if(isset($_SESSION['admin']) && isset($_SESSION['sponsors_admin'])) {

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
				$content .= $Sp->response_generator($_COOKIE['ResponseCookie']);
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
    <div id="MobileNavigation"> <img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-mobile-logo.png"> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);" href="#"  role="button" class="right-off-canvas-toggle smoothScroll"><i class="fa fa-bars"></i></a> </div>
    <nav id="RightsideMobileNavigation" class="right-off-canvas-menu">
      <ul>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="index" class="MobileNavigationMenuItem">Home</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" href="tickets" >Tickets</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" class="ActiveNavmenuItem" href="speakers">Speakers</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" href="agenda" >Agenda</a></li>
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
    <?php 
  if(isset($_SESSION['admin']) && isset($_SESSION['sponsors_admin'])) {
	echo '<div id="tinyDiv"></div>
         <a href="new_sponsors">
        <div class="AdminNavigateButton">New Sponsor</div>
        </a>';
		/*echo '<a href="new_sponsors">
        <div class="AdminNavigateButton">Help</div>
        </a>'; */ 
  }
?>
    <section id="Sponsors">
      <?php

		$plus_sponsor = 0;
		
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
					
					if (isset($_SESSION['user_id'])) {
					$permitted = $Sp->sponsor_permission_check($sponsor[0], $_SESSION['user_id']);
					} else {
						$permitted = 0;
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
									    $content[$i][14] = // alacarte connection id
			 
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
		  		  //add new alacarte button
			/* if ($sponsor[2] == 999 && $plus_sponsor == 0 && isset($_SESSION['admin'])){
				 //------------------------
				 
					$output .= '<div class="SponsorMain" id="AddNewAlaCarte"><!-- New AlaCarte Sponsor Grid-->';
					$output .= '<div><br /><br/></div>';
					$output.= '<a data-toggle="modal" data-target="#NewAlaCarte" href="#">
							   <div class="Sponsor">';
					$output .= '<div class="SponsorLogo" style="background-image:url(img/sponsors/addalacarte.png);">';

					$output .='<div class="SponsorLogoHoverInfo">
						 <p class="SponsorViewProfile">Add New A la Carte</p>
						 <p class="SponsorName"></p>
						   </div>
					   </div>';

				    $output .= '</div>';
		
				    $output .= '</a>'; 
				    $output .= '<p class="ModalSponsorAlaCarte ALaCarte">Add New</p>';

				    $output .= '<!--ew AlaCarte Sponsor Grid--></div> ';
				
				    $plus_sponsor = 1;
				  
				//---------------------  
			 }
			 */
				 
  if ($sponsor[0] != -55){ //if there's no a la carte sponsor uploaded, the array will come back with sponsor id -55, so we must chek this first because we don't want to display this!
	  $output .= '<div class="SponsorMain" id="'.$sponsor[11].'"><!-- '.$sponsor[8].' Sponsor Grid-->';
  
	 if(isset($_SESSION['admin']) && isset($_SESSION['sponsors_admin']) && (isset($_SESSION['super_admin']) || $permitted == 1 )) {
			 $output .= '<div data-sponsordel-sponsor="'.$sponsor[0].'" class="SponsorDelete"><i class="fa fa-trash fa-2x"></i></div>';
			  if (isset($_SESSION['super_admin'])) {
				  $output .= '<div data-sponsorperm-sponsor="'.$sponsor[0].'" class="SponsorPermission"><i class="fa fa-cog fa-2x"></i></div>';
			  }
			 
	      }elseif (isset($_SESSION['admin']) && isset($_SESSION['sponsors_admin']) && (!isset($_SESSION['super_admin']) || $permitted == 0 )) {
			  
			   $output .= '<div class="SponsorDeleteInactive"></i></div>';
		  }

     $output.= '<a data-toggle="modal" data-target="#'.$sponsor[4].'" href="#">
      <div class="Sponsor">';
	  if (isset($sponsor[7])) {
		  $output .= '<div class="SponsorLogo" style="background-image:url(../img/sponsors/'.$sponsor[7].');">';
	  } else {
				    $output .= '<div class="SponsorLogo">';
			  }
         $output .='<div class="SponsorLogoHoverInfo">

            <p class="SponsorViewProfile">VIEW PROFILE</p>
			<p class="SponsorName">'.$sponsor[8].'</p>
          </div>
        </div>';
              		// If the sponsor is an A La Carte Sponsor, print out the sponsored product 
		  if(!isset($_SESSION['admin']) && !isset($_SESSION['sponsors_admin']) && (isset($_SESSION['super_admin']) || $permitted == 1 )) {			
      		if($sponsor[13] == 1) {
      			$output .= '<p class="ALaCarte">'.$sponsor[12].'</p>';
      		}
		  }//if isset admin
      $output .= '</div>';

      		
      $output .= '</a>'; 
	   if(isset($_SESSION['admin']) && isset($_SESSION['sponsors_admin']) && (isset($_SESSION['super_admin']) || $permitted == 1 )) {
		if($sponsor[13] == 1 && $sponsor[2] == 999) {
		    $output .= '<p id="'.$sponsor[4].'_AlaCarteText-'.$sponsor[14].'" class="ClickClick ModalSponsorAlaCarte ALaCarte">'.$sponsor[12].'</p>
		     <input class="ClickEdit" id="'.$sponsor[4].'_AlaCarteText-'.$sponsor[14].'Edit" style="display:none;" name="'.$sponsor[4].'_AlaCarteText-'.$sponsor[14].'Edit" type="text" value="'.$sponsor[12].'">';
      		}
       }
	  
      $output .= '<!-- end '.$sponsor[0].' Sponsor grid --></div> ';
	  
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

    <?php 
  if(!isset($_SESSION['admin']) && !isset($_SESSION['sponsors_admin'])) {
	  $mcj = '$mcj';
	   
	$formjs = "<!--Form Scripts --> 
<script type='text/javascript' src='http://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='NAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[2]='PHONE';ftypes[2]='text';fnames[3]='COMPANY';ftypes[3]='text';fnames[4]='SORUCE';ftypes[4]='text';fnames[5]='MSG';ftypes[5]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>"; 
$formjs .='<script type="text/javascript">';
$formjs .= "$(function() {
  $('form').submit(function(){
    $.post('http://hrneurope.us4.list-manage.com/subscribe/post?u=c03cb8f11b1f34771fdd1747c&amp;id=acc85bbd71', function() {
      window.location = 'http://loondon.hrtecheurope.com/thankyou';
    });
    return false;
  });
});
</script> ";

echo  $formjs; 
  }
?>





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
		$output = '';
		
		//New ala carte button
/*if(isset($_SESSION['admin'])) {
	#NewAlaCarte modal
	//------------------
					$output .= '<!-- NewAlaCarte Modal -->
<div class="modal fade" id="NewAlaCarte" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';

        
       $output .='<div class="ModalSponsorBioContainer">
	   <form class="SponsorModalEdit">';	
	   		 $output .='<label>Select a sponsor:<select class="AlaCarteSponsorsList" id="NewAlacarte_SponsorsSelect" name="NewAlacarte_SponsorsSelect">';
  		 $output .= $Sp->sponsors_list();
  		 $output .= ' 
    </select></label><br />';  	   
		$output.= '<label>Text:<input id="NewAlaCarteName" name="NewAlaCarteName" type="text"></label>';		  
        $output.= '<button id="NewAlaCarteSaveButton">Save</button>';
  $output .='</form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end new alacarte Modal --> ';
	echo $output; 
	//----------------------
}
 */
		
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
				
				if (isset($_SESSION['user_id'])) {
					$permitted = $Sp->sponsor_permission_check($sponsor[0], $_SESSION['user_id']);
					} else {
						$permitted = 0;
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
										$content[$i][14] = // alacarte connection id
			 
			 */
if ($sponsor[0] != -55 && $go == 1){	//if we already displayed the modal or the modal don't contain data then we don't print it out		 			
if(isset($_SESSION['admin']) && isset($_SESSION['sponsors_admin']) && (isset($_SESSION['super_admin']) || $permitted == 1 )) {
	/*
	-------------------------
	Admin, able to edit stuff!
	-------------------------
	*/
		
			 if ($sponsor[1] == '' ){
				 $sponsor[1] = 'Add a new URL';
			 }
				$output = '<!-- '.$sponsor[8].' Modal -->
<div class="modal fade" id="'.$sponsor[4].'" tabindex="-1" role="dialog" aria-labelledby="DownloadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
		
		
				 $output .= ' <form class="dropzone SponsorImageForm" name="SponsorImageForm" method="post" action="controllers/main.php" enctype="multipart/form-data">';
					 $output .='<input name="SponsorImageSecret" type="hidden" value="ThisIsASecret">';
					 $output .='<input name="SponsorImageModifyId" type="hidden" value="'.$sponsor[0].'">';
			  if (isset($sponsor[7])) {
		  $output .= '<div class="ModalSponsorPhoto" style="background-image:url(../img/sponsors/'.$sponsor[7].')"></div>';
	          } else {
				   $output .= '<div class="ModalSponsorPhoto" style="background-image:url(img/sponsors/drag_and_drop_220.png)"></div>';
			  }
           $output .='</form>';

       $output .='<div class="ModalSponsorBioContainer">';
	   
	   $output .='<div class="ResponseContainer" style="display:none"></div>';
	  
	   $output .='<form class="SponsorModalEdit">
	       <input id="'.$sponsor[4].'_SponsorId" style="display:none;" name="'.$sponsor[4].'_SponsorId" type="text" value="'.$sponsor[0].'">
		   <input id="'.$sponsor[4].'_SponsorNameId" style="display:none;" name="'.$sponsor[4].'_SponsorNameId" type="text" value="'.$sponsor[9].'">
		   
          <p id="'.$sponsor[4].'_Name" class="ClickClick ModalSponsorName">'.$sponsor[8].'</p>
		  <input class="ClickEdit" id="'.$sponsor[4].'_NameEdit" style="display:none;" name="'.$sponsor[4].'_NameEdit" type="text" value="'.$sponsor[8].'">

		  <p id="'.$sponsor[4].'_CompanyLink" class="ClickClick ModalSponsorCompanyLink">Visit Company Website <i class="fa fa-angle-double-right"></i></p>
		  <input class="ClickEdit" id="'.$sponsor[4].'_CompanyLinkEdit" style="display:none;" name="'.$sponsor[4].'_CompanyLinkEdit" type="text" value="'.$sponsor[1].'">
		  
          <div class="ModalDivider"></div>';
		  		  
		 $output .='<p><span data-socialsedit-sponsor="'.$sponsor[0].'" class="SocialLinkEdit"><i class="fa fa-comment fa-2x"></i>Social Links</span></p>';
		 
		 if (!isset($sponsor[3]) || $sponsor[3] == '' || $sponsor[3] == ' '){
			  $placeholder = 'Type the bio here';
		  } else {
			  $placeholder = "";
		  }
		
          $output .='<div id="'.$sponsor[4].'_Bio" class="ClickClick ModalSponsorBio RobotoText"> '.$placeholder.$sponsor[3].'</div>
		  <textarea class="ClickEdit" id="'.$sponsor[4].'_BioEdit" style="display:none;" name="'.$sponsor[4].'_BioEdit">'.$sponsor[3].'</textarea>';
		  if ($sponsor[13] == 1) {
			  $checked = 'checked = "checked"';
			  
		  } else {
			   $checked = '';
		  }
		  		  
		 
		 $output .='<br /><br /><label>Sponsor Type<select class="TypeClick" id="'.$sponsor[4].'_TypeSelect" name="SponsorTypes">';
  		 $output .= $Sp->sponsor_types($sponsor[2]);
  		 $output .= ' 
    </select></label><br />
	<label>Add sponsor to A La Carte <input class="Highlighted" id="'.$sponsor[4].'_Highlighted" name="Highlighted" type="checkbox" value="1" /></label><br />
    <div id="'.$sponsor[4].'_AlaCarteDiv" style="display: none;"></div>';     
  
  $output .='</form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end '.$sponsor[0].' Modal --> ';
 
 } else {	
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
		  $output .= '<div class="ModalSponsorPhoto" style="background-image:url(../img/sponsors/'.$sponsor[7].')"></div>';
	          } else {
				   $output .= '<div class="ModalSpeakerPhoto"></div>';
			  }
       
        
       $output .='<div class="ModalSponsorBioContainer">';
	   	   
	   $output .='<form class="SponsorModalEdit">
	      
          <p id="'.$sponsor[4].'_Name" class="ModalSponsorName">'.$sponsor[8].'</p>
		

		  <a id="'.$sponsor[4].'_CompanyLink" class="ModalSponsorCompanyLink" href="'.$sponsor[1].'">Visit Company Website <i class="fa fa-angle-double-right"></i></a>
		
          <div class="ModalDivider"></div>';		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				   if ($links[$s] != ''){
					   $url_raw = $Sp->social_link_decode($links[$s]);
					   
				    //$output .='<p class="SocialIcons"><a href="'.$links[$s].'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					$output .='<p id="'.$sponsor[4].'_'.$types.'" class="SocialIcons"><a href="'.$url_raw.'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
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
						
						 

 } //else ends
} //if sponsor[0] != -55

		echo $output; 
		 
	}//foreach content ends
		} //if isset content ends
?>
</body>
</html>