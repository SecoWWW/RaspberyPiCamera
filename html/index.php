<html>
<head>
<title>Camera Controll</title>
</head>


<body>
<p>
<?php echo "Hello it is: "; ?>
<?php echo date('Y-m-d H:i:s'); ?>
</p>
<?php 
$picture = shell_exec("sudo -u www-data python-scripts/ll-still-picture.py");
?>
<input type="submit" name="still-picture" class="button" value="still-picture" />

<img src=<?php echo "$picture"?> alt="picture from camera">
<?php
echo "<pre>$picture</pre>";
?>




<script src="scripts/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
	
	
	$('input.button').click(function(){
		console.log("button pressed")
		var click = $(this).val();
		var ajaxurl = 'still-picture.php',
		data = {'action': click};
		$.post(ajaxurl, data, function(response){
			alert("still-picture taken!!");
		});
	});
});
</script>
</body>
</html>