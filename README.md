# webinterface_nginx_retream

Simple web interface to change Facebook and Youtube streamkey with basic password in Apache module ```.htaccess``` for raspberry pi restrem server.

In your ```/etc/nginx/nginx.conf```,

Add the following in the include section:

```include /var/www/html/stream/restream.conf;```

or wherever your put your restream.conf file.

I have setup an stunnel for Facebook live, you can follow this tuto: it is for Ubuntu but it is similar for Raspberry pi
https://sites.google.com/view/facebook-rtmp-to-rtmps/home

Enjoy

C.
