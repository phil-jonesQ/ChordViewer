#!/bin/bash

echo "Destorying container.."
./kill.sh

echo "Deploying container.."
./createOnPi.sh
