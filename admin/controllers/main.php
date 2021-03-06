<?php
include_once('aaa.php');
include_once('config.php');


 class main extends config {
	 
	 public $speaker_id;	
	 public $sponsors_id;
	 public $blogsquad_id;
	 public $mediapartners_id;	 
/*
**************************
Basic functions
**************************
*/
	 //strip strings from special characters
   function ekezet_nelkuli($fajlnev) {

    $specialis_karekterek = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ő'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ű'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ő'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ű'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f');
    $fajlnev = strtolower(strtr($fajlnev, $specialis_karekterek));
    $fajlnev = preg_replace("/[^a-z0-9-_\.]/i", '_', trim($fajlnev));
    if (strlen($fajlnev) == 0 || $fajlnev == '.' || $fajlnev == '..') {
    	$fajlnev = 'ervenytelen_nev';
    }
    return $fajlnev;
}

  function sanitize($data){
       //$data = htmlentities(strip_tags(trim($data)));
		
		$bad = array("foreach","echo","content-type","bcc:","to:","cc:","href","$","SELECT","<",">",";","INSERT","UPDATE","DELETE");
		
		$data = str_replace($bad,"",$data);
		
        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
                   '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
                   '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
                   '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
    ); 
    $data = preg_replace($search, '', $data); 
        return $data;
    }


		//get info of a file
  function fileinfo($filename) {
	$file = array('filename' => '', 'extension' => '');
	// $pos: az utolsó . karakter pozíciója, vagy FALSE
	$pos = strrpos($filename, '.');
	if ($pos === false) {
		$file['filename'] = $filename;
	} else {
		// itt a $pos egy számot tartalmaz
		$file['filename']  = substr($filename, 0, $pos);
		$file['extension'] = substr($filename, $pos + 1);
	}
	return $file;	
}

       //upload links to somewhere :)
 function link_upload($type, $link, $sid, $db) {
	 
	 $url = $this->social_link_encode($link);
	 
	 		$this->dbc->query(
				sprintf("INSERT INTO ".$db."_links SET ".$db."_id = '%s', link_url = '%s', speakers_link_types_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sid)),
				  $this->dbc->real_escape_string(htmlspecialchars($url)),
				  $this->dbc->real_escape_string(htmlspecialchars($type))
				)
			);	
	 
 }
 
 /*
 
        //upload links to somewhere :)
 function blogsquad_link_upload($type, $link, $sid, $db) {
	 
	 		$this->dbc->query(
				sprintf("INSERT INTO ".$db."_links SET ".$db."_id = '%s', link_url = '%s', blogsquad_link_types_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sid)),
				  $this->dbc->real_escape_string(htmlspecialchars($link)),
				  $this->dbc->real_escape_string(htmlspecialchars($type))
				)
			);	
	 
 }
 */
 
 function picture_upload($db, $id, $filename, $path) {
	 $q = '';
	 if ($db == "speakers") {
	       $this->dbc->query(
				sprintf("INSERT INTO ".$db."_image SET ".$db."_id = '%s', image_name = '%s', image_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($id)),
				  $this->dbc->real_escape_string(htmlspecialchars($filename)),
				  $this->dbc->real_escape_string(htmlspecialchars($path))
				)
			);
	 } else {
		 	 $this->dbc->query(
				sprintf("INSERT INTO ".$db."_image SET ".$db."_id = '%s', image_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($id)),
				  $this->dbc->real_escape_string(htmlspecialchars($path))
				)
			);
	 }

 	
 }
 
 /*
*************************
  GLOBAL
*************************  
*/	

 function social_link_encode ($sURL) {
	     $specialis_karekterek = array('&'=>'HRNCT001', '@'=>'HRNCT002', ';'=>'HRNCT003',' '=>'HRNCT004', '%'=>'HRNCT005', '?'=>'HRNCT006', '='=>'HRNCT007','+'=>'HRNCT008', '$'=>'HRNCT009');
    $data = strtr($sURL, $specialis_karekterek);
	 return $data;
 }
 
 //Social Link update!
 function social_link_update($sId, $sType_raw, $sLinks, $sURLs) {
	 $sType_stillRaw = $this->ekezet_nelkuli($sType_raw);
	 $sType = $this->sanitize($sType_stillRaw);
	 
	 $i = 0;
	 foreach ($sLinks as $num => $value) {
		   if ($sURLs[$i] == -1) {
			   $url = '';
		   } else {
			   $url = $this->social_link_encode($sURLs[$i]);
		   }
		 	 $this->dbc->query(
				sprintf("INSERT INTO ".$sType."_links SET ".$sType."_id = '%s', link_url = '%s', speakers_link_types_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($url)),
				  $this->dbc->real_escape_string(htmlspecialchars($value))
				)
			);	
			
				 if (isset($_COOKIE['Moo'])) {
		   $this->db_log($_COOKIE['Moo'],"A new social link has been uploaded to the speakers", $sId);
	  }
		 
		$i++; 
	 }//foreach ends
	 
	 $result = 0;
	 echo $result;
 }
 
	
/*
*************************
  SPEAKER
*************************  
*/	
   //Upload speaker	 
//-----------------------------------------------------	 
  function speaker_upload() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['Speaker']) && $_POST['Speaker'] != ''){
	        //If there's no speaker we don't upload anything :D
			
	// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO speakers SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Speaker']))
				)
			);
		$speaker_id = $this->dbc->insert_id;
		
		$this->speaker_id = $speaker_id;
		
	//	we store the display name sparatly because here we can change it later and store it redundantly
		$this->dbc->query(
				sprintf("INSERT INTO speakers_name SET name = '%s', speakers_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Speaker'])),
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id))
				)
			);
			
			
		 if(isset($_POST['Moderator'])) {
				$check = 2;
			} else {
				$check = 1;
			}
			
	//Insert a speakers status data		
		$this->dbc->query(
				sprintf("INSERT INTO speakers_status SET speakers_status_id = '%s', speakers_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($check)),
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id))
				)
			);			
		
		//Insert Personal data
      if (isset($_POST['Tag']) && $_POST['Tag'] != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $_POST['Tag']);
					 
					// $sanitized = htmlspecialchars($databaseContent, ENT_QUOTES);

                       //$bio = str_replace(array("\r\n", "\n", "<br />"), array("'szuunet'", "'szuunet'","'szuunet'"), $_POST['SpeakerBio']);
					   //$bioImp = str_replace(array("\r\n", "\n", "<br />"), array("'szuunet'", "'szuunet'","'szuunet'"), $_POST['SpeakerBioImp']);
					
	    $this->dbc->query(
				sprintf("INSERT INTO speakers_personal SET title = '%s', speakers_id = '%s', bio = '%s', bio_important = '%s', tag = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerTitle'])),
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerBio'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerBioImp'])),
				  $this->dbc->real_escape_string(htmlspecialchars($tag))
				)
			);	
		$data_id = $this->dbc->insert_id;
				
		$this->dbc->query(
				sprintf("INSERT INTO speakers_personal_connection SET speakers_id = '%s', speakers_data_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($data_id))
				)
			);
		}	//isset post_tag end	
		
		//Insert Company Data		
	   if (isset($_POST['CompanyName']) && $_POST['CompanyName'] != ''){
		
	  $this->dbc->query(
				sprintf("INSERT INTO speakers_company SET company_name = '%s', company_url = '%s', company_bio = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['CompanyName'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['CompanyUrl'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['CompanyBio']))
				)
			);	
		$company_id = $this->dbc->insert_id;
		
		
				$this->dbc->query(
				sprintf("INSERT INTO speakers_company_connection SET speakers_id = '%s', speakers_company_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($company_id))
				)
			);	
		}  //isset company name ends
		
	//LINKS	
	      //Twitter
		if ($_POST['SpeakerTwitter'] != '') {
			if ($_POST['SpeakerTwitter'][0] == "@") {
				$twitt = "www.twitter.com/".substr($_POST['SpeakerTwitter'], 1);
			} else {
				$twitt = $_POST['SpeakerTwitter'];
			}
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '2'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($twitt))
				)
			);	
		}
		
			      //Facebook
		if ($_POST['SpeakerFacebook']  != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerFacebook']))
				)
			);	
		}
			      //Linkedin
		if ($_POST['SpeakerLinkedin'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '3'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerLinkedin']))
				)
			);	
		}
			      //Flickr
		if ($_POST['SpeakerFlickr'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '4'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerFlickr']))
				)
			);	
		}
			      //Google+
		if ($_POST['SpeakerGoogle'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '5'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerGoogle']))
				)
			);	
		}
		

	  } // isset Speaker end
	
	 }
	 
	 
function personal_data($sTag, $sTitle, $sBio, $sBioImportant, $sId) {
	
	      if (isset($sTag) && $sTag != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $sTag);
	    $this->dbc->query(
				sprintf("INSERT INTO speakers_personal SET title = '%s', speakers_id = '%s', bio = '%s', bio_important = '%s', tag = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sTitle)),
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($sBio)),
				  $this->dbc->real_escape_string(htmlspecialchars($sBioImportant)),
				  $this->dbc->real_escape_string(htmlspecialchars($tag))
				)
			);	
		$data_id = $this->dbc->insert_id;
				
		$this->dbc->query(
				sprintf("INSERT INTO speakers_personal_connection SET speakers_id = '%s', speakers_data_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($data_id))
				)
			);
		}	//isset post_tag end				
		
	
}

function company_data($sCompany, $sCompanyLink, $sId) {
		
		
		//Insert Company Data		
	   if (isset($sCompany) && $sCompany != ''){
		
	  $this->dbc->query(
				sprintf("INSERT INTO speakers_company SET company_name = '%s', company_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sCompany)),
				  $this->dbc->real_escape_string(htmlspecialchars($sCompanyLink))
				)
			);	
		$company_id = $this->dbc->insert_id;
		
		
				$this->dbc->query(
				sprintf("INSERT INTO speakers_company_connection SET speakers_id = '%s', speakers_company_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($company_id))
				)
			);	
		}  //isset company name ends
	
}


	 
	 ///MODIFY SPEAKER
