FROM php:8.2-apache

# Gerekli sistem araçlarını ve unzip paketini kuruyoruz (Composer için şart)
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    && rm -rf /var/list/apt/lists/*

# Gerekli PDO MySQL uzantılarını kuruyoruz
RUN docker-php-ext-install pdo pdo_mysql

# Sunucuya resmi Composer'ı kopyalıyoruz
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Proje dosyalarını sunucuya kopyalıyoruz
COPY . /var/www/html

# Sunucu içinde Laravel bağımlılıklarını (vendor) indiriyoruz
RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

# Apache'nin yönlendirmesini Laravel'in public klasörüne ayarlıyoruz
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf

# Klasör izinlerini ayarlıyoruz
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage

# Laravel rotaları için Apache rewrite modülünü aktif ediyoruz
RUN a2enmod rewrite

# Port ayarı
EXPOSE 80

CMD touch database/database.sqlite && php artisan migrate --force && apache2-foreground