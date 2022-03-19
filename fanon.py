#!/usr/bin/env python3

import RPi.GPIO as GPIO

fanpins = [18]

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

for pin in fanpins:
	GPIO.setup(pin,GPIO.OUT)
	status = GPIO.input(pin)
	#Status of 1 = off thus program turns on fan and vice versa.
	if status:
		GPIO.output(pin,GPIO.LOW)#turn on fan
	else: GPIO.output(pin,GPIO.HIGH)
