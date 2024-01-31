#!/bin/bash

#Status variables for verbose purpose:
status_info='[\033[1;34mINF\033[0m]';
status_aware='[\033[1;33m!\033[0m]';
status_fail='[\033[1;31mFAI\033[0m]';
status_ok='[\033[1;32mOK\033[0m]';

echo -e "$status_info Starting Vulnerable code snippet (Vsnippet) docker container.";

#Check if the docker command exist otherwise test the secound one:
ok=0
if command -v 'docker-compose' &> /dev/null; then
    echo -e "$status_ok Vsnippet successful"; ok=1;
    docker-compose up --build;

elif command -v 'docker' &> /dev/null; then
    echo -e "$status_ok Vsnippet successful"; ok=1;
    docker compose up;
fi

if [ $ok != 1 ]; then
    echo -e "$status_fail No docker command was found that could be used to run and build the vulnerable code snippet (Vsnippet) container. Make sure you have docker installed.";
    echo -e "$status_aware In case the start script fails due to permissions, try to run it with \"sudo\".";
    exit 1;
fi
exit 0;
