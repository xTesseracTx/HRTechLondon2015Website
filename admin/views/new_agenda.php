<?php 
   if (!isset($_SESSION['admin'])) {
	   
	   if(isset($_POST['userlogin']) && $_REQUEST['UserName'] && $_REQUEST['UserPassword']){
		   $auth = new siteauth();
		 $output = $auth->login($_REQUEST['UserName'], $_REQUEST['UserPassword']);
	   }
	   
	   		//Bejelentkezés
	if (!isset($output)) {
		$output = '';
	}
	
	$content = '
	<title>HR Tech Europe - London Admin</title>
	<!--Include Admin styles-->
	  <link href="css/admin_general.css" rel="stylesheet">
	  <link href="css/admin_login.css" rel="stylesheet">
	<!--Include Font Awesome -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
	
	<!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - London2015 | Log in</h1>
	  
	  <p class="WelcomeTexT">Welcome to the Administration page of the <br> HR Tech Europe - London Conference`s Website</p>
	<!--Form container-->
	 <div id="container">
	  
	  <form id="AdminLoginForm" method="post" name="login" enctype="multipart/form-data">';
	
		$content .= '<ul class="adatok">';		
			$content .= '<li><p>'.$output.'</p></li>';
			$content .= '<li><input class="AdminInputField" type="text" name="UserName" id="loginnev" placeholder="Username"></li>';
			$content .= '<li><input class="AdminInputField" type="password" name="UserPassword" id="password" placeholder="Password"></li>';
			$content .= '<li><button class="AdminSubmitButton" name="userlogin" type="Submit">Login</button></li>';
		
		$content .= '</ul>';
	
	$content .= '</form>
	
	   <!-- End of Form Container-->
	 </div>
	 
	<!--End of Main Wrapper-->
	</div>';
	

   } else {
	   
	   $new = new locations();
	   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
  <!-- css -->


<link href="css/admin_general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_index.css" />
<link rel="stylesheet" href="css/admin_new_agenda.css" />
<script type="text/javascript" src="js/admin_new_agenda.js"></script>
<script src="js/admin_general.js"></script> 

<!-- TinyMCE -->
<script type="text/javascript" src="vendor/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>

</head>
<body>

 <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - London2015 |<br /> Add New Agenda</h1>
	  
	        <div id="MenuIconContainer">';
	
  
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
  
  $content .='</div>
	  
	 
	<!--Form container-->
	 <div id="container">';
	 
	 if (isset($_SESSION['agenda_admin'])) {
	 
	     $content .='<form class= id="agenda" name="agenda" method="post" action="controllers/main.php" enctype="multipart/form-data"><br />
     <fieldset>
	    <legend>Basic</legend>
         <input class="AdminInputField" required="required" id="AgendaTitle" name="AgendaTitle" type="text" placeholder="Sesssion Title" /><br />
		 <div id="TimeTable">';
	
	  $content .='  <label>Start <select name="AgendaTimeStart">';
   $content .= $new->agenda_time_list();
   $content .= ' 
    </select></label>';
	
	  $content .='  <label>End<select name="AgendaTimeEnd">';
   $content .= $new->agenda_time_list();
   $content .= ' 
    </select></label><br />
	</div>
	  </fieldset>';
	
	
      $content .= '
	  <fieldset>
	    <legend>Stream</legend>
	<div id="BreakChkBox"><label>Break Session<input id="Highlighted" name="Highlighted" type="checkbox" value="1" /></label><br /><br /></div>
	<div id="ModeratorChkBox"><label>Moderator Session<input id="Moderator" name="Moderator" type="checkbox" value="1" /></label><br /><br /></div>
	<div id="AgendaIcon" style="display: none;">
	<label>Break Type<select name="Icons">';
   $content .= $new->get_icons();
   $content .= ' 
    </select></label><br /><br />
	</div>
    <label>Day <select id="Day" name="Day"> 
    <option value="1">Day 1</option>
    <option value="2">Day 2</option>
    </select></label><br /><br />
    
    <label>Stream <select id="Locations" name="Locations">';
   $content .= $new->get_locations(1);
   $content .= ' 
    </select></label>
	 </fieldset>
	  <fieldset>
	    <legend>Content</legend><br />
	
  <!--Normal, content upload section-->	
   <div id="SpeakersDiv">
   <div id="SessionAbstract"><label>Abstract<textarea name="Abstract" cols="25" rows="5"></textarea></label><br /><br /></div>';
   
   $content .='<input class="AdminInputField" id="SpeakerSearch" name="SpeakerSearch" type="text" placeholder="Search for Speakers" /><br />';
   
   $content .='	<select id="Alphabet" name="Alphabet[]" multiple size=10>';
  $content .= $new->alphabet();
     
   $content .='</select>';
   
   
   	$content .='<select id="SpeakersListHidden" style="display:none" name="SpeakersListHidden" multiple>';
  $content .= $new->get_speakers();
     
   $content .='</select>';
   
	$content .='<label>Speakers <select id="SpeakersList" name="SpeakersList" multiple>';
     
   $content .='</select></label>';
   
   	$content .='<label>Selected <select id="Speakers" name="Speakers[]" multiple>';
     
   $content .='</select></label>
   
   
   <p id="MultipleHelp">In order to select multiple speakers, please hold Ctrl and then click on the speakers</p>
   <p id="NewSpeaker" style="display:none">Can&#180;t find a speaker? You can upload one by pressing the new speaker button</p>
  
   </div>
   
   <a id="NewSpeakerLink" href="new_speakers" style="display:none"><div class="AdminSpeakerButton">New Speaker</div></a>
   
        
		
	   <!--Content upload section end-->
	   	   
   </fieldset>
    <input name="SelectedSpeakers" id="SelectedSpeakers" type="hidden" />
	<input name="AgendaTag" id="AgendaTag" type="hidden" />
    <input class="AdminSubmitButton" name="AgendaSubmit" type="submit" value="Save"/>
  </form>
  	   <!-- End of Form Container-->';
	   
	 } //if isset agenda_admin 
	 else {
		$content.="<h1 style='text-align:center'>You don't have permission to see this page! Naughty! ;)</h1>"; 
	 }
	 
	 
	$content .=' </div>
	 
	<!--End of Main Wrapper-->
	</div>
	
 
	<br /><br /><br />
  <form name="logoutform" id="LogoutForm" method="post" action="">
  <button name="logout">Logout</button>
  </form><br />';   
  	   
	   
   }

 if(isset($_POST['logout'])){
		   $auth = new siteauth();
		   $auth->logout();
	   }
	   

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>HR Tech Europe - New Agenda Item</title>
<?php
echo $content;

?> 
</body>
</html>
