<?php 
   $loc = new locations();
   $agenda = new agenda_main();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="author" content="HRN Europe">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Tech Europe 2014 | Europe's #1 Conference on the Future of HR</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/foundation/foundation.orbit.js"></script>
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
<link rel="stylesheet" href="css/agenda.css" />

<!-- Footer -->
<link rel="stylesheet" href="css/footer.css" />

<!-- TESTIMONIALS FADE-IN FADE-OUT -->
<script src="js/testimonials-fadein-fadeout.js"></script>

<!-- Agenda collapsible panels js -->
<script src="js/agenda-collapsible-panels.js"></script>

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>
<!-- Smooth scroll JS -->
<script src="js/smoothscroll.js"></script>

<!-- Agenda Navigation -->
<script src="js/agenda-navigation.js"></script>
<!-- Agenda Navigation -->


<!--- Mobile Menu dropdown -->
<script src="js/mobile-menu-dropdown.js"></script>



<?php 
  if(isset($_SESSION['admin']) && isset($_SESSION['agenda_admin'])) {
	echo '<!-- This needs jquery ui-->
<script src="js/admin_agenda.js"></script>  
<script src="js/admin_general.js"></script> 
<link rel="stylesheet" href="css/admin_edit_general.css" />'; 
  }
?>



<style type="text/css">
#HeaderGetTicketsButton {
	padding-top: 9px;
	top: 2px;
}
</style>
</head>
<body>

<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
  
  
    
  <?php 
  if(isset($_SESSION['admin']) && isset($_SESSION['agenda_admin'])) {
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
  
  $content .='</div></nav>';
  
  echo $content;
	  
  } else {
	echo '<!--Desktop Navigation Menu-->
    <nav id="MainNavigationMenu">
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" href="index.php"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="index.php" >Home</a>
        <div class="NavmenuDivider"></div>
        <a href="speakers">Speakers</a>
        <div class="NavmenuDivider"></div>
        <a class="ActiveNavmenuItem" href="agenda">Agenda</a>
        <div class="NavmenuDivider"></div>
        <a href="contact">Get in Touch</a> </div>
      <div id="DesktopSocialHeader"> <a target="_blank" href="https://www.facebook.com/hrtecheu"><img src="img/header-facebook.png"></a> <a target="_blank" href="https://twitter.com/hrtecheurope"> <img src="img/header-twitter.png"></a> <a target="_blank" href="http://www.linkedin.com/groups/HR-Technology-Europe-Human-Resources-3930182/about"><img src="img/header-linkedin.png"></a> <a target="_blank" href="https://www.flickr.com/photos/hrtecheurope/sets/72157648919068765/"><img src="img/header-flickr.png"></a> <a target="_blank"  href="http://www.slideshare.net/hrtecheurope"> <img src="img/header-slideshare.png"></a> <a href="tickets">
        <div id="HeaderGetTicketsButton">GET TICKETS</div>
        </a> </div>
    </nav>';  
	  
  }
?>
  
  
 
  
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--Desktop Navigation Menu-->

    
    <!--END DESKTOP Navigation Menu--> 
        <!-- Mobile Navigation Menu-->
    <div id="MobileNavigation"> <img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-mobile-logo.png"> <a onClick="$('html, body').animate({scrollTop: 0}, 700);" role="button" class="right-off-canvas-toggle smoothScroll"><i class="fa fa-bars"></i></a> </div>
    <nav id="RightsideMobileNavigation" class="right-off-canvas-menu">
      <ul>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="index">Home</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" href="tickets" >Tickets</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" href="speakers">Speakers</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" class="ActiveNavmenuItem MobileNavigationMenuItem" href="agenda" >Agenda</a></li>
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

    
    <!-- Header -->
   <header>
    <div class="ImageHeader" style="background:url(img/agenda-header-image.jpg);">
      <h1>Agenda</h1>
      <p>More than 65 of the world's leading CEOs, disrupters and talent leaders on everything HR.</p>
    </div>
    <div class="colors-wrapper">
      <div class="columns colored-stripe red" ></div>
      <div class="columns colored-stripe yellow" ></div>
      <div class="columns colored-stripe green" ></div>
      <div class="columns colored-stripe blue" ></div>
    </div>
    <!-- END Header --> 
  </header>
  
      <?php 
  if(isset($_SESSION['admin']) && isset($_SESSION['agenda_admin'])) {
	echo '<a href="new_agenda">
        <div class="AdminNavigateButton">New Agenda</div>
        </a>'; 
  }
