#!/usr/bin/python

import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)


#Status of 1 equals off and thus program turns on fan if 0 then its on and will be turned off.
GPIO.setup(18,GPIO.OUT)
status = GPIO.input(18)

if status == 1:
	GPIO.output(18,GPIO.LOW)#turn on fan
else: GPIO.output(18,GPIO.HIGH)
