#!/usr/bin/python

#commented out the unused modules
#import os
#import time
#import sys
import RPi.GPIO as GPIO

# used to set state of GPIO pins that control relays. Ran at startup.

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

GPIO.setup(24,GPIO.OUT)
GPIO.output(24,GPIO.HIGH)

GPIO.setup(19,GPIO.OUT)
GPIO.output(19,GPIO.HIGH)
