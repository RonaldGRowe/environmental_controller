
#!/usr/bin/python

import os
import time
import sys
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

pin = [23]
length = len(pin)
x = 0
result = [0]

hour = int(time.strftime('%H'))

if ((hour <= 8) or (hour >= 21)):
    GPIO.setup(pin[x],GPIO.OUT)
    result[x] = GPIO.input(pin[x])
    if result[x] == 1:
        GPIO.output(pin[x],GPIO.LOW)

else:
    GPIO.setup(pin[x],GPIO.OUT)
    result[x] = GPIO.input(pin[x])
    if result[x] == 0:
        GPIO.output(pin[x],GPIO.HIGH)
