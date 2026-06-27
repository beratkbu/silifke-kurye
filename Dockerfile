FROM php:8.2-apache

# Gerekli PDO MySQL uzantılarını kuruyoruz
RUN docker-php-ext-install pdo pdo_mysql

# Proje dosyalarını sunucuya kopyalıyoruz
COPY . /var/www/html

# Apache'nin yönlendirmesini Laravel'in public klasörüne ayarlıyoruz
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf

# Laravel rotaları için Apache rewrite modülünü aktif ediyoruz
RUN a2enmod rewrite

# Port ayarı
EXPOSE 80