#!/bin/sh
nohup /var/www/motion-mmal -n -c motion-mmalcam.conf 1>/dev/null 2>&1 </dev/null &

