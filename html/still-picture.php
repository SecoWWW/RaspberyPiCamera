<?php 

$output = shell_exec("sudo -u www-data python-scripts/example.py");
echo "<pre>$output</pre>";

?>