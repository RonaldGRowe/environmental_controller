#!/usr/bin/env python3

from pigpio_dht import DHT22
import time



#using dht22 sensor to fill variables with current temperature and humidity
def get_environment():
    temperature = []
    humidity = []

    tempsensorpins = [6]

    for pin in tempsensorpins:
        tempf, humid = sample_sensor(pin)
        temperature.append(tempf)
        humidity.append(humid)

    return temperature, humidity

#takes average of multiple readings for accuracy
def sample_sensor(pin):
    temps = []
    humiditys = []

    sensor = DHT22(pin)
    for c in range(3):
        result = sensor.read()
        time.sleep(3)
        if result['valid']:
            temps.append(result['temp_f'])
            humiditys.append(result['humidity'])
    tempf = round(sum(temps)/len(temps),2)
    humidity = round(sum(humiditys)/len(humiditys),2)
    return tempf, humidity
