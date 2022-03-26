#!/usr/bin/env python3

import sys
import RPi.GPIO as GPIO
import json

try:
    data = json.loads(sys.argv[1])
except:
    print("ERROR")
    sys.exit(1)

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

lightpins = [23]

for pin in lightpins:
    GPIO.setup(pin,GPIO.OUT)
    status = GPIO.input(pin)
    if status:
            GPIO.output(pin,GPIO.LOW)#turn on fan
    else: GPIO.output(pin,GPIO.HIGH)

result="done"

json.dumps(result)
