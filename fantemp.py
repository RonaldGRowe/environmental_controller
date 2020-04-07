#!/usr/bin/python

import os
import time
import sys
import RPi.GPIO as GPIO
import pigpio
import DHT22



humidity = [0,1]
ctemperature = [0,1]

pi = pigpio.pi()
r = 0
pin = [5,6]
while r < 2:
   s = DHT22.sensor(pi, pin[r])
   s.trigger()
   time.sleep(0.2)
   humidity[r] = (s.humidity())
   ctemperature[r] = (s.temperature())
   r += 1
   s.cancel()
pi.stop()

ltemperature=ctemperature[0]*1.8+32
temp = round(ltemperature, 2)

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

pin = [18]
length = len(pin)
x = 0
result = [0]

minute = int(time.strftime('%M'))

if ((minute < 10) or (temp >= 77)):
    while x < length:
        GPIO.setup(pin[x],GPIO.OUT)
        result[x] = GPIO.input(pin[x])
        if result[x] == 1:
            GPIO.output(pin[x],GPIO.LOW)
        x += 1

else:
    while x < length:
        GPIO.setup(pin[x],GPIO.OUT)
        result[x] = GPIO.input(pin[x])
        if result[x] == 0:
            GPIO.output(pin[x],GPIO.HIGH)
        x += 1

