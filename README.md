# Web interface for nginx restream server

![web interface](https://user-images.githubusercontent.com/21193662/143195337-156db35c-4133-4fd4-bd4b-626858eb07ea.png "Web Interface")

Simple web interface (with bootstrap) to change Facebook and Youtube streamkey with basic password in Apache module ```.htaccess``` for raspberry pi restrem server.

1. Setup a RTMP restream server with stunnel (for Facebook live), you can follow this tuto for Raspberry pi: https://streamglobe.nl/2020/12/04/build-a-raspberry-pi-restream-device/
2. Add basic Authentication in Nginx: https://docs.nginx.com/nginx/admin-guide/security-controls/configuring-http-basic-authentication/
3.Now it is time to setup the web interface: In your ```/etc/nginx/nginx.conf```, add the following in the include section: ```include /var/www/html/stream/restream.conf;``` (for www.exemple.com/stream) or wherever you put your restream.conf file.
4. Put all files to the root of your server (or in subfolder ```/var/www/html/stream/``` for (www.exemple.com/stream), rename ```htaccess``` to ```.htaccess```. 

Et Voilà !

On OBS:
```
Service: Custom
Server: rtmp://<<ngnix server IP address>>/live
Stream Key: test
```
I even set an Dynamics DNS with my provider with `ddclient`, and NAT, thus accessible from anywhere: https://samhobbs.co.uk/2015/01/dynamic-dns-ddclient-raspberry-pi-and-ubuntu

I set up as well a `Let's Encrypt` certificate : https://www.nginx.com/blog/using-free-ssltls-certificates-from-lets-encrypt-with-nginx/

Enjoy

C.
