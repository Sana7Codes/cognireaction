FROM php:8.2-fpm

# System deps
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install pdo pdo_mysql gd zip \
 && rm -rf /var/lib/apt/lists/*

# Composer (we'll use it later on)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# For starting we mount code via volumes, so no COPY here.
# Healthcheck (lightweight)
HEALTHCHECK --interval=30s --timeout=3s --retries=3 CMD php -r "echo 'ok';"

CMD ["php-fpm"]

