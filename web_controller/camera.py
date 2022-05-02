#!/usr/bin/env python3

from picamera import PiCamera


def still_capture_jpg():
    camera = PiCamera()
    camera.capture('/var/www/html/pic1.jpg')


if __name__ == "__main__":
  still_capture_jpg()

