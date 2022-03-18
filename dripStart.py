#!/usr/bin/python

import RPi.GPIO as GPIO

# used to set state of GPIO pins that control relays. Ran at startup to make sure drippers are turned off.

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

GPIO.setup(24,GPIO.OUT)
GPIO.output(24,GPIO.HIGH)

GPIO.setup(19,GPIO.OUT)
GPIO.output(19,GPIO.HIGH)
