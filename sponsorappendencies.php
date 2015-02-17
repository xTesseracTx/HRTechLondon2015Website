<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu, Benedek Nagy - trialshock@gmail.com">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sponsor Corner | HR Tech Eurpe</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/vendor/modernizr.js"></script>
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>

<!-- Favicon setting -->
<link rel="shortcut icon" href="favicon.ico">

<!--Include Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,400,700' rel='stylesheet' type='text/css'>

<!-- Include Tooltipster -->
<link rel="stylesheet" type="text/css" href="vendor/tooltipster/css/tooltipster.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
<script type="text/javascript" src="vendor/tooltipster/js/jquery.tooltipster.min.js"></script>

<!--Include Font Awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!--	Include Navigation Menu CSS Definitions -->
<link rel="stylesheet" href="css/navmenu.css" />

<!--	Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/sponsor-appendencies.css" />

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

<!--Calendar show/hide-->
<script type="text/javascript">
   $(document).ready(function() {
			$("#FebruaryButton").addClass('ActiveMonth');			
			$( "#FebruaryButton" ).click(function() {
				$("#FebruaryCalendar").fadeIn('fast');
				$("#MarchCalendar").fadeOut('fast');
				$("#FebruaryButton").addClass('ActiveMonth');
				$("#MarchButton").removeClass('ActiveMonth');
			});
			$( "#MarchButton" ).click(function() {
				$("#FebruaryCalendar").fadeOut('fast');
				$("#MarchCalendar").fadeIn('fast');
				$("#MarchButton").addClass('ActiveMonth');
				$("#FebruaryButton").removeClass('ActiveMonth');
			});			
        });
</script>
<!-- Alert message on mobile screens -->
<script type="text/javascript">
  $(document).ready(function() {
			if ( (screen.width < 640)  ) { 
    			alert("This website have not yet been optimized to mobile view. Please use a laptop or desktop computer to visit this page in order to avoid malfunctioning behaviour.");
    		} 
           	});			
</script>
<!-- Tooltipster Configurations -->
<script type="text/javascript">
  $(document).ready(function() {
			 $('.tooltipster').tooltipster({
				arrow: true,
				maxWidth: 500,
				offsetY: -40,
				contentAsHTML: true
				}); 
			});
      		
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
        <span class="DesktopMenuDropdown ActiveNavmenuItem" ><a href="sponsors">Partners</a>
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
    
    <div class="ImageHeader">
      <h1>Sponsor Appendencies</h1>
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
      
      <!-- Downloads -->
      <div id="DownloadsContainer">
        <div id="DownloadAllContainer">
          <div id="Downloads">
            <h1><i class="fa fa-cloud-download"></i> Download Links</h1>
            <ol>
              <a href="sponsor-appendencies/01_HR_Tech_Europe_Contact_List.pdf" target="_blank">
              <li>HR Tech Europe Contact List</li>
              </a> <a href="sponsor-appendencies/02_Frequently_Asked_Questions.pdf" target="_blank">
              <li>Frequently Asked Questions</li>
              </a> <a href="sponsor-appendencies/03_Whats_On.pdf" target="_blank">
              <li>What's On</li>
              </a> <a href="sponsor-appendencies/04_Furniture_Brochure_2015_Interactive.pdf" target="_blank">
              <li>Furniture brochure 2015 Interactive</li>
              </a> <a href="sponsor-appendencies/05_Furniture_Order_Form.pdf" target="_blank">
              <li>Furniture Order Form</li>
              </a> <a href="sponsor-appendencies/06_Electrical_Order_Form.pdf" target="_blank">
              <li>Electrical Order Form</li>
              </a> <a href="sponsor-appendencies/07_GES_Payment_Authorisation_Form.pdf" target="_blank">
              <li>GES Payment Authorisation Form</li>
              </a> <a href="sponsor-appendencies/08_GES_Shipping_Label.pdf" target="_blank">
              <li>GES Shipping Label</li>
              </a> <a href="sponsor-appendencies/09_Sponsors_Video_Interview_Guide.pdf" target="_blank">
              <li>Sponsors' Video Interview Guide</li>
              </a> <a href="sponsor-appendencies/10_Case_Study_Interview_Sample.pdf" target="_blank">
              <li>Case Study Interview Sample</li>
              </a> <a href="sponsor-appendencies/11_Case_Study_Oracle.pdf" target="_blank">
              <li>Case Study Oracle</li>
              </a> <a href="sponsor-appendencies/12_Giveaway_Ideas.pdf" target="_blank">
              <li>Giveaway Ideas</li>
              </a> <a href="sponsor-appendencies/13_HR_Tech_Europe_Badge_Scanners.pdf" target="_blank">
              <li>HR Tech Europe Badge Scanners</li>
              </a>
            </ol>
          </div>
          <a href="sponsor-appendencies/HR_Tech_Europe_2015_London_Sponsor_Appendencies.zip" target="_blank">
          <div id="DownloadAllButton"> <i class="fa fa-download"></i> Download all </div>
          </a> </div>
        <div id="Recommendations">
          <h1>Compulsory</h1>
          <p>Please make sure you fill out and send back these forms. The furniture / electricity order form must be sent back directly to GES on the following address:<br>
            GES ServiCentre<br>
            customerservice@ges.com +44 2476 380 180</p>
          <ul id="Compulsory">
            <li>Furniture Brochure</li>
            <li>Furniture Order Form</li>
            <li>Electricity Order Form</li>
            <li>GES Payment Authorization Form</li>
            <li>What’s On? What’s New? Form</li>
          </ul>
          <h1>Recommended</h1>
          <p>Please read all documents carefully as they contain useful information about the event.</p>
          <ul>
            <li>HR Tech Europe Contact List</li>
            <li>GES Shipping Label</li>
            <li>Floor Plan</li>
            <li>HR Tech Europe Badge Scanners</li>
          </ul>
          <h1>Extra</h1>
          <p>Please see the frequently asked questions and some examples of previous case studies, etc.</p>
          <ul>
            <li>FAQ</li>
            <li>Sponsors Video Interview Guide</li>
            <li>Case Study Interview Sample</li>
            <li>Case Study Example</li>
            <li>Giveaway Ideas</li>
          </ul>
        </div>
      </div>
      <!-- end Downloads --> 
      
      <!-- Deadlines -->
      <div id="DeadlinesContainer">
        <h1>Deadlines</h1>
        <!-- Promotional items -->
        <table>
          <thead>
            <tr>
              <td>Promotional items</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="ItemDeadline">Immediate submission</td>
              <td class="ItemDescription" colspan="3">Logos, urls, company profile, Speaker Nomination (for Diamond & Titanium)</td>
            </tr>
            <tr>
              <td class="ItemDeadline">18 February</td>
              <td class="ItemDescription" colspan="3">Adverts (for Diamond, Titanium, Platinum)</td>
            </tr>
            <tr>
              <td class="ItemDeadline">18 February</td>
              <td class="ItemDescription" colspan="3">Client Interview (for Diamond & Titanium)</td>
            </tr>
          </tbody>
        </table>
        <!-- end Promotional items --> 
        <!-- Stand & Supplies -->
        <table>
          <thead>
            <tr>
              <td>Stand & Supplies</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="ItemDeadline">23 February</td>
              <td class="ItemDescription" colspan="3">Order badge scanners (optional) £115 / device / 2 days</td>
            </tr>
            <tr>
              <td class="ItemDeadline">23 February</td>
              <td class="ItemDescription" colspan="3">Stand picture / Design submitted</td>
            </tr>
            <tr>
              <td class="ItemDeadline">23 February</td>
              <td class="ItemDescription" colspan="3">Electricity ordered</td>
            </tr>
            <tr>
              <td class="ItemDeadline">3 March</td>
              <td class="ItemDescription" colspan="3">Internet / Stand furniture ordered (optional)</td>
            </tr>
            <tr>
              <td class="ItemDeadline">9 March</td>
              <td class="ItemDescription" colspan="3">Registration deadline for all conference passes</td>
            </tr>
            <tr>
              <td class="ItemDeadline">23 March</td>
              <td class="ItemDescription" colspan="3">Set-up (11 am – 7 pm)</td>
            </tr>
          </tbody>
        </table>
        <!-- end Stand & Supplies --> 
        <!-- Shipment -->
        <table>
          <thead>
            <tr>
              <td>Shipment</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="ItemDeadline">16 March</td>
              <td class="ItemDescription" colspan="3">All conference bag materials (bag, pen, notepad, etc.) must arrive</td>
            </tr>
            <tr>
              <td class="ItemDeadline">20 March</td>
              <td class="ItemDescription" colspan="3">All shipments arrive</td>
            </tr>
          </tbody>
        </table>
        <!-- end Shipment --> 
      </div>
      <!-- end Deadlines --> 
      
      <!-- Calendar -->
      <div id="CalendarContainer">
        <h1><span id="FebruaryButton">February 2015</span>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;<span id="MarchButton">March 2015</span></h1>
        <!-- February 2015 -->
        <table class="Calendar" id="FebruaryCalendar">
          <thead>
            <tr>
              <td>Monday</td>
              <td>Tuesday</td>
              <td>Wednesday</td>
              <td>Thursday</td>
              <td>Friday</td>
              <td>Saturday</td>
              <td>Sunday</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="NotDayOfTheMonth">26</td>
              <td class="NotDayOfTheMonth">27</td>
              <td class="NotDayOfTheMonth">28</td>
              <td class="NotDayOfTheMonth">29</td>
              <td class="NotDayOfTheMonth">30</td>
              <td class="NotDayOfTheMonth">31</td>
              <td>1</td>
            </tr>
            <tr>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td>8</td>
            </tr>
            <tr>
              <td>9</td>
              <td>10</td>
              <td>11</td>
              <td>12</td>
              <td>13</td>
              <td>14</td>
              <td>15</td>
            </tr>
            <tr>
              <td>16</td>
              <td>17</td>
              <td class="HighlightedDay tooltipster" title='<i class="fa fa-check"></i> Adverts (for Diamond, Titanium, Platinum) <br> <i class="fa fa-check"></i> Client Interview (for Diamond & Titanium)'>18</td>
              <td>19</td>
              <td>20</td>
              <td>21</td>
              <td>22</td>
            </tr>
            <tr>
              <td class="HighlightedDay tooltipster" title='<i class="fa fa-check"></i> Order badge scanners (optional) £115 / device / 2 days <br> <i class="fa fa-check"></i> Stand picture / Design submitted <br> <i class="fa fa-check"></i> Electricity ordered'>23</td>
              <td>24</td>
              <td>25</td>
              <td>26</td>
              <td>27</td>
              <td>28</td>
              <td class="NotDayOfTheMonth">1 March</td>
            </tr>
          </tbody>
        </table>
        <!-- end February 2015 --> 
        <!-- March 2015 -->
        <table class="Calendar" id="MarchCalendar">
          <thead>
            <tr>
              <td>Monday</td>
              <td>Tuesday</td>
              <td>Wednesday</td>
              <td>Thursday</td>
              <td>Friday</td>
              <td>Saturday</td>
              <td>Sunday</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="NotDayOfTheMonth">23</td>
              <td class="NotDayOfTheMonth">24</td>
              <td class="NotDayOfTheMonth">25</td>
              <td class="NotDayOfTheMonth">26</td>
              <td class="NotDayOfTheMonth">27</td>
              <td class="NotDayOfTheMonth">28</td>
              <td>1</td>
            </tr>
            <tr>
              <td>2</td>
              <td class="HighlightedDay tooltipster" title='<i class="fa fa-check"></i> Internet / Stand furniture ordered (optional)'>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td>8</td>
            </tr>
            <tr>
              <td class="HighlightedDay tooltipster" title='<i class="fa fa-check"></i> Registration deadline for all conference passes'>9</td>
              <td>10</td>
              <td>11</td>
              <td>12</td>
              <td>13</td>
              <td>14</td>
              <td>15</td>
            </tr>
            <tr>
              <td class="HighlightedDay tooltipster" title='<i class="fa fa-check"></i> All conference bag materials (bag, pen, notepad, etc.) must arrive'>16</td>
              <td>17</td>
              <td>18</td>
              <td>19</td>
              <td class="HighlightedDay tooltipster" title='<i class="fa fa-check"></i> All shipments arrive'>20</td>
              <td>21</td>
              <td>22</td>
            </tr>
            <tr>
              <td class="HighlightedDay tooltipster" title='<i class="fa fa-check"></i> Set-up (11 am – 7 pm)'>23</td>
              <td>24</td>
              <td>25</td>
              <td>26</td>
              <td>27</td>
              <td>28</td>
              <td>29</td>
            </tr>
            <tr>
              <td>30</td>
              <td>31</td>
              <td class="NotDayOfTheMonth">1 April</td>
              <td class="NotDayOfTheMonth">2</td>
              <td class="NotDayOfTheMonth">3</td>
              <td class="NotDayOfTheMonth">4</td>
              <td class="NotDayOfTheMonth">5</td>
            </tr>
          </tbody>
        </table>
        <!-- end March 2015 --> 
      </div>
      <!-- end Calendar --> 
      
    </div>
    <!--END MAIN CONTENT--> 
    
    <!-- Contact -->
    <div id="ContactMembersContainer" class="OswaldText">
      <div class="ContactMember">
        <div > <img src="cnt/img/McCannV.jpg" alt="Victoria McCann picture"></div>
        <p class="ContactPosition" id="GreenTitle">Chief Operations Officer</p>
        <p>Viktoria McCann</p>
        <p class="ContactPhoneNumber">+36 70 331 3431 </p>
      </div>
      <div class="ContactMember">
        <div > <img src="cnt/img/BoszB.jpg" alt="Brigi Bősz picture"></div>
        <p class="ContactPosition" id="RedTitle">Operations Manager</p>
        <p>Brigi Bősz</p>
        <p class="ContactPhoneNumber">+36 30 550 7059</p>
      </div>
      <div class="ContactMember">
        <div ><img src="cnt/img/CsaderK.jpg" alt="Kata Csáder picture"></div>
        <p class="ContactPosition" id="OrangeTitle">Operations Coordinator</p>
        <p>Kata Csáder</p>
        <p class="ContactPhoneNumber">+36 70 200 8075</p>
      </div>
      <div class="ContactMember">
        <div > <img src="cnt/img/FialaD.jpg" alt="Daniel Fiala picture"></div>
        <p class="ContactPosition" id="BlueTitle">Operations Coordinator</p>
        <p>Daniel Fiala</p>
        <p class="ContactPhoneNumber">+36 30 365 1129</p>
      </div>
    </div>
    <!-- end Contact --> 
    
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
