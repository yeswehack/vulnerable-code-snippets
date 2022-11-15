#!/bin/bash
  #####################################
 #  Vulnerable Snippet Setup Script  #
#####################################

echo "======[YesWaHack - Vulnerable Code Snippet Setup]======
-> Username=$1
-> Password=$2
-> DB=$3
";

if [[ $1 == "" || $2  == "" || $3  == "" ]];then
    echo -e "[\033[1;31mFA\033[0m] Invalid input";
    echo "Use: ./setupVsnippet.sh '<USERNAME>' '<PASSWORD>' '<DATABASE>'";
    exit;
fi;

echo -e "[\033[36mINF\033[0m] Is this correct? ( [CTRL+C] to cancel) Waiting 3 secounds...";
sleep 3;

lst=('db.php' 'db.py' 'db.js');
for i in "${lst[@]}";do
    sed -i "s/__USER__/$1/;s/__PASS__/$2/;s/__DB__/$3/" $i;
done;

echo -e "[\033[1;32mOK\033[0m] Insert credentials to 'setup.sql';
[\033[36mINF\033[0m] To make the MySQL changes, you need to enter the sudo password (\033[3;33mnot the user your about to create\033[0m)";

#Add credentials and run SQL setup: 
sed -i "s/__USER__/$1/;s/__PASS__/$2/;s/__DB__/$3/" setup.sql;
sudo mysql -e 'source setup.sql';

echo -e "[\033[1;32mOK\033[0m] Setup complete!";
