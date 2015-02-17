<?php 

class permissions extends config {
	
public function get_sponsors_permissions($sId) {
		$content = '';
		
		
			//Get the names					   
			 $name = $this->dbc->query(
						  sprintf("SELECT name FROM sponsors_name WHERE sponsors_id = '%s' ORDER BY date DESC LIMIT 0,1",
							  $this->dbc->real_escape_string($sId)
						  )
							 );	
							  if (mysqli_num_rows($name)) {
							  while($sName = $name->fetch_assoc()){
									  $content .= '<h1 data-sponsorpermission-sponsor="'.$sId.'" id="SponsorName">'.$sName['name'].'</h1>';
							  } //personal fetch assoc end
						  }  //personal num rows if end
						  
	
		
	//Gets all of the locations
	$users = $this->dbc->query(
					sprintf("SELECT u.username, urc.users_id FROM users as u, users_rank_connection as urc WHERE u.id=urc.users_id AND urc.rank_id='11'"));	
					if ($users->num_rows > 0) {
					while($data = $users->fetch_assoc()){
						  
						  
													  //Gets all of the locations
							  $perm = $this->dbc->query(
											  sprintf("SELECT id FROM sponsors_user_connection WHERE sponsors_id = '%s' AND users_id = '%s' ORDER BY date DESC LIMIT 0,1",
											   $this->dbc->real_escape_string($sId),
											   $this->dbc->real_escape_string($data['users_id'])
											   )
											      );	
											  if ($perm->num_rows > 0) {
											$content .= '<div class="SponsorPermUser">'.$data['username'].': <span class="AccessGranted">Have Access</span></div><div class="PermissionButton PermRemove" data-sponsorpermission-user="'.$data['users_id'].'">Remove Permission</div> ';
										        } else {
											$content .= '<div class="SponsorPermUser">'.$data['username'].': <span class="AccessDenied">Do NOT Have Access</span></div><div class="PermissionButton PermAdd" data-sponsorpermission-user="'.$data['users_id'].'">Grant Permission</div>';
												}
						
						//$content .= '<label>'.$data['username'].' <input type="checkbox" class="SponsorPermUser" name="'.$data['users_id'].'" id="user-'.$data['users_id'].'"  '.$checked.'></label>';
					}
				}
	return $content;	
}



}
?>