#!/bin/bash

cp -fv ./Dockerfile_pi Dockerfile

echo "Destorying container.."
./kill.sh

echo "Deploying container.."
./createOnPi.sh
