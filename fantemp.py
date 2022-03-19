#!/usr/bin/env python3

import time
import RPi.GPIO as GPIO
from environmentconditions import get_environment

def run_fan():

    temperature, humidity = get_environment()

    fanpin = [18]
    minute = int(time.strftime('%M'))
    hightemp = 77
    highhumidity = 65
    
    GPIO.setmode(GPIO.BCM)
    GPIO.setwarnings(False)
    
    #run fan if time is earlier then 10 minutes after the hour or if temperature is more that or equal to 77 degrees
    if ((minute < 10) or (max(temperature) >= hightemp)) or (max(humidity) >= highhumidity):
        for pin in fanpin:
            GPIO.setup(pin,GPIO.OUT)
            status = GPIO.input(pin)
            if status:
                GPIO.output(pin,GPIO.LOW)#turns fan on
    else:
        for pin in fanpin:
            GPIO.setup(pin,GPIO.OUT)
            status = GPIO.input(pin)
            if not status:
                GPIO.output(pin,GPIO.HIGH)#turns fan off


run_fan()