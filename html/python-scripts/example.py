#!/usr/bin/python3

from time import sleep
import datetime
from picamera import PiCamera
import os



now = datetime.datetime.now()

string = now.strftime("%Y-%m-%d_%H:%M:%S")

camera = PiCamera()

camera.resolution = (1024,768)


camera.hflip = True
camera.vflip = True

sleep(2)
print("still-pictures/"+string+".jpg")
os.chdir("still-pictures")
# print(os.getcwd())
camera.capture(string+".jpg")

# camera.capture("still-images/"+string+".jpg")