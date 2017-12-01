#!/usr/bin/python3

from time import sleep
from picamera import PiCamera



camera = PiCamera()
camera.resolution = (1024,768)
camera.hflip = True
camera.vflip = True
camera.start_preview()
# Camera warm-up time
sleep(2)
camera.capture("foo.jpg")