?>
   
  <!--MAIN CONTENT --> 
  <!-- AGENDA -->
  <section id="Agenda">
    <div id="AgendaNavigation">
      <div id="AgendaTitle" class="OswaldText BlueText">Agenda</div>
      <div>
        <select id='day-selector'>
          <option value="0">Day 1 &amp; Day 2 </option>
          <option value="1">Day 1</option>
          <option value="2">Day 2</option>
        </select>
	<select id='hour-selector'>
	  <option value="0">Whole Day</option>
          <option value="1">7:00AM - 8:00AM</option>
          <option value="2">8:00AM - 9:00AM</option>
          <option value="3">9:00AM - 10:00AM</option>
	  <option value="4">10:00AM - 11:00AM</option>
	  <option value="5">11:00AM - 12:00PM</option>
	  <option value="6">12:00PM - 1:00PM</option>
	  <option value="7">1:00PM - 2:00PM</option>
	  <option value="8">2:00PM - 3:00PM</option>
	  <option value="9">3:00PM - 4:00PM</option>
	  <option value="10">4:00PM - 5:00PM</option>
        </select>	
        <select id='session-selector'>
          <option value="0">All Sessions </option>
        <?php  
		  $sessions = $loc->get_locations_menu();
		  echo $sessions;
		?>
        </select>
      </div>
    </div>
    <div id="Day1MainContainer">
      <div class="DayTextContainer Day1Border OswaldText">
        <div class="DayNumberText BlueText">24</div>
        <div class="DayNameText BlueText">Tuesday<br>
          <span class="DayMonthText">March</div>
      </div>
      <!--MAIN STAGE DAY1-->
      <div class="MainStage">
        <h4 class="StageName OswaldText"><a name="day1-mainstage"></a>Main Stage</h4>
        <?php  
		
		   $content = $agenda->agenda(1,1);
			echo $content;
		?>
     </div>
      <!-- END MAINSTAGE DAY1 --> 
      <!-- HR Shared Services & Payroll DAY1-->
      <div class="HRShare">
        <h4 class="StageName OswaldText"><a name="day1-hr-shared-services-and-payroll"></a><img class="StageImage" src="img/agenda/hrsharedservices.png">HR Shared Services &amp; Payroll Day 1</h4>
                <?php  
		
		   $content = $agenda->agenda(1,2);
			echo $content;
		?>
		</div>
        
      <!-- END HR Shared Services & Payroll DAY1 -->
      <!-- Future of Workforce Learning DAY1-->
      <div class="FutureOfWork">
        <h4 class="StageName OswaldText"><a name="day1-future-of-workforce-learning"></a><img class="StageImage" src="img/agenda/futureofwork.png">Future of Workforce Learning</h4>
                <?php  
		
		   $content = $agenda->agenda(1,3);
			echo $content;
		?>
		</div>
      <!-- END Future of Workforce Learning DAY1 --> 
      <!-- HR Technology  DAY1-->
      <div class="HRTech">
        <h4 class="StageName OswaldText"><a name="day1-hr-technology"></a><img class="StageImage" src="img/agenda/hrtechnology.png">HR Technology</h4>
                <?php  
		
		   $content = $agenda->agenda(1,4);
			echo $content;
		?>
       </div>
      <!-- END HR Technology DAY1 --> 
      <!-- Talent & Recruitment Technology DAY1-->
      <div class="TalentAndRecruitment">
        <h4 class="StageName OswaldText"><a name="day1-talent-and-recruitment-technology"></a><img class="StageImage" src="img/agenda/talenttechnology.png">Talent & Recruitment Technology</h4>
        <!-- Registration &amp; Networking -->
                <?php  
		
		   $content = $agenda->agenda(1,8);
			echo $content;
		?>
      </div>
      <!-- END Talent & Recruitment Technology DAY1 --> 
      <!-- Social Collaboration DAY1-->
      <div class="SocialCollaboration">
        <h4 class="StageName OswaldText"><a name="day1-social-collaboration"></a><img class="StageImage" src="img/agenda/socialcollaboration.png">Social Collaboration</h4>
                <?php  
		
		   $content = $agenda->agenda(1,9);
			echo $content;
		?>
   </div>
      <!-- END Social Collaboration DAY1 --> 
      <!-- Labs & Executive Briefings DAY1-->
      <div class="Labs">
        <h4 class="StageName OswaldText"><a name="day1-labs-and-executive-briefings"></a><img class="StageImage" src="img/agenda/labs.png">Labs &amp; Executive Briefings</h4>
                <?php  
		
		   $content = $agenda->agenda(1,10);
			echo $content;
		?>
      </div>
      <!-- END Social Collaboration DAY1 --> 
      <!-- Round Table DAY1-->
      <div class="RoundTable">
        <h4 class="StageName OswaldText"><a name="day1-round-table"></a><img class="StageImage" src="img/agenda/roundtable.png">Round Table</h4>
                <?php  
		
		   $content = $agenda->agenda(1,11);
			echo $content;
		?>
  </div>
      <!-- END Round Table DAY1 --> 
      
         <!-- User Adoption DAY1 -->
      <div class="UserAdoption">
        <h4 class="StageName OswaldText"><a name="day1-user-adoption"></a><img class="StageImage" src="img/agenda/useradoption.png">User Adoption</h4>
                <?php  
		
		   $content = $agenda->agenda(1,12);
			echo $content;
		?>
    </div>
      <!-- END User Adoption DAY1 --> 
      <!-- Product Demo DAY1 -->
      <div class="ProductDemo">
        <h4 class="StageName OswaldText"><a name="day1-product-demo"></a><img class="StageImage" src="img/agenda/productdemo.png">Product Demo</h4>
                <?php  
		
		   $content = $agenda->agenda(1,13);
			echo $content;
		?>
    </div>
      <!-- END Product Demo DAY1 --> 
      <!-- No Event DAY1 -->
      <div class="day1-no-event">
        <div class="Session"> There are no events today in this session. </div>
      </div>
      <!--END No Event DAY1 --> 
    </div>
    <!-- END DAY 1 --> 
    <!-- DAY 2 -->
    <div id="Day2MainContainer">
      <div class="DayTextContainer Day2Border OswaldText">
        <div class="DayNumberText RedText">25</div>
        <div class="DayNameText RedText">Wednesday<br>
          <span class="DayMonthText">March</div>
      </div>
      <!--MAIN STAGE DAY2-->
      <div class="MainStage">
        <h4 class="StageName  OswaldText"><a name="day2-mainstage"></a>Main Stage</h4>
                <?php  
		
		   $content = $agenda->agenda(2,1);
			echo $content;
		?>
   </div>
      <!-- END MAINSTAGE DAY2 --> 
      <!-- Compensation & Benefits DAY2 -->
      <div class="Compensation">
        <h4 class="StageName OswaldText"><a name="day2-compensation-and-benefits"></a><img class="StageImage" src="img/agenda/compensation.png">Payroll &amp; Rewards</h4>
                <?php  
		
		   $content = $agenda->agenda(2,5);
			echo $content;
		?>
     </div>
      <!-- END Compensation & Benefits DAY2 --> 
      <!-- Cloud Technology DAY2 -->
      <div class="CloudTech">
        <h4 class="StageName OswaldText"><a name="day2-cloud-technology"></a><img class="StageImage" src="img/agenda/cloudtechnology.png">Cloud Technology</h4>
                <?php  
		
		   $content = $agenda->agenda(2,6);
			echo $content;
		?>
       </div>
      <!-- END Cloud Technology DAY2 --> 
      <!-- HR Analytics & Reporting DAY2 -->
      <div class="HRAnalytics">
        <h4 class="StageName OswaldText"><a name="day2-hr-analytics-and-reporting"></a><img class="StageImage" src="img/agenda/hranalytics.png">HR Analytics &amp; Reporting</h4>
                <?php  
		
		   $content = $agenda->agenda(2,7);
			echo $content;
		?>
      </div>
      <!-- END HR Analytics & Reporting DAY2 -->
      
      <!-- Talent & Recruitment Technology DAY2 -->
      <div class="TalentAndRecruitment">
        <h4 class="StageName TalentAndRecruitmentColor OswaldText"><a name="day2-talent-and-recruitment-technology"></a><img class="StageImage" src="img/agenda/talenttechnology.png">Talent &amp; Recruitment Technology</h4>
                <?php  
		
		   $content = $agenda->agenda(2,8);
			echo $content;
		?>
      </div>
      <!-- END Talent & Recruitment Technology DAY2 -->
      
      <!-- Social Collaboration DAY2 -->
      <div class="SocialCollaboration">
        <h4 class="StageName OswaldText"><a name="day2-social-collaboration"></a><img class="StageImage" src="img/agenda/socialcollaboration.png">Social Collaboration</h4>
                <?php  
		
		   $content = $agenda->agenda(2,9);
			echo $content;
		?>
     </div>
      <!-- END Labs & Executive Briefings DAY2 --> 
	        <!-- Labs & Executive Briefings DAY1-->
      <div class="Labs">
        <h4 class="StageName OswaldText"><a name="day2-labs-and-executive-briefings"></a><img class="StageImage" src="img/agenda/labs.png">Labs &amp; Executive Briefings</h4>
                <?php  
		
		   $content = $agenda->agenda(2,10);
			echo $content;
		?>
      </div>
      <!-- END Social Collaboration DAY1 --> 
	  
      <!-- Round Table DAY2 -->
      <div class="RoundTable">
        <h4 class="StageName OswaldText"><a name="day2-round-table"></a><img class="StageImage" src="img/agenda/roundtable.png">Round Table</h4>
                <?php  
		
		   $content = $agenda->agenda(2,11);
			echo $content;
		?>
    </div>
      <!-- END Round Table DAY2 --> 
      
       <!-- User Adoption DAY2
      <div class="UserAdoption">
        <h4 class="StageName OswaldText"><a name="day2-user-adoption"></a><img class="StageImage" src="img/agenda/useradoption.png">User Adoption</h4> -->
                <?php  
		
		  // $content = $agenda->agenda(2,12);
			//echo $content;
		?>
    <!--</div>-->
      <!-- END User Adoption DAY2 --> 
      <!-- No Event DAY2 -->
      <div class="day2-no-event">
        <div class="Session"> There are no events today in this session. </div>
      </div>
      <!--END No Event DAY2 --> 
    </div>
    <!-- END DAY 2 --> 
    
  </section>
  <!-- END AGENDA --> 
  
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
  <a class="exit-off-canvas"></a>
  
<!-- GO TOP SCROLL --> 
<a href="#" class="GoTopButton smoothScroll"><img id="GoTopImg" src="img/gotop/gotop.png" alt="Go top"></a> 
<!-- END GO TOP SCROLL -->

</div>
</div>

</div>

<!--Foundation Scripts --> 
<script src="js/vendor/jquery.js"></script> 
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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 

<!-- Agenda Navigation --> 
<script src="js/agenda-navigation.js"></script>


<!-- Start of Async HubSpot Analytics Code -->

<!-- End of Async HubSpot Analytics Code -->

<!-- MODAL OPEN FROM EXTERNAL LINK --> 
<script type="text/javascript">
 $(document).ready(function() {
  if(window.location.href.indexOf('#HinssenP') != -1) {
    $('#HinssenP').modal('show');
  }
});
</script> 
<!-- END MODAL OPEN FROM EXTERNAL LINK --> 

	  

</body>
</html>
