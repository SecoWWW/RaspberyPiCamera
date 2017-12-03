<?php
	shell_exec("sudo python-scripts/light-custom.py -r " . $_GET['red'] . " -g " . $_GET['green'] . " -b " . $_GET['blue']);
	echo "<h1>All lights are on<h1>";
?>