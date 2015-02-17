<?php 

class sponsors_main extends config {
	
	function randomize_sponsors($random, $fix) {
		
	if (isset($fix) && $fix != 0){ 
		$i = 0;
		$db = 0;
		$fixed = array_reverse($fix);
		
		 foreach ($random As $value) {
			 $sad = 0;
                 foreach ($fixed As $data) {
					 if ($data == $value[0]) {
						 $temp[$db] = $value;
						$sad = 1; 
						$db++;
					 }
				 }//forach fixed
				 if ($sad == 0) {
					$output[$i] = $value; 
					$i++;
				 }
		 }//foreach random
		
		 shuffle($output);
		 if(isset($temp)){
		   foreach ($temp As $s) {
			   $output[$i] = $s;
			   $i++;
		   }
		 
		 } //if isset temp
		 $output = array_reverse($output);
		} else {//if isset fixed
             $output = $random;
		   shuffle($output);
		}
		
		 return $output;
	}
	
	
	//This is the function what collets all the sponsors to the content multi dimensional array.
	function sponsors() {
		
$i = 0;	
$sponsorType = -1; //this is needed for the type counter
$db = 0;
$alacartearray[0][0] = 0;
$alaid = 0;
$haveala = 0;

                 $sponsorsMain = $this->dbc->query( // We get the sponsor id-s
		                    sprintf("SELECT id FROM sponsors"));	
					              if ($sponsorsMain->num_rows > 0) {
					                while($ids = $sponsorsMain->fetch_assoc()){
								    	$ok = 0;
									
									  $sponsorsStatus = $this->dbc->query( // We get the sponsor id-s
		                                 sprintf("SELECT status_id FROM sponsors_status WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
										 $this->dbc->real_escape_string($ids['id'])
										  )
										    );	
					                         if ($sponsorsStatus->num_rows > 0) {
					                           while($sStat = $sponsorsStatus->fetch_assoc()){
											    if ($sStat['status_id'] == 1) {
											      $ok = 1;
											     }//if active
											   }//while fetch sStat
											  } // if sponsorStatus
									 
									
									 if ($ok == 1){
										 $filtered[$db][0] = $ids['id'];

									 //Get the sponsors data				   
									    $personal = $this->dbc->query(
											  sprintf("SELECT sponsors_bio, sponsors_url, sponsors_tag, sponsors_rank FROM sponsors_data WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
												  $this->dbc->real_escape_string($ids['id'])
											  )
												 );	
												  if (mysqli_num_rows($personal)) {
												  while($personals = $personal->fetch_assoc()){
													  
													// $b = str_replace(array("'szuunet'"), array("<br />"), $personals['sponsors_bio']);
													  //We need this to display <br /> -s.. cause we used htmlspecial chars aaand sprintf in
													// the upload :D Can't be safe enough :P
													 
													 //$bio = nl2br($b);
													 $bio = htmlspecialchars_decode($personals['sponsors_bio']);
													 
													  $filtered[$db][1] = $personals['sponsors_url'];
													  $filtered[$db][2] = $personals['sponsors_rank'];
													  $filtered[$db][3] = $bio;
													  $filtered[$db][4] = $personals['sponsors_tag'];
													  
												  } //personal fetch assoc end
											  }  //personal num rows if end	
											  
											  				  $filtered[$db][5] = '';
															  $filtered[$db][6] = '';
															  $haveit = ''; //this will contain what links we already displayed
											 		  
											  //Get links		
											   $links = $this->dbc->query(
													  sprintf("SELECT slt.type, sl.link_url FROM sponsors_links as sl, speakers_link_types as slt WHERE sl.sponsors_id = '%s' AND sl.speakers_link_types_id=slt.id ORDER BY sl.date DESC",
														  $this->dbc->real_escape_string($ids['id'])
													  )
														 );	
														 ///Sooo.. this is the link section
														  if (mysqli_num_rows($links)) {
														  //we define the content 5 and 6 so we can append to them later

															  
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
																	 $filtered[$db][5] .= $slinks['type'].';';
																	 $filtered[$db][6] .= $slinks['link_url'].';';
																	 $haveit .= $slinks['type'].';'; //we also add it to the "displayed" list
																  }
																  
															  } else {  //if there's no list yet :D
																 $filtered[$db][5] .= $slinks['type'].';';
																 $filtered[$db][6] .= $slinks['link_url'].';';
																 $haveit .= $slinks['type'].';';
															  }
									  
														  }
													  }                  
									  
													  
									  
														  //Get image data
											   $pictures = $this->dbc->query(
													  sprintf("SELECT image_url FROM sponsors_image WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
														  $this->dbc->real_escape_string($ids['id'])
													  )
														 );	
														  if (mysqli_num_rows($pictures)) {
														  while($pic = $pictures->fetch_assoc()){
															  //$content[$i][10] = $pic['image_name'];
															  $filtered[$db][7] = $pic['image_url'];
														  
															  
														  }
													  } 
													  
													  											//Get the names					   
										   $name = $this->dbc->query(
													  sprintf("SELECT id, name FROM sponsors_name WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
														  $this->dbc->real_escape_string($ids['id'])
													  )
														 );	
														  if (mysqli_num_rows($name)) {
														  while($sName = $name->fetch_assoc()){
															    $filtered[$db][8] = $sName['name'];
															    $filtered[$db][9] = $sName['id'];
														  } //personal fetch assoc end
													  }  //personal num rows if end
													  
													  
												 $alacarte = $this->dbc->query(
													  sprintf("SELECT alacarte FROM sponsors_data_alacarte WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
														  $this->dbc->real_escape_string($ids['id'])
													  )
														 );	
														  if (mysqli_num_rows($alacarte)) {
														  while($sAlac = $alacarte->fetch_assoc()){
															    $filtered[$db][10] = $sAlac['alacarte'];
														  } //personal fetch assoc end
													  } else {  //personal num rows if end	
													  		   $filtered[$db][10] = 0;
													  }

										
										$db++;
										} //if ok == 1
									} //while ids fetch
								  } //if sponsorsmain numrows

 if(isset($filtered)) {
	//$fixed = [20, 13];
	$fixed = 0;
	$filtered = $this->randomize_sponsors($filtered, $fixed);
 }
