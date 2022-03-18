
#!/usr/bin/python

import time
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

lightpins = [20,23]
#military (24hrs) time required
hour1 = int(time.strftime('%H'))
offhour = 8
onhour = 20
#check time to turn lights on(0) or off(1) 
for pin in lightpins:
    if ((hour1 <= offhour) or (hour1 >= onhour)):
        GPIO.setup(pin,GPIO.OUT)
        status = GPIO.input(pin)
        if status:
            GPIO.output(pin[x],GPIO.LOW)   #turn on
    else:
        GPIO.setup(pin,GPIO.OUT)
        status = GPIO.input(pin)
        if not status:
            GPIO.output(pin[x],GPIO.HIGH)#turn off
