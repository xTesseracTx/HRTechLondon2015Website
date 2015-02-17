<?php
include_once('aaa.php');
include_once('config.php');

/*
Known Issues!
   - when you edit a social link and press enter, the icon won't show up, only the edited link.. this is a side product of the .text function
   
Needed:
  - speaker delete function - it is done :D Now I just need to do the actual delete script for cron :)
  - Upload new profile pictures / change which one will be displayed.
  - checkbox for (is displayed in the index page modal)
  - come up with something for the agenda.. to highlight specific events
  - sponsors backend // like the amsterdam2014 website :)
 
  
*/

 class main extends config {
	 
	 public $speaker_id;	
	 public $sponsors_id;	 
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
	 
	 		$this->dbc->query(
				sprintf("INSERT INTO ".$db."_links SET ".$db."_id = '%s', link_url = '%s', speakers_link_types_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($sid)),
				  $this->dbc->real_escape_string(htmlspecialchars($link)),
				  $this->dbc->real_escape_string(htmlspecialchars($type))
				)
			);	
	 
 }
 
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
			
	//Insert a speakers status data		
		$this->dbc->query(
				sprintf("INSERT INTO speakers_status SET speakers_status_id = '1', speakers_id = '%s'",
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
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '2'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerTwitter']))
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
		
		/*	     //RSS
		if ($_POST['SpeakerRSS'] != '') {		
			  $this->dbc->query(
				sprintf("INSERT INTO speakers_links SET speakers_id = '%s', link_url = '%s', speakers_link_types_id = '6'",
				  $this->dbc->real_escape_string(htmlspecialchars($speaker_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['SpeakerRSS']))
				)
			);	
		}
*/

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
		
	/*
	//if we update company data
	if ($_POST['wat'] == 'sCompany' || $_POST['wat'] == 'sCompanyLink') { 	
		
		//Insert Company Data		
	   if (isset($_POST['sCompany']) && $_POST['sCompany'] != ''){
		
	  $this->dbc->query(
				sprintf("INSERT INTO speakers_company SET company_name = '%s', company_url = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sCompany'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sCompanyLink']))
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
		
	} //if we update company data end
		*/
		
		
	//LINKS	
	switch ($_POST['wat']) {
		case 'sName':
				$this->dbc->query(
				sprintf("INSERT INTO speakers_name SET name = '%s', speakers_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sName'])),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sId']))
			         	)
		        	);				
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
					 
					// $sanitized = htmlspecialchars($databaseContent, ENT_QUOTES);

                      // $bio = str_replace(array("\r\n", "\n", "<br />"), array("'szuunet'", "'szuunet'","'szuunet'"), $_POST['SponsorBio']);
					 
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
			$this->link_upload('2', $_POST['SponsorTwitter'], $sponsors_id, $what);	
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
		
			     //RSS
		if ($_POST['SponsorRSS'] != '') {
			
			$this->link_upload('6', $_POST['SponsorRSS'], $sponsors_id, $what);			

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
		case 'srss':
			  $this->dbc->query(
				sprintf("INSERT INTO sponsors_links SET sponsors_id = '%s', link_url = '%s', speakers_link_types_id = '6'",
				  $this->dbc->real_escape_string(htmlspecialchars($sponsor_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['sRss']))
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

       if(isset($_POST['Icons'])) {
		   	  $this->dbc->query(
				sprintf("INSERT INTO agenda_event_icon_connection SET agenda_event_id = '%s', agenda_event_icon_id = '%s'",
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id)),
				  $this->dbc->real_escape_string(htmlspecialchars($_POST['Icons']))
				)
			);	
	   }

	if(isset($SpeakerAgenda) && $SpeakerAgenda[0] != '') {
		foreach ($SpeakerAgenda As $person) {
			$this->dbc->query(
				sprintf("INSERT INTO agenda_event_speakers_connection SET speakers_id = '%s', agenda_event_id = '%s', status = '1'",
				  $this->dbc->real_escape_string(htmlspecialchars($person)),
				  $this->dbc->real_escape_string(htmlspecialchars($agenda_id))
				)
			);	
		}
		

	}  //isset speaker_id
 } //isset agendaTitle
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
										  
										  
					$agendaicon = $this->dbc->query(
								  sprintf("SELECT aei.icon_type FROM agenda_event_icons as aei, agenda_event_icon_connection as aeic WHERE aeic.agenda_event_id = '%s' AND aeic.agenda_event_icon_id=aei.id ORDER BY aeic.date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($agenda_id)
								  )
									 );	
									  if (mysqli_num_rows($agendaicon)) {
									  while($Icons = $agendaicon->fetch_assoc()){
										  $content[8] = $Icons['icon_type'];
										  
									  } //agenda while end
								  }  //agenda numrows end
										  										  
						
						$agenda_speakers = $this->agenda_edit_speakers($agenda_id);
						
						if (isset($agenda_speakers[0])) {
							$content[9] = '';
							$content[10]= '';
							foreach ($agenda_speakers[0] As $sid) {
								$content[9] .= $sid.';';
							}
							
							foreach ($agenda_speakers[1] As $sname) {
								$content[10] .= $sname.';';
							}
							

						} else {
							$content[9] = '';
							$content[10]= '';
						}
						
		
			if (isset($content)) {
				return $content;
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
 
 
 //Modify Sponsor image
  if(isset($_POST['SponsorImageSecret']) && $_POST['SponsorImageSecret'] == "ThisIsASecret"){
	$the_main = new main();

   if (is_uploaded_file($_FILES['file']['tmp_name']) && isset($_POST['SponsorImageModifyId'])) {
	   $uploadpath = '../img/sponsors';
       $path = $the_main->file_upload($uploadpath);
	   $the_main->picture_upload("sponsors", $_POST['SponsorImageModifyId'], " ", $path);
	   
	   
   }

   
     
}// post speaker end


 //Modify Speaker image
  if(isset($_POST['SpeakerImageSecret']) && $_POST['SpeakerImageSecret'] == "ThisIsASecret"){
	$the_main = new main();

   if (is_uploaded_file($_FILES['file']['tmp_name']) && isset($_POST['SpeakerImageModifyId'])) {
	   $uploadpath = '../img/speakers';
       $path = $the_main->file_upload($uploadpath);
	   $the_main->picture_upload("speakers", $_POST['SpeakerImageModifyId'], " ", $path);
	   
	   
   }

   
     
}// post speaker end



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
	   $uploadpath = '../img/speakers';
       $path = $the_main->file_upload($uploadpath);
	   $the_main->picture_upload("speakers", $the_main->speaker_id, " ", $path);
   }
 
   $the_main->speaker_order($the_main->speaker_id, $_POST['Order']);
   // header('Location:../speakers');
   
     
}// post speaker end

/*///////////// 
Add new agenda
///////////////*/

if (isset($_POST['AgendaSubmit'])) {
	$the_main = new main();
	
	if (isset($_POST['Speakers'])) {
		$speakers = $_POST['Speakers'];
	} else {
	 $speakers[0] = '';	
	}

	$the_main->agenda_upload($speakers);
	header('Location:../agenda');
}

 
/*///////////// 
Modify Speaker Order
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_sort' && isset($_POST['list_order'])){
	$the_main = new main();
    $the_main->speaker_arrange();

}// modify order end

/*///////////// 
Upload new social link to speakers
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'new_link' && isset($_POST['typeid']) && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->link_upload($_POST['typeid'], $_POST['newlink'], $_POST['sId'], "speakers");

}//new social link for speakers end
 

/*///////////// 
Edit Speakers
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_edit' && isset($_POST['sName'])){
	$the_main = new main();
    $the_main->speaker_edit();

}// edit speakers
 
 
 
/*///////////// 
Speaker Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'speaker_delete' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->speaker_delete();

}// delete speakers


