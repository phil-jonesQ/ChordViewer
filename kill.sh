#!/bin/bash

docker_run_name="apache_CV"


echo "Removing container instance $docker_run_name"

docker rm -f $docker_run_name

