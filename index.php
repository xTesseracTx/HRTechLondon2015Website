<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="description" content="HR Tech Europe is a 2 day conference and expo on the future of work, taking place in London on March 24th and 25th">
<meta name="keywords" content="HR Conference, HR event, HR Tech, HRN Europe">
<meta name="author" content="HRN Europe - The Pan European HR Network">
<meta name="designer" content="Designed by: Judit Bernat - juditbernat.mail@gmail.com ">
<meta name="developer" content="Developed by: TesseracT - bottyan.tamas@web-developer.hu">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>HR Tech Europe 2015 | The World's Fastest Growing HR Conference & Expo</title>

<!--	Include Foundation -->
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/foundation/foundation.orbit.js"></script>
<script src="js/vendor/modernizr.js"></script>
<!--Include Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!--Include Font Awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Favicon setting -->
<link rel="shortcut icon" href="favicon.ico">

<!-- RANDOM FADE JS JQUERY libraries -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Slick-master carousel CSS definitions -->
<link rel="stylesheet" type="text/css" href="vendor/slick-master/slick/slick.css" media="screen"/>

<!--	Include Navigation Menu CSS Definitions -->
<link rel="stylesheet" href="css/navmenu.css" />

<!--	Include Custom CSS Definitions -->
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/mainpage.css" />

<!-- Scroll to top JS -->
<script src="js/gotopscroll.js"></script>

<!--Sponsors-->
<link rel="stylesheet" href="css/sponsors_index.css" />

<!--Twitter-->
<link rel="stylesheet" href="css/twitter.css" />

<!-- Speakers-->
<link rel="stylesheet" href="css/mainpage/speakers-carousel.css" />

<!-- Testimonials -->
<link rel="stylesheet" href="css/mainpage/testimonials.css" />

<!--Numbers-->
<link rel="stylesheet" href="css/numbers.css" />
<script src="js/counter.js"></script>

<!-- Videos -->
<link rel="stylesheet" href="css/mainpage/videos.css" />
<script src="js/videos.js"></script>

<!-- Footer -->
<link rel="stylesheet" href="css/footer.css" />

<!-- SLICK-MASTER CAROUSEL -->
<script src="js/load.js"></script>

<!-- Google Map -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
<script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                  // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                 
                    zoom: 13,
					scrollwheel: false,                   
                    center: new google.maps.LatLng(51.508647, 0.029851), 

                    
                    styles: [	{		featureType:'water',		elementType:'all',		stylers:[			{hue:'#71d6ff'},			{saturation:100},			{lightness:-5},			{visibility:'on'}		]	},{		featureType:'poi',		elementType:'all',		stylers:[			{hue:'#ffffff'},			{saturation:-100},			{lightness:100},			{visibility:'off'}		]	},{		featureType:'transit',		elementType:'all',		stylers:[			{hue:'#ffffff'},			{saturation:0},			{lightness:100},			{visibility:'off'}		]	},{		featureType:'road.highway',		elementType:'geometry',		stylers:[			{hue:'#deecec'},			{saturation:-73},			{lightness:72},			{visibility:'on'}		]	},{		featureType:'road.highway',		elementType:'labels',		stylers:[			{hue:'#bababa'},			{saturation:-100},			{lightness:25},			{visibility:'on'}		]	},{		featureType:'landscape',		elementType:'geometry',		stylers:[			{hue:'#e3e3e3'},			{saturation:-100},			{lightness:0},			{visibility:'on'}		]	},{		featureType:'road',		elementType:'geometry',		stylers:[			{hue:'#ffffff'},			{saturation:-100},			{lightness:100},			{visibility:'simplified'}		]	},{		featureType:'administrative',		elementType:'labels',		stylers:[			{hue:'#59cfff'},			{saturation:100},			{lightness:34},			{visibility:'on'}		]	}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using out element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
             var image = 'img/gmap-marker.png';
  var myLatLng = new google.maps.LatLng(51.508647, 0.029851);
  var beachMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image,
	 
  });

  
marker.setMap(map);

