#!/usr/bin/python

# commented out unused module
#import os
import time
import sys
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

pin = [23]
length = len(pin)
x = 0
result = [0]
#create variable with the hour of the current time
hour1 = int(time.strftime('%H'))
#determine whether the current hour is with in the paramters to turn on
if ((hour1 <= 10) or (hour1 >= 17)):
    GPIO.setup(pin[x],GPIO.OUT)
    result[x] = GPIO.input(pin[x])
    if result[x] == 1:
        GPIO.output(pin[x],GPIO.LOW)   #turn on
#else make sure its off
else:
    GPIO.setup(pin[x],GPIO.OUT)
    result[x] = GPIO.input(pin[x])
    if result[x] == 0:
        GPIO.output(pin[x],GPIO.HIGH)#turn off
        
