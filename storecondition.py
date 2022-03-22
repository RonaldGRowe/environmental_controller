#!/usr/bin/env python3

from environmentconditions import get_environment
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

def store_envrionment():
    tempf, humidity = get_environment()
    for i, temp in enumerate(tempf):
        statement = "INSERT INTO readings (dtg, temperature, humidity) VALUES (?, ?, ?)"
        cur.execute(statement, (now, temp, humidity[i],))
    conn.commit()
    conn.close()

    store_environment()