#!/usr/bin/env python3

import RPi.GPIO as GPIO

# used to set state of GPIO pins that control dripper relays. Ran at startup to make sure drippers are turned off.
dripperpins = [19,24]

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

for pin in dripperpins:
    GPIO.setup(pin,GPIO.OUT)
    GPIO.output(pin,GPIO.HIGH)

