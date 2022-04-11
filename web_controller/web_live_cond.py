#!/usr/bin/env python3

import sys
import json

#from get_environ import get_environment
#from get_water_temp import readwatertemp

#used to test web connection to script
try:
    data = json.loads(sys.argv[1])
except:
    print("ERROR")
    sys.exit(1)


#read temperatures of the thermocouple
#watertemp = readwatertemp()
#temp, humidity = get_environment()

readings={"watertemp": 66, "secwatertemp": 63, "airtemp": 78, "secairtemp": 83, "humidity": 78, "sechumidity": 67}


#send set of readings to webpage
json.dumps(reading)
