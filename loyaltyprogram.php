<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu, Benedek Nagy - trialshock@gmail.com">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Loyalty Program | HR Tech Europe</title>

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
<link rel="stylesheet" href="css/loyaltyprogram.css" />

<!-- Footer -->
<link rel="stylesheet" href="css/footer.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!--- Platform Scanner -->
<script src="js/platform-scanner.js"></script>

<!--- Mobile Menu dropdown -->
<script src="js/mobile-menu-dropdown.js"></script>

<!-- Mobile pricing tables collapse -->
<script type="text/javascript">
function openDiamondMobileContent(){
	/* Show and hide the down and up arrows depending on the visibility of the Diamond/Platinum/Gold pricing table details */
	if($("#DiamondMobileContent").is(":visible")){
		$("#DiamondDown").css("display", "inline-block");
		$("#DiamondUp").css("display", "none");
	}else {
		$("#DiamondDown").css("display", "none");
		$("#DiamondUp").css("display", "inline-block");
		$("#DiamondColumn").css("border-bottom", "none");
	}
	$("#DiamondMobileContent").slideToggle("slow"); 
	/*$("#PlatinumMobileContent, #GoldMobileContent").slideUp("slow"); Uncomment this line to collapse the other two pricing table */	
};
</script>
<script type="text/javascript">
function openPlatinumMobileContent(){
	if($("#PlatinumMobileContent").is(":visible")){
		$("#PlatinumDown").css("display", "inline-block");
		$("#PlatinumUp").css("display", "none");
	}else {
		$("#PlatinumDown").css("display", "none");
		$("#PlatinumUp").css("display", "inline-block");
	}	
	$("#PlatinumMobileContent").slideToggle("slow");
	/*$("#DiamondMobileContent, #GoldMobileContent").slideUp("slow");*/
};
</script>
<script type="text/javascript">
function openGoldMobileContent(){
	if($("#GoldMobileContent").is(":visible")){
		$("#GoldDown").css("display", "inline-block");
		$("#GoldUp").css("display", "none");
	}else {
		$("#GoldDown").css("display", "none");
		$("#GoldUp").css("display", "inline-block");
	}	
	$("#GoldMobileContent").slideToggle("slow");
	/*$("#DiamondMobileContent, #PlatinumMobileContent").slideUp("slow");*/
};
</script>
<!-- end Mobile pricing tables collapse -->

<!-- Toggle the FAQ answers -->
<script type="text/javascript">
	function toggleAnswer(questionID){
		if ( (screen.width < 760)  ) { 
			answerID = questionID.slice(8);
			$("#Answer" + answerID).slideToggle();
		}
	};
</script>

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
<body onload="BrwoserDetect()">
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
        <span class="DesktopMenuDropdown ActiveNavmenuItem"><a href="venue">Expo</a>
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
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="index">Home</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Tickets']);" href="tickets" >Tickets</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Speakers']);" href="speakers">Speakers</a></li>
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Agenda']);" href="agenda" >Agenda</a></li>
                  <li id="ExpoMobileGroup" class="ActiveNavmenuItem MobileNavigationMenuItem">Expo <i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></li>
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
    <!--END HEADER--> 
    
<!--MAIN CONTENT -->
<div id="MainContent"> 
    
<!-- Intro -->
<div id="IntroContainer">
	<div id="IntroInnerContainer">
    	<h1 id="IntroHeadline">HRN Europe Loyalty Program</h1>
        <h2 id="IntroSubHeadline">Save thousands of euros and gain exclusive benefits at our London and Paris events</h2>
        <p>Attend with colleagues and benefit from an exclusive corporate membership and VIP Loyalty program. Group and team attendance is the choice increasingly made by many organizations attending our congresses: </p>
        <div id="BenefitsContainer">
            <ul id="Benefits">
                <li>Senior executives are able to gain the maximum benefit from unparalleled networking opportunities with industry counterparts, thought leaders and solution providers.</li>
                <li>It guarantees that all the conference sessions of interest are attended and nothing gets missed out.</li>
                <li>The entire team gains a deeper understanding of vendor solutions, and can give collective and qualified feedback both onsite and post event.</li>
                <li>Ticket allocations may be used at either the London or Paris event, or split between the two events.</li>
                <li>The HRN Loyalty gives you and your colleagues significant cost savings while gaining exclusive member privileges.</li>
            </ul>
        </div>
    </div>
