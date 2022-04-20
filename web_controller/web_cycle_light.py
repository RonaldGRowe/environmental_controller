#!/usr/bin/env python3

import RPi.GPIO as GPIO
import json


GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

lightpins = [20]

for pin in lightpins:
    GPIO.setup(pin,GPIO.OUT)
    status = GPIO.input(pin)
    if status:
        GPIO.output(pin,GPIO.LOW)#turn on drip
        newstatus = "ON"
    else:
        GPIO.output(pin,GPIO.HIGH)
        newstatus = "OFF"

result=["done", newstatus]

print(json.dumps(result))