//-----------------------------------------------------	 
  function speaker_edit() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['sName']) && $_POST['sName'] != '' && isset($_POST['sId']) && isset($_POST['sNId']) && isset($_POST['wat'])){
	        //If there's no speaker we don't upload anything :D
			

		$speaker_id = $_POST['sId'];
		
		
	//LINKS	
	switch ($_POST['wat']) {
		case 'sName':
				$this->dbc->query(
				sprintf("INSERT INTO speakers_name SET name = '%s', speakers_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sName'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
			         	)
		        	);
					
						$tag = explode(' ',$_POST['sName']);
						if (isset($tag[1]) && isset($tag[0])) {
							$sTag = $tag[1].$tag[0][0];
							
							$this->personal_data($sTag, $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);
						}
						
								
			break;
		case 'sTitle':
		//Insert Personal data
			$this->personal_data($_POST['tag'], $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);
			break;
			
		case 'sBio':
			$this->personal_data($_POST['tag'], $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);			
			break;
			
		case 'sBioImportant':
			$this->personal_data($_POST['tag'], $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);				
			break;	
				
		case 'sCompany':
			$this->company_data($_POST['sCompany'], $_POST['sCompanyLink'], $_POST['sId']);				
			break;	
			
		case 'sCompanyLink':
			$this->company_data($_POST['sCompany'], $_POST['sCompanyLink'], $_POST['sId']);					
			break;								
			
																	
		case 'stwitter':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '2'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sTwitter']))
				)
			);				
			break;
		case 'sfacebook':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFacebook']))
				)
			);			
			break;
		case 'slinkedin':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '3'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sLinkedin']))
				)
			);				
			break;
		case 'sflickr':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '4'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFlickr']))
				)
			);			
			break;
		case 'sgoogle':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '5'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sGoogle']))
				)
			);			
			break;
		case 'srss':
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '6'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sRss']))
				)
			);			
			break;									
		default :
			
	}
				

	  } // isset Speaker end
	
	 }
	 

	 //Speaker delete
///---------------------------------------------------------------
function speaker_delete(){
	
		// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO speakers_status SET speakers_id = '%s', speakers_status_id = '0'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
				)
			);
	
}	

	 //Speaker make visible
///---------------------------------------------------------------
function speaker_makevisible(){
	
		// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO speakers_status SET speakers_id = '%s', speakers_status_id = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
				)
			);
	
}	 



	 
	 //Set Speaker Order
//------------------------------------------------------	 
   function speaker_order($speaker_id, $order_id) {
	     if(isset($order_id)){
			  if(isset($speaker_id)) {
			$i = 0;
			$ord = 0;	  
				  		//Get links		
		 $speaker = $this->dbc->query(
				sprintf("SELECT id, order_id, speakers_id FROM speakers_order ORDER BY date DESC"));	
					if (mysqli_num_rows($speaker)) {
					   while($data = $speaker->fetch_assoc()){
						   if ($data['order_id'] == $order_id) {
							   $i = 1;
							   $ord = $data['order_id'];
							   $id = $data['id'];
						   }
						   
						  if ($i == 1) {
							  $ord++;
							  
							  $this->dbc->query(
								  sprintf("UPDATE speakers_order SET order_id = '%s' WHERE speakers_id = '%s'",
									$this->dbc->real_escape_string(htmlspecialchars($ord)),
									$this->dbc->real_escape_string(htmlspecialchars($data['speakers_id']))
								  )
							  );
							  
						  }
						
					}
						
				   } //num_rows_speaker                 
				  
			$this->dbc->query(
				sprintf("INSERT INTO speakers_order SET speakers_id = '%s', order_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($order_id))
				)
			);	
	}  //isset speaker_id
			 
			 
		 }//isset post order
   }
	 
	///Speaker rearrange 
//----------------------------------------------------------------	
   function speaker_arrange() {
	  if (isset($_POST['list_order'])) { 
		// get the list of items id separated by cama (,)
	$list_order = $_POST['list_order'];
	// convert the string list to an array
	$list = explode(',' , $list_order);
	$i = 0 ;
	foreach($list as $id) {

		 $this->dbc->query(
			  sprintf("UPDATE speakers_order SET order_id = '%s' WHERE speakers_id = '%s'",
				$this->dbc->real_escape_string(htmlspecialchars($i)),
				$this->dbc->real_escape_string(htmlspecialchars($id))
			  )
		 );
		       $i++ ;
			
      } //foreach end
	  } //if isset listorder
	}
	
	 //Upload Avatar
//------------------------------------------------------------		 
	function avatar_upload($avatar) {
		if ($avatar == 1) {
			$gender = "AvatarM.jpg";
		} else {
			$gender = "AvatarF.jpg";
		}
		
		 $this->dbc->query(
				sprintf("INSERT INTO speakers_image SET speakers_id = '%s', image_name = '%s', image_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($this->speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($gender)),
				  $this->dbc->real_escape_string(htmlspecialchars($gender))
				)
			);
		
	}
	 
	 //File Upload
//------------------------------------------------------------	 
   function file_upload($path) {
	
// $uploaddir: az a mappa, ahova a fájlokat feltöltöm
	$uploaddir = $path;
	// Létezik-e uploads mappa? Ha nem, hozzuk létre
	if (!is_dir($uploaddir)) {
		mkdir($uploaddir);
	}
	
	
	  //Kép fájl ellenőrző
  foreach ($_FILES as $file) {
    if ($file['tmp_name'] > '') {
	  $exp = explode(".",
            strtolower($file['name']));
    }
  }

	
	// $uploadfile: az a fájlnév, ami majd megjelenik a szerveren
	$uploadfile = $this->ekezet_nelkuli(basename($_FILES['file']['name']));

	// $uploadpath: a feltöltött fájl relatív elérési útja
	$uploadpath = $uploaddir . '/' . $uploadfile;
	
	$counter = 2;
	while (is_file($uploadpath)) {
		$uploadfile = $this->ekezet_nelkuli(basename($_FILES['file']['name']));
		$f = $this->fileinfo($uploadfile);
		if (strlen($f['extension']) == 0) {
			// ha nincs kiterjesztés
			$uploadfile . '_' . $counter;
		} else {
			// ha van kiterjesztés
			//$uploadfile = $f['filename'] . '_' . $counter . '.' . $f['extension'];
			// A pathinfo() kiváltja a saját fileinfo() függvényemet
			$uploadfile = pathinfo($uploadfile, PATHINFO_FILENAME) . '_' . $counter . '.' . pathinfo($uploadfile, PATHINFO_EXTENSION);
		}
		$uploadpath = $uploaddir . '/' . $uploadfile;
		$counter++;
	}

	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadpath)) {
      $valasz = 'The picture has been uploaded! :)';

	}
	
	
	$filename = explode('.',$uploadfile);
	
			if ($uploadfile) {		
				return $uploadfile;
				
		}
			
	 
	 }
	 
/*
*************************
  BLOGSQUAD
*************************  
*/	
   //Upload blogsquad	 
//-----------------------------------------------------	 
  function blogsquad_upload() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['Blogsquad']) && $_POST['Blogsquad'] != ''){
	        //If there's no blogsquad we don't upload anything :D
			
	// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO blogsquad SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Blogsquad']))
				)
			);
		$blogsquad_id = $this->dbc->insert_id;
		
		$this->blogsquad_id = $blogsquad_id;
		
	//	we store the display name sparatly because here we can change it later and store it redundantly
		$this->dbc->query(
				sprintf("INSERT INTO blogsquad_name SET name = '%s', blogsquad_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Blogsquad'])),
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id))
				)
			);
			
	//Insert a blogsquad status data		
		$this->dbc->query(
				sprintf("INSERT INTO blogsquad_status SET blogsquad_status_id = '1', blogsquad_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id))
				)
			);			
		
		//Insert Personal data
      if (isset($_POST['Tag']) && $_POST['Tag'] != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $_POST['Tag']);
					 
					
	    $this->dbc->query(
				sprintf("INSERT INTO blogsquad_personal SET title = '%s', blogsquad_id = '%s', bio = '%s', bio_important = '%s', tag = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['BlogsquadTitle'])),
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['BlogsquadBio'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['BlogsquadBioImp'])),
				  $this->dbc->real_escape_string(htmlspecialchars($tag))
				)
			);	
		$data_id = $this->dbc->insert_id;
				
		$this->dbc->query(
				sprintf("INSERT INTO blogsquad_personal_connection SET blogsquad_id = '%s', blogsquad_data_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($data_id))
				)
			);
		}	//isset post_tag end	
		
		//Insert Company Data		
	   if (isset($_POST['CompanyName']) && $_POST['CompanyName'] != ''){
		
	  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_company SET company_name = '%s', company_url = '%s', company_bio = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['CompanyName'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['CompanyUrl'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['CompanyBio']))
				)
			);	
		$company_id = $this->dbc->insert_id;
		
		
				$this->dbc->query(
				sprintf("INSERT INTO blogsquad_company_connection SET blogsquad_id = '%s', blogsquad_company_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($company_id))
				)
			);	
		}  //isset company name ends
		
			 if (isset($_POST['BlogsquadBlogs'])){
					$blogData = explode('|', $_POST['BlogsquadBlogs']);
					$this->blogsquad_blog_add($blogData, $blogsquad_id);
			}
				 
		
	//LINKS	
	      //Twitter
		if ($_POST['BlogsquadTwitter'] != '') {	
		
			if ($_POST['BlogsquadTwitter'][0] == "@") {
				$twitt = "www.twitter.com/".substr($_POST['BlogsquadTwitter'], 1);
			} else {
				$twitt = $_POST['BlogsquadTwitter'];
			}	
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '2'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($twitt))
				)
			);	
		}
		
			      //Facebook
		if ($_POST['BlogsquadFacebook']  != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['BlogsquadFacebook']))
				)
			);	
		}
			      //Linkedin
		if ($_POST['BlogsquadLinkedin'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '3'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['BlogsquadLinkedin']))
				)
			);	
		}
			      //Flickr
		if ($_POST['BlogsquadFlickr'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '4'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['BlogsquadFlickr']))
				)
			);	
		}
			      //Google+
		if ($_POST['BlogsquadGoogle'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '5'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['BlogsquadGoogle']))
				)
			);	
		}


	  } // isset Blogsquad end
	
	 }
	 

//Add a la carte from sponsors edit
function blogsquad_blog_add($blogData, $sId) {
					 if (isset($blogData)){
						foreach ($blogData as $blog){
							$current = explode(';', $blog);
							
							
							if (isset($current[0]) && $current[0] !=" " && $sId != 0 && isset($current[1]) && $current[1] !=" "){
								
							$this->add_blog_blogsquad($sId, $current[0], $current[1]);
							   }
						}
				
				 }//isset post carteval
	
}


//Add a la carte from sponsors edit
function blogsquad_blog_edit_add($blogsquad_id, $title, $url) {
					 if (isset($blogsquad_id) && isset($title)){
						foreach ($title as $id=>$blog){
						
							if (isset($blog) && $blogsquad_id != 0 && isset($url[$id])){
								
							$this->add_blog_blogsquad($blogsquad_id, $blog, $url[$id]);
							   }
						}
				
				 }//isset post blogsquad id
	
}


function add_blog_blogsquad($blogsquad_id, $title, $blog_url){
	
		  $this->dbc->query(
			sprintf("INSERT INTO blogsquad_blog_data SET blogsquad_id = '%s', title = '%s', url = '%s'",
			  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
			  $this->dbc->real_escape_string(htmlspecialchars($title)),
			  $this->dbc->real_escape_string(htmlspecialchars($blog_url))
			)
		   );
		   
		   $blog_id = $this->dbc->insert_id;
		   
		   $this->dbc->query(
			sprintf("INSERT INTO blogsquad_blog_data_connection SET blogsquad_id = '%s', blogsquad_blog_data_id = '%s', status=1",
			  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
			  $this->dbc->real_escape_string(htmlspecialchars($blog_id))
			)
		   );
		   
	
}
	 
