#!/usr/bin/env python3

import time
import RPi.GPIO as GPIO
from time import sleep

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

drippins = [19]

nowhour = time.strftime('%H')
nowmin = time.strftime('%M')

#Use military time 24hrs
driponhours = [8,14]

#Use seconds only, no minutes or hours
driponsecs = 10

if int(nowhour) in driponhours:
    for pin in drippins:
        GPIO.setup(pin,GPIO.OUT)
        status = GPIO.input(pin)
        if status:
            GPIO.output(pin,GPIO.LOW)#turn drip on
    sleep(driponsecs)
    for pin in drippins:
        GPIO.output(pin,GPIO.HIGH)#turn drip off

