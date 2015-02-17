<?php 
include_once('aaa.php');
include_once('config.php');

class locations extends config {
	
public function get_locations($day) {
		$content = '';
	//Gets all of the locations
	$places = $this->dbc->query(
					sprintf("SELECT ael.id, ael.location FROM agenda_event_location as ael, agenda_event_location_day_connection as aeldc WHERE ael.id=aeldc.agenda_location_id AND aeldc.agenda_event_day = '%s'",
					 $this->dbc->real_escape_string($day)
					));	
					if ($places->num_rows > 0) {
					while($data = $places->fetch_assoc()){
						$content .= '<option value="'.$data['id'].'">'.$data['location'].'</option>';
					}
				}
	return $content;	
}

public function get_locations_menu() {
		$content = '';
	//Gets all of the locations
	$places = $this->dbc->query(
					sprintf("SELECT id, location FROM agenda_event_location"));	
					if ($places->num_rows > 0) {
					while($data = $places->fetch_assoc()){
						$content .= '<option value="'.$data['id'].'">'.$data['location'].'</option>';
					}
				}
	return $content;	
}

public function get_locations_change($day) {
		$content[0] = '';
		$i = 0;
	//Gets all of the locations
	$places = $this->dbc->query(
					sprintf("SELECT ael.id, ael.location FROM agenda_event_location as ael, agenda_event_location_day_connection as aeldc WHERE ael.id=aeldc.agenda_location_id AND aeldc.agenda_event_day = '%s'",
					 $this->dbc->real_escape_string($day)
					));	
					if ($places->num_rows > 0) {
					while($data = $places->fetch_assoc()){
						$content[$i] = $data['id'].'|'.$data['location'];
						$i++;
					}
				}
	return $content;	
}

public function get_order() {
	$i = 0;
			$content = '';
	//Gets all of the speaker order
	$order = $this->dbc->query(
					sprintf("SELECT order_id FROM speakers_order ORDER BY order_id ASC"));	
					if ($order->num_rows > 0) {
					while($data = $order->fetch_assoc()){
						$content .= '<option value="'.$data['order_id'].'">'.$data['order_id'].'</option>';
						if ($data['order_id'] > $i) {
						  $i = $data['order_id'];
						  }
					}
				} 
				         $i++;
						$content .= '<option selected="selected" value="'.$i.'">'.$i.'</option>';
					
	return $content;	
	
}

public function get_blogsquad_order() {
	$i = 0;
			$content = '';
	//Gets all of the speaker order
	$order = $this->dbc->query(
					sprintf("SELECT order_id FROM blogsquad_order ORDER BY order_id ASC"));	
					if ($order->num_rows > 0) {
					while($data = $order->fetch_assoc()){
						$content .= '<option value="'.$data['order_id'].'">'.$data['order_id'].'</option>';
						if ($data['order_id'] > $i) {
						  $i = $data['order_id'];
						  }
					}
				} 
				         $i++;
						$content .= '<option selected="selected" value="'.$i.'">'.$i.'</option>';
					
	return $content;	
	
}


public function get_speakers() {
	$output = '';

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
					} //personal fetch assoc end
				}  //personal num rows if end
						   			                
						$i++;
					} //if status = 1
					}  //Names fetch assoc end
				} // if num rows end	

	if(isset($content)){
	 foreach ($content as $person) {
		 $output .= '<option value="'.$person[18].'">'.$person[0].'</option>';
	 }
	}
	
return $output;
}


public function get_icons() {
			$content = '';
	//Gets all of the locations
	$icons = $this->dbc->query(
					sprintf("SELECT id, icon_name FROM agenda_event_icons"));	
					if ($icons->num_rows > 0) {
					while($data = $icons->fetch_assoc()){
						$content .= '<option value="'.$data['id'].'">'.$data['icon_name'].'</option>';
					}
				}
	return $content;	
	
}

public function get_sponsor_types() {
			$content = '';
			$content .= '<option value="0" selected>Sponsor Category</option>';
	//Gets all of the sponsor types
	$types = $this->dbc->query(
					sprintf("SELECT id, name FROM sponsors_type"));	
					if ($types->num_rows > 0) {
					while($data = $types->fetch_assoc()){
						$content .= '<option value="'.$data['id'].'">'.$data['name'].'</option>';
					}
				}
	return $content;	
	
}

public function get_mediapartner_types() {
			$content = '';
			$content .= '<option value="0" selected>Mediapartner Category</option>';
	//Gets all of the sponsor types
	$types = $this->dbc->query(
					sprintf("SELECT id, name FROM mediapartners_type"));	
					if ($types->num_rows > 0) {
					while($data = $types->fetch_assoc()){
						$content .= '<option value="'.$data['id'].'">'.$data['name'].'</option>';
					}
				}
	return $content;	
	
}

function agenda_list() {
			$content = '';
	//Gets all of the locations
	$agenda = $this->dbc->query(
					sprintf("SELECT id FROM agenda_event"));	
					if ($agenda->num_rows > 0) {
					while($ag = $agenda->fetch_assoc()){
						 $agendatitle = $this->dbc->query(
							sprintf("SELECT agenda_name FROM agenda_event_title WHERE agenda_event_id = '%s' ORDER BY date DESC LIMIT 0,1",
								$this->dbc->real_escape_string($ag['id'])
							)
							   );	
								if (mysqli_num_rows($agendatitle)) {
								while($title = $agendatitle->fetch_assoc()){
									$content .= '<option value="'.$ag['id'].'">'.$title['agenda_name'].'</option>';
									
								} //agenda while end
							}  //agenda numrows end
								
						
						
					}
				}
	return $content;	
	
		
}

function agenda_time_list() {
  $day = "10/14/2011";
  
 $output = '';
$startTime = date(strtotime($day." 7:00"));
$endTime = date(strtotime($day." 18:00"));

$timeDiff = round(($endTime - $startTime)/60/60);

$startHour = date("G", $startTime);
$endHour = $startHour + $timeDiff; 
$AmPm = "AM";

for ($i=$startHour; $i <= $endHour; $i++)
{
     for ($j = 0; $j <= 45; $j+=15)
        {
                $time = $i.":".str_pad($j, 2, '0', STR_PAD_LEFT);
				
				if (date(strtotime($day." ".$time)) <= $endTime) {
					
					$temp = date("g", strtotime($day." ".$time));
					
					if ($temp == '12') {
						$AmPm = "PM";
					}
					
					$output .='<option value="'.date("g:i", strtotime($day." ".$time)).$AmPm.'">'.date("g:i", strtotime($day." ".$time)).$AmPm.'</option>';
					
				}

                
        }
}
   return $output;	
}

function alphabet() {
	$content = '';
	$alphas = range('A', 'Z');
	foreach ($alphas as $abc){
		$content .= '<option value="'.$abc.'">'.$abc.'</option>';
	}
	return $content;
}

}

/*AJAX REQUEST*/
//Update the locations for agenda new
 if(isset($_POST['action']) && $_POST['action'] == 'AgendaDayChange' && isset($_POST['day'])){
	$the_main = new locations();
    $locations = $the_main->get_locations_change($_POST['day']);
	
	echo json_encode($locations);

}// delete agenda
?>