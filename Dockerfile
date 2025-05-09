# استفاده از PHP 8.3
FROM php:8.3-fpm

# نصب اکستنشن‌های موردنیاز
RUN docker-php-ext-install pdo pdo_mysql

# نصب Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تنظیم دایرکتوری کاری
WORKDIR /var/www

# کپی کردن فایل‌های پروژه
COPY . .

# نصب پکیج‌های لاراول
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libpng-dev \
    && docker-php-ext-install gd \
    && rm -rf /var/lib/apt/lists/*

RUN composer install --no-dev --optimize-autoloader

# تنظیم مجوزهای لازم
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache


# اجرای Laravel queue worker
CMD ["php-fpm"]