function blogsquad_personal_data($sTag, $sTitle, $sBio, $sBioImportant, $sId) {
	
	      if (isset($sTag) && $sTag != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $sTag);
	    $this->dbc->query(
				sprintf("INSERT INTO blogsquad_personal SET title = '%s', blogsquad_id = '%s', bio = '%s', bio_important = '%s', tag = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sTitle)),
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($sBio)),
				  $this->dbc->real_escape_string(htmlspecialchars($sBioImportant)),
				  $this->dbc->real_escape_string(htmlspecialchars($tag))
				)
			);	
		$data_id = $this->dbc->insert_id;
				
		$this->dbc->query(
				sprintf("INSERT INTO blogsquad_personal_connection SET blogsquad_id = '%s', blogsquad_data_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($data_id))
				)
			);
		}	//isset post_tag end				
		
	
}

function blogsquad_company_data($sCompany, $sCompanyLink, $sId) {
		
		
		//Insert Company Data		
	   if (isset($sCompany) && $sCompany != ''){
		
	  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_company SET company_name = '%s', company_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sCompany)),
				  $this->dbc->real_escape_string(htmlspecialchars($sCompanyLink))
				)
			);	
		$company_id = $this->dbc->insert_id;
		
		
				$this->dbc->query(
				sprintf("INSERT INTO blogsquad_company_connection SET blogsquad_id = '%s', blogsquad_company_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($company_id))
				)
			);	
		}  //isset company name ends
	
}


	 
	 ///MODIFY BLOGSQUAD
//-----------------------------------------------------	 
  function blogsquad_edit() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['sName']) && $_POST['sName'] != '' && isset($_POST['sId']) && isset($_POST['sNId']) && isset($_POST['wat'])){
	        //If there's no blogsquad we don't upload anything :D
			

		$blogsquad_id = $_POST['sId'];
				
	//LINKS	
	switch ($_POST['wat']) {
		case 'sName':
				$this->dbc->query(
				sprintf("INSERT INTO blogsquad_name SET name = '%s', blogsquad_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sName'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
			         	)
		        	);				
			break;
		case 'sTitle':
		//Insert Personal data
			$this->blogsquad_personal_data($_POST['tag'], $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);
			break;
			
		case 'sBio':
			$this->blogsquad_personal_data($_POST['tag'], $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);			
			break;
			
		case 'sBioImportant':
			$this->blogsquad_personal_data($_POST['tag'], $_POST['sTitle'], $_POST['sBio'], $_POST['sBioImportant'], $_POST['sId']);				
			break;	
				
		case 'sCompany':
			$this->blogsquad_company_data($_POST['sCompany'], $_POST['sCompanyLink'], $_POST['sId']);				
			break;	
			
		case 'sCompanyLink':
			$this->blogsquad_company_data($_POST['sCompany'], $_POST['sCompanyLink'], $_POST['sId']);					
			break;								
			
																	
		case 'stwitter':
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '2'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sTwitter']))
				)
			);				
			break;
		case 'sfacebook':
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFacebook']))
				)
			);			
			break;
		case 'slinkedin':
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '3'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sLinkedin']))
				)
			);				
			break;
		case 'sflickr':
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '4'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFlickr']))
				)
			);			
			break;
		case 'sgoogle':
			  $this->dbc->query(
				sprintf("INSERT INTO blogsquad_links SET blogsquad_id = '%s', link_url = '%s', speakers_link_types_id = '5'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sGoogle']))
				)
			);			
			break;								
		default :
			
	}
				

	  } // isset Blogsquad end
	
	 }
	 

//Blogsquad blog data edit
//----------------------------------------
function blogsquad_blog_data_edit($blogsquadid, $bconnect_id, $title, $url) {
			  $this->dbc->query(
			sprintf("INSERT INTO blogsquad_blog_data SET blogsquad_id = '%s', title = '%s', url = '%s'",
			  $this->dbc->real_escape_string(htmlspecialchars($blogsquadid)),
			  $this->dbc->real_escape_string(htmlspecialchars($title)),
			  $this->dbc->real_escape_string(htmlspecialchars($url))
			)
		   );
		   
		   $blog_id = $this->dbc->insert_id;
		   
		   $this->dbc->query(
			sprintf("UPDATE blogsquad_blog_data_connection SET blogsquad_id = '%s', blogsquad_blog_data_id = '%s', status=1 WHERE id = '%s'",
			  $this->dbc->real_escape_string(htmlspecialchars($blogsquadid)),
			  $this->dbc->real_escape_string(htmlspecialchars($blog_id)),
			  $this->dbc->real_escape_string(htmlspecialchars($bconnect_id))
			)
		   );
	
}


	 //Blogsquad delete
///---------------------------------------------------------------
function blogsquad_delete(){
	
		// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO blogsquad_status SET blogsquad_id = '%s', blogsquad_status_id = '0'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
				)
			);
	
}	 

	 
	 //Set Blogsquad Order
//------------------------------------------------------	 
   function blogsquad_order($blogsquad_id, $order_id) {
	     if(isset($order_id)){
			  if(isset($blogsquad_id)) {
			$i = 0;
			$ord = 0;	  
				  		//Get links		
		 $blogsquad = $this->dbc->query(
				sprintf("SELECT id, order_id, blogsquad_id FROM blogsquad_order ORDER BY date DESC"));	
					if (mysqli_num_rows($blogsquad)) {
					   while($data = $blogsquad->fetch_assoc()){
						   if ($data['order_id'] == $order_id) {
							   $i = 1;
							   $ord = $data['order_id'];
							   $id = $data['id'];
						   }
						   
						  if ($i == 1) {
							  $ord++;
							  
							  $this->dbc->query(
								  sprintf("UPDATE blogsquad_order SET order_id = '%s' WHERE blogsquad_id = '%s'",
									$this->dbc->real_escape_string(htmlspecialchars($ord)),
									$this->dbc->real_escape_string(htmlspecialchars($data['blogsquad_id']))
								  )
							  );
							  
						  }
						
					}
						
				   } //num_rows_blogsquad                 
				  
			$this->dbc->query(
				sprintf("INSERT INTO blogsquad_order SET blogsquad_id = '%s', order_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($blogsquad_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($order_id))
				)
			);	
	}  //isset blogsquad_id
			 
			 
		 }//isset post order
   }
	 
	///Blogsquad rearrange 
//----------------------------------------------------------------	
   function blogsquad_arrange() {
	  if (isset($_POST['list_order'])) { 
		// get the list of items id separated by cama (,)
	$list_order = $_POST['list_order'];
	// convert the string list to an array
	$list = explode(',' , $list_order);
	$i = 0 ;
	foreach($list as $id) {

		 $this->dbc->query(
			  sprintf("UPDATE blogsquad_order SET order_id = '%s' WHERE blogsquad_id = '%s'",
				$this->dbc->real_escape_string(htmlspecialchars($i)),
				$this->dbc->real_escape_string(htmlspecialchars($id))
			  )
		 );
		       $i++ ;
			
      } //foreach end
	  } //if isset listorder
	}	 
	 
	 
	 
	
/*
********************************************
      SPONSORS
********************************************
*/	

  //Upload sponsor	  - WIP
//-----------------------------------------------------	 
  function sponsor_upload() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['Sponsor']) && $_POST['Sponsor'] != ''){
	        //If there's no sponsor we don't upload anything :D
		 if(isset($_POST['Highlighted'])) {
				$check = 1;
			} else {
				$check = 0;
			}
		if (!isset($_POST['SponsorTypes']) || $_POST['SponsorTypes'] < 0)	{
			$_POST['SponsorTypes'] = 0;
		}
	
	// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO sponsors SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Sponsor']))
				)
			);
		$sponsors_id = $this->dbc->insert_id;
		
		$this->sponsors_id = $sponsors_id;
		
	//	we store the display name sparatly because here we can change it later and store it redundantly
		$this->dbc->query(
				sprintf("INSERT INTO sponsors_name SET name = '%s', sponsors_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Sponsor'])),
				  $this->dbc->real_escape_string(htmlspecialchars($sponsors_id))
				)
			);
	//set the sponsor status to active	
	    $active = 1;	
			$this->dbc->query(
				sprintf("INSERT INTO sponsors_status SET status_id = '%s', sponsors_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($active)),
				  $this->dbc->real_escape_string(htmlspecialchars($sponsors_id))
				)
			);		
			
		//Insert Personal data
		

      if (isset($_POST['SponsorTag']) && $_POST['SponsorTag'] != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $_POST['SponsorTag']);
					 
					 
	    $this->dbc->query(
				sprintf("INSERT INTO sponsors_data SET sponsors_id = '%s', sponsors_bio = '%s', sponsors_url = '%s', sponsors_tag = '%s', sponsors_rank = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sponsors_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SponsorBio'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SponsorURL'])),
				  $this->dbc->real_escape_string(htmlspecialchars($tag)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SponsorTypes']))
				)
			);	
		$data_id = $this->dbc->insert_id;
		
		   //If the sponsor is alacarte
		 
		     if ($check == 1) {
				 $this->dbc->query(
				sprintf("INSERT INTO sponsors_data_alacarte SET sponsors_id = '%s', alacarte = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sponsors_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($check))

				)
			);	
				 
				 if (isset($_POST['SponsorAlaCarteData'])){
					$carteData = explode('|', $_POST['SponsorAlaCarteData']);
					$this->ala_carte_edit_add($carteData,$sponsors_id);
				 }
		
		    }//if check == 1
				

		}	//isset post_tag end	

	//LINKS	
	$what = "sponsors";
	      //Twitter
		if ($_POST['SponsorTwitter']) {	
		
			if ($_POST['SponsorTwitter'][0] == "@") {
				$twitt = "www.twitter.com/".substr($_POST['SponsorTwitter'], 1);
			} else {
				$twitt = $_POST['SponsorTwitter'];
			}	
					
			$this->link_upload('2', $twitt, $sponsors_id, $what);	
		}
	
			      //Facebook
		if ($_POST['SponsorFacebook']  != '') {		
			$this->link_upload('1', $_POST['SponsorFacebook'], $sponsors_id, $what);	
		}
			      //Linkedin
		if ($_POST['SponsorLinkedin'] != '') {	
		
		    $this->link_upload('3', $_POST['SponsorLinkedin'], $sponsors_id, $what);		

		}
			      //Flickr
		if ($_POST['SponsorFlickr'] != '') {
			
			$this->link_upload('4', $_POST['SponsorFlickr'], $sponsors_id, $what);			

		}
			      //Google+
		if ($_POST['SponsorGoogle'] != '') {	
		
		   $this->link_upload('5', $_POST['SponsorGoogle'], $sponsors_id, $what);		
	
		}
		
           return $sponsors_id;

	  } // isset Sponsor end
	    
	 }
	 
