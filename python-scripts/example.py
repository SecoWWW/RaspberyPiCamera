#!/usr/bin/python3

from time import sleep
from picamera import PiCamera
import os





camera = PiCamera()

camera.resolution = (1024,768)


camera.hflip = True
camera.vflip = True
camera.preview

sleep(2)
camera.capture("foo.jpg")