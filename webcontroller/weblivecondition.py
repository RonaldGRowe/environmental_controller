#!/usr/bin/env python3

from pigpio_dht import DHT22
import os
import time
import sys
import json



#used to test web connection to script
try:
    data = json.loads(sys.argv[1])
except:
    print("ERROR")
    sys.exit(1)
	

os.system('modprobe w1-gpio')
os.system('modprobe w1-therm')


#this needs lots of recoding to clean up


#identification numbers of connected thermocuple(temperature probes)
device=["28-021502d4ddff","28-02150397b5ff"]
length=len(device)
temperatureH2O = [0,1]

#read temperatures of the thermocouple 
def readtemp():
    c = 0
    while c<length:
        tempfile=('/sys/bus/w1/devices/' + device[c] + '/w1_slave')
        temp=open(tempfile)
        lines=temp.readlines()
        temp.close()
        if lines[0].find("YES"):
            delimeter=lines[1].find('=')
            temperatureC=(float(lines[1][delimeter+1:delimeter+6])/1000)
            temperatureF=round(temperatureC*1.8+32, 2)
            temperatureH2O[c]=temperatureF
            c += 1
        else:
            temperatureH2O[c]=error
            c += 1
#run thermocouple function 
readtemp()


sensor = Adafruit_DHT.AM2302
pin = 5
pin2 = 6

#set variables to current temperature and humidity
humidity, ctemperature = Adafruit_DHT.read_retry(sensor, pin)
humidity2, ctemperature2 = Adafruit_DHT.read_retry(sensor, pin2)

#convert temperature c to f and round to 2 decimal places
ltemperature=ctemperature*1.8+32
temperature = round(ltemperature, 2)

humidity = round(humidity, 2)

ltemperature2=ctemperature2*1.8+32
temperature2 = round(ltemperature2, 2)

humidity2 = round(humidity2, 2)

#set readings list to current environmental conditions
reading=[0,1,2,3,4,5]


if humidity is not None:
    reading[1]=humidity
else:
    reading[1] = 'failed'

if temperature is not None:
    reading[0]=temperature
else:
    reading[0] = 'failed'

if temperature2 is not None:
    reading[2]=temperature2
else:
    reading[2] = 'failed'

if humidity2 is not None:
    reading[3]=humidity2
else:
    reading[3] = 'failed'

reading[4] = temperatureH2O[0]
reading[5] = temperatureH2O[1]

#send set of reeadings to webpage
print json.dumps(reading)
