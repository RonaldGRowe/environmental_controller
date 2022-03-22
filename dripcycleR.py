#!/usr/bin/python

import time
import RPi.GPIO as GPIO
from time import sleep

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

pin = [19]
length = len(pin)
x = 0
result = [0]

hour = time.strftime('%H')
minute = time.strftime('%M')
if hour == 18 and minute < 16:
    while x < length:
        GPIO.setup(pin[x],GPIO.OUT)
        result[x] = GPIO.input(pin[x])
        if result[x] == 1:
                GPIO.output(pin[x],GPIO.LOW)
        x += 1
    sleep(60)

else:
    while x < length:
        GPIO.setup(pin[x],GPIO.OUT)
        result[x] = GPIO.input(pin[x])
        if result[x] == 0:
                GPIO.output(pin[x],GPIO.HIGH)
        x += 1


GPIO.cleanup()
