# Usar PHP 8.2 con Apache
FROM php:8.2-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Instalar mysql-client para el script de inicialización
RUN apt-get install -y default-mysql-client

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Optimizar para producción
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Copiar archivo de configuración de Apache
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Copiar script de inicialización
COPY railway-start.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/railway-start.sh

# Exponer puerto 80
EXPOSE 80

# Comando para iniciar con script de Railway
CMD ["/usr/local/bin/railway-start.sh"] 