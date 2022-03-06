Environmental Controller
========================
Collection of programs to utilize a Raspberry Pi to control and monitor an agricultural environment.

Using Python to access temperature and humidity sensor data. The data is stored in a MySQL database.
Python is also used to activate GPIO pins on Raspberry Pi to control relays. 
These relays will be able to control fans, humidifiers, lights, and any other necessary equipment.
Contains a website that will display current envrionmental conditions.
The access is through a wifi connection. It is password protected.
It also displays the conditions of the various equipment whether ON or OFF.
The condition will be able to be manually toggled through the website buttons.
There will be a graph to display environmental conditions over a set period of time.
This could be used in any setting that needs environmental controls and tracking.

# Accomplishments
- Created a micro-controller using LAMP framework
- Linux based operating system
- Apache webserver setup and deployed
- MySQL database reading and writing using separate credentials to reduce risk of infiltration
- JSON was used to communicate between PHP and Python programs
- Used Google API gauges and graphs
- Automated processes inorder to save time and reduce errors
- Utilized SSH to access and update software

# Issues
- Most of the improvements were done directly on the device, no backups created.
- Should have utilized version control system like Git
- Did not make the website accessable through WAN only LAN
- Did not continue to upgrade features like automatically creating error message emails or reports
