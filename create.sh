#!/bin/bash

docker_run_name="apache_CV"


# Create image

docker build -t apache_cv_001 .

# Start Database

docker run -d --name=$docker_run_name --restart=always --net pj_images_vlan200 --ip 192.168.200.10 -p 8001:80 -v /home/philipjones/Projects/ChordViewer/web:/var/www/html:z apache_cv_001
