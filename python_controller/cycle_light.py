#!/usr/bin/env python3

import time
import RPi.GPIO as GPIO

def light_cycle():
    lightpins = [20]

    #military (24hrs) time required
    hournow = int(time.strftime('%H'))
    offhour = 20
    onhour = 8

    #check time to turn lights on(0) or off(1) 
    for pin in lightpins:
        GPIO.setmode(GPIO.BCM)
        GPIO.setwarnings(False)
        GPIO.setup(pin,GPIO.OUT)
        status = GPIO.input(pin)
        if ((hournow <= offhour) or (hournow >= onhour)):
            if status:
                GPIO.output(pin,GPIO.LOW)   #turn on
        else:
            if not status:
                GPIO.output(pin,GPIO.HIGH)#turn off

light_cycle()