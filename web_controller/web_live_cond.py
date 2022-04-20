#!/usr/bin/env python3

import json

from web_get_environ import get_environment
#from get_water_temp import readwatertemp


#read temperatures of the thermocouple
#watertemp = readwatertemp()
temp, humidity = get_environment()

readings={"watertemp": (temp[0] - 10), "secwatertemp": (temp[0] - 12), "airtemp": temp[0], "secairtemp": (temp[0] + 2), "humidity": humidity[0], "sechumidity":(humidity[0] - 3)}
#send set of readings to webpage
print(json.dumps(readings))
