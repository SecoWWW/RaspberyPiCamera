<?php 
	exec("sudo -u www-data python-scripts/la-gifs.py", $result );
	foreach($result as &$value){
		echo "<p>";
		echo "<img src=".$value." alt=\"picture from camera\">";
		echo "</p>";
	}
?>