</div>
<!-- END Intro -->
<!-- Desktop Prices -->
<div class="Prices" id="DesktopPrices">
	<div id="DescriptionColumn">
    	<h3>Interested in Joining?</h3>
        <p><span>CALL</span><br>
        +44 20 34 689 689</p>
        
        <p id="DescEmail"><span>EMAIL</span> <br>
        loyalty@hrneurope.com</p> 
        
        <ul id="DescriptionList">
        	<li>Fast Track Registration</li>
            <a href="#FAQ3"><li>Key Account Manager <i class="fa fa-question-circle"></i></li></a>
            <a href="#FAQ4"><li>Quarterly HR Research Papers <i class="fa fa-question-circle"></i></li></a>
            <a href="#FAQ5"><li>Exclusive Main-Stage Seating <i class="fa fa-question-circle"></i></li></a>
            <a href="#FAQ6"><li class="DoubleLine">Dedicated Meeting and Networking Areas <i class="fa fa-question-circle"></i></li></a>
            <a href="#FAQ7"><li class="DoubleLine">Meet keynote speakers in the VIP lounge <i class="fa fa-question-circle"></i></li></a>
            <li class="DoubleLine" style="padding-top: 10px !important;">Priorty meetings & demos with exhibitors</li>
            <a href="#FAQ8"><li style="padding-top: 10px !important; padding-bottom: 20px !important;">Branding opportunities <i class="fa fa-question-circle"></i></li></a>
            <a href="#FAQ9"><li class="DoubleLine">Tickets to the HR Tech World Party, Paris <i class="fa fa-question-circle"></i></li></a>
        </ul>     
    </div>
    <!-- Diamond Desktop -->
	<div class="PriceColumn">
    	<h4 class="DiamondHeader">Diamond</h4>
        <div class="Ticket">
            <i class="fa fa-ticket"></i><br>
            20 Tickets
        </div>
        <div class="PriceOff">
        	<h5>£16,600</h5>
            <span>Original price: £23,800</span>
        </div>
        <div class="Save">
        	<span>save 30%</span>
            <h5>£7,200</h5>
        </div>
        <div class="CheckList">
        	<ul>
            	<li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li>3</li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li>20</li>
            </ul>
        </div>
    </div>
    <!-- END Diamond Desktop -->
    <!-- Platinum Desktop -->
	<div class="PriceColumn">
    	<h4 class="PlatinumHeader">Platinum</h4>
        <div class="Ticket">
            <i class="fa fa-ticket"></i><br>
            14 Tickets
        </div>
        <div class="PriceOff">
        	<h5>£12,450</h5>
            <span>Original price: £16,600</span>
        </div>
        <div class="Save">
        	<span>save 25%</span>
            <h5>£4,150</h5>
        </div>
        <div class="CheckList">
        	<ul>
            	<li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li>2</li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li>14</li>
            </ul>
        </div>
    </div>
    <!-- END Platinum Desktop-->
    <!-- Gold Desktop -->
	<div class="PriceColumn">
    	<h4 class="GoldHeader">Gold</h4>
        <div class="Ticket">
            <i class="fa fa-ticket"></i><br>
            8 Tickets
        </div>
        <div class="PriceOff">
        	<h5>£7,400</h5>
            <span>Original price: £9,250</span>
        </div>
        <div class="Save">
        	<span>save 20%</span>
            <h5>£1,850</h5>
        </div>
        <div class="CheckList">
        	<ul>
            	<li><i class="fa fa-times-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-times-circle"></i></li>
                <li><i class="fa fa-times-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li>1</li>
                <li><i class="fa fa-check-circle"></i></li>
                <li><i class="fa fa-check-circle"></i></li>
                <li>8</li>
            </ul>
        </div>
    </div>
    <!-- END Gold Desktop -->            