/*///////////// 
Add new sponsor
///////////////*/

 if(isset($_POST['Sponsor']) && (is_uploaded_file($_FILES['file']['tmp_name']))){
	$the_main = new main();
   $sponsorsid = $the_main->sponsor_upload();


   if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	   $uploadpath = '../img/sponsors';
      $path = $the_main->file_upload($uploadpath);
	  $the_main->picture_upload("sponsors", $sponsorsid, " ", $path); 
	  
   }

   // header('Location:../index.php?q=sponsors');
   
     
}// post sponsor end

/*///////////// 
Sponsor Edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_edit' && isset($_POST['sName'])){
	$the_main = new main();
    $the_main->sponsor_edit();

}// edit sponsors
 
/*///////////// 
Sponsor Type Edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_type_edit'){
	
	$the_main = new main();
    $the_main->sponsor_data($_POST['tag'],$_POST['sBio'],$_POST['sCompanyLink'],$_POST['sId'],$_POST['rank']);

}// edit sponsors 

/*///////////// 
Sponsor AlaCarte Edit
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'alacarte_edit'){
	
	$the_main = new main();
    $the_main->alacarte_edit($_POST['sId'],$_POST['sAlaCarte'], $_POST['sAlaCarteConnectionId']);

}// edit sponsors 


/*
///////////// 
Add AlaCarte
///////////////
 

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

}// alacarte_new
 
 
 
 
/*///////////// 
Upload new social link to SPONSORS
///////////////*/

 if(isset($_POST['action']) && $_POST['action'] == 'new_sponsor_link' && isset($_POST['typeid']) && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->link_upload($_POST['typeid'], $_POST['newlink'], $_POST['sId'], "sponsors");

}//new social link for speakers end
 
 
/*///////////// 
Sponsor Delete
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'sponsor_delete' && isset($_POST['sId'])){
	$the_main = new main();
    $the_main->sponsor_delete($_POST['sId']);

}// delete sponsors
  
/*///////////// 
Agenda edit request
///////////////*/
 

 if(isset($_POST['action']) && $_POST['action'] == 'AgendaEditSession' && isset($_POST['sId'])){
	$the_main = new main();
    $id = $the_main->ekezet_nelkuli($_POST['sId']);
	setcookie('AgendaEditVal', $id, time() + (60), "/");

}// delete sponsors
    
  
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
