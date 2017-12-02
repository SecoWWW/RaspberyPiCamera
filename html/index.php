<html>
<head>
<title>Camera Controll</title>
</head>


<body>
<?php echo "Hello it is: "; ?>
<?php echo date('Y-m-d H:i:s'); ?>
<?php 


$output = shell_exec("sudo -u www-data python-scripts/example.py");
echo "<pre>$output</pre>";




?>
<input type="submit" name="still-picture" class="button" value="still-picture" />

<img src=<?php echo "$output"?> alt="picture from camera">

<script>
$(document).ready(function(){
	
	
	$('input.button').click(function(){
		alert('action_preformed');
		var click = $(this).val();
		var ajaxurl = 'still-picture.php',
		data = {'action': click};
		$.post(ajaxurl, data, function(response){
			alert("action_preformed");
		});
	});
});
</script>



<script src="scripts/jquery-3.2.1.min.js"></script>
</body>
</html>