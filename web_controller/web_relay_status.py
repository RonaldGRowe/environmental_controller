#!/usr/bin/env python3

import sys
import json
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

relaypins = {"fan":18, "light":20, "seclight":23, "drip":24, "secdrip":19}
relaystatus = {"fan": "ON", "light": "ON", "seclight": "ON", "drip": "OFF", "secdrip": "ON"}

#check status of relays 0=ON 1=OFF
#for k, pin in relaypins.items():
#	GPIO.setup(pin,GPIO.OUT)
#	status = GPIO.input(pin)
#	if not status:
#		relaystatus.setdefault(k,"ON")
#	else:
#		relaystatus.setdefault(k, "OFF")

#sends relaystatus to webpage
print(json.dumps(relaystatus))
