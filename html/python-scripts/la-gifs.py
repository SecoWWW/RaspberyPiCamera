#!/usr/bin/python3

import os

os.chdir('time-lapse')
all_pictures = os.listdir()
for i in range(0,len(all_pictures)):
    print("time-lapse/"+all_pictures[i])