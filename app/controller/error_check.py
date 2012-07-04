#!/usr/bin/env python

import sys
import os

files = sys.stdin.read().split("\n")
path  = "/var/www/ACM-Redux/app/controller/"

for n in files:
	command = "php " + path + n
	print n
	os.popen(command).read()
	print 
