<?php
	shell_exec("sudo uv4l -nopreview --auto-video_nr --driver raspicam --encoding mjpeg --width 640 --height 480 --framerate 10 --hflip yes --vflip yes --server-option '--port=9090' --server-option '--max-queued-connections=30' --server-option '--max-streams=2' --server-option '--max-threads=29'");
?>