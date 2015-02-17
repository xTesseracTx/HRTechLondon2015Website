<?php 
session_start();


if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}



function __autoload($class) {
	if (file_exists('controllers/' . $class . '.php'))  {
		include_once ('controllers/' . $class . '.php');
	}
	
	if (file_exists('model/' . $class . '.php'))  {
		include_once ('model/' . $class . '.php');
	}
}


 
  #split the path by '/'
  $params = explode("/", $_SERVER['REQUEST_URI']);

     #keeps users from requesting any file they want
   
  		  $controller = $params[2];
			$hoho = 'model/' . $controller. '.php';
			if (!file_exists($hoho)) {
			   if ($params[2] == '' || !isset($params[2]) || $params[2] == "index" || $params[2] == "index.php"){
			       $controller = 'defaultclass'; 
		       } else {
				    header('Location: http://hrneurope.com/404.html');
			   }
                 
			 }
			

		  
		 if ($params[2] == 'controllers' || $params[2] == "model" || $params[2] == "views"){
			  header('Location: http://hrneurope.com/404.html');
		  }
	if (isset($params[3])){
		 header('Location: /'.$controller);
	} else {
	     $c = new $controller();	
	     $c->index();
	}




?>
