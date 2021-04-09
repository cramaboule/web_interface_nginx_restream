# web interface for nginx restream server

Simple web interface to change Facebook and Youtube streamkey with basic password in Apache module ```.htaccess``` for raspberry pi restrem server.
Put all files to the root of your server (or in subfolder such as (www.exemple.com/stream), rename ```htaccess``` to ```.htaccess```.

Add basic Authentication in Nginx: https://docs.nginx.com/nginx/admin-guide/security-controls/configuring-http-basic-authentication/

In your ```/etc/nginx/nginx.conf```, add the following in the include section: ```include /var/www/html/stream/restream.conf;``` (for www.exemple.com/stream) or wherever you put your restream.conf file.

I have setup an stunnel for Facebook live, you can follow this tuto: it is for Ubuntu but it is similar for Raspberry pi:
https://sites.google.com/view/facebook-rtmp-to-rtmps/home

![web interface](https://github.com/cramaboule/web_interface_nginx_restream/blob/main/web-interface.PNG "Web Interface")

On OBS or Atem:
```
Service: Custom
Server: rtmp://<<ngnix server IP address>>/live
Stream Key: test
```
I even set an Dynamics DNS with my provider with `ddclient`, and NAT, thus accessible from anywhere.
https://samhobbs.co.uk/2015/01/dynamic-dns-ddclient-raspberry-pi-and-ubuntu

I set up as well a `Let's Encrypt` certificate.
https://www.nginx.com/blog/using-free-ssltls-certificates-from-lets-encrypt-with-nginx/

Enjoy

C.