google.maps.event.addListener(marker,'click',function() {
  map.setZoom(13);
  map.setCenter(marker.getPosition());
  });
}
			
        </script>

<!-- END Google Map -->

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

<!--- Platform Scanner -->
<script src="js/platform-scanner.js"></script>

<!--- Mobile Menu dropdown -->
<script src="js/mobile-menu-dropdown.js"></script>

</head>
<body onload="BrwoserDetect()">

<!-- Declare the Off Canvas Menu Wrapper -->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap"> 
    <!--END Declare the Off canvas menu Wrapper --> 
    <!--HEADER--> 
    <!--Desktop Navigation Menu-->
    <nav id="MainNavigationMenu">
      <div id="DesktopMenuContainer"> <a id="HeaderLogoLink" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'LogoHome']);" href="index"><img id="HRTechSmallLogo" alt="HR Tech Logo" src="img/hrtech-logo-small.png"></a> <a href="#" onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" class="ActiveNavmenuItem">Home</a>
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
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'MainPage']);" href="#" class="ActiveNavmenuItem MobileNavigationMenuItem">Home</a></li>
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
           <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', Blog']);" href="http://blog.hrtecheurope.com">Blog</a> </li>  
        <li> <a onClick="_gaq.push(['_trackEvent', 'Navigation', 'InternalForward', 'Contact']);" href="contact" >Get in Touch</a></li>
      </ul>
    </nav>
    
    <!-- END Mobile Navigation Menu-->
    
    <div id="VideoContainer">
      <video autoplay loop muted class="fullWidth">
        <source src="video/hrtech-bg.mp4" type="video/mp4"/>
        Your browser does not support the video tag. I suggest you upgrade your browser. </video>
      <div id="header-container"> <img id="header-hrtech-logo" src="img/hrtech-logo.png" alt="hrtech logo">
        <h1>UNLEASH YOUR PEOPLE!</h1>
        <h2>The Fastest Growing HR Event in the World</h2>
        <a target="_blank" onClick="_gaq.push(['_trackEvent', 'VideoHeader', 'InternalForward', 'Tickets']);" href="tickets">
        <div style="max-width:350px;" class="header-button" id="TicketsButton">Get Tickets</div>
        </a> <a href="#"  onClick="_gaq.push(['_trackEvent', 'VideoHeader', 'ModalOpen', 'DownloadPDF']);" data-reveal-id="DownloadPDFModal" >
        <div style="max-width:350px;" class="header-button" id="DownloadBrochureButton">Download Brochure</div>
        </a> </div>
    </div>
    
    <!--END HEADER-->
    <div class="colors-wrapper">
      <div class="columns colored-stripe red" ></div>
      <div class="columns colored-stripe yellow" ></div>
      <div class="columns colored-stripe green" ></div>
      <div class="columns colored-stripe blue" ></div>
    </div>
    <!-- TEASER -->
    <div class="row" >
      <div class="large-12 columns">
        <h1 class="teaser-headline">Europe’s Most Exciting Two Day Conference & Expo on the<br>
          Future of Work!</h1>
        <p id="teaser-text"> <strong>HR Tech Europe</strong> is Europe's most important event on how software, technology systems and collaborative tools are bringing about surmountable change in the way people and organizations work. Learn from the world’s most exciting leaders and disrupters on topics covering HR, technology, talent & recruitment, social enterprise, learning, mobile, trends, strategy and big data opportunities.</p>
      </div>
    </div>
    <!--END TEASER --> 
    
    <!-- SPEAKERS CAROUSEL SECTION -->
    <section id="SpeakersCarousel">
      <h2 id="SpeakersCarouselTitle" class="OswaldText">Speakers</h2>
      <div class="slick-master-carousel"> 
        <!-- SPEAKERS CAROUSEL -->
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/HinssenP.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">The Network Always Wins</p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">9:15AM - 10:00AM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Peter Hinssen</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">nexxworks</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/MarkidesC.jpg); background-size:contain;">
            <div class="KeynoteAbstract LongKeynoteAbstract RobotoText">
              <p class="KeynoteTitle">The New Future: The Digital Revolution - Its Implications on How We Work &amp; Compete</p>
              <p class="KeynoteDay">DAY 2</p>
              <p class="KeynoteTime">9:15AM - 10:00AM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Costas Markides</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">London Business School</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/BotsmanR.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">The Future of ‘Work’ in the Collaborative Economy</p>
              <p class="KeynoteDay">DAY 2</p>
              <p class="KeynoteTime">3:00PM - 3:45PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Rachel Botsman</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">Entrepreneur</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/SorzanoV.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">"I Did it" - A BBC Learning Project</p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">11:30AM - 12:00PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Victoria Sorzano</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">BBC</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/BeckerB.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">Making Recruiting Digital</p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">12:00PM - 12:30PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Barbara Becker</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">Barry Callebaut AG</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/AverbookJ.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">Preparing Your Organization Today for Tomorrow's World</p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">4:00PM - 4:45PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo" style="padding-bottom: 21px;"> <span class="KeynoteSpeakerName OswaldText">Jason Averbook</span><br>
            <span class="KeynoteSpeakerCompany RobotoText" style="font-size: 12px;">The Marcus Buckingham Company</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/TrostA.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">The Future of Performance Appraisal in an Agile Environment</p>
              <p class="KeynoteDay">DAY 2</p>
              <p class="KeynoteTime">10:00AM - 10:30AM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Armin Trost</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">HFU</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/HolleyN.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">CEO's Don't Care About HR!</p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">3:30PM - 4:00PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Nick Holley</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">Henley Business School</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/SempleE.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">Social Media in the Modern Workplace</p>
              <p class="KeynoteDay">DAY 2</p>
              <p class="KeynoteTime">11:30AM - 12:30PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Euan Semple</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">Euansemple.com</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/BryantL.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">Growing and Grafitng New Organisational Tissue – HR’s Role in Change</p>
              <p class="KeynoteDay">DAY 2</p>
              <p class="KeynoteTime">11:30AM - 12:00PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Lee Bryant</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">POST*SHIFT</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/GallopM.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">"I Did it" - A BBC Learning Project</p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">11:30AM - 12:00PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Matt Gallop</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">BBC</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/LeteneyF.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">Breaking Down Global Barriers</p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">12:00PM - 12:30PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Fiona Leteney</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">Bupa Business Services</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/SawyerJensonL.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">A Lean Approach to a Full HR Transformation</p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">12:00AM - 12:30AM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Lori Sawyer Jenson</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">Arlafoods</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/WilsonD.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle"></p>
              <p class="KeynoteDay"></p>
              <p class="KeynoteTime"></p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">David Wilson</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">Elearnity</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/ThomasP.jpg); background-size:contain;">
            <div class="KeynoteAbstract LongKeynoteAbstract RobotoText">
              <p class="KeynoteTitle">Is your organisation's Cultural Readiness Essential to ESN (Enterprise Social Network) success? </p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">12:00PM - 12:30PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Paul Thomas</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">Grant Thornton UK LLP</span> </div>
        </div>
        <div class="KeynoteSpeaker">
          <div class="KeynoteImage" style="background:url(img/speakers/HeinzJ.jpg); background-size:contain;">
            <div class="KeynoteAbstract RobotoText">
              <p class="KeynoteTitle">Building the Connected Company: The Story Thus Far</p>
              <p class="KeynoteDay">DAY 1</p>
              <p class="KeynoteTime">2:30PM - 3:00PM</p>
            </div>
          </div>
          <div class="KeynoteSpeakerInfo"> <span class="KeynoteSpeakerName OswaldText">Joachim Heinz</span><br>
            <span class="KeynoteSpeakerCompany RobotoText">Bosch GmbH</span> </div>
        </div>
      </div>
      <!-- END SPEAKERS CAROUSEL -->
      <div id="SpeakersCarouselButtonContainer" style="max-width:545px;"> <a  onClick="_gaq.push(['_trackEvent', 'GeneralButton', 'InternalForward', 'Speakers']);" href="speakers" class="RobotoText" >
        <div id="SpeakersButton" >VIEW ALL SPEAKERS</div>
        </a> <a  onClick="_gaq.push(['_trackEvent', 'GeneralButton', 'InternalForward', 'Agenda']);" href="agenda" class="RobotoText" >
        <div id="AgendaButton">VIEW AGENDA</div>
        </a> </div>
    </section>
    <!-- END SPEAKERS CAROUSEL SECTION --> 
    
    <!-- SPONSORS -->
    <div class="centered-text" style="width:100%;">
      <h2 id="SponsorsH2">Lead Sponsors</h2>
      <div id="titanium-sponsors"><a target="_blank" onClick="_gaq.push(['_trackEvent', 'Sponsors', 'ExternallForward', 'Oracle']);" href="https://www.oracle.com/applications/human-capital-management/index.html">
                <div class="titanium-sponsor grow" style="background:url(img/sponsors/o_humancapitalmanagement_cmyk.jpg); background-position:center; background-repeat:no-repeat; background-size:contain;"></div>
        </a>  <a target="_blank" onClick="_gaq.push(['_trackEvent', 'Sponsors', 'ExternalForward', 'WorkForce']);" href="http://www.workday.com/uk/">
        <div class="titanium-sponsor grow" style="background:url(img/200x200_logos_workday.png); background-position:center; background-repeat:no-repeat; background-size:contain;"></div>
        </a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'Sponsors', 'ExternallForward',  'IBM']);" href="http://www-01.ibm.com/software/smarterworkforce/">
        <div class="titanium-sponsor grow sponsor-picture" style="background:url(img/200x200_logos_ibm.png); background-repeat:no-repeat; background-position:center; background-size:contain;"></div>
        </a> <a target="_blank" onClick="_gaq.push(['_trackEvent', 'Sponsors', 'ExternalForward', 'Ceridian']);" href="http://www.ceridian.com/">
        <div class="titanium-sponsor grow" style="background:url(img/200x200_logos_ceridian.png); background-position:center; background-repeat:no-repeat; background-size:contain;"></div>
        </a>
        <a target="_blank" onClick="_gaq.push(['_trackEvent', 'Sponsors', 'ExternalForward', 'ServiceNow']);" href="https://www.servicenow.com/">
        <div class="titanium-sponsor grow" style="background:url(img/sponsors/servicenow_logo_web.png); background-position:center; background-repeat:no-repeat; background-size:contain;"></div>
        </a>
       
        </div>
        <a target="_blank" onClick="_gaq.push(['_trackEvent', 'Sponsors', 'InternalForward', 'ViewAllSponsorsButton']);" href="sponsors"><div id="SponsorsButton">VIEW ALL SPONSORS</div></a>
    </div>
    <!--END SPONSORS--> 
    
    <!--TWITTER-->
    <div id="twitter-container" >
      <h2 class="centered-text TwitterBoxHeader">Join Our Social Community</h2>
      <div id="twitter-main-container" >
        <div id="bird-text">
          <div id="TwitterIconContainer"><i class="fa fa-twitter" style="font-size:200px; color:#fff;"></i></div>
          <div id="TwitterFollowUsContainer">
            <p id="TwitterHashtagList" class="roboto-text"> The world of <a href="https://twitter.com/search?q=%23talent&src=typd" target="_blank">#talent,</a> <a href="https://twitter.com/search?q=%23learning&src=typd" target="_blank">#learning,</a><a href="https://twitter.com/search?q=%23technology&src=typd" target="_blank"> #technology</a> and thought <a href="https://twitter.com/search?q=%23leadership&src=typd" target="_blank"> #leadership</a> <a href="https://twitter.com/hrtecheurope/status/513974181604900866/photo/1" target="_blank">http://t.co/6Viu48FMW4</a> See you at <a href="https://twitter.com/search?q=%23HRTechEurope&src=typd" target="_blank"> #HRTechEurope</a> <br>
              <a href="https://twitter.com/hrtecheurope/status/513974181604900866/photo/1" target="_blank"> http://t.co/Qt1WsB7r4k</a> </p>
            <a onClick="_gaq.push(['_trackEvent', 'GeneralButton', 'ExternalForward', 'Twitter']);" href="https://twitter.com/hrtecheurope/" target="_blank" class="btn btn-md" id="twitterfollow-button">FOLLOW US</a> </div>
        </div>
        <div style="max-width:906px; width:100%; background:#07232d !important; display:flex; flex-direction:column; flex-wrap:no-wrap; ">
          <div id="twitter-tirangle"></div>
          <div style="background-color:#07232d !important; margin-bottom:25px;"> <a href="https://twitter.com/search?q=%23HRTechEurope&src=typd" target="_blank"  style="float:left; font-size:30px; font-family:'Oswald', sans-serif;">#hrtecheurope </a> </div>
          <!--The Twitter Plugin-->
          
          <div style="min-height:300px; background:#fff; border:4px solid #29a0c7;">
            <div style="width:100%; height:50px; background:#e5e5e5; padding:15px 25px 0 25px;"> <span class="roboto-text" style="font-size:24px; float:left;">Tweets</span> <span style="font-size:24px; float:right;"><i class="icon icon-twitter"></i></span> </div>
            <a class="twitter-timeline"  height="300"  data-chrome="noheader nofooter noborders tansparent" data-dnt="true" href="https://twitter.com/hashtag/hrtecheurope" data-widget-id="461485618808102913">#hrtecheurope Tweets</a> 
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script> 
            
            <!--END The Twitter Plugin--> 
            
          </div>
        </div>
      </div>
    </div>
    
    <!--END TWITTER --> 
    
    <!--Numbers Section --> 
    <a id="numbers"></a>
    <div class="full-width center" id="numbers-container" style="margin:0 auto; text-align:center;">
      <div class="stat-container center counters">
        <div id="numberTwo" class="stat-element"> <strong style="color:#fc354c;">0<sup style="top:-30px; font-size:64px; color:#8fbe00;"></sup></strong><strong style="color:#fc354c;" class="stat-element timer" data-to="2" data-speed="1000">0</strong>
          <label style="position:relative; left:10px;">Exciting Days</label>
        </div>
        <div class="stat-element"> <strong><sup style="top:-30px; font-size:64px; color:#8fbe00;">+</sup></strong><strong style="color:#8fbe00;" class="stat-element timer" data-to="65" data-speed="1000">0</strong>
          <label style="position:relative; left:10px;">Speakers</label>
        </div>
        <div class="stat-element"> <strong style="color:#29a0c7;">0<sup style="top:-30px; font-size:64px; color:#29a0c7;"></sup></strong><strong style="color:#29a0c7;" class="stat-element timer" data-to="8" data-speed="1000">0</strong>
          <label style="left:10px;">Labs</label>
        </div>
        <div class="stat-element" id="twentymillion"> <strong><sup style="top:-30px; font-size:64px; color:#ff8e2d;">+</sup></strong><strong style="color:#ff8e2d;" class="stat-element timer" data-to="20" data-speed="1000">0</strong><strong><sup style="top:-30px; font-size:64px; color:#ff8e2d;">m</sup></strong>
          <label>People Influenced</label>
        </div>
      </div>
    </div>
    <!--END Numbers Section --> 
    
    <!-- VIDEOS -->
    <link rel="stylesheet" href="css/mainpage/videos.css" />
    <div id="VideoSliderContainer">
      <h1 id="VideoSliderHeader" class="OswaldText">Videos</h1>
      <div id="VideoSlider"> 
        <!-- SLIDE1 -->
        <div class="VideoSlide" id="Slide1"> <a onClick="_gaq.push(['_trackEvent', 'Videos', 'ExternalForward',  'HRTechEuropeTeaser']);" href="http://www.youtube.com/embed/HaD35IlYOpE?rel=0" target="_blank"> 
          
          <!-- slide1 video1 -->
          <div class="VideoImage" id="VideoImage1">
            <div class="VideoImageOverlay">
              <h1> HR Tech Europe Teaser </h1>
              <p><strong>HR Tech Europe 2013 </strong> hosted +1500 Attendees from over 42 Countries around the World with influence over 20 million employees! Optimise, Enable &amp; Unleash Your People!</p>
            </div>
          </div>
          </a> 
          <!-- end slide1 video1 --> 
          
          <!-- double video container -->
          <div class="DoubleVideoContainer"> 
            <!-- slide1 video2 --> 
            <a onClick="_gaq.push(['_trackEvent', 'Videos', 'ExternalForward',  'CustomerInsights']);" href="http://www.youtube.com/embed/WWTaP1AXucA?rel=0" target="_blank">
            <div class="VideoImage" id="VideoImage2">
              <div class="VideoImageOverlay">
                <h1 class="VideoSmallTitle"> Customer Insights </h1>
                <p class="VideoSmallText">Brian Bowden, Director of HR Transformation at Aer Lingus, discusses HR strategy and predictive data. </p>
              </div>
            </div>
            </a> 
            <!-- end slide1 video2 --> 
            
            <!-- slide1 video3 --> 
            <a onClick="_gaq.push(['_trackEvent', 'Videos', 'ExternalForward',  ' HRTechEurope2012']);" href="http://www.youtube.com/embed/kjnHAsaQJEk?rel=0" target="_blank">
            <div class="VideoImage" id="VideoImage3">
              <div class="VideoImageOverlay">
                <h1 class="VideoSmallTitle"> HR Tech Europe 2012 </h1>
                <p class="VideoSmallText">HR Tech Europe 2012 hosted +800 Attendees from over 30 Countries around the World with influence over 13 million employees!</p>
              </div>
            </div>
            </a> 
            <!-- end slide1 video3 --> 
          </div>
          <!-- end double video container --> 
          <!-- slide1 video4 --> 
          <a onClick="_gaq.push(['_trackEvent', 'Videos', 'ExternalForward',  ' InterviewWithDanPink']);" href="http://www.youtube.com/embed/cFcLQxTfMD8?rel=0" target="_blank">
          <div class="VideoImage" id="VideoImage4">
            <div class="VideoImageOverlay">
              <h1>Interview with Dan Pink</h1>
              <p>Dan Pink talks talent, sales, publishing and more with William Tincup.</p>
            </div>
          </div>
          </a> 
          <!-- end slide1 video4 --> 
        </div>
        <!-- end SLIDE1 --> 
        
        <!-- navigation buttons -->
        <div id="VideoRightArrowContainer"> <img id="NextArrow" src="img/mainpage/video/right-arrow.png" alt="Next" onclick="moveLeft()"> </div>
        <div id="VideoLeftArrowContainer"> <img id="PrevArrow" src="img/mainpage/video/left-arrow.png" alt="Previous" onclick="moveRight()"> </div>
        <!-- end navigation buttons --> 
        
        <!-- SLIDE2 -->
        <div class="VideoSlide" id="Slide2"> 
          
          <!-- double video container -->
          <div  class="DoubleVideoContainer"> 
            <!-- video1 --> 
            <a onClick="_gaq.push(['_trackEvent', 'Videos', 'ExternalForward',  ' iRecruit2013']);" href="http://www.youtube.com/embed/tJnOGXSBBSw?rel=0" target="_blank">
            <div class="VideoImage" id="VideoImage5">
              <div class="VideoImageOverlay">
                <h1 class="VideoSmallTitle"> iRecruit 2013 </h1>
                <p class="VideoSmallText"> A review of the iRecruit Expo from Deloitte, Oracle, ABN AMRO, and other attendees.</p>
              </div>
            </div>
            </a> 
            <!-- end video1 --> 
            <a onClick="_gaq.push(['_trackEvent', 'Videos', 'ExternalForward',  'iRecruitScenes']);" href="http://www.youtube.com/embed/dGlIEHuH6SA?rel=0" target="_blank">
            <div class="VideoImage" id="VideoImage6">
              <div class="VideoImageOverlay">
                <h1 class="VideoSmallTitle"> iRecruit Scenes </h1>
                <p class="VideoSmallText">Scenes from the iRecruit World Congress</p>
              </div>
            </div>
            </a> </div>
          <!-- end double video container --> 
          <!-- slide2 video3 --> 
          <a onClick="_gaq.push(['_trackEvent', 'Videos', 'ExternalForward',  'iRecruitCongress']);" href="http://www.youtube.com/embed/m5v2NP0xCEQ?rel=0" target="_blank">
          <div class="VideoImage" id="VideoImage7">
            <div class="VideoImageOverlay">
              <h1> iRecruit Congress </h1>
              <p>The iRecruit Expo will be part of HR Tech Europe in 2015. Here's what Siemens, SmartRecruiters, Random House and other attendees thought of the event.</p>
            </div>
          </div>
          </a> 
          <!-- end slide2 video3 --> 
          <!-- slide2 video4 --> 
          <a onClick="_gaq.push(['_trackEvent', 'Videos', 'ExternalForward',  'HRTechEuropeSnapshot']);" href="http://www.youtube.com/embed/WvpbDfMxDzs?rel=0" target="_blank">
          <div class="VideoImage" id="VideoImage8">
            <div class="VideoImageOverlay">
              <h1> HR Tech Europe Snapshot </h1>
              <p>Your Opportunity to meet the Who’s Who in HR! The facts, data, ideas, subjects, issues, trends, statistics, questions – 2 Days, A few roofs and bundles of fun!</p>
            </div>
          </div>
          </a> 
          <!-- end slide2 video4 --> 
        </div>
        <!-- end SLIDE2 --> 
        
      </div>
      <!-- END VideoSlider --> 
    </div>
    <!-- END VideoSliderContainer --> 
    <!-- END VIDEOS --> 
    
    <!--TESTIMONIAL -->
    <div id="testimonial-container">
      <div id="testimonial-inner-container"> 
        <!-- TESTIMONIALS  -->
        <ul data-orbit>
          <li data-orbit-slide="1"> <img src="img/choma.png" alt="" class="TestimonialChomaImg">
            <p>"HR Tech Europe is a fantastic event
              and we made a lot of great contacts.
              Looking forward to London!"</p>
            <div class="testimonial-logo"><img class="text-center" src="img/mainpage/xerox-logo.png" alt="Xerox"> </div>
          </li>
          <li data-orbit-slide="2"> <img src="img/choma.png" alt="" class="TestimonialChomaImg">
            <p>"HR Tech Europe in my eyes is the best conference
              in the HR space globally!"</p>
            <div class="testimonial-logo"><img class="text-center" src="img/mainpage/Time_Warner-logo.png"  alt="TimeWarner"> </div>
          </li>
          <li data-orbit-slide="3"> <img src="img/choma.png" alt="" class="TestimonialChomaImg">
            <p>"HR Tech Europe has grown in less than 3 years. My 
              expectations were delivered and surpassed. Looking 
              forward to 2015!"</p>
            <div class="testimonial-logo"><img class="text-center" src="img/mainpage/kps-logo.png"  alt="KPN"> </div>
          </li>
          <li data-orbit-slide="4"> <img src="img/choma.png" alt="" class="TestimonialChomaImg">
            <p>"In the 2 years that we attended
              we are really becoming fans."</p>
            <div class="testimonial-logo"><img class="text-center" src="img/mainpage/sligro-food-group-logo.png"  alt="Sligro Food Group"> </div>
          </li>
        </ul>
      </div>
    </div>
    <!--END TESTIMONIAL --> 
    <!-- VENUE -->
    <div id="VenueContainer">
      <h1>Venue</h1>
      <p>ExCeL London is an exhibitions and international convention centre in the London Borough of Newham. It is located on a 100-acre site on the northern quay of the Royal Victoria Dock in London Docklands, between Canary Wharf and London City Airport.</p>
    </div>
    
    <!-- END VENUE --> 
    <!-- MAP -->
    
    <div id="map"></div>
    <a id="mapicon" onClick="_gaq.push(['_trackEvent', 'VenueMap', 'ExternalForward',  'GoogleMap']);" target="_blank" href="https://www.google.hu/maps/place/ExCeL+London/@51.5099891,0.0362672,16z/data=!3m1!5s0x47d8a8716fa1509d:0x342201ee325a678c!4m2!3m1!1s0x47d8a80ce609e50d:0xa0de5f705d7aec7?hl=en">
    <div class="roboto-text GoogleButton"> VIEW IN GOOGLE MAPS <i class="fa fa-angle-right" style="position: relative; left: 5px;"></i> </div>
    </a> 
    <!-- END MAP --> 
    
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
            <p id="GeneralEnquiries"><i class="fa fa-phone"></i>+36 1 201 1469<br>
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
    <a class="exit-off-canvas"></a> 
    
    <!-- GO TOP SCROLL --> 
    <a href="#" class="GoTopButton smoothScroll"><img id="GoTopImg" src="img/gotop/gotop.png" alt="Go top"></a> 
    <!-- END GO TOP SCROLL --> 
    
    <!--END INNER-WRAPER--> 
  </div>
