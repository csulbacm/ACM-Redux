#!/usr/bin/env python

"""Counts all the lines from a directory inward."""

import os
import os.path
import sys

lines = 0

# put the directories you want to search here
dirs = ['.']
# put the file types you want to recognize here
ftypes = set(['.php', '.css', '.html', '.md'])

bold = os.name == 'posix' and os.popen('tput bold').read() or ''
reset = os.name == 'posix' and os.popen('tput sgr0').read() or ''

for d in dirs:
  for root, dirs, files in os.walk(os.path.join(os.getcwd(), d)):
      lines_in_dir = 0
      for name in files:
          if os.path.splitext(os.path.basename(name))[1] in ftypes:
              lines_in_dir += len(open(os.path.join(root, name), 'rU').readlines())
      in_dir = root.replace(os.getcwd(), '') and root.replace(os.getcwd(), '') or '.'
      if lines_in_dir > 0:
          print '    %-6i in %s' % (lines_in_dir, in_dir.lstrip('/'))
      lines += lines_in_dir

sys.stdout.write(bold)
print '    %-6i total lines' % (lines)
sys.stdout.write(reset)