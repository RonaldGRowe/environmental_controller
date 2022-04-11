#!/usr/bin/env python3

import os
import glob



#read temperatures of waterproof thermocouple (DS18B20)
def readwatertemp():
    os.system('modprobe w1-gpio')
    os.system('modprobe w1-therm')
    basedir = '/sys/bus/w1/devices/'
    devicelist = glob.glob(basedir + '28*')

    watertemp = []
    print(devicelist)
    if devicelist != []:
        for device in devicelist:
            tempfile=( basedir + device + '/w1_slave')
            temp=open(tempfile)
            lines=temp.readlines()
            temp.close()
            if lines[0].find("YES"):
                delimeter=lines[1].find('=')
                tempC=(float(lines[1][delimeter+1:delimeter+6])/1000)
                tempF=round(tempC*1.8+32, 2)
                watertemp.append(tempF)
            else:
                print('error')
        return watertemp
    else:
        print("No Water Sensors")

if __name__ == "__main__":
    readwatertemp()
