#!/usr/bin/env python3

from get_environ import get_environment
import mariadb
from pigpio_dht import DHT22
import datetime
from decouple import config

try:
    conn = mariadb.connect(
              user = config('writeuser', default=''),
              password = config('password', default=''),
              host = config('host', default=''),
              database = config('database', default='')
    )
except mariadb.Error as e:
    print(f"Error connecting to MariaDb: {e}")

def store_environment(conn):
    cur = conn.cursor()
    tempf, humidity = get_environment()
    for i, temp in enumerate(tempf):
        now = datetime.datetime.now()
        statement = "INSERT INTO readings (dtg, temperature, humidity) VALUES (?, ?, ?)"
        cur.execute(statement, (now, temp, humidity[i],))
    conn.commit()
    conn.close()

store_environment(conn)
