# Use an official PHP runtime as the base image
FROM php:8.2.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP application code to the container
COPY . .

# Expose the default Apache port (usually 80)
EXPOSE 80

# Start the Apache web server
CMD ["apache2-foreground"]
