#!/usr/bin/env python3

import RPi.GPIO as GPIO
import json




GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

drippins = [24]

for pin in drippins:
    GPIO.setup(pin,GPIO.OUT)
    status = GPIO.input(pin)

    if status:
            GPIO.output(pin,GPIO.LOW)#turn on drip
    else: GPIO.output(pin,GPIO.HIGH)

result="done"

print(json.dumps(result))
