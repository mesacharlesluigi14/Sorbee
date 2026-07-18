FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy application files to the Apache web root
COPY . /var/www/html/

# Expose port (Railway sets $PORT dynamically)
EXPOSE 80

# Update Apache default configuration dynamically on startup to listen on $PORT
CMD sh -c "sed -i 's/Listen 80/Listen '\${PORT:-80}/ /etc/apache2/ports.conf && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:'\${PORT:-80}'>/' /etc/apache2/sites-available/000-default.conf && apache2-foreground"