//Add a la carte from sponsors edit
function ala_carte_edit_add($carte, $sId) {
					 if (isset($carte)){
						foreach ($carte as $c){
							if (isset($c) && $c !=""){
							$this->add_ala_carte($sId, $c, 1);
							}
						}
				
				 }//isset post carteval
	
}
	 
	//Add new Al a Carte
//-------------------------------------------	
function add_ala_carte($sId, $sText, $needed) {

	  $this->dbc->query(
			sprintf("INSERT INTO sponsors_ala_carte SET sponsors_id = '%s', text = '%s'",
			  $this->dbc->real_escape_string(htmlspecialchars($sId)),
			  $this->dbc->real_escape_string(htmlspecialchars($sText))
			)
		   );
		   
		   $carte_id = $this->dbc->insert_id;
		   
		   $this->dbc->query(
			sprintf("INSERT INTO sponsors_ala_carte_connection SET sponsors_id = '%s', sponsors_ala_carte_id = '%s'",
			  $this->dbc->real_escape_string(htmlspecialchars($sId)),
			  $this->dbc->real_escape_string(htmlspecialchars($carte_id))
			)
		   );
		   
		   
			if($needed == 1){
				$this->dbc->query(
				sprintf("INSERT INTO sponsors_data_alacarte SET sponsors_id = '%s', alacarte = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($needed))

				)
			);	
			}

				
	
}
	 
	//Edit Ala Carte sponsor text
//-------------------------------------------
function alacarte_edit($sId, $alacarte, $connection_id) {
		    $this->dbc->query(
				sprintf("INSERT INTO sponsors_ala_carte SET text = '%s', sponsors_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($alacarte)),
				  $this->dbc->real_escape_string(htmlspecialchars($sId))
			         	)
		        	);	
					$carte_id = $this->dbc->insert_id;
					
			$this->dbc->query(
				sprintf("UPDATE sponsors_ala_carte_connection SET sponsors_ala_carte_id = '%s', sponsors_id = '%s' WHERE id= '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($carte_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($connection_id))
			         	)
		        	);	
					
	
}
function sponsor_data($sTag, $sBio, $sCompanyLink, $sId, $rank) {
	
	      if (isset($sTag) && $sTag != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $sTag);
	    $this->dbc->query(
				sprintf("INSERT INTO sponsors_data SET sponsors_id = '%s', sponsors_bio = '%s', sponsors_url = '%s', sponsors_tag = '%s', sponsors_rank = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($sBio)),
				  $this->dbc->real_escape_string(htmlspecialchars($sCompanyLink)),
				  $this->dbc->real_escape_string(htmlspecialchars($tag)),
				  $this->dbc->real_escape_string(htmlspecialchars($rank))
				)
			);	

		}	//isset post_tag end				
		
	
}	 

	 ///MODIFY SPONSOR
//-----------------------------------------------------	 
  function sponsor_edit() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['sName']) && $_POST['sName'] != '' && isset($_POST['sId']) && isset($_POST['sNId']) && isset($_POST['wat'])){
	        //If there's no sponsor we don't upload anything :D
			

		$sponsor_id = $_POST['sId'];
		

		
	//LINKS	
	switch ($_POST['wat']) {
		case 'sName':
				$this->dbc->query(
				sprintf("INSERT INTO sponsors_name SET name = '%s', sponsors_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sName'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
			         	)
		        	);				
			break;
			
		case 'sBio':
			$this->sponsor_data($_POST['tag'], $_POST['sBio'], $_POST['sCompanyLink'], $_POST['sId'], $_POST['rank']);
			break;
							
		case 'sCompanyLink':
			$this->sponsor_data($_POST['tag'], $_POST['sBio'], $_POST['sCompanyLink'], $_POST['sId'], $_POST['rank']);
			break;							
			
																	
		case 'stwitter':
			  $this->dbc->query(
				sprintf("INSERT INTO sponsors_links SET sponsors_id = '%s', link_url = '%s', speakers_link_types_id = '2'",
				  $this->dbc->real_escape_string(htmlspecialchars($sponsor_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sTwitter']))
				)
			);				
			break;
		case 'sfacebook':
			  $this->dbc->query(
				sprintf("INSERT INTO sponsors_links SET sponsors_id = '%s', link_url = '%s', speakers_link_types_id = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($sponsor_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFacebook']))
				)
			);			
			break;
		case 'slinkedin':
			  $this->dbc->query(
				sprintf("INSERT INTO sponsors_links SET sponsors_id = '%s', link_url = '%s', speakers_link_types_id = '3'",
				  $this->dbc->real_escape_string(htmlspecialchars($sponsor_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sLinkedin']))
				)
			);				
			break;
		case 'sflickr':
			  $this->dbc->query(
				sprintf("INSERT INTO sponsors_links SET sponsors_id = '%s', link_url = '%s', speakers_link_types_id = '4'",
				  $this->dbc->real_escape_string(htmlspecialchars($sponsor_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFlickr']))
				)
			);			
			break;
		case 'sgoogle':
			  $this->dbc->query(
				sprintf("INSERT INTO sponsors_links SET sponsors_id = '%s', link_url = '%s', speakers_link_types_id = '5'",
				  $this->dbc->real_escape_string(htmlspecialchars($sponsor_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sGoogle']))
				)
			);			
			break;								
		default :
			
	}
				

	  } // isset Speaker end
	
	 }
	 

	 //Sponsor delete
///---------------------------------------------------------------
function sponsor_delete($sId){
	
		// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO sponsors_status SET sponsors_id = '%s', status_id = '0'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId))
				)
			);
	
}
    //Sponsor  user Permission delete
///----------------------------------------------
function sponsor_permission_delete($sId, $user_id) {
	
	
									  //Gets all of the locations
		  $perm = $this->dbc->query(
						  sprintf("SELECT id FROM sponsors_user_connection WHERE sponsors_id = '%s' AND users_id = '%s' ORDER BY date DESC LIMIT 0,1",
						   $this->dbc->real_escape_string($sId),
						   $this->dbc->real_escape_string($user_id)
						   )
							  );	
						  if ($perm->num_rows > 0) {
							  while($data = $perm->fetch_assoc()){
								  
									//Delete user permission
									$this->dbc->query(
											sprintf("DELETE FROM sponsors_user_connection WHERE id = '%s'",
											  $this->dbc->real_escape_string(htmlspecialchars($data['id']))
											)
										);
								  
							  }
						  }
	
	
}


    //Sponsor  user Permission grant
///----------------------------------------------
function sponsor_permission_add($sId, $user_id) {
	
	
		$this->dbc->query(
				sprintf("INSERT INTO sponsors_user_connection SET sponsors_id = '%s', users_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($user_id))
				)
			);
	
	
}
	 
/************************************************************	 
	    MEDIAPARTNERS
************************************************************	
*/

  //Upload mediapartner	  - WIP
//-----------------------------------------------------	 
  function mediapartner_upload() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['Mediapartner']) && $_POST['Mediapartner'] != ''){
	        //If there's no mediapartner we don't upload anything :D
		 if(isset($_POST['Highlighted'])) {
				$check = 1;
			} else {
				$check = 0;
			}
			
			$_POST['MediapartnerTypes'] = 1;
		/*
		for now, unused
		if (!isset($_POST['MediapartnerTypes']) || $_POST['MediapartnerTypes'] < 0)	{
			$_POST['MediapartnerTypes'] = 1;
		}
	*/
	// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO mediapartners SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Mediapartner']))
				)
			);
		$mediapartners_id = $this->dbc->insert_id;
		
		$this->mediapartners_id = $mediapartners_id;
		
	//	we store the display name sparatly because here we can change it later and store it redundantly
		$this->dbc->query(
				sprintf("INSERT INTO mediapartners_name SET name = '%s', mediapartners_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Mediapartner'])),
				  $this->dbc->real_escape_string(htmlspecialchars($mediapartners_id))
				)
			);
	//set the mediapartner status to active	
	    $active = 1;	
			$this->dbc->query(
				sprintf("INSERT INTO mediapartners_status SET status_id = '%s', mediapartners_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($active)),
				  $this->dbc->real_escape_string(htmlspecialchars($mediapartners_id))
				)
			);		
			
		//Insert Personal data
		

      if (isset($_POST['MediapartnerTag']) && $_POST['MediapartnerTag'] != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $_POST['MediapartnerTag']);
					 
					 
	    $this->dbc->query(
				sprintf("INSERT INTO mediapartners_data SET mediapartners_id = '%s', mediapartners_bio = '%s', mediapartners_url = '%s', mediapartners_tag = '%s', mediapartners_rank = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($mediapartners_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['MediapartnerBio'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['MediapartnerURL'])),
				  $this->dbc->real_escape_string(htmlspecialchars($tag)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['MediapartnerTypes']))
				)
			);	
		$data_id = $this->dbc->insert_id;
		
		/*
		  //Unused code for now
		   //If the mediapartner is alacarte
		 
		     if ($check == 1) {
				 $this->dbc->query(
				sprintf("INSERT INTO mediapartners_data_alacarte SET mediapartners_id = '%s', alacarte = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($mediapartners_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($check))

				)
			);	
				 
				 if (isset($_POST['MediapartnerAlaCarteData'])){
					$carteData = explode('|', $_POST['MediapartnerAlaCarteData']);
					$this->ala_carte_edit_add($carteData,$mediapartners_id);
				 }
		
		    }//if check == 1
				
              */
			  
		}	//isset post_tag end	

	//LINKS	
	$what = "mediapartners";
	      //Twitter
		if ($_POST['MediapartnerTwitter']) {
			
			if ($_POST['MediapartnerTwitter'][0] == "@") {
				$twitt = "www.twitter.com/".substr($_POST['MediapartnerTwitter'], 1);
			} else {
				$twitt = $_POST['MediapartnerTwitter'];
			}	
					
						
			$this->link_upload('2', $twitt, $mediapartners_id, $what);	
		}
	
			      //Facebook
		if ($_POST['MediapartnerFacebook']  != '') {		
			$this->link_upload('1', $_POST['MediapartnerFacebook'], $mediapartners_id, $what);	
		}
			      //Linkedin
		if ($_POST['MediapartnerLinkedin'] != '') {	
		
		    $this->link_upload('3', $_POST['MediapartnerLinkedin'], $mediapartners_id, $what);		

		}
			      //Flickr
		if ($_POST['MediapartnerFlickr'] != '') {
			
			$this->link_upload('4', $_POST['MediapartnerFlickr'], $mediapartners_id, $what);			

		}
			      //Google+
		if ($_POST['MediapartnerGoogle'] != '') {	
		
		   $this->link_upload('5', $_POST['MediapartnerGoogle'], $mediapartners_id, $what);		
	
		}
		
           return $mediapartners_id;

	  } // isset Mediapartner end
	    
	 }
	 
