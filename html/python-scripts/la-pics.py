#!/usr/bin/python3

import os

os.chdir('still-pictures')
all_pictures = os.listdir()
for i in range(0,len(all_pictures)):
    print("still-pictures/"+all_pictures[i])