</div>
<!-- END Desktop Prices -->
<!-- Mobile Prices -->
<div class="Prices" id="MobilePrices">
    <!-- Diamond Mobile -->
	<div class="PriceColumn">
    	<h4 class="DiamondHeader" onClick="openDiamondMobileContent()">Diamond<i class="fa fa-angle-down" id="DiamondDown"></i><i class="fa fa-angle-up" id="DiamondUp"></i></h4>
        	<div id="DiamondMobileContent">
                <div class="Ticket">
                    <i class="fa fa-ticket"></i><br>
                    20 Tickets
                </div>
                <div class="PriceOff">
                    <h5>£16,600</h5>
                    <span>Original price: £23,800</span>
                </div>
                <div class="Save">
                    <span>save 30%</span>
                    <h5>£7,200</h5>
                </div>
                <div class="CheckList">
                    <ul>
                        <li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Fast Track Registration</span></li>
                        <a href="#FAQ3"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Key Account Manager <i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ4"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Quarterly HR Research Papers <i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ5"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Exclusive Main-Stage Seating <i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ6"><li class="MobileListItemDoubleLine">
                            <i class="fa fa-check-circle"></i> 
                            <div>Dedicated Meeting and Networking Areas <i class="fa fa-question-circle"></i></div>
                        </li></a>
                        <a href="#FAQ7"><li><span class="MobileListItem">Meet <span>3</span> keynote speakers in the VIP lounge <i class="fa fa-question-circle"></i></span></li></a>
                        <li class="MobileListItemDoubleLine">
                            <i class="fa fa-check-circle"></i> 
                            <div>Priorty meetings & demos with exhibitors</div>
                        </li>
                        <a href="#FAQ8"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Branding opportunities <i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ9"><li class="WorldParty">
                            <span class="WorldPartyTickets">20</span>
                            <div> Tickets to the <br>HR Tech World Party <i class="fa fa-question-circle"></i></div>
                        </li></a>
                    </ul>
                </div>
              </div>
                
    </div>
    <!-- END Diamond Mobile -->
    <!-- Platinum Mobile -->
	<div class="PriceColumn">
        <h4 class="PlatinumHeader" onClick="openPlatinumMobileContent()">Platinum<i class="fa fa-angle-down" id="PlatinumDown"></i><i class="fa fa-angle-up" id="PlatinumUp"></i></h4>
             <div id="PlatinumMobileContent">
                <div class="Ticket">
                    <i class="fa fa-ticket"></i><br>
                    14 Tickets
                </div>
                <div class="PriceOff">
                    <h5>£12,450</h5>
                    <span>Original price: £16,600</span>
                </div>
                <div class="Save">
                    <span>save 25%</span>
                    <h5>£4,150</h5>
                </div>
                <div class="CheckList">
                    <ul>
                        <li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Fast Track Registration</span></li>
                        <a href="#FAQ3"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Key Account Manager <i class="fa fa-question-circle" title="Tooltip"></i></span></li></a>
                        <a href="#FAQ4"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Quarterly HR Research Papers <i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ5"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Exclusive Main-Stage Seating <i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ6"><li class="MobileListItemDoubleLine">
                            <i class="fa fa-check-circle"></i> 
                            <div>Dedicated Meeting and Networking Areas <i class="fa fa-question-circle"></i></div>
                        </li></a>
                        <a href="#FAQ7"><li><span class="MobileListItem">Meet <span>2</span> keynote speakers in the VIP lounge <i class="fa fa-question-circle"></i></span></li></a>
                        <li class="MobileListItemDoubleLine">
                            <i class="fa fa-check-circle"></i> 
                            <div>Priorty meetings & demos with exhibitors</div>
                        </li>
                        <a href="#FAQ8"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Branding opportunities <i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ9"><li class="WorldParty">
                            <span class="WorldPartyTickets">14</span>
                            <div> Tickets to the <br>HR Tech World Party <i class="fa fa-question-circle"></i></div>
                        </li></a>
                    </ul>
                </div>
            </div>
    </div>
    <!-- END Platinum Mobile -->
    <!-- Gold Mobile -->
	<div class="PriceColumn">
    	<h4 class="GoldHeader" onClick="openGoldMobileContent()">Gold<i class="fa fa-angle-down" id="GoldDown"></i><i class="fa fa-angle-up" id="GoldUp"></i></h4>
	        <div id="GoldMobileContent">
                <div class="Ticket">
                    <i class="fa fa-ticket"></i><br>
                    8 Tickets
                </div>
                <div class="PriceOff">
                    <h5>£7,400</h5>
                    <span>Original price: £9,250</span>
                </div>
                <div class="Save">
                    <span>save 20%</span>
                    <h5>£1,850</h5>
                </div>
                <div class="CheckList">
                    <ul>
                        <li><i class="fa fa-times-circle"></i> <span class="MobileListItem">Fast Track Registration</span></li>
                        <a href="#FAQ1"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Key Account Manager<i class="fa fa-question-circle" title="Tooltip"></i></span></li></a>
                        <a href="#FAQ2"><li><i class="fa fa-times-circle"></i> <span class="MobileListItem">Quarterly HR Research Papers<i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ3"><li><i class="fa fa-times-circle"></i> <span class="MobileListItem">Exclusive Main-Stage Seating<i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ4"><li class="MobileListItemDoubleLine">
                            <i class="fa fa-check-circle"></i> 
                            <div>Dedicated Meeting and Networking Areas <i class="fa fa-question-circle"></i></div>
                        </li></a>
                        <a href="#FAQ7"><li><span class="MobileListItem">Meet <span>1</span> keynote speakers in the VIP lounge <i class="fa fa-question-circle"></i></span></li></a>
                        <li class="MobileListItemDoubleLine">
                            <i class="fa fa-check-circle"></i> 
                            <div>Priorty meetings & demos with exhibitors</div>
                        </li>
                        <a href="#FAQ8"><li><i class="fa fa-check-circle"></i> <span class="MobileListItem">Branding opportunities <i class="fa fa-question-circle"></i></span></li></a>
                        <a href="#FAQ9"><li class="WorldParty">
                            <span class="WorldPartyTickets">8</span>
                            <div> Tickets to the <br>HR Tech World Party <i class="fa fa-question-circle"></i></div>
                        </li></a>
                    </ul>
                </div>
           </div>
    </div>
    <!-- END Gold Mobile -->            
