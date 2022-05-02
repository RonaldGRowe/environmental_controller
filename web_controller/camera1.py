#!/usr/bin/env python3

from picamera import PiCamera
import time

camera = PiCamera()

#camera.start_preview()
#time.sleep(1)
camera.capture('pic5.jpg')
#camera.stop_preview()

