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

	   
	   $content ='
	   <!--Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="css/admin_general.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin_edit_general.css" />
<link rel="stylesheet" href="css/admin_index.css" />
<script src="js/admin_general.js"></script> 
</head>
<body>

 <!--Main Wrapper-->
	<div class="wrapper">
	  <h1 class="WrapperMainH1">HR Tech Europe - London2015 | Admin</h1>
	  
	  <p class="WelcomeTexT">Welcome to the Administration Interface of the <br> HR Tech Europe - London Conference`s Website.</p>
	   <p class="WelcomeTexT"> Please select the page where you want to edit the content.</p>
	   
	   <h6 style="text-align:center">This website is using cookies. Please do not disable them!<h6>
	<!--Form container-->
	 <div id="container">
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
	
		if (isset($_SESSION['developer'])) {
		
		 $content .= '<a href="logs"><img class="MenuIcon" src="img/admin/logs.png" onmouseover="this.src=';
		 $content .="'img/admin/logs_hover.png';";
		 $content .='" onmouseout="this.src=';
		 $content .="'img/admin/logs.png';";
		 $content .='" ></a>';
	 
	}
	
  $content .='</div>
  	   
	<br /><br /><br />
  <form name="logoutform" id="LogoutForm" method="post" action="">
  <button name="logout">Logout</button>
  </form>
  
  
  	
	   <!-- End of Form Container-->
	 </div>
	 
	<!--End of Main Wrapper-->
	</div>
	
	';  
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
    <title>HR Tech Europe - London Admin</title>
<?php
echo $content;

?> 
</body>
</html>
