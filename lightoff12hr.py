
#!/usr/bin/python

#comment out unused module
#import os
import time
#import sys
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
#pin of GPIO connected to light relay, can control more than one on the same schedule
pin = [23]
length = len(pin)
x = 0
result = [0]
#create variable with hour of current time
hour = int(time.strftime('%H'))
#determine whether current hour is within paramters to turn on
if ((hour <= 8) or (hour >= 21)):
    GPIO.setup(pin[x],GPIO.OUT)
    result[x] = GPIO.input(pin[x])
    if result[x] == 1:
        GPIO.output(pin[x],GPIO.LOW)#turn on
#else be sure it is off
else:
    GPIO.setup(pin[x],GPIO.OUT)
    result[x] = GPIO.input(pin[x])
    if result[x] == 0:
        GPIO.output(pin[x],GPIO.HIGH)#turn off
