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
	//<link rel="stylesheet" href="css/new_blogsquad.css" />   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
  <!-- Dropzone -->
<script src="js/admin_dropzone.js"></script>
<script src="js/admin_new_blogger.js"></script>
<script src="js/admin_general.js"></script> 

<link href="css/admin_general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_index.css" />
<link href="css/general.css" rel="stylesheet">
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
	  <h1 class="WrapperMainH1">HR Tech Europe - London2015 |<br /> Add New Blogger</h1>
	  
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
	 
	 if (isset($_SESSION['blogsquad_admin'])) {

	    $content.='<form id="blogsquad" name="blogsquad" method="post" action="controllers/main.php" enctype="multipart/form-data"><br />
         <script src="js/admin_dropzone_blogsquad.js"></script>
  
     <fieldset>
	    <legend>Basic</legend>
		<input class="AdminInputField" required="required" name="Blogsquad" id="BlogsquadName" type="text" placeholder="Name" /><br />
        <input class="AdminInputField" name="BlogsquadTitle" id="BlogsquadTitle" type="text" placeholder="Title" /><br /><br />
		    <label>Order <select id="Order" name="Order">';
	 $content .= $new->get_blogsquad_order();
    $content .=' 
    </select></label>
     </fieldset>
	 
	 <fieldset>
	    <legend>Company</legend>
        <input class="AdminInputField" required="required" name="CompanyName" id="CompanyName" type="text" placeholder="Company Name" /><br />
        <input class="AdminInputField" name="CompanyUrl" id="CompanyUrl" type="text" placeholder="Company website" /><br />';
		//<textarea name="CompanyBio" cols="" rows=""></textarea><br />
  $content .='<input type="hidden" id="CompanyBio" name="CompanyBio" ><br />
		<label>Add new blog <input id="Highlighted" name="Highlighted" type="checkbox" value="1" /></label><br />
        <div id="BlogDiv" style="display: none;"></div>
	    <input name="BlogSquadBlogData" id="BlogSquadBlogData" type="hidden" />
     </fieldset>
	
	  <fieldset>
	     <legend>Social</legend>
		  <input class="AdminInputField" id="BlogsquadTwitter" name="BlogsquadTwitter" type="text" placeholder="Twitter" /><br />
		  <input class="AdminInputField" id="BlogsquadFacebook" name="BlogsquadFacebook" type="text" placeholder="Facebook" /><br />
		  <input class="AdminInputField" id="BlogsquadLinkedin" name="BlogsquadLinkedin" type="text" placeholder="Linkedin" /><br />
		  <input class="AdminInputField" id="BlogsquadFlickr" name="BlogsquadFlickr" type="text" placeholder="Flickr" /><br />
		  <input class="AdminInputField" id="BlogsquadGoogle" name="BlogsquadGoogle" type="text" placeholder="Google+" /><br />
     </fieldset>
	 
	 <fieldset>
	     <legend>Bio</legend>
         <label>Blogger bio important<textarea id="BlogsquadBioImp" name="BlogsquadBioImp" cols="" rows=""></textarea></label><br />
         <label>Blogger bio<textarea id="BlogsquadBio" name="BlogsquadBio" cols="" rows=""></textarea></label><br />
     </fieldset>
	 
	 
   <input name="Tag" id="Tag" type="hidden" />
   <input name="BlogsquadBlogs" id="BlogsquadBlogs" type="hidden" />
   	 <fieldset>
	     <legend>Image</legend>
		 <div id="DropDiv"></div><br />
	<label>There\'s no picture available<input type="checkbox" name="NoPicture" id="NoPicture" /></label> <br /> <br />
	<div id="AvatarHelp"></div>
     </fieldset>';

	
  /* 
    //Agenda upload but it's not needed now so.. :( 
    $content .= '<fieldset>
    <legend>Agenda details</legend>
    <label>Agenda title<input required="required" name="AgendaTitle" type="text" /></label><br />
    <label>Time of Start<input name="AgendaTimeStart" type="text" /></label><br />
    <label>Time of End<input name="AgendaTimeEnd" type="text" /></label><br />
    <label>Day <select name="Day"> 
    <option value="1">Day 1</option>
    <option value="2">Day 2</option>
    </select></label><br /><br />
    <label>Abstract<textarea name="Abstract" cols="25" rows="5"></textarea></label><br />
    <label>Location <select name="Locations">';
   $content .= $new->get_locations();
   $content .= ' 
    </select></label>
    </fieldset>*/
	
 $content .= '
	<input hidden="hidden" type="file" name="file" />

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
  <title>HR Tech Europe - New Blogsquad</title>
<?php
echo $content;

?> 
</body>
</html>