$main = new main();
		
		//We get all the sponsor types (like platinum)
		$s_types = $this->dbc->query(
			sprintf("SELECT id, name FROM sponsors_type ORDER BY id"));	
					if ($s_types->num_rows > 0) {
					   while($sponsor_type = $s_types->fetch_assoc()){ //while we fetch the results..
					     if (isset($filtered)) {
					        foreach ($filtered As $data) {
								   if($sponsor_type['id'] == $data[2]){

									    $content[$i][0] = $data[0];  //sponsors_id
										$content[$i][1] = $data[1];  //sponsors_url
										$content[$i][2] = $data[2];  //sponsors_type_id (platinum, gold etc)
										$content[$i][3] = $data[3];  //sponsors_bio
										$content[$i][4] = $data[4];  //sponsors_tag
										$content[$i][5] = $data[5];  //sponsors_link_types
										$content[$i][6] = $data[6];  //sponsors_link_urls
										$content[$i][7] = $data[7];  //sponsors_picture
										$content[$i][8] = $data[8];  //sponsors_name
										$content[$i][9] = $data[9];  //sponsors_name_id
										$content[$i][10] = $sponsor_type['name']; //sponsor_type_name
										$content[$i][11] = $main->ekezet_nelkuli($content[$i][8]).'_'.$content[$i][0]; //sponsors_id (HTML id tag)
										$content[$i][12] = '';
										$content[$i][13] = $data[10];
										
										//--------------------------------
											 if($data[10] == 1){ //If the current sponsor is also an a la carte one
									            $haveala = 1;
									           $alacartemain = $this->dbc->query(
												 sprintf("SELECT sponsors_ala_carte_id FROM sponsors_ala_carte_connection WHERE sponsors_id = '%s' ORDER BY date DESC",
													$this->dbc->real_escape_string($content[$i][0])
												)
												   );	
													if (mysqli_num_rows($alacartemain)) {
													 while($alac = $alacartemain->fetch_assoc()){
															$alacarte = $this->dbc->query(
															  sprintf("SELECT text FROM sponsors_ala_carte WHERE id = '%s' ORDER BY date DESC LIMIT 0,1",
																  $this->dbc->real_escape_string($alac['sponsors_ala_carte_id'])
															  )
																 );	
																  if (mysqli_num_rows($alacarte)) {
																   while($carte = $alacarte->fetch_assoc()){
																	  
																	  
																	  $alacartearray[$alaid][0] = $data[0];  //sponsors_id
																	  $alacartearray[$alaid][1] = $data[1];  //sponsors_url
																	  $alacartearray[$alaid][2] = 10;  //sponsors_type_id (platinum, gold etc)
																	  $alacartearray[$alaid][3] = $data[3];  //sponsors_bio
																	  $alacartearray[$alaid][4] = $data[4];  //sponsors_tag
																	  $alacartearray[$alaid][5] = $data[5];  //sponsors_link_types
																	  $alacartearray[$alaid][6] = $data[6];  //sponsors_link_urls
																	  $alacartearray[$alaid][7] = $data[7];  //sponsors_picture
																	  $alacartearray[$alaid][8] = $data[8];  //sponsors_name
																	  $alacartearray[$alaid][9] = $data[9];  //sponsors_name_id
																	  $alacartearray[$alaid][10] = "A LA CARTE SPONSORS"; //sponsor_type_name
																	  $alacartearray[$alaid][11] = $main->ekezet_nelkuli($content[$i][8]).'_'.$content[$i][0]; //sponsors_id (HTML id tag)
																	  $alacartearray[$alaid][12] = $carte['text'];
																	  $alacartearray[$alaid][13] = $data[10];
																	  $alacartearray[$alaid][14] = $alac['sponsors_ala_carte_id'];
									  								    $alaid++;	
																	}//while carte
																  } else { //if mysl_num_rows alacarte
 																	   $content[$i][12] = '';
																  }
																  
													  

													  } //while alac
													} //if alacartemain

								   } //if data[10] == 1 (if a la carte sponsor)
										
										//---------------------------------------
										
										
									   $i++;
								   } //if sponsor_type
														
							     }//foreach filtered
					   
						 } //if isset filtered
						
					   } // while fetch assoc sponsor_type
					} // if s_types end
					
	/*---------------------
	To make sure to display all a la cartes even when it doesn't have simple sponsor package!				
	-----------------------
	*/
	
						        foreach ($filtered As $data) {
								   if(0 == $data[2]){

											 if($data[10] == 1){ //If the current sponsor is also an a la carte one
									            $haveala = 1;
									           $alacartemain = $this->dbc->query(
												 sprintf("SELECT sponsors_ala_carte_id FROM sponsors_ala_carte_connection WHERE sponsors_id = '%s' ORDER BY date DESC",
													$this->dbc->real_escape_string($data[0])
												)
												   );	
													if (mysqli_num_rows($alacartemain)) {
													 while($alac = $alacartemain->fetch_assoc()){
															$alacarte = $this->dbc->query(
															  sprintf("SELECT text FROM sponsors_ala_carte WHERE id = '%s' ORDER BY date DESC LIMIT 0,1",
																  $this->dbc->real_escape_string($alac['sponsors_ala_carte_id'])
															  )
																 );	
																  if (mysqli_num_rows($alacarte)) {
																   while($carte = $alacarte->fetch_assoc()){
																	  
																	  
																	  $alacartearray[$alaid][0] = $data[0];  //sponsors_id
																	  $alacartearray[$alaid][1] = $data[1];  //sponsors_url
																	  $alacartearray[$alaid][2] = 10;  //sponsors_type_id (platinum, gold etc)
																	  $alacartearray[$alaid][3] = $data[3];  //sponsors_bio
																	  $alacartearray[$alaid][4] = $data[4];  //sponsors_tag
																	  $alacartearray[$alaid][5] = $data[5];  //sponsors_link_types
																	  $alacartearray[$alaid][6] = $data[6];  //sponsors_link_urls
																	  $alacartearray[$alaid][7] = $data[7];  //sponsors_picture
																	  $alacartearray[$alaid][8] = $data[8];  //sponsors_name
																	  $alacartearray[$alaid][9] = $data[9];  //sponsors_name_id
																	  $alacartearray[$alaid][10] = "A LA CARTE SPONSORS"; //sponsor_type_name
																	  $alacartearray[$alaid][11] = $main->ekezet_nelkuli($data[8]).'_'.$data[8]; //sponsors_id (HTML id tag)
																	  $alacartearray[$alaid][12] = $carte['text'];
																	  $alacartearray[$alaid][13] = $data[10];
																	  $alacartearray[$alaid][14] = $alac['sponsors_ala_carte_id'];
									  								    $alaid++;	
																	}//while carte
																  } else { //if mysl_num_rows alacarte
 																	   $content[$i][12] = '';
																  }
																  
													  

													  } //while alac
													} //if alacartemain

								   } //if data[10] == 1 (if a la carte sponsor)
										
										//---------------------------------------
										
										
									   $i++;
								   } //if sponsor_type
														
							     }//foreach filtered
					
					
	//----------				
					if (isset($alacartearray) && $haveala == 1){
						//A La Carte Sponsors	
				      shuffle($alacartearray);
				  
					  foreach ($alacartearray As $data) {
										   
											$content[$i][0] = $data[0];  //sponsors_id
											$content[$i][1] = $data[1];  //sponsors_url
											$content[$i][2] = 999;  //sponsors_type_id (platinum, gold etc)
											$content[$i][3] = $data[3];  //sponsors_bio
											$content[$i][4] = $data[4];  //sponsors_tag
											$content[$i][5] = $data[5];  //sponsors_link_types
											$content[$i][6] = $data[6];  //sponsors_link_urls
											$content[$i][7] = $data[7];  //sponsors_picture
											$content[$i][8] = $data[8];  //sponsors_name
											$content[$i][9] = $data[9];  //sponsors_name_id
											$content[$i][10] = "A LA CARTE SPONSORS"; //sponsor_type_name
											$content[$i][11] = $main->ekezet_nelkuli($content[$i][8]).'_'.$content[$i][0]; //sponsors_id (HTML id tag)
											$content[$i][12] = $data[12];
											$content[$i][13] = $data[13];
											$content[$i][14] = $data[14]; // alacarte connection id
										   $i++;
									
															
									 }//foreach alacarteArray
					} else {
						$content[$i][0] = -55;
						$content[$i][2] = 999;
						$content[$i][10] = "A LA CARTE SPONSORS"; //sponsor_type_name
					}
				
				
				
				
			
			if (isset($content)) {
				return $content;
			}
			
	}
	
	public function sponsor_types($id) {
			$content = '';
	//Gets all of the sponsor types
	$types = $this->dbc->query(
					sprintf("SELECT id, name FROM sponsors_type"));	
					if ($types->num_rows > 0) {
					while($data = $types->fetch_assoc()){
						if ($data['id'] == $id){
							$content .= '<option selected="selected" value="'.$data['id'].'">'.$data['name'].'</option>';
						}else {
						$content .= '<option value="'.$data['id'].'">'.$data['name'].'</option>';	
						}
						
					}
				}
			$content .= '<option value="0">Only A La Carte</option>';
	return $content;	
	
}

