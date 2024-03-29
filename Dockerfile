# Use the official PHP image with Apache
FROM php:8.0-apache

# Set working directory in container
WORKDIR /var/www/html

# Copy Lumen files into container
COPY . .

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache web server
CMD ["apache2-foreground"]