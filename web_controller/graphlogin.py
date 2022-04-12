#!/usr/bin/env python3

from decouple import config

try:
    conn = mariadb.connect(
              user = config('user', default=''),
              password = config('password', default=''),
              host = config('host', default=''),
              database = config('database', default='')
    )
except mariadb.Error as e:
    print(f"Error connecting to MariaDb: {e}")
