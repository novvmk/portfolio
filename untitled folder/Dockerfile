# Use the official PHP image
FROM php:8.1-apache

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /Users/myoungaekim/Downloads/portfolio/portfolio

# Copy the current directory contents into the container
COPY . /Users/myoungaekim/Downloads/portfolio/portfolio
