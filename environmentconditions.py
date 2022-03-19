#! /usr/bin/env python3

from pigpio_dht import DHT22




#using dht22 sensor to fill variables with current temperature and humidity
def get_environment():
    temperatures = []
    humiditys = []

    tempsensorpins = [6]

    for pin in tempsensorpins:

        sensor = DHT22(pin)
        temperature.append(sensor['temp_f'])
        humidity.append(sensor['humidity'])

    return temperature, humidity
x = 0
    
    sensor = DHT22(6)
    while x <= 4:
        result = sensor.read()
        x += 1
        time.sleep(5)
        if result['valid']:
            temps.append(result['temp_f'])
            humiditys.append(result['humidity'])
    tempf = round(sum(temps)/len(temps),2)