#!/usr/bin/env python3

import RPi.GPIO as GPIO
import json
from camera import still_capture_jpg

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

drippins = [19]

for pin in drippins:
    GPIO.setup(pin,GPIO.OUT)
    status = GPIO.input(pin)
    if status:
        GPIO.output(pin,GPIO.LOW)#turn on drip
        newstatus = "ON"
    else:
        GPIO.output(pin,GPIO.HIGH)
        newstatus = "OFF"

result=["done",newstatus]

print(json.dumps(result))

still_capture_jpg()
