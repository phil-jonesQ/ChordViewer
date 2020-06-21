#!/bin/bash

git pull origin master

cp -fv ./Dockerfile_pi Dockerfile

echo "Destorying container.."
./kill.sh

echo "Deploying container.."
./createOnPi.sh