function sponsors_list(){
			$content = '';
	//Gets all of the locations
	$sponsors = $this->dbc->query(
					sprintf("SELECT id FROM sponsors"));	
					if ($sponsors->num_rows > 0) {
					while($data = $sponsors->fetch_assoc()){
						
					  $name = $this->dbc->query(
							sprintf("SELECT id, name FROM sponsors_name WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
								$this->dbc->real_escape_string($data['id'])
							)
							   );	
								if (mysqli_num_rows($name)) {
								while($sName = $name->fetch_assoc()){
									$content .= '<option value="'.$data['id'].'">'.$sName['name'].'</option>';
								} //personal fetch assoc end
							}  //personal num rows if end
						
						
					}
				}
	return $content;
 }
	
function sponsor_permission_check($sId, $user_id) {
				$content = 0;
													  											//Get the names					   
		   $name = $this->dbc->query(
					  sprintf("SELECT users_id FROM sponsors_user_connection WHERE sponsors_id = '%s' AND users_id = '%s' ORDER BY date LIMIT 0,1",
						  $this->dbc->real_escape_string($sId),
						  $this->dbc->real_escape_string($user_id)
					  )
						 );	
						  if (mysqli_num_rows($name)) {
						      $content = 1;
					      }  //personal num rows if end
					  
													  
	return $content;	
	
 }
 
 
}
?>	