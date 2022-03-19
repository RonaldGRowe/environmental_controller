#!/usr/bin/env python3

import sys
import json
import RPi.GPIO as GPIO

#check for connection to webpage
try:
  data = json.loads(sys.argv[1])
except:
    print("ERROR")
    sys.exit(1)

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

relaypins = [18,20,23,24,19]
relaystatus = []

#check status of relays 0=ON 1=OFF
for pin in relaypins:
	GPIO.setup(pin,GPIO.OUT)
	status = GPIO.input(pin)
	if not status:
		relaystatus.append("ON")
	else:
		relaystatus.append("OFF")

#sends relaystatus to webpage
json.dumps(relaystatus)
