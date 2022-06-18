## Lara SaaS - Multi-tenant SaaS Boilerplate
The boilerplate uses Laravel 8.

## Packages
- [Laravel](https://laravel.com)
- [Laravel Breeze](https://github.com/laravel/breeze)
- [Laravel Cashier](https://github.com/laravel/cashier)
- [Laravel Livewire](https://laravel-livewire.com)
- [Laravel Actions](https://laravelactions.com/)
- [Laravel Lockout](https://github.com/rappasoft/lockout)
- [Tenancy](https://tenancyforlaravel.com)

## Nginx Wildcard SSL & SubDomain
Wildcard ssl certificate
```
sudo certbot --server https://acme-v02.api.letsencrypt.org/directory -d example.com -d *.example.com --manual --preferred-challenges dns-01 certonly
```

Nginx Wildcard Subdomain
```
server
{
  listen 80;
  listen [::]:80;
  server_name *.example.com;
  return 301 https://$host$request_uri;
}

server
{
  listen 443 ssl;
  server_name *.example.com;

  ssl_certificate /etc/letsencrypt/live/example.com/fullchain.pem;
  ssl_certificate_key /etc/letsencrypt/live/example.com/privkey.pem;
  include /etc/letsencrypt/options-ssl-nginx.conf;
  ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem;


  root /var/www/html/saas/public;

  add_header X-Frame-Options "SAMEORIGIN";
  add_header X-Content-Type-Options "nosniff";

  index index.php;

  charset utf-8;

  location /
  {
    try_files $uri $uri/ /index.php?$query_string;
  }

  location = /favicon.ico
  {
    access_log off; log_not_found off;
  }
  location = /robots.txt
  {
    access_log off; log_not_found off;
  }

  error_page 404 /index.php;

  location ~ \.php$
  {
    fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
    include fastcgi_params;
  }

  location ~ /\.(?!well-known).*
  {
    deny all;
  }
}
```

## Credits
- All Contributors
