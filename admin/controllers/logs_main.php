<?php 

class logs_main extends config {
	
public function get_logs() {
		$content[0][0] = '';;
	//Gets all of the locations
	$i = 0;
	$places = $this->dbc->query(
					sprintf("SELECT ul.id, u.username, ul.action, ul.value, ul.date FROM users as u, user_log as ul WHERE ul.user_id=u.id ORDER BY ul.id DESC"));	
					if ($places->num_rows > 0) {
					while($data = $places->fetch_assoc()){
						$content[$i][0] = $data['id'];
						$content[$i][1] = $data['username'];
						$content[$i][2] = $data['action'];
						$content[$i][3] = $data['value'];
						$content[$i][4] = $data['date'];
						$i++;
					}
				}
	return $content;	
}


}
?>