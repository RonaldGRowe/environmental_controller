#!/usr/bin/python

import os
import time
import sys
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

pin = [23]
length = len(pin)
x = 0
result = [0]

hour1 = int(time.strftime('%H'))

if ((hour1 <= 10) or (hour1 >= 17)):
    GPIO.setup(pin[x],GPIO.OUT)
    result[x] = GPIO.input(pin[x])
    if result[x] == 1:
        GPIO.output(pin[x],GPIO.LOW)   

else:
    GPIO.setup(pin[x],GPIO.OUT)
    result[x] = GPIO.input(pin[x])
    if result[x] == 0:
        GPIO.output(pin[x],GPIO.HIGH)
        