//Add a la carte from mediapartners edit
function mediapartners_ala_carte_edit_add($carte, $sId) {
					 if (isset($carte)){
						foreach ($carte as $c){
							if (isset($c) && $c !=""){
							$this->add_ala_carte($sId, $c, 1);
							}
						}
				
				 }//isset post carteval
	
}
	 
	//Add new Al a Carte
//-------------------------------------------	
/*
We don't use this function for the mediapartners because of request :(

function mediapartners_add_ala_carte($sId, $sText, $needed) {

	  $this->dbc->query(
			sprintf("INSERT INTO mediapartners_ala_carte SET mediapartners_id = '%s', text = '%s'",
			  $this->dbc->real_escape_string(htmlspecialchars($sId)),
			  $this->dbc->real_escape_string(htmlspecialchars($sText))
			)
		   );
		   
		   $carte_id = $this->dbc->insert_id;
		   
		   $this->dbc->query(
			sprintf("INSERT INTO mediapartners_ala_carte_connection SET mediapartners_id = '%s', mediapartners_ala_carte_id = '%s'",
			  $this->dbc->real_escape_string(htmlspecialchars($sId)),
			  $this->dbc->real_escape_string(htmlspecialchars($carte_id))
			)
		   );
		   
		   
			if($needed == 1){
				$this->dbc->query(
				sprintf("INSERT INTO mediapartners_data_alacarte SET mediapartners_id = '%s', alacarte = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($needed))

				)
			);	
			}

				
	
}
	 
	//Edit Ala Carte mediapartner text
//-------------------------------------------
function mediapartners_alacarte_edit($sId, $alacarte, $connection_id) {
		    $this->dbc->query(
				sprintf("INSERT INTO mediapartners_ala_carte SET text = '%s', mediapartners_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($alacarte)),
				  $this->dbc->real_escape_string(htmlspecialchars($sId))
			         	)
		        	);	
					$carte_id = $this->dbc->insert_id;
					
			$this->dbc->query(
				sprintf("UPDATE mediapartners_ala_carte_connection SET mediapartners_ala_carte_id = '%s', mediapartners_id = '%s' WHERE id= '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($carte_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($connection_id))
			         	)
		        	);	
					
	
}
*/

function mediapartner_data($sTag, $sBio, $sCompanyLink, $sId, $rank) {
	
	      if (isset($sTag) && $sTag != ''){
		  
		              $vowels = array("/", "-", " ", ".", ",", "%", "!", "?", "{", "}", ";");		
                     $tag = str_replace($vowels, "_", $sTag);
	    $this->dbc->query(
				sprintf("INSERT INTO mediapartners_data SET mediapartners_id = '%s', mediapartners_bio = '%s', mediapartners_url = '%s', mediapartners_tag = '%s', mediapartners_rank = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId)),
				  $this->dbc->real_escape_string(htmlspecialchars($sBio)),
				  $this->dbc->real_escape_string(htmlspecialchars($sCompanyLink)),
				  $this->dbc->real_escape_string(htmlspecialchars($tag)),
				  $this->dbc->real_escape_string(htmlspecialchars($rank))
				)
			);	

		}	//isset post_tag end				
		
	
}	 

	 ///MODIFY SPONSOR
