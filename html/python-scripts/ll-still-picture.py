import os
from datetime import datetime

all_pictures = os.listdir("../still-pictures/")
newest = datetime(1699,1,1,0,0,0)
j = -1
for i in range(0,len(all_pictures)):
    help = all_pictures[i].split(".")    
    new_datetime = datetime.strptime(help[0], "%Y-%m-%d_%H:%M:%S")    
    if new_datetime > newest:
        newest = new_datetime
        j = i
print(all_pictures[j])