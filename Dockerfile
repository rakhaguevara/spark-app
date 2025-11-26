FROM php:8.2-apache

# Set document root (opsional)
ENV APACHE_DOCUMENT_ROOT=/var/www/html

# Install extensions PHP yang sering dipakai
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite (penting untuk Laravel / routing custom)
RUN a2enmod rewrite

# Copy konfigurasi Apache
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf

# Expose port
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
