#!/usr/bin/python


import os
import time
import sys
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)


GPIO.setup(18,GPIO.OUT)
status = GPIO.input(18)

if status == 1:
	GPIO.output(18,GPIO.LOW)#turn on fan
else: GPIO.output(18,GPIO.HIGH)