//-----------------------------------------------------	 
  function mediapartner_edit() {
	   //Insert the name (Main identificator)
	  if (isset($_POST['sName']) && $_POST['sName'] != '' && isset($_POST['sId']) && isset($_POST['sNId']) && isset($_POST['wat'])){
	        //If there's no mediapartner we don't upload anything :D
			

		$mediapartner_id = $_POST['sId'];
		

		
	//LINKS	
	switch ($_POST['wat']) {
		case 'sName':
				$this->dbc->query(
				sprintf("INSERT INTO mediapartners_name SET name = '%s', mediapartners_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sName'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
			         	)
		        	);				
			break;
			
		case 'sBio':
			$this->mediapartner_data($_POST['tag'], $_POST['sBio'], $_POST['sCompanyLink'], $_POST['sId'], $_POST['rank']);
			break;
							
		case 'sCompanyLink':
			$this->mediapartner_data($_POST['tag'], $_POST['sBio'], $_POST['sCompanyLink'], $_POST['sId'], $_POST['rank']);
			break;							
			
																	
		case 'stwitter':
			  $this->dbc->query(
				sprintf("INSERT INTO mediapartners_links SET mediapartners_id = '%s', link_url = '%s', speakers_link_types_id = '2'",
				  $this->dbc->real_escape_string(htmlspecialchars($mediapartner_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sTwitter']))
				)
			);				
			break;
		case 'sfacebook':
			  $this->dbc->query(
				sprintf("INSERT INTO mediapartners_links SET mediapartners_id = '%s', link_url = '%s', speakers_link_types_id = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($mediapartner_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFacebook']))
				)
			);			
			break;
		case 'slinkedin':
			  $this->dbc->query(
				sprintf("INSERT INTO mediapartners_links SET mediapartners_id = '%s', link_url = '%s', speakers_link_types_id = '3'",
				  $this->dbc->real_escape_string(htmlspecialchars($mediapartner_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sLinkedin']))
				)
			);				
			break;
		case 'sflickr':
			  $this->dbc->query(
				sprintf("INSERT INTO mediapartners_links SET mediapartners_id = '%s', link_url = '%s', speakers_link_types_id = '4'",
				  $this->dbc->real_escape_string(htmlspecialchars($mediapartner_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sFlickr']))
				)
			);			
			break;
		case 'sgoogle':
			  $this->dbc->query(
				sprintf("INSERT INTO mediapartners_links SET mediapartners_id = '%s', link_url = '%s', speakers_link_types_id = '5'",
				  $this->dbc->real_escape_string(htmlspecialchars($mediapartner_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sGoogle']))
				)
			);			
			break;								
		default :
			
	}
				

	  } // isset Speaker end
	
	 }
	 

	 //Mediapartner delete
///---------------------------------------------------------------
function mediapartner_delete($sId){
	
		// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO mediapartners_status SET mediapartners_id = '%s', status_id = '0'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId))
				)
			);
	
}	 

	
/************************************************************	 
	     AGENDA
************************************************************	


   Agenda upload 
--------------------------------------------------------------*/
	 function agenda_upload($SpeakerAgenda) {
	  if(isset($_POST['AgendaTitle'])){
	 
	 if(!isset($_POST['Agenda'])) {
		 $this->dbc->query(
				sprintf("INSERT INTO agenda_event SET name = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTitle']))
				)
			);
		$agenda_id = $this->dbc->insert_id;
		 
	  }else {
		  $agenda_id = $_POST['Agenda'];
	  }
	 	
		
		$stat = 1;
		 $this->dbc->query(
				sprintf("INSERT INTO agenda_event_status SET agenda_event_id = '%s', status_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($stat))
				)
			);
			
		
		$this->dbc->query(
				sprintf("INSERT INTO agenda_event_title SET agenda_name = '%s', agenda_event_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTitle'])),
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id))
				)
			);
			
			if(isset($_POST['Highlighted'])) {
				$check = 1;
			} else {
				$check = 0;
			}
			
		  if(isset($_POST['Moderator'])) {
			  //if it's a moderator session
			  
			  
			  //Check if the session is already exists
			  $GetModeratorId = $this->dbc->query(
				sprintf("SELECT id FROM agenda_event_moderator WHERE agenda_event_day = '%s' AND agenda_location_id = '%s' ORDER BY date DESC LIMIT 0,1",
							$this->dbc->real_escape_string(htmlspecialchars($_POST['Day'])),
							$this->dbc->real_escape_string(htmlspecialchars($_POST['Locations']))
				)
				   );	
					if (mysqli_num_rows($GetModeratorId)) {
						//if we find an existing session
					   while($moderatorId = $GetModeratorId->fetch_assoc()){
						   
							 $this->dbc->query(
								  sprintf("UPDATE agenda_event_moderator SET agenda_event_id = '%s' WHERE id = '%s'",
									$this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
									$this->dbc->real_escape_string(htmlspecialchars($moderatorId['id']))
								  )
							  );	
								   

					   } //personal fetch assoc end
					   
				   } else {  
			         //if we don't find a session
					 
					  $this->dbc->query(
						  sprintf("INSERT INTO agenda_event_moderator SET agenda_event_id = '%s', agenda_event_day = '%s', agenda_location_id = '%s'",
							$this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
							$this->dbc->real_escape_string(htmlspecialchars($_POST['Day'])),
							$this->dbc->real_escape_string(htmlspecialchars($_POST['Locations']))
						  )
					  );	
			      //we upload one
				  
				   }  //mysqli num rows stat




			} else {
			  //if it's not a moderator session
			  
				   $this->dbc->query(
						  sprintf("INSERT INTO agenda_event_data SET time_start = '%s', time_end = '%s', day = '%s', abstract = '%s', location_id = '%s', highlighted = '%s'",
							$this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTimeStart'])),
							$this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTimeEnd'])),
							$this->dbc->real_escape_string(htmlspecialchars($_POST['Day'])),
							$this->dbc->real_escape_string(htmlspecialchars($_POST['Abstract'])),
							$this->dbc->real_escape_string(htmlspecialchars($_POST['Locations'])),
							$this->dbc->real_escape_string(htmlspecialchars($check))
						  )
					  );	
				  $data_id = $this->dbc->insert_id;
				  
				  
					$this->dbc->query(
						  sprintf("INSERT INTO agenda_event_connection SET agenda_event_id = '%s', agenda_event_data_id = '%s'",
							$this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
							$this->dbc->real_escape_string(htmlspecialchars($data_id))
						  )
					  );	
			  
			
			}//if post moderator else end


       if(isset($_POST['Icons'])) {
		   	  $this->dbc->query(
				sprintf("INSERT INTO agenda_event_icon_connection SET agenda_event_id = '%s', agenda_event_icon_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Icons']))
				)
			);	
	   }
	   
	      if(isset($_POST['AgendaTag'])) {
		   	  $this->dbc->query(
				sprintf("INSERT INTO agenda_event_tag SET agenda_event_id = '%s', agenda_tag = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTag']))
				)
			);	
	   }
	   
	   

	if(isset($SpeakerAgenda) && $SpeakerAgenda != '') {
		$Speakers = explode('|', $SpeakerAgenda);
		
		foreach ($Speakers As $person) {
			if ($person != '') {
			  $this->dbc->query(
				sprintf("INSERT INTO agenda_event_speakers_connection SET speakers_id = '%s', agenda_event_id = '%s', status = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($person)),
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id))
				)
			);	
			}

		}
		

	}  //isset speaker_id
 } //isset agendaTitle
	 }	
	
	
/*-------------------------------
Modify Agenda
-------------------------
*/	

	 function agenda_modify($SpeakerAgenda, $agenda_id) {
 				$data = $this->edit_agenda($agenda_id);
                  
				  //Determine what's changed
				  /*
				  						  $content[1] = $data['time_start'];
										  $content[2] = $data['time_end'];
										  $content[3] = $data['day'];
										  $content[4] = $data['abstract'];
										  $content[5] = $data['location'];
										   $content[6] = $title['agenda_name'];
										  $content[7] = $data['highlighted'];
										  $content[8] = $Icons['icon_type'];
										  $content[9] .= $sid.';';
										  $content[10] .= $sname.';';
										 
				  */
				  
				   //name changed
				  if ($data[6] != $_POST['AgendaTitle']){
					  
					$this->dbc->query(
						sprintf("INSERT INTO agenda_event_title SET agenda_name = '%s', agenda_event_id = '%s'",
						  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTitle'])),
						  $this->dbc->real_escape_string(htmlspecialchars($agenda_id))
						)
					);
				 }//if data 6
		         
				 
				 				   //name changed
				  if ($data[11] != $_POST['AgendaTag']){
					  
					$this->dbc->query(
						sprintf("INSERT INTO agenda_event_tag SET agenda_tag = '%s', agenda_event_id = '%s'",
						  $this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTag'])),
						  $this->dbc->real_escape_string(htmlspecialchars($agenda_id))
						)
					);
				 }//if data 6
		         

			
			if(isset($_POST['Highlighted'])) {
				$check = 1;
			} else {
				$check = 0;
			}
			
			//if it's a moderator session
			if(isset($_POST['ModeratorId'])) {
				$this->dbc->query(
					  sprintf("UPDATE agenda_event_moderator SET agenda_event_day = '%s', agenda_location_id = '%s' WHERE id = '%s'",
						$this->dbc->real_escape_string(htmlspecialchars($_POST['Day'])),
						$this->dbc->real_escape_string(htmlspecialchars($_POST['Locations'])),
						$this->dbc->real_escape_string(htmlspecialchars($_POST['ModeratorId']))
					  )
				  );	
			} else {//moderator session end
				
				//if it's NOT a moderator session!
				  if (($data[1] != $_POST['AgendaTimeStart']) || ($data[2] != $_POST['AgendaTimeEnd']) || ($data[3] != $_POST['Day']) || ($data[4] != $_POST['Abstract']) || ($data[5] != $_POST['Locations']) || ($data[7] != $check)){
				  
			  $this->dbc->query(
					  sprintf("INSERT INTO agenda_event_data SET time_start = '%s', time_end = '%s', day = '%s', abstract = '%s', location_id = '%s', highlighted = '%s'",
						$this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTimeStart'])),
						$this->dbc->real_escape_string(htmlspecialchars($_POST['AgendaTimeEnd'])),
						$this->dbc->real_escape_string(htmlspecialchars($_POST['Day'])),
						$this->dbc->real_escape_string(htmlspecialchars($_POST['Abstract'])),
						$this->dbc->real_escape_string(htmlspecialchars($_POST['Locations'])),
						$this->dbc->real_escape_string(htmlspecialchars($check))
					  )
				  );	
			  $data_id = $this->dbc->insert_id;
			  
				  
				  
				  
				  
				$this->dbc->query(
					  sprintf("INSERT INTO agenda_event_connection SET agenda_event_id = '%s', agenda_event_data_id = '%s'",
						$this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
						$this->dbc->real_escape_string(htmlspecialchars($data_id))
					  )
				  );	
				  
				 } //if something from data changed
		   
		}//moderator session else end
		
       if(isset($_POST['Icons']) && $data[8] != $_POST['Icons']) {
		   	  $this->dbc->query(
				sprintf("INSERT INTO agenda_event_icon_connection SET agenda_event_id = '%s', agenda_event_icon_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Icons']))
				)
			);	
	   }

	if(isset($SpeakerAgenda) && $SpeakerAgenda != '') {
		//le kell kezelni a -1 -et is
        $k = 0;
		$noSpeaker = 0;
		
		$names = $this->dbc->query(
			sprintf("SELECT speakers_id, id FROM agenda_event_speakers_connection WHERE agenda_event_id = '%s' AND status='1' ORDER BY date",
			         $this->dbc->real_escape_string($agenda_id)
					 )
		               	);	
					if ($names->num_rows > 0) {
					  while($data = $names->fetch_assoc()){
						$current["id"][$k] = $data["id"];
						$current["sId"][$k] = $data["speakers_id"];
						$k++;
					  }
			    } else {
					$noSpeaker = 1;
				}
		
		
		
		 if ($SpeakerAgenda == "-1") {

			 foreach ($current["sId"] as $d => $Sdb) {

					  //if it is not in the new but it's in the db, we simply inactivate that speaker
						$this->dbc->query(
								  sprintf("UPDATE agenda_event_speakers_connection SET status = '0' WHERE id = '%s'",
									$this->dbc->real_escape_string(htmlspecialchars($current["id"][$d]))
								  )
							  );
				  
			  } //foreach current speaker ids





        //if speakeragenda == -1
		 } else {

			$Speakers = explode('|', $SpeakerAgenda); 
		
		  if ($noSpeaker == 0) { //if we don't have speakers at all, we don't need to check! :O
	  /// We check first if we have to delete a speaker from that session
			  foreach ($current["sId"] as $d => $Sdb) {
				  $cool = 0;
				  foreach($Speakers as $Snew) {
					  if ($Snew == $Sdb) {
						  $cool = 1;
					  }
					  
				  }//foreach speakers
				  
				  if ($cool == 0 && $current["id"][$d] != '' && $current["id"][$d] > 0) {
					  //if it is not in the new but it's in the db, we simply inactivate that speaker
						$this->dbc->query(
								  sprintf("UPDATE agenda_event_speakers_connection SET status = '0' WHERE id = '%s'",
									$this->dbc->real_escape_string(htmlspecialchars($current["id"][$d]))
								  )
							  );
	  
				  }// cool  = 0
				  
			  } //foreach current speaker ids
		  }
	  
	  /// Now we check if we need to add a new speaker to that session
	  
			  foreach ($Speakers as $d => $Snew) {
				  $cool = 0;
				   if ($noSpeaker == 0) {
				  foreach($current["sId"] as $Sdb) {
					  if ($Snew == $Sdb) {
						  $cool = 1;
					  }
				  }
				  }//foreach speakers
				  
				  if ($cool == 0 && $Snew != '' && $Snew > 0) {
					  //if it is not in the new but it's in the db, we simply inactivate that speaker
						   $this->dbc->query(
								  sprintf("INSERT INTO agenda_event_speakers_connection SET speakers_id = '%s', agenda_event_id = '%s', status = '1'",
									$this->dbc->real_escape_string(htmlspecialchars($Snew)),
									$this->dbc->real_escape_string(htmlspecialchars($agenda_id))
								  )
							  );	
	  
				  }// cool  = 0
				  
			  } //foreach current speaker ids
			  
		 } // $SpeakerAgenda != -1

    }  //isset speaker agenda

	 }	
		
	
  function edit_agenda($agenda_id) {
	$i = 0;

												   
						   $agendaData = $this->dbc->query(
								  sprintf("SELECT aed.time_start, aed.time_end, aed.day, aed.abstract, ael.location, aed.highlighted FROM agenda_event_data as aed, agenda_event_location as ael, agenda_event_connection as aec WHERE aec.agenda_event_id = '%s' AND aec.agenda_event_data_id=aed.id AND ael.id=aed.location_id ORDER BY aec.date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($agenda_id)
								  )
									 );	
									  if (mysqli_num_rows($agendaData)) {
									  while($data = $agendaData->fetch_assoc()){
										  $content[1] = $data['time_start'];
										  $content[2] = $data['time_end'];
										  $content[3] = $data['day'];
										  $content[4] = $data['abstract'];
										  $content[5] = $data['location'];
										  $content[7] = $data['highlighted'];
										  
									  } //data fetch assoc end
								  }  //data num rows if end
								  
								  
				//Agenda title						  
						$agendatitle = $this->dbc->query(
								  sprintf("SELECT agenda_name FROM agenda_event_title WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($agenda_id)
								  )
									 );	
									  if (mysqli_num_rows($agendatitle)) {
									  while($title = $agendatitle->fetch_assoc()){
										  $content[6] = $title['agenda_name'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  
										  				//Agenda title						  
						$agendatag = $this->dbc->query(
								  sprintf("SELECT agenda_tag FROM agenda_event_tag WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($agenda_id)
								  )
									 );	
									  if (mysqli_num_rows($agendatag)) {
									  while($tag = $agendatag->fetch_assoc()){
										  $content[11] = $tag['agenda_tag'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  
								
										  //Check if the session is a moderator session
			  $GetModeratorId = $this->dbc->query(
				sprintf("SELECT aem.id, aem.agenda_event_day, ael.location  FROM agenda_event_moderator as aem, agenda_event_location as ael WHERE aem.agenda_event_id = '%s' AND aem.agenda_location_id=ael.id ORDER BY aem.date DESC LIMIT 0,1",
							$this->dbc->real_escape_string(htmlspecialchars($agenda_id))
				)
				   );	
					if (mysqli_num_rows($GetModeratorId)) {
						//if we find an existing session
					   while($moderatorId = $GetModeratorId->fetch_assoc()){
						   $content[3] = $moderatorId['agenda_event_day'];
						   $content[5] = $moderatorId['location'];
						   $content[14] = 1; //moderator session index
						   $content[15] = $moderatorId['id'];
									//Get the agenda data
					   }
					}
								  	
										
										
										  
					$agendaicon = $this->dbc->query(
								  sprintf("SELECT aei.icon_name FROM agenda_event_icons as aei, agenda_event_icon_connection as aeic WHERE aeic.agenda_event_id = '%s' AND aeic.agenda_event_icon_id=aei.id ORDER BY aeic.date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($agenda_id)
								  )
									 );	
									  if (mysqli_num_rows($agendaicon)) {
									  while($Icons = $agendaicon->fetch_assoc()){
										  $content[8] = $Icons['icon_name'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  										  
						
						$agenda_speakers = $this->agenda_edit_speakers($agenda_id);
						
						if (isset($agenda_speakers[0])) {
							$content[9] = '';
							$content[10]= '';
							foreach ($agenda_speakers[0] As $sid) {
								$content[10] .= $sid.';';
							}
							
							foreach ($agenda_speakers[1] As $sname) {
								$content[9] .= $sname.';';
							}
							

						} else {
							$content[9] = '';
							$content[10]= '';
						}
						
		
			if (isset($content)) {
				return $content;
			}
  }	
	

	 //Agenda delete
///---------------------------------------------------------------
function agenda_delete($sId){
	
		// This will be the main table the defining chapter in HRN History!
		$this->dbc->query(
				sprintf("INSERT INTO agenda_event_status SET agenda_event_id = '%s', status_id = '0'",
				  $this->dbc->real_escape_string(htmlspecialchars($sId))
				)
			);
			
												  //Check if the session is a moderator session
			  $GetModeratorId = $this->dbc->query(
				sprintf("SELECT id FROM agenda_event_moderator WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
							$this->dbc->real_escape_string(htmlspecialchars($sId))
				)
				   );	
					if (mysqli_num_rows($GetModeratorId)) {
						//if we find an existing session
					   while($moderatorId = $GetModeratorId->fetch_assoc()){
																	//Delete user permission
							  $this->dbc->query(
									  sprintf("DELETE FROM agenda_event_moderator WHERE id = '%s'",
										$this->dbc->real_escape_string(htmlspecialchars($moderatorId['id']))
									  )
								  );
								 
						    if (isset($_COOKIE['Moo'])) {
								$this->db_log($_COOKIE['Moo'],"An agenda session moderator has been deleted", $sId);
							   }  
								  
					   }
					}
								
			
	
}	 


function agenda_edit_speakers($id) {
	//Gets all of the speakers names
	$i = 0;
	$content[0][0] = '';
	$names = $this->dbc->query(
			sprintf("SELECT speakers_id FROM agenda_event_speakers_connection WHERE agenda_event_id = '%s' AND status='1' ORDER BY date",
			         $this->dbc->real_escape_string($id)
					 )
		               	);	
					if ($names->num_rows > 0) {
					while($data = $names->fetch_assoc()){
						
						$status = 0;
				   
	//Get the names					   
	 $name = $this->dbc->query(
				sprintf("SELECT id, name FROM speakers_name WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['speakers_id'])
				)
				   );	
					if (mysqli_num_rows($name)) {
					while($sName = $name->fetch_assoc()){
						$content[0][$i] = $sName['name'];
						$content[1][$i] = $data['speakers_id'];
						$i++;
					} //personal fetch assoc end
				}  //personal num rows if end
			   
			}
					
		} else {
		  $content = '';
		}
		
		if (isset($content)) {
			return $content;
		}
		
}
	
	 
 }
 
 
/*
------------------------------------
IMAGE MODIFICATIONS
------------------------------------
*/ 
 
 //Modify Sponsor image
  if(isset($_POST['SponsorImageSecret']) && $_POST['SponsorImageSecret'] == "ThisIsASecret"){
	$the_main = new main();

   if (is_uploaded_file($_FILES['file']['tmp_name']) && isset($_POST['SponsorImageModifyId'])) {
	   $uploadpath = '../../img/sponsors';
       $path = $the_main->file_upload($uploadpath);
	   $the_main->picture_upload("sponsors", $_POST['SponsorImageModifyId'], " ", $path);
	   	  if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"A sponsor image has been changed", $_POST['SponsorImageModifyId']);
	  } 
	   
   }   
     
}// Modify sponsor image


 //Modify Speaker image
  if(isset($_POST['SpeakerImageSecret']) && $_POST['SpeakerImageSecret'] == "ThisIsASecret"){
	$the_main = new main();

   if (is_uploaded_file($_FILES['file']['tmp_name']) && isset($_POST['SpeakerImageModifyId'])) {
	   $uploadpath = '../../img/speakers';
       $path = $the_main->file_upload($uploadpath);
	   $the_main->picture_upload("speakers", $_POST['SpeakerImageModifyId'], " ", $path);
	   	   	  if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"A speaker image has been changed", $_POST['SpeakerImageModifyId']);
	  } 
	   
	   
   }

     
}// Modify Speaker image


 //Modify Blogsquad image
  if(isset($_POST['BlogsquadImageSecret']) && $_POST['BlogsquadImageSecret'] == "ThisIsASecret"){
	$the_main = new main();

   if (is_uploaded_file($_FILES['file']['tmp_name']) && isset($_POST['BlogsquadImageModifyId'])) {
	   $uploadpath = '../../img/blogsquad';
       $path = $the_main->file_upload($uploadpath);
	   $the_main->picture_upload("blogsquad", $_POST['BlogsquadImageModifyId'], " ", $path);
	   	 if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"A blogsquad image has been changed", $_POST['BlogsquadImageModifyId']);
	  }
	   
	   
   }   
     
}// Modify blog squad image

 //Modify Media partner image
  if(isset($_POST['MediapartnerImageSecret']) && $_POST['MediapartnerImageSecret'] == "ThisIsASecret"){
	$the_main = new main();

   if (is_uploaded_file($_FILES['file']['tmp_name']) && isset($_POST['MediapartnerImageModifyId'])) {
	   $uploadpath = '../../img/mediapartners';
       $path = $the_main->file_upload($uploadpath);
	   $the_main->picture_upload("mediapartners", $_POST['MediapartnerImageModifyId'], " ", $path);
	   	if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"A mediapartner image has been changed", $_POST['MediapartnerImageModifyId']);
	  }
	   
	   
   }   
     
}// Modify blogsquad image



/*
-----------------------------
GLOBAL
-----------------------------
*/

 /*///////////// 
Social link edit request
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'SocialEdit' && isset($_POST['sId'])&& isset($_POST['type'])){
	 if (isset($_COOKIE['SocialLinkEdit'])) {
         unset($_COOKIE['SocialLinkEdit']);
        setcookie('SocialLinkEdit', null, -1, '/');

      } 
	$the_main = new main();
    $id = $the_main->ekezet_nelkuli($_POST['sId']);
	$type = $the_main->ekezet_nelkuli($_POST['type']);
	$content = $id.':'.$type;
	setcookie('SocialLinkEdit', $content, time() + (15), "/");

}// sponsors permission request

 /*///////////// 
Social link actual edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'SocialLinkUpdate' && isset($_POST['sId']) && isset($_POST['sType']) && isset($_POST['sLinks']) && isset($_POST['sURLs'])){

	$the_main = new main();
    $id = $the_main->social_link_update($_POST['sId'], $_POST['sType'], $_POST['sLinks'], $_POST['sURLs']);

}// sponsors permission request
    

/*///////////// 
Response cookie generator
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'GenerateResponseCookie' && isset($_POST['sId'])){
	 if (isset($_COOKIE['ResponseCookie'])) {
         unset($_COOKIE['ResponseCookie']);
        setcookie('ResponseCookie', null, -1, '/');

      } 
	$the_main = new main();
    $id = $the_main->ekezet_nelkuli($_POST['sId']);
	setcookie('ResponseCookie', $id, time() + (20), "/");

}// Set response cookie end

 
  /*
-------------------------
SPEAKERS
---------------------------
*/


/*///////////// 
Add new speaker
///////////////*/

 if(isset($_POST['Speaker']) && (is_uploaded_file($_FILES['file']['tmp_name']) || isset($_POST['Gender']) ) ){
	$the_main = new main();
   $the_main->speaker_upload();
   //$the_main->agenda_upload($the_main->speaker_id);
   if (isset($_POST['Gender'])) {
	   $the_main->avatar_upload($_POST['Gender']);
   }
   if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	   $uploadpath = '../../img/speakers';
       $path = $the_main->file_upload($uploadpath);
	   $the_main->picture_upload("speakers", $the_main->speaker_id, " ", $path);
   }
 
   $the_main->speaker_order($the_main->speaker_id, $_POST['Order']);
   
   	   	if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"A speaker has been uploaded", $the_main->speaker_id);
	  }
   // header('Location:../speakers');
   
     
}// post speaker end
 
