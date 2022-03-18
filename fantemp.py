#!/usr/bin/python

import time
import RPi.GPIO as GPIO
from pigpio_dht import DHT22


#using dht22 sensor to fill variables with current temperature and humidity
humidity = []
temperature = []


def get_condition():
    gpiopin = [6]
    x = 0
    while x < len(gpiopin):
        sensor = DHT22(gpiopin[x])
        humidity.append(sensor['humidity'])
        temperature.append(sensor['temp_f'])



fanpin = [18]

#create variable with minutes of the current time
minute = int(time.strftime('%M'))
#run fan if time is earlier then 10 minutes after the hour or if temperature is more that or equal to 77 degrees
if ((minute < 10) or (temperature >= 77)):
    while x < length:
        GPIO.setup(pin[x],GPIO.OUT)
        result[x] = GPIO.input(pin[x])
        if result[x] == 1:
            GPIO.output(pin[x],GPIO.LOW)#turns fan on
        x += 1
else:
    if result[x] == 0:
        GPIO.output(fanpin[x],GPIO.HIGH)#turns fan off
        x += 1


get_condition()

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)