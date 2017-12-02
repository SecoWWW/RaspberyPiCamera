#!/usr/bin/python3

import time
import datetime
from picamera import PiCamera
import os
import sys

now = False
year = 2020
month = 1
day = 1
minute = 0
hour = 0
delay = 5
frames = 20

def time_delay():
    # function for time delay
    print(datetime.datetime.year)
    print(datetime.datetime.month)
    print(datetime.datetime.day)
    print(datetime.datetime.hour)
    print(datetime.datetime.minute)
    right_now = datetime.datetime(datetime.datetime.year,datetime.datetime.month,datetime.datetime.day,datetime.datetime.hour,datetime.datetime.minute)
    when = datetime.datetime(year,month,day,hour,minute)    
    difference = (when-right_now).total_seconds()
    print(difference)

def gif():
    camera = PiCamera()
    camera.resolution = (426,240)
    camera.hflip = True
    camera.vflip = True
    
    if(now == False):
        time_delay()
        return

    time.sleep(2)

    os.chdir("time-lapse")
    #print(os.getcwd())
    for i in range(int(frames)):
        print('image{0:04d}.jpg'.format(i))
        camera.capture('image{0:04d}.jpg'.format(i))
        time.sleep(float(delay))

    string = "convert -delay 10 -loop 0 image*.jpg "
    string += datetime.datetime.now().strftime("%Y-%m-%d_%H:%M:%S") + ".gif" 
    print(string)
    os.system(string)
    os.system('rm image*.jpg')
    

if __name__ == "__main__":
    for arg in range(0, len(sys.argv)):
        if sys.argv[arg] == "-Y":
            year = int(sys.argv[arg+1])
            print(year)
        elif sys.argv[arg] == "-M":
            month = int(sys.argv[arg+1])
            print(month)
        elif sys.argv[arg] == "-D":
            day = int(sys.argv[arg+1])
            print(day)
        elif sys.argv[arg] == "-h":
            hour = int(sys.argv[arg+1])
            print(hour)
        elif sys.argv[arg] == "-m":
            minute = int(sys.argv[arg+1])
            print(minute)
        elif sys.argv[arg] == "-n":
            now = True
            print(now)
        elif sys.argv[arg] == "-delay":
            delay = float(sys.argv[arg+1])
            print(delay)
        elif sys.argv[arg] == "-frames":
            frames = int(sys.argv[arg+1])
            print(frames)        
    gif()
        