/*///////////// 
Modify Speaker Order
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_sort' && isset($_POST['list_order'])){
	$the_main = new main();
    $the_main->speaker_arrange();
	   	   	if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"The speaker order has been changed", " ");
	  }

}// modify order end

/*///////////// 
Upload new social link to speakers
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'new_link' && isset($_POST['typeid']) && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->link_upload($_POST['typeid'], $_POST['newlink'], $_POST['sId'], "speakers");
	 if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"A new social link has been uploaded to the speakers", $_POST['sId']);
	  }

}//new social link for speakers end
 

/*///////////// 
Edit Speakers
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_edit' && isset($_POST['sName'])){
	$the_main = new main();
    $the_main->speaker_edit();
	 if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"Speaker has been modified", $_POST['sId']);
	  }

}// edit speakers
 
 
 
/*///////////// 
Speaker Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_delete' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->speaker_delete();
     if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"Speaker has been deleted", $_POST['sId']);
	  }

}// delete speakers


/*///////////// 
Speaker make it visible
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'MakeTheSpeakerVisible' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->speaker_makevisible();
     if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"Speaker has been set to be visible on main site", $_POST['sId']);
	  }

}// visible end

/*
-------------------------
BLOGSQUAD
---------------------------
*/

/*///////////// 
Add new blogsquad
///////////////*/

 if(isset($_POST['Blogsquad']) && (is_uploaded_file($_FILES['file']['tmp_name']) || isset($_POST['Gender']) ) ){
	$the_main = new main();
   $the_main->blogsquad_upload();
   //$the_main->agenda_upload($the_main->blogsquad_id);
   if (isset($_POST['Gender'])) {
	   $the_main->avatar_upload($_POST['Gender']);
   }
   if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	   $uploadpath = '../../img/blogsquad';
       $path = $the_main->file_upload($uploadpath);
	   $the_main->picture_upload("blogsquad", $the_main->blogsquad_id, " ", $path);
   }
 
   $the_main->blogsquad_order($the_main->blogsquad_id, $_POST['Order']);
   
        if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"A blogger have been uploaded", $the_main->blogsquad_id);
	  }
   // header('Location:../blogsquad');
   
     
}// post blogsquad end


/*///////////// 
Modify Blogsquad Order
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'blogsquad_sort' && isset($_POST['list_order'])){
	$the_main = new main();
    $the_main->blogsquad_arrange();
  	if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"The speaker order has been changed", " ");
	  }

}// modify order end

/*///////////// 
Modify Blogsquad blog data
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'edit_blogsquad_blog_data' && isset($_POST['B_id'])){
	$the_main = new main();
    $the_main->blogsquad_blog_data_edit($_POST['blog_id'], $_POST['B_id'], $_POST['Title'], $_POST['URL']);
	        if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"Blogger blog data have been edited", $_POST['blog_id']);
	  }

}// modify order end


/*///////////// 
Add new Blogsquad blog data
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'AddNewBlogsquadBlogEdit' && isset($_POST['title'])){
	$the_main = new main();
    $the_main->blogsquad_blog_edit_add($_POST['sId'], $_POST['title'], $_POST['url']);
	if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"A new blog have been added", $_POST['sId']);
	  }

}// modify order end


/*///////////// 
Upload new social link to blogsquad
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'new_blogsquad_link' && isset($_POST['typeid']) && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->link_upload($_POST['typeid'], $_POST['newlink'], $_POST['sId'], "blogsquad");
		if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"A new social link have been added to blogger", $_POST['sId']);
	  }


}//new social link for blogsquad end
 

