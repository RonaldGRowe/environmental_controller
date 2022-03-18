Environmental Controller
========================

![Website based Interface](https://github.com/RonaldGRowe/environmental_controller/blob/master/Images/envirocontroller.png)

Collection of programs to utilize a Raspberry Pi to control and monitor an agricultural environment.

Using Python to access temperature and humidity sensor data. The data is stored in a MySQL database.
Python is also used to activate GPIO pins on Raspberry Pi to control relays. 
These relays will be able to control fans, humidifiers, lights, and any other necessary equipment.
Contains a website that will display current environmental conditions.
The access is through a wifi connection. It is password protected.
It also displays the conditions of the various equipment whether ON or OFF.
The condition will be able to be manually toggled through a website buttons.
There is a graph to display environmental conditions over a set period.
This could be used in any setting that needs environmental controls and tracking.

# Accomplishments
- Created a micro-controller using the LAMP framework
- Linux based operating system
- Apache webserver setup and deployed
- MySQL database with reading and writing user that have unique credentials to reduce risk of infiltration
- JSON was used to communicate between web based PHP and shell to run Python programs
- Used Google API gauges and graphs
- Automated processes to save time and reduce errors
- Utilized SSH to access and update software
- Needed multiple modules to run the Python programs on the controller

# Issues
- Most of the improvements were done directly on the device, no backups were created.
- Should have utilized a version control system like Git
- Did not make the website accessible through WAN only LAN
- Did not continue to upgrade features like automatically creating error message emails or reports
