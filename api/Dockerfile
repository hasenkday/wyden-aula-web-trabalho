FROM php:8.5-apache

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN printf '%s\n' \
    '<IfModule mod_rewrite.c>' \
    'RewriteEngine On' \
    'RewriteCond %{REQUEST_FILENAME} !-f' \
    'RewriteCond %{REQUEST_FILENAME} !-d' \
    'RewriteRule ^ index.php [QSA,L]' \
    '</IfModule>' \
    > .htaccess \
    && sed -ri 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

CMD ["sh", "-c", "PORT=${PORT:-10000}; sed -i \"s/Listen 80/Listen ${PORT}/\" /etc/apache2/ports.conf; sed -i \"s/<VirtualHost \\*:80>/<VirtualHost *:${PORT}>/\" /etc/apache2/sites-available/000-default.conf; apache2-foreground"]
