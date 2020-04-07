#!/usr/bin/python

import os
import time
import sys
import RPi.GPIO as GPIO
import json


try:
    data = json.loads(sys.argv[1])
except:
    print "ERROR"
    sys.exit(1)

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)


GPIO.setup(18,GPIO.OUT)
status = GPIO.input(18)

if status == 1:
	GPIO.output(18,GPIO.LOW)#turn on fan
else: GPIO.output(18,GPIO.HIGH)
result="done"
print json.dumps(result)
