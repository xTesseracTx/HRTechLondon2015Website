<?php 

class socialsedit extends config {
	
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
 	
public function get_name($sId, $type_raw) {
	$content = '';
	
	$type = $this->sanitize($type_raw);
	
			//Get the names					   
		   $name = $this->dbc->query(
					  sprintf("SELECT id, name FROM ".$type."_name WHERE ".$type."_id = '%s' ORDER BY date DESC LIMIT 0,1",
						  $this->dbc->real_escape_string($sId)
					  )
						 );	
						  if (mysqli_num_rows($name)) {
						  while($sName = $name->fetch_assoc()){
								  $content .= '<h1 data-socialLinkType="'.$type.'" data-socialLinkId="'.$sId.'" id="Name">'.$sName['name'].'</h1>';
						  } //personal fetch assoc end
					  }  //personal num rows if end
					  
	return $content;
}
	
	
public function get_socials($sId, $type_raw) {
		$content = '';
		
		$type = $this->sanitize($type_raw);
		
					//Get all the link types			   
			 $LinkType = $this->dbc->query(
						  sprintf("SELECT id, type FROM speakers_link_types ORDER BY id ASC"));	
							  if (mysqli_num_rows($LinkType)) {
							  while($link = $LinkType->fetch_assoc()){
								  //While we fetch the link types, we get the actual links
								  
															//Get the names					   
									 $name = $this->dbc->query(
										  sprintf("SELECT link_url FROM ".$type."_links WHERE ".$type."_id = '%s' AND speakers_link_types_id='%s' ORDER BY date DESC LIMIT 0,1",
											  $this->dbc->real_escape_string($sId),
											  $this->dbc->real_escape_string($link['id'])  
										  )
											 );	
											  if (mysqli_num_rows($name)) {
												  while($url = $name->fetch_assoc()){
													  
													  if($url['link_url'] == '') { //We check if there's an actual link or just empty string
													     //if the string empty:
														     $content .= '<input class="AdminInputField" data-sociallink-typeid="'.$link['id'].'" id="'.ucfirst($link['type']).'" name="'.ucfirst($link['type']).'" type="text" placeholder="'.ucfirst($link['type']).'"/>';
														   
													  } else { //if there's a link, we display the value
													     //convert back the url
													 $url_raw = $this->social_link_decode($url['link_url']);
													 
														  $content .= '<input class="AdminInputField" data-sociallink-typeid="'.$link['id'].'" id="'.ucfirst($link['type']).'" name="'.ucfirst($link['type']).'" type="text" value="'.$url_raw.'"/>';  
													  } //value empty else end
														  
												  } //personal fetch assoc end
												  
										  } else { //personal num rows if end  //There's no such link
										      $content .= '<input class="AdminInputField" data-sociallink-typeid="'.$link['id'].'" id="'.ucfirst($link['type']).'" name="'.ucfirst($link['type']).'" type="text" placeholder="'.ucfirst($link['type']).'"/>';
										  } //no such thing else end
										  
							
									
							  } // $LinkType fetch assoc end
						  }  // $LinkType num rows if end
						  
	return $content;	
}



}
?>