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
  


<link href="css/admin_general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_index.css" />
<link rel="stylesheet" href="css/admin_socials.css" />

<script src="js/admin_social_links_edit.js"></script>
<script src="js/admin_general.js"></script> 

<!--Include Font Awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">



</head>
<body>
  <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - London2015 | Edit Social Links</h1>
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
	 $perm = new socialsedit();
	 
	 	if (isset($_SESSION['admin'])) {
			
			 if (isset($_COOKIE['SocialLinkEdit'])){
				 $SocialEditData = explode(':',$_COOKIE['SocialLinkEdit']);
			  
				$_SESSION['SocialEditId'] = $SocialEditData[0];
				$_SESSION['SocialEditType'] = $SocialEditData[1];
				
				unset($_COOKIE['SocialLinkEdit']);
				setcookie('SocialLinkEdit', null, -1, '/');
			
	       }
		      if (!isset($_SESSION['SocialEditId'])) {
				$_SESSION['SocialEditId'] = -1;  
			  }
			  
			  if (!isset($_SESSION['SocialEditType'])) {
				$_SESSION['SocialEditType'] = '';  
			  }

			$content .= $perm->get_name($_SESSION['SocialEditId'], $_SESSION['SocialEditType']);
			
			if (isset($_COOKIE['ResponseCookie'])){
				$content .= $perm->response_generator($_COOKIE['ResponseCookie']);
				unset($_COOKIE['ResponseCookie']);
                setcookie('ResponseCookie', null, -1, '/');
			}
			
	     $content .='<form id="sponsors" name="sponsors" method="post" action="controllers/main.php" enctype="multipart/form-data">
    <div>
  
     <fieldset>
	<legend>Social</legend>';
			
		$content .= $perm->get_socials($_SESSION['SocialEditId'], $_SESSION['SocialEditType']);

	
	$content .= '<div class="SocialSubmitButton">Save</div>
	</fieldset>';
	

 $content .= '
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
  <title>HR Tech Europe - New Sponsor</title>
<?php
echo $content;

?> 
</body>
</html>