</div>
<!-- END Mobile Prices -->
<!-- FAQ -->
<section id="FAQContainer">
	<h1>FAQ</h1>
    <h2>All you need to know about our Loyalty Program.</h2>
    
    <h6 id="Question1" class="Question" onClick="toggleAnswer(this.id)">1. For which events are my tickets valid?</h6><a name="FAQ1"></a>
    <p id="Answer1" class="Answer">Tickets are valid for our 2015 events, HR Tech Europe in London (March 24th and 25) and the HR Tech World Congress in Paris (October 27rd and 28th).</p>
    
    <h6 id="Question2" class="Question" onClick="toggleAnswer(this.id)">2. Do I need to use my tickets evenly between the London and Paris events?</h6><a id="FAQ2"></a>
    <p id="Answer2" class="Answer">No. You can allocate your tickets between the two events as you wish.</p>
    
    <h6 id="Question3" class="Question" onClick="toggleAnswer(this.id)">3. What is my account manager responsible for?</h6><a  id="FAQ3"></a>
    <p id="Answer3" class="Answer">Your account manager is responsible for ensuring you and your team can make the most of your event experience.(keep the rest of the sentence).</p>
    
    <h6 id="Question4" class="Question" onClick="toggleAnswer(this.id)">4. What kind of research will I receive if I am a gold or diamond member?</h6><a id="FAQ4"></a>
    <p id="Answer4" class="Answer">Every quarter you will receive high-level research on the current state of HR technology. Reports contain exhaustive information on the HR technology landscape, and measure trends and perceived impact on HR.</p>
    
    <h6 id="Question5" class="Question" onClick="toggleAnswer(this.id)">5. Where is the main-stage VIP seating located?</h6><a id="FAQ5"></a>
    <p id="Answer5" class="Answer">Please contact your account manager to discuss your preferred seating options.</p>
    
    <h6 id="Question6" class="Question" onClick="toggleAnswer(this.id)">6. What are the exclusive meeting and networking areas?</h6><a id="FAQ6"></a>
    <p id="Answer6" class="Answer">Gold and diamond members have access to private meeting and networking spaces, away from the commotion of the rest of the conference for a quieter sit down with clients, team members or potential partners. Organized networking opportunities will be available during the breaks and scheduled in 2 weeks before the event date.</p>
    
    <h6 id="Question7" class="Question" onClick="toggleAnswer(this.id)">7. Can I meet with any of the keynotes taking part in the events?</h6><a id="FAQ7"></a>
    <p id="Answer7" class="Answer">We make every effort to bring together loyalty scheme members with their preferred keynotes, subject to speaker schedules and availability.</p>
    
    <h6 id="Question8" class="Question" onClick="toggleAnswer(this.id)">8. What are my branding opportunities?</h6><a id="FAQ8"></a>
    <p id="Answer8" class="Answer">Please contact your account manager to discuss relevant branding opportunities.</p>
    
    <h6 id="Question9" class="Question" onClick="toggleAnswer(this.id)">9. What is the HR Tech World Party?</h6><a id="FAQ9"></a>
    <p id="Answer9" class="Answer">The HR Tech World Party is being held in Paris on October 27th, shortly after the end of the conference's first day. It's a chance to relax and network with thousands of your colleagues and counterparts in a more informal setting.</p>                        
    
</section>
<!-- END FAQ -->

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

<!-- Named anchor Hashtag script -->
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
