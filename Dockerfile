# Stage 1: Composer dependencies
FROM composer:2 as composer_builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --ignore-platform-reqs

# Stage 2: Frontend assets
FROM node:18-alpine as assets_builder
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 3: Final production image
FROM php:8.2-fpm-alpine as final

WORKDIR /var/www/html

# Install only necessary runtime system packages and PHP extensions
RUN apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        icu-dev \
        libzip-dev \
        libpng-dev \
        jpeg-dev \
        freetype-dev \
    && apk add --no-cache \
        icu-libs \
        libzip \
        libpng \
        jpeg \
        freetype \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql zip exif bcmath intl \
    && apk del .build-deps

# Copy application code and built assets/dependencies from builder stages
COPY --from=composer_builder /app/vendor/ ./vendor/
COPY --from=assets_builder /app/public/build/ ./public/build/
COPY . .

# Run Laravel optimizations for production
RUN composer dump-autoload --optimize && \
    php artisan route:cache && \
    php artisan view:cache

# Set correct permissions for storage and bootstrap cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["sh", "-c", "php artisan migrate --force && php artisan config:cache && exec php-fpm"]