#!/bin/bash

docker_run_name="apache_CV"
docker_image_name="apache_cv_001"
deploy_web_path1="/home/philjones/Projects/Docker/ChordViewer/web"
deploy_web_map_path1="/var/www/html"
deploy_port_map="8001"
network="pj_images_vlan200"


# Create image

docker build -t apache_cv_001 .

# Start Database

docker run -d --name=$docker_run_name --restart=always --net $network --ip 192.168.200.10 -p $deploy_port_map:80 -v $deploy_web_path1:$deploy_web_map_path1:z $docker_image_name
