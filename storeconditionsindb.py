#!/usr/bin/env python3

import mariadb
from pigpio_dht import DHT22
import time
import datetime

conn = mariadb.connect(
    user = 'ronaldgrowe',
    password = 'ronjonjoe',
    host = 'localhost',
    database = 'temperaturehumidityreadings')

cur = conn.cursor()

def sensortest():
    x = 0
    temps = []
    humiditys = []
    sensor = DHT22(6)
    now = datetime.datetime.now()
    while x <= 4:
        result = sensor.read()
        x += 1
        time.sleep(5)
        if result['valid']:
            temps.append(result['temp_f'])
            humiditys.append(result['humidity'])
    tempf = round(sum(temps)/len(temps),2)
#    print(tempf)
#    print(temps)
#    print(humiditys)
    statement = "INSERT INTO readings (dtg, temperature, humidity) VALUES (?, ?, ?)"
    cur.execute(statement, (now, tempf, humiditys[2],))

sensortest()
conn.commit()
conn.close()