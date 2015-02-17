<?php 
include_once('aaa.php');
include_once('config.php');

class speakers_main extends config {
	
	function speakers() {
$i = 0;	
		
		
	//Gets all of the speakers names
	$names = $this->dbc->query(
			sprintf("SELECT s.id, so.speakers_id FROM speakers as s, speakers_order as so WHERE s.id=so.speakers_id ORDER BY so.order_id ASC"));	
					if ($names->num_rows > 0) {
					while($data = $names->fetch_assoc()){
						
						$status = 0;
						
		$stat = $this->dbc->query(
				sprintf("SELECT speakers_status_id FROM speakers_status WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['id'])
				)
				   );	
					if (mysqli_num_rows($stat)) {
					while($sStatus = $stat->fetch_assoc()){
						if ($sStatus['speakers_status_id'] == 1){
							$status = 1;
						}
					} //personal fetch assoc end
				}  //personal num rows if end
						
		if ($status == 1) {	
				   
		$content[$i][18] = $data['id'];
	//Get the names					   
	 $name = $this->dbc->query(
				sprintf("SELECT id, name FROM speakers_name WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['id'])
				)
				   );	
					if (mysqli_num_rows($name)) {
					while($sName = $name->fetch_assoc()){
						$content[$i][0] = $sName['name'];
						$content[$i][19] = $sName['id'];
					} //personal fetch assoc end
				}  //personal num rows if end
						   
		//Get the personal data				   
		 $personal = $this->dbc->query(
				sprintf("SELECT title, bio_important, bio, tag  FROM speakers_personal WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['id'])
				)
				   );	
					if (mysqli_num_rows($personal)) {
					while($personals = $personal->fetch_assoc()){
						
					   //$b = str_replace(array("'szuunet'"), array("<br />"), $personals['bio']);
					   //$bi = str_replace(array("'szuunet'"), array("<br />"), $personals['bio_important']); //We need this to display <br /> -s.. cause we used htmlspecial chars aaand sprintf in
					                                                                                         // the upload :D Can't be safe enough :P
					   
					   $bio = htmlspecialchars_decode($personals['bio']);
					   $bioImp = htmlspecialchars_decode($personals['bio_important']);
					   
						$content[$i][1] = $personals['title'];
						$content[$i][2] = $bioImp;
						$content[$i][3] = $bio;
						$content[$i][4] = $personals['tag'];
						
					} //personal fetch assoc end
				}  //personal num rows if end
				
		//Get links		
		 $links = $this->dbc->query(
				sprintf("SELECT slt.type, sl.link_url FROM speakers_links as sl, speakers_link_types as slt WHERE sl.speakers_id = '%s' AND sl.speakers_link_types_id=slt.id ORDER BY sl.date DESC",
				    $this->dbc->real_escape_string($data['id'])
				)
				   );	
				   ///Sooo.. this is the link section
					if (mysqli_num_rows($links)) {
					//we define the content 5 and 6 so we can append to them later
						$content[$i][5] = '';
						$content[$i][6] = '';
						$haveit = ''; //this will contain what links we already displayed
						
						//we fetch the links from the database
					while($slinks = $links->fetch_assoc()){
						$nope = 0; //we need this to decide if we want to add the new to the content variable or not
						if (isset($haveit) && $haveit != '') { //we check if there's a link or not displayed
							$isItYes = explode(';',$haveit); //we explode it to get all the displayed links in an array
							foreach ($isItYes As $yes) { //we go through it
								if ($yes == $slinks['type']) { //if the link type from the database is the same as we displayed before...
									$nope = 1;  //nope
								}
							}
							if ($nope == 0) {  // if we don't have this link already displayed, we add it to the content
							  if($slinks['link_url'] != ''){
									 $content[$i][5] .= $slinks['type'].';';
									 $content[$i][6] .= $slinks['link_url'].';';
							    }//check if it's empty or not :D
						       $haveit .= $slinks['type'].';'; //we also add it to the "displayed" list
							}
							
						} else {  //if there's no list yet :D
						   if($slinks['link_url'] != ''){
								  $content[$i][5] .= $slinks['type'].';';
								  $content[$i][6] .= $slinks['link_url'].';';
							 }//check if it's empty or not :D
						   $haveit .= $slinks['type'].';';
						}

					}
				}                  

				
						//Get company info	
		 $company = $this->dbc->query(
				sprintf("SELECT sc.company_name, sc.company_url, sc.company_bio FROM speakers_company as sc, speakers_company_connection as scc WHERE scc.speakers_id = '%s' AND scc.speakers_company_id=sc.id ORDER BY scc.date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['id'])
				)
				   );	
					if (mysqli_num_rows($company)) {
					while($comp = $company->fetch_assoc()){
						$content[$i][7] = $comp['company_name'];
						$content[$i][8] = $comp['company_url'];
						$content[$i][9] = $comp['company_bio'];
						
					}
				}                  

					//Get image data
		 $pictures = $this->dbc->query(
				sprintf("SELECT image_name, image_url FROM speakers_image WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['id'])
				)
				   );	
					if (mysqli_num_rows($pictures)) {
					while($pic = $pictures->fetch_assoc()){
						$content[$i][10] = $pic['image_name'];
						$content[$i][11] = $pic['image_url'];
					
						
					}
				}                  


				//Get Agenda data

										//Get image data
		 $agendas = $this->dbc->query(
				sprintf("SELECT ae.id, aed.time_start, aed.time_end, aed.abstract, aed.day, ael.location FROM agenda_event as ae, agenda_event_connection as aec, agenda_event_data as aed, agenda_event_location as ael, agenda_event_speakers_connection as aesc WHERE aesc.speakers_id = '%s' AND aesc.agenda_event_id=ae.id AND ae.id=aec.agenda_event_id AND aec.agenda_event_data_id=aed.id AND aed.location_id=ael.id  ORDER BY aesc.date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($data['id'])
				)
				   );	
					if (mysqli_num_rows($agendas)) {
					while($agenda = $agendas->fetch_assoc()){
						$agenda_s_id = $agenda['id'];
						$content[$i][13] = $agenda['time_start'];
						$content[$i][14] = $agenda['time_end'];
						$content[$i][15] = $agenda['abstract'];
						$content[$i][16] = $agenda['day'];
						$content[$i][17] = $agenda['location'];
					
						
					}
				} else {
						$content[$i][13] = " ";
						$content[$i][14] = " ";
						$content[$i][15] = " ";
						$content[$i][16] = " ";
						$content[$i][17] = " ";
				}
				
				if (isset($agenda_s_id)) {
					
							 $agendatitle = $this->dbc->query(
								  sprintf("SELECT agenda_name FROM agenda_event_title WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($agenda_s_id)
								  )
									 );	
									  if (mysqli_num_rows($agendatitle)) {
									  while($title = $agendatitle->fetch_assoc()){
										  $content[$i][12] = $title['agenda_name'];
										  
									  } //agenda while end
								  }  //agenda numrows end   
								$agenda_s_id = '';  
					
					
				}
				
				
								                
						$i++;
					} //if status = 1
					}  //Names fetch assoc end
				} // if num rows end	
			
			if (isset($content)) {
				return $content;
			}
			
	}
	
function modal_display($tag) {
	/*
	----------------
	GET THE DATA
	---------------
	*/
	$sId = -1;
	
	$sp_id = $this->dbc->query(
			sprintf("SELECT speakers_id FROM speakers_personal WHERE tag = '%s' ORDER BY date DESC",
			$this->dbc->real_escape_string($tag)
				)
				   );	
					if (mysqli_num_rows($sp_id)) {
					while($speakers_id = $sp_id->fetch_assoc()){
						
							$stat = $this->dbc->query(
								  sprintf("SELECT speakers_status_id FROM speakers_status WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
									  $this->dbc->real_escape_string($speakers_id['speakers_id'])
								  )
									 );	
									  if (mysqli_num_rows($stat)) {
									  while($sStatus = $stat->fetch_assoc()){
										  if ($sStatus['speakers_status_id'] == 1 || $sStatus['speakers_status_id'] == 2){
											  $sId = $speakers_id['speakers_id'];
										  }
									  } //personal fetch assoc end
								  }  //personal num rows if end
						
						if ($sId > -1) {
							break;
						}

					} //personal fetch assoc end
				}  //personal num rows if end
	
	
	
	
	
	$i = 0;	
		
		

						
		if ($sId > -1) {	
				   
		$content[$i][18] = $sId;
	//Get the names					   
	 $name = $this->dbc->query(
				sprintf("SELECT id, name FROM speakers_name WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($sId)
				)
				   );	
					if (mysqli_num_rows($name)) {
					while($sName = $name->fetch_assoc()){
						$content[$i][0] = $sName['name'];
						$content[$i][19] = $sName['id'];
					} //personal fetch assoc end
				}  //personal num rows if end
						   
		//Get the personal data				   
		 $personal = $this->dbc->query(
				sprintf("SELECT title, bio_important, bio, tag  FROM speakers_personal WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($sId)
				)
				   );	
					if (mysqli_num_rows($personal)) {
					while($personals = $personal->fetch_assoc()){
						
					   //$b = str_replace(array("'szuunet'"), array("<br />"), $personals['bio']);
					   //$bi = str_replace(array("'szuunet'"), array("<br />"), $personals['bio_important']); //We need this to display <br /> -s.. cause we used htmlspecial chars aaand sprintf in
					                                                                                         // the upload :D Can't be safe enough :P
					   
					   $bio = htmlspecialchars_decode($personals['bio']);
					   $bioImp = htmlspecialchars_decode($personals['bio_important']);
					   
						$content[$i][1] = $personals['title'];
						$content[$i][2] = $bioImp;
						$content[$i][3] = $bio;
						$content[$i][4] = $personals['tag'];
						
					} //personal fetch assoc end
				}  //personal num rows if end
				
		//Get links		
		 $links = $this->dbc->query(
				sprintf("SELECT slt.type, sl.link_url FROM speakers_links as sl, speakers_link_types as slt WHERE sl.speakers_id = '%s' AND sl.speakers_link_types_id=slt.id ORDER BY sl.date DESC",
				    $this->dbc->real_escape_string($sId)
				)
				   );	
				   ///Sooo.. this is the link section
					if (mysqli_num_rows($links)) {
					//we define the content 5 and 6 so we can append to them later
						$content[$i][5] = '';
						$content[$i][6] = '';
						$haveit = ''; //this will contain what links we already displayed
						
						//we fetch the links from the database
					while($slinks = $links->fetch_assoc()){
						$nope = 0; //we need this to decide if we want to add the new to the content variable or not
						if (isset($haveit) && $haveit != '') { //we check if there's a link or not displayed
							$isItYes = explode(';',$haveit); //we explode it to get all the displayed links in an array
							foreach ($isItYes As $yes) { //we go through it
								if ($yes == $slinks['type']) { //if the link type from the database is the same as we displayed before...
									$nope = 1;  //nope
								}
							}
							if ($nope == 0) {  // if we don't have this link already displayed, we add it to the content
							  if($slinks['link_url'] != ''){
									 $content[$i][5] .= $slinks['type'].';';
									 $content[$i][6] .= $slinks['link_url'].';';
							    }//check if it's empty or not :D
						       $haveit .= $slinks['type'].';'; //we also add it to the "displayed" list
							}
							
						} else {  //if there's no list yet :D
						   if($slinks['link_url'] != ''){
								  $content[$i][5] .= $slinks['type'].';';
								  $content[$i][6] .= $slinks['link_url'].';';
							 }//check if it's empty or not :D
						   $haveit .= $slinks['type'].';';
						}

					}
				}                  

				
						//Get company info	
		 $company = $this->dbc->query(
				sprintf("SELECT sc.company_name, sc.company_url, sc.company_bio FROM speakers_company as sc, speakers_company_connection as scc WHERE scc.speakers_id = '%s' AND scc.speakers_company_id=sc.id ORDER BY scc.date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($sId)
				)
				   );	
					if (mysqli_num_rows($company)) {
					while($comp = $company->fetch_assoc()){
						$content[$i][7] = $comp['company_name'];
						$content[$i][8] = $comp['company_url'];
						$content[$i][9] = $comp['company_bio'];
						
					}
				}                  

					//Get image data
		 $pictures = $this->dbc->query(
				sprintf("SELECT image_name, image_url FROM speakers_image WHERE speakers_id = '%s' ORDER BY date DESC LIMIT 0,1",
				    $this->dbc->real_escape_string($sId)
				)
				   );	
					if (mysqli_num_rows($pictures)) {
					while($pic = $pictures->fetch_assoc()){
						$content[$i][10] = $pic['image_name'];
						$content[$i][11] = $pic['image_url'];
					
						
					}
				}                  

				
								                
						$i++;
					} //if status = 1

			
	
	
	
  /*
  --------------
  DISPLAY THE DATA
  ---------------
  */

		  /*
		  
		 				$content[$i][0] = Speaker name
		  				$content[$i][1] = Speaker Title
						$content[$i][2] = Speaker Bio important
						$content[$i][3] = Speaker Bio
						$content[$i][4] = Speaker modal tag
						
						$content[$i][5] = Link type
						$content[$i][6] = Link URL

						$content[$i][7] = Company name
						$content[$i][8] = Company URL
						$content[$i][9] = Company Bio

						$content[$i][10] = Picture name
						$content[$i][11] = Picture URL
		  */
		if (isset($content)) {
		 foreach ($content as $speaker) {
			 if (isset($speaker[6])){
				  $links = explode(';',$speaker[6]);
			      $link_types = explode(';',$speaker[5]);
			 }
			 
			     $num = 0;
			 	 foreach ($speaker As $set) {
						if (!isset($set)){
				        $speaker[$num] = '';
			             }	
						 $num++;		
					}
			 

	/*
	 --------------------------
	 Normal user
	 -------------------
	 */		
				$output = '<!-- '.$speaker[0].' Modal -->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>';
			  if (isset($speaker[11])) {
		  $output .= '<div class="ModalSpeakerPhoto" style="background-image:url(img/speakers/'.$speaker[11].')"></div>';
	          } else {
				   $output .= '<div class="ModalSpeakerPhoto"></div>';
			  }
       
	   
	        $company_tag = "";
			$ca = preg_replace('/[^A-Za-z0-9]/', '', $speaker[7]); // Removes special chars.
	        $company_tag_array = explode(" ",$ca);
			foreach ($company_tag_array as $comp) {
				$company_tag .= ucfirst($comp); 
			}
			
        
			$google = 'onClick="_gaq.push([';
			$google .= "'_trackEvent', 'SpeakerCompanySite', 'ExternalForward', '".$company_tag."']);";
			$google .= '"';
		
       $output .='<div class="ModalSpeakerBioContainer">
	   <form class="SpeakerModalEdit">

          <p id="'.$speaker[4].'_Name" class=" ModalSpeakerName OswaldText">'.$speaker[0].'</p>

          <p id="'.$speaker[4].'_Title" class="ModalSpeakerJobtitle RobotoText">'.$speaker[1].'</p>';
		  
		  
		  
		  			  if (isset($speaker[8])) {
					 $Http = strpos($speaker[8], "http://");
					 $Https = strpos($speaker[8], "https://");
					
					 if ($Http === false && $Https === false) {
						$compLink = "http://".$speaker[8];
				      } else {
						  $compLink = $speaker[8];
					  }
				   }
		
		 $output .='<a '.$google.' href="'.$compLink.'" id="'.$speaker[4].'_CompanyLink" class="ModalSpeakerCompanyLink">'.$speaker[7].'</a>
		
          <div class="ModalDivider"></div>';
		  
		  
		  $s = 0;
		  
		  if (isset($link_types)){
			 foreach ($link_types As $types) {
			   if ($types) {
				   if (isset($links[$s])) {
					 $Http = strpos($links[$s], "http://");
					 $Https = strpos($links[$s], "https://");
					
					 if ($Http === false && $Https === false) {
						$links[$s] = "http://".$links[$s];
				    	}
				   }
				   			$social_tag = ucfirst($types).'-'.$speaker[4];
				   			$google = 'onClick="_gaq.push([';
			                $google .= "'_trackEvent', 'SpeakerSocialSite', 'ExternalForward', '".$social_tag."']);";
			                $google .= '"';
							
							$url_raw = $this->social_link_decode($links[$s]); //this is needed to decode the link from the database
							
				   $output .='<p class="SocialIcons"><a '.$google.' href="'.$url_raw.'" target="_blank"><i class="fa fa-'.$types.' "></i></a></p>'; 
					//$output .='<p id="'.$speaker[4].'_'.$types.'" class="SocialIcons"><a><i class="fa fa-'.$types.' "></i></a></p>'; 


					   $s++;
			         }

				}
				unset($link_types);
				unset($links);
		  }
			
			// $output .='<a data-dismiss="modal" data-toggle="modal" data-target="#HinssenP" href="#"><img class="SpeakerArrows" data-speaker-arrow="left" data-speakerid="'.$speaker[18].'" src="img/speakers/left-arrow.png" alt="left-arrow-button"></a>';  	
			
			$output .='<div id="ModalLeftArrow" class="SpeakerArrows" onClick="Modalchange(this)" data-speaker-arrow="1" data-speakertag="'.$speaker[4].'" data-speakerid="'.$speaker[18].'"><span id="ModalPrevText">Previous</span></div>';  
			
          $output .='<div class="ModalSpeakerBio RobotoText"><span id="'.$speaker[4].'_BioImportant" class="ModalSpeakerBioHighlight OswaldText">'.$speaker[2].' </span><!--</div>
		  
		  <div id="'.$speaker[4].'_Bio" class=" ModalSpeakerBio RobotoText"> '.$speaker[3].'</div>-->
		  <span id="'.$speaker[4].'_Bio">'.$speaker[3].'</span>
		  <button type="button" class="close" id="BottomModalClose" data-dismiss="modal" aria-hidden="true"><img src="img/speakers/modal-close.png" alt="modal-close-button"></button>

		  </div>';
		  
		   $output .='<div id="ModalRightArrow" class="SpeakerArrows" onClick="Modalchange(this)" data-speaker-arrow="2" data-speakerid="'.$speaker[18].'"><span id="ModalNextText">Next</span></div> 	

		  </form>
		</div>
      </div>
	</div>
		
  </div>
<!-- end '.$speaker[0].' Modal --> ';	
		
		

	
			
		  /*   foreach ($f as $s) {
		      echo $s;
	      }*/
		echo $output;  
	}
		} 
	
	
	
}
	
}
//Get the tag of the speaker to display it in a modal
 if(isset($_POST['action']) && $_POST['action'] == 'modal_display' && isset($_POST['sTag'])){
	$the_main = new speakers_main();
    $the_main->modal_display($_POST['sTag']);
}// modal display end

?>
