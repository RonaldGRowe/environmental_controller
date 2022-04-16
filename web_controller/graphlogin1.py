#!/usr/bin/env python3
import mariadb
import json
from decouple import config
from datetime import date

try:
    conn = mariadb.connect(
              user = config('user', default=''),
              password = config('password', default=''),
              host = config('host', default=''),
              database = config('database', default='')
    )
except mariadb.Error as e:
    print(json.dumps(f"Error connecting to MariaDb: {e}"))

def formatdate(date):
    if date.date():
        newdate = date
        return f"{newdate.hour}:{newdate.minute} {newdate.month}/{newdate.day}"
    else:
        return None

cur = conn.cursor()

cur.execute("SELECT * FROM readings ORDER BY dtg DESC LIMIT 100")
graphdata = []
for date, temperature, humidity in cur:
    templist = []
    templist.append(formatdate(date))
    templist.append(temperature)
    templist.append(humidity)
    graphdata.insert(0,templist)
conn.close()

print(json.dumps(graphdata))
