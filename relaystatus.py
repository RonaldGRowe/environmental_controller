#!/usr/bin/python/

#comment out unused modules
#import os
import sys
import json
#import time
import RPi.GPIO as GPIO

#check for connection to webpage
try:
  data = json.loads(sys.argv[1])
except:
    print "ERROR"
    sys.exit(1)

#check status of relays to send status to webpage
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
pin = [18,20,23,24,19]
length = len(pin)
x = 0
result = [0,1,2,3,4]
#preset all to off and only changes to on when necessary
relaystatus = ["OFF","OFF","OFF","OFF","OFF"]
while x < length: 
	GPIO.setup(pin[x],GPIO.OUT)
	result[x] = GPIO.input(pin[x])
	if result[x] == 0:
    		relaystatus[x] = "ON"
	x += 1
#sends relaystatus to webpage
print json.dumps(relaystatus)
