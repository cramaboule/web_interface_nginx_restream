# web_interface_nginx_restream

Simple web interface to change Facebook and Youtube streamkey with basic password in Apache module ```.htaccess``` for raspberry pi restrem server.

In your ```/etc/nginx/nginx.conf```, add the following in the include section:

```include /var/www/html/stream/restream.conf;``` (for www.exemple.com/stream) or wherever you put your restream.conf file.

I have setup an stunnel for Facebook live, you can follow this tuto: it is for Ubuntu but it is similar for Raspberry pi:
https://sites.google.com/view/facebook-rtmp-to-rtmps/home

On OBS or Atem:
```
Service: Custom
Server: rtmp://<<ngnix server IP address>>/live
Stream Key: test
```
I even set an Dynamics DNS with my provider with `ddclient`, and NAT, thus accessible from anywhere.

I set up as well a `Let's Encrypt` certificate.

Enjoy

C.
