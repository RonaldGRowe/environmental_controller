#!/usr/bin/env python3

import json
from decouple import config

try:
    conn = mariadb.connect(
              user = config('user', default=''),
              password = config('password', default=''),
              host = config('host', default=''),
              database = config('database', default='')
    )
except mariadb.Error as e:
    print(json.dumps(f"Error connecting to MariaDb: {e}"))



cur = conn.cursor()

cur.execute(statement)
result = cur.fetchall()
print(result)
conn.commit()
conn.close()

print(json.dumps(relaystatus))