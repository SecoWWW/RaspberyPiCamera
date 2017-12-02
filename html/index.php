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
	$gif = shell_exec("sudo -u www-data python-scripts/ll-create-gif.py");
?>
<p>
	<input type="submit" name="still-picture" class="button" value="still-picture" />
	<input type="submit" name="show-pictures" class="button" value="show-pictures" />
</p>
<img src=<?php echo "$picture"?> alt="picture from camera">

<?php
echo "<pre>$picture</pre>";
?>
<p>
	<form class="gif-form" action="">
		Year:</br>
		<input type="text" class='year' name="year" value=""></br>
		Month:</br>
		<input type="text" class='month' name="month" value=""></br>	
		Day:</br>
		<input type="text" class='day' name="day" value=""></br>	
		Hour:</br>
		<input type="text" class='hour' name="hour" value=""></br>	
		Minute:</br>
		<input type="text" class='minute' name="minute" value=""></br>
		Delay [seconds]:</br>
		<input type="text" name="delay" value="2"></br>		
		Number of pictures:</br>
		<input type="text" name="length" value="10"></br>			
		<input type="checkbox" name="now" value="now">create gif now</br>
		<input type="submit" name="create-gif" value="create-gif">
	</form>
	<input type="submit" value="show-gifs" class="button" >	
</p>
<img src=<?php echo "$gif"?> alt="picture from camera">
<?php
	echo "<pre>$gif</pre>";

	$gif = "sudo -u www-data python-scripts/create-gif.py ";	
	if($_GET['year'] != ''){

		if($_GET['now'] == 'now'){
			$gif .= "-n ";
		} else {
			$gif .= "-Y " . $_GET['year'] . " -M " . $_GET['month'] . " -D " . $_GET['day'] . " -h " . $_GET['hour'] . " -m " . $_GET['minute'];		
		}
		$gif .= " -delay " . $_GET['delay'] . " -frames " . $_GET['length'];	
		exec($gif, $result);
		print_r($result);
	}
	echo $gif;
	
?>


<script src="scripts/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
	var date = new Date();
	$('input.year').val(date.getFullYear());
	var help = date.getMonth() + 1;
	$('input.month').val(help);
	$('input.day').val(date.getDate());
	$('input.hour').val(date.getHours());
	$('input.minute').val(date.getMinutes());
	
	
	$('.button').click(function(){
		console.log("button pressed")
		var click = $(this).val();
		console.log(click);
		if(click == 'still-picture'){
			var ajaxurl = 'still-picture.php',
			data = {'action': click};
			$.post(ajaxurl, data, function(response){
				alert("still-picture taken!!");
			});
		}
		if(click == 'show-pictures'){
			console.log('show all pictures');
			window.open('./allpictures.php');
		}
		if(click == 'show-gifs'){
			console.log('show all gifs');
			window.open('./allgifs.php');
		}
	});
	
	$('.gif-form').submit
	
});
</script>
</body>
</html>