</div>

<!-- Download PDF modal -->
<div id="DownloadPDFModal" class="reveal-modal" data-reveal> <a class="close-reveal-modal">&#215;</a>
  <h2>Download Brochure</h2>
  <p>Thank you for downloading our brochure! Please fill in all the fields below.</p>
  <!-- BEGINING of : DOWNLOAD PDF BROCHURE FORM -->
  <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
    <input type=hidden name="oid" value="00DD0000000nwgk">
    <input type=hidden name="retURL" value="http://london.hrtecheurope.com/PDF/2015_HR_Tech_London_Delegates.pdf">
    <div class="row">
      <div class="large-6 column">
        <input required placeholder="First Name *"  id="first_name" maxlength="40" name="first_name" size="20" type="text" />
      </div>
      <div class="large-6 column">
        <input required placeholder="Last Name *" id="last_name" maxlength="80" name="last_name" size="20" type="text" />
      </div>
    </div>
    <div class="row">
      <div class="large-12 column">
        <input required placeholder="Email Address *" id="email" maxlength="80" name="email" size="20" type="text" />
        <input required placeholder="Phone Number *" id="phone" maxlength="40" name="phone" size="20" type="text" />
        <input required placeholder="Company *" id="company" maxlength="40" name="company" size="20" type="text" />
        <input required placeholder="Job Title *" id="title" maxlength="40" name="title" size="20" type="text" />
        <select  style="display:none;"   id="lead_source" name="lead_source" placeholder="Lead Source">
          <option selected="selected" value="HRTechLondon2015-PDFDownload">HRTechLondon2015-PDFDownload</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="large-12 column">
        <input onClick="_gaq.push(['_trackEvent', 'DownloadPDFForm ', 'FromSubmission', 'InquirySent']);" class="submitbutton" type="submit" name="submit" value="Send">
      </div>
    </div>
  </form>
  <!-- END of : DOWNLOAD PDF BROCHURE FORM -->
</div>
<!-- End Download PDF modal --> 

<!--Foundation Scripts --> 
<script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation({
        orbit: {
          timer_speed: 4000,
		  animation: 'fade',
		  bullets: true,
		  variable_height: false,
		  navigation_arrows: true,
		  next_class: 'TestimonialsNext', // Class name given to the next button
		  prev_class: 'TestimonialsPrev', // Class name given to the previous button
          next_on_click: false
        }
        });
</script> 
<!--End Foundation Scripts -->  

<!-- SLICK-MASTER CAROUSEL JAVASCRIPT --> 
<script type="text/javascript" src="vendor/slick-master/slick/slick.min.js"></script> 
<!-- END SLICK-MASTER CAROUSEL JAVASCRIPT -->  

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
