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
  
  <!-- Dropzone -->
<script src="js/admin_dropzone.js"></script>

<link href="css/admin_general.css" rel="stylesheet">
<link href="css/general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_index.css" />

<script src="js/admin_new_mediapartner.js"></script>
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
	  <h1 class="WrapperMainH1">HR Tech Europe - London2015 | Add New Media partner</h1>
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

	if (isset($_SESSION['mediapartners_admin'])) {
		
	     $content .='<form id="mediapartners" name="mediapartners" method="post" action="controllers/main.php" enctype="multipart/form-data">
    <div>
  <script src="js/admin_dropzone_mediapartners.js"></script>
  
    <fieldset>
	<legend>Basic</legend>
	 <input class="AdminInputField" required="required" name="Mediapartner" id="MediapartnerName" type="text" placeholder="Name" /><br />
	 <input class="AdminInputField" id="MediapartnerURL" name="MediapartnerURL" type="text" placeholder="Company Website" /><br />
	 <textarea id="MediapartnerBio" name="MediapartnerBio" cols="" rows="" placeholder="Bio"></textarea><br />
	</fieldset>
	
     <fieldset>
	<legend>Social</legend>
    <input class="AdminInputField" id="MediapartnerTwitter" name="MediapartnerTwitter" type="text" placeholder="Twitter"/><br />
    <input class="AdminInputField" id="MediapartnerFacebook" name="MediapartnerFacebook" type="text" placeholder="Facebook" /><br />
    <input class="AdminInputField" id="MediapartnerLinkedin" name="MediapartnerLinkedin" type="text" placeholder="Linkedin"/><br />
    <input class="AdminInputField" id="MediapartnerFlickr" name="MediapartnerFlickr" type="text" placeholder="Flickr"/><br />
    <input class="AdminInputField" id="MediapartnerGoogle" name="MediapartnerGoogle" type="text" placeholder="Google+"/><br />
	</fieldset>
   <input name="MediapartnerTag" id="MediapartnerTag" type="hidden" />
   
     <fieldset style="display:none">
	<legend>Category</legend>
	<select id="MediapartnerTypes" style="display:none" name="MediapartnerTypes">';
   $content .= $new->get_mediapartner_types();
   $content .= ' 
    </select><br /><br />
	<label>Is it A La Carte? <input id="Highlighted" name="Highlighted" type="checkbox" value="1" /></label><br />
    <div id="AlaCarteDiv" style="display: none;"></div>
	<p id="mediapartner_up_warning">You must upload a picture to be able to save the mediapartner!</p>
	  <input name="MediapartnerAlaCarteData" id="MediapartnerAlaCarteData" type="hidden" />
	</fieldset>
	
    <fieldset>
	 <legend>Image</legend>
   <div id="DropDiv"></div>
     </fieldset>';
	

	/*
	$content .= '<label>There\'s no picture available<input type="checkbox" name="NoPicture" id="NoPicture" /></label> <br /> <br />
	<div id="AvatarHelp"></div>';
	//$content .= '<label>Order <select name="Order">';
	// $content .= $new->get_order();
   
*/

 $content .= '
	<input hidden="hidden" type="file" name="file" />
    </div>
  </form>
    	
  	   <!-- End of Form Container-->';
	   
	 } //if isset agenda_admin 
	 else {
		$content.="<h1 style='text-align:center'>You don't have permission to see this page! Naughty! ;)</h1>"; 
	 }
	 
	 
	$content .=' </div>
	 
	<!--End of Main Wrapper-->
	</div>
	
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
  <title>HR Tech Europe - New Mediapartner</title>
<?php
echo $content;

?> 
</body>
</html>