/*///////////// 
Edit Blogsquad
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'blogsquad_edit' && isset($_POST['sName'])){
	$the_main = new main();
    $the_main->blogsquad_edit();
	if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"Blogger has been modified", $_POST['sId']);
	  }

}// edit blogsquad
 
 
 
/*///////////// 
Blogsquad Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'blogsquad_delete' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->blogsquad_delete();
		if (isset($_COOKIE['Moo'])) {
		   $the_main->db_log($_COOKIE['Moo'],"Blogger have been deleted", $_POST['sId']);
	  }

}// delete blogsquad

/*
-------------------------
SPONSORS
---------------------------
*/

/*///////////// 
Add new sponsor
///////////////*/

 if(isset($_POST['Sponsor']) && (is_uploaded_file($_FILES['file']['tmp_name']))){
	$the_main = new main();
   $sponsorsid = $the_main->sponsor_upload();


   if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	   $uploadpath = '../../img/sponsors';
      $path = $the_main->file_upload($uploadpath);
	  $the_main->picture_upload("sponsors", $sponsorsid, " ", $path); 
	  if (isset($_COOKIE['Moo'])) {
		   $the_main->sponsor_permission_add($sponsorsid, $_COOKIE['Moo']);
		   $the_main->db_log($_COOKIE['Moo'],"A new sponsor has been added", $_POST['Sponsor']);
	  } 
	  
   }

   // header('Location:../index.php?q=sponsors');
   
     
}// post sponsor end

/*///////////// 
Sponsor Edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_edit' && isset($_POST['sName'])){
	$the_main = new main();
    $the_main->sponsor_edit();
	 if (isset($_COOKIE['Moo'])) {
		        $the_main->db_log($_COOKIE['Moo'],"A sponsor has been modified", $_POST['sName']);
	      } 

}// edit sponsors
 
/*///////////// 
Sponsor Type Edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_type_edit'){
	
	$the_main = new main();
    $the_main->sponsor_data($_POST['tag'],$_POST['sBio'],$_POST['sCompanyLink'],$_POST['sId'],$_POST['rank']);
		 if (isset($_COOKIE['Moo'])) {
		        $the_main->db_log($_COOKIE['Moo'],"Type of a sponsor has been modified", $_POST['sId']);
	      } 

}// edit sponsors 

/*///////////// 
Sponsor AlaCarte Edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'alacarte_edit'){
	
	$the_main = new main();
    $the_main->alacarte_edit($_POST['sId'],$_POST['sAlaCarte'], $_POST['sAlaCarteConnectionId']);
		 if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"A La Carte sponsor has been edited", $_POST['sId']);
	  } 


}// edit sponsors 


/*
///////////// 
Add AlaCarte
///////////////
 //unused

 if(isset($_POST['action']) && $_POST['action'] == 'AddNewAlaCarte' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->add_ala_carte($_POST['sId'], $_POST['sName'], 1);

}// alacarte_new
 
 */
 
/* ///////////// 
Add AlaCarte
///////////////
 */

 if(isset($_POST['action']) && $_POST['action'] == 'AddNewAlaCarteEdit' && isset($_POST['sId']) && isset($_POST['carte'])){
	$the_main = new main();
    $the_main->ala_carte_edit_add($_POST['carte'], $_POST['sId']);
	 if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"A La Carte sponsor has been added", $_POST['sId']);
	  } 

}// alacarte_new
 
 
 
 
/*///////////// 
Upload new social link to SPONSORS
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'new_sponsor_link' && isset($_POST['typeid']) && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->link_upload($_POST['typeid'], $_POST['newlink'], $_POST['sId'], "sponsors");
	 if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"A sponsor social link has been updated", $_POST['newlink']);
	  } 

}//new social link for speakers end
 
 /*///////////// 
Sponsors Permission request
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'SponsorsPermissionSession' && isset($_POST['sId'])){
	 if (isset($_COOKIE['SponsorsPermission'])) {
         unset($_COOKIE['SponsorsPermission']);
        setcookie('SponsorsPermission', null, -1, '/');

      } 
	$the_main = new main();
    $id = $the_main->ekezet_nelkuli($_POST['sId']);
	setcookie('SponsorsPermission', $id, time() + (20), "/");

}// sponsors permission request
    
 
 /*///////////// 
Sponsor Permission Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'SponsorPermissionDelete' && isset($_POST['sId']) && isset($_POST['user_id'])){
	$the_main = new main();
    $the_main->sponsor_permission_delete($_POST['sId'], $_POST['user_id']);
	
	 if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"User Permission has been deleted for user: ".$_POST['user_id'], 'Sponsor: '.$_POST['sId']);
	  } 


}// delete sponsors permission 


 /*///////////// 
Sponsor Permission Add
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'SponsorPermissionAdd' && isset($_POST['sId']) && isset($_POST['user_id'])){
	$the_main = new main();
    $the_main->sponsor_permission_add($_POST['sId'], $_POST['user_id']);
	
	 if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"User Permission has been added for user: ".$_POST['user_id'], 'Sponsor: '.$_POST['sId']);
	  } 


}// delete sponsors permission 


 
/*///////////// 
Sponsor Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_delete' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->sponsor_delete($_POST['sId']);
	 if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"A sponsor has been deleted", $_POST['sId']);
	  } 
	
}// delete sponsors
 
/*
-----------------------------
MEDIAPARTNERS
------------------------------
*/ 


/*///////////// 
Add new mediapartner
///////////////*/

 if(isset($_POST['Mediapartner']) && (is_uploaded_file($_FILES['file']['tmp_name']))){
	$the_main = new main();
   $mediapartnersid = $the_main->mediapartner_upload();


   if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	   $uploadpath = '../../img/mediapartners';
      $path = $the_main->file_upload($uploadpath);
	  $the_main->picture_upload("mediapartners", $mediapartnersid, " ", $path); 
	  		 if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"Mediapartner have been added", $mediapartnersid);
	  } 
	  
   }

   // header('Location:../index.php?q=sponsors');
   
     
}// post sponsor end

/*///////////// 
Sponsor Edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'mediapartner_edit' && isset($_POST['sName'])){
	$the_main = new main();
    $the_main->mediapartner_edit();
		  if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"Mediapartner have been modified", $_POST['sId']);
	  } 

}// edit sponsors
 
/*///////////// 
Sponsor Type Edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'mediapartner_type_edit'){
	
	$the_main = new main();
    $the_main->mediapartner_data($_POST['tag'],$_POST['sBio'],$_POST['sCompanyLink'],$_POST['sId'],$_POST['rank']);
			  if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"Mediapartner type have been modified", $_POST['sId']);
	  } 


}// edit sponsors 

/*///////////// 
Sponsor AlaCarte Edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'mediapartners_alacarte_edit'){
	
	$the_main = new main();
    $the_main->mediapartners_alacarte_edit($_POST['sId'],$_POST['sAlaCarte'], $_POST['sAlaCarteConnectionId']);
			  if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"A La Carte Mediapartner have been modified", $_POST['sId']);
	  } 


}// edit sponsors 


/*
///////////// 
Add AlaCarte
///////////////
  //unused, because we did it differently

 if(isset($_POST['action']) && $_POST['action'] == 'AddNewAlaCarte' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->add_ala_carte($_POST['sId'], $_POST['sName'], 1);

}// alacarte_new
 
 */
 
/* ///////////// 
Add AlaCarte
///////////////
 */

 if(isset($_POST['action']) && $_POST['action'] == 'MediaAddNewAlaCarteEdit' && isset($_POST['sId']) && isset($_POST['carte'])){
	$the_main = new main();
    $the_main->mediapartners_ala_carte_edit_add($_POST['carte'], $_POST['sId']);
			  if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"A La Carte Mediapartner have been added", $_POST['sId']);
	  } 


}// alacarte_new
 
 
 
 
/*///////////// 
Upload new social link to Mediapartners
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'new_mediapartner_link' && isset($_POST['typeid']) && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->link_upload($_POST['typeid'], $_POST['newlink'], $_POST['sId'], "mediapartners");
	
			  if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"Social link has been added to Media Partners", $_POST['sId']);
	  } 


}//new social link for mediapartners
  

/*///////////// 
Sponsor Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'mediapartner_delete' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->mediapartner_delete($_POST['sId']);
	
	 if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"Mediapartner have been deleted", $_POST['sId']);
	  } 


}// delete sponsors
  
  /*
 
 
  
  /* 
-------------------------
AGENDA
---------------------------
*/

/*///////////// 
Add new agenda
///////////////*/

if (isset($_POST['AgendaSubmit'])) {
	$the_main = new main();
	
	if (isset($_POST['SelectedSpeakers'])) {
		$speakers = $_POST['SelectedSpeakers'];
	} else {
	 $speakers = '';	
	}

	$the_main->agenda_upload($speakers);
      if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"New Agenda have been added", $_POST['AgendaTitle']);
	  } 

	header('Location:../agenda');
}

/*///////////// 
Edit agenda
///////////////*/

if (isset($_POST['AgendaEditSubmit'])) {
	$the_main = new main();
	
	if (isset($_POST['SelectedSpeakers'])) {
		$aId = $_POST['SecretAgendaEditId'];
	} else {
		$aId = -1;
	}
	
	
	if (isset($_POST['SelectedSpeakers'])) {
		$speakers = $_POST['SelectedSpeakers'];
	} else {
	 $speakers = '';	
	}

	$the_main->agenda_modify($speakers, $aId);
	
	      if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"Agenda have been modified", $aId);
	  } 
	header('Location:../agenda');
}


/*///////////// 
Agenda Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'agenda_delete' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->agenda_delete($_POST['sId']);
	 if (isset($_COOKIE['Moo'])) {
	    $the_main->db_log($_COOKIE['Moo'],"Agenda have been deleted", $_POST['sId']);
	  } 

}// delete agenda

/*///////////// 
Agenda edit request
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'AgendaEditSession' && isset($_POST['sId'])){
	 if (isset($_COOKIE['AgendaEditVal'])) {
         unset($_COOKIE['AgendaEditVal']);
        setcookie('AgendaEditVal', null, -1, '/');

      } 
	$the_main = new main();
    $id = $the_main->ekezet_nelkuli($_POST['sId']);
	setcookie('AgendaEditVal', $id, time() + (20), "/");

}// Agenda edit request end
    
  
/*///////////// 
Agenda edit change
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'agenda_edit' && isset($_POST['id'])){
	 $asd = '';
	$the_main = new main();
    $data = $the_main->edit_agenda($_POST['id']);
	
	/*	foreach ($data As $d) {
			foreach ($d As $k) {
				$asd .= $k.';';
			}
			
		}
		echo $asd;*/
		
		echo json_encode($data);
}// edit speakers



?>
