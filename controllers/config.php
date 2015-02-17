<?php
 abstract class config extends aaa{

	protected $dbc;
	protected $host = aaa::HR_HOST;
    protected $user = aaa::HR_USER; 
    protected $password = aaa::HR_PASSWORD;
    protected $database = aaa::HR_DATABASE;
    
  public function __construct() {
        $con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        
        if(mysqli_errno($con)){
            echo"sum error";
            
        }
        else{
           $this->dbc = $con; // assign $con to $dbc
           $this->dbc->query('SET NAMES utf8');
		    if(isset($_SESSION['admin'])){
			    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
		   }
		  
        }
    }
                              //this is needed to decode the links from db :)
  public function social_link_decode ($sURL) {
	     $specialis_karekterek = array('HRNCT001'=>'&', 'HRNCT002'=>'@', 'HRNCT003'=>';', 'HRNCT004'=>' ', 'HRNCT005'=>'%', 'HRNCT006'=>'?', 'HRNCT007'=>'=','HRNCT008'=>'+', 'HRNCT009'=>'$');
    $data = strtr($sURL, $specialis_karekterek);
	 return $data;
 }	
	
 /*  public function debugging($error) {
	$ladybug = '';
	if (isset($error) && $error['message'] !=''){
		
		  foreach ($error As $bug) {
		     $ladybug .= $bug;	

		       }
			   
			   $file = 'errors/error.txt';
			    //file_put_contents($file, $hiba, FILE_APPEND);

	     file_put_contents($file, $ladybug);
   
	}

}*/
	
}


?>