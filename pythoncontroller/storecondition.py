#!/usr/bin/env python3

from environmentconditions import get_environment
import mariadb
from pigpio_dht import DHT22
import datetime

conn = mariadb.connect(
    user = 'ronaldgrowe',
    password = 'ronjonjoe',
    host = 'localhost',
    database = 'temperaturehumidityreadings')



def store_envrionment(conn):
    cur = conn.cursor()
    tempf, humidity = get_environment()
    for i, temp in enumerate(tempf):
        now = datetime.datetime.now()
        statement = "INSERT INTO readings (dtg, temperature, humidity) VALUES (?, ?, ?)"
        cur.execute(statement, (now, temp, humidity[i],))
    conn.commit()
    conn.close()


store_environment(conn)