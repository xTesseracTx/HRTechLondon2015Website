<?php 

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
						if ($sStatus['speakers_status_id'] == 1 || $sStatus['speakers_status_id'] == 2){
							  if ($sStatus['speakers_status_id'] == 2) {
								  $status = 2;
							  } else {
								  $status = 1;
							  }
							
						}
					} //personal fetch assoc end
				}  //personal num rows if end
						
		if ($status == 1 || $status == 2) {	
				   
		$content[$i][18] = $data['id'];
		if ($status == 2) {
			$content[$i][20] = 2;
		} else {
			$content[$i][20] = 1;
		}
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
						       $content[$i][5] .= $slinks['type'].';';
						       $content[$i][6] .= $slinks['link_url'].';';
						       $haveit .= $slinks['type'].';'; //we also add it to the "displayed" list
							}
							
						} else {  //if there's no list yet :D
						   $content[$i][5] .= $slinks['type'].';';
						   $content[$i][6] .= $slinks['link_url'].';';
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
}
?>	