<?php 

	$year = $_GET['year'];
	$gif = "sudo -u www-data python-scripts/create-gif.py ";
	if($_GET['now'] == 'now'){
		$gif .= "-n ";
	} else {
		$gif .= "-Y " . $GET_['year'] . " -M " . $GET_['month'] . " -D " . $GET_['day'] . " -h " . $GET_['hour'] . " -m " . $GET_['minute'];		
	}
	$gif .= "-delay " . $_GET['delay'] . " -frames " . $_GET['length'];
	exec($gif, $result);
	print_r($result);
	
?>