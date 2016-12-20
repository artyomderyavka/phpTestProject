FROM haproxy:latest

# New haproxy.cfg containing the proxy config
COPY ./haproxy.cfg /usr/local/etc/haproxy/haproxy.cfg

# Backend not found html response
#COPY ./backend-not-found.html /var/www/html/backend-not-found.html

# Nginx Proxy and SSL shared configs
#COPY ./includes/ /etc/nginx/includes/

# Proxy SSL certs
#COPY ./ssl/ /etc/ssl/certs/nginx/
