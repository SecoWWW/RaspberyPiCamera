#!/usr/bin/python3

import os
import datetime

os.chdir("still-pictures")
all_pictures = os.listdir()
newest = datetime.datetime(1699,1,1,0,0,0)
j = -1
for i in range(0,len(all_pictures)):
    help = all_pictures[i].split(".")    
    new_datetime = datetime.datetime.strptime(help[0], "%Y-%m-%d_%H:%M:%S")    
    if new_datetime > newest:
        newest = new_datetime
        j = i

print("still-pictures/" + all_pictures[j])