<?php 

class locations extends config {
	
public function get_locations() {
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


public function get_speakers() {
	$content = '';
	  $speakers = new speakers_main(); 
	$data = $speakers->speakers();
	if(isset($data)){
	 foreach ($data as $person) {
		 $content .= '<option value="'.$person[18].'">'.$person[0].'</option>';
	 }
	}
	
return $content;
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

for ($i=$startHour; $i <= $endHour; $i++)
{
     for ($j = 0; $j <= 45; $j+=15)
        {
                $time = $i.":".str_pad($j, 2, '0', STR_PAD_LEFT);
				
				if (date(strtotime($day." ".$time)) <= $endTime) {
					
					
					$output .='<option value="'.date("G:i", strtotime($day." ".$time)).'">'.date("G:i", strtotime($day." ".$time)).'</option>';
					
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
?>