# Use official PHP image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files into container
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions (optional, helpful for Laravel)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage

# Generate application key (if not set by env)
RUN php artisan config:clear && php artisan key:generate

# Cache config/routes/views
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=10000
