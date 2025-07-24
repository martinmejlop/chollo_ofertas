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
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Crear directorios necesarios y configurar permisos ANTES de cambiar usuario
RUN mkdir -p /var/www/html/vendor /var/www/html/bootstrap/cache /var/www/html/public/build /var/www/.npm \
    && chown -R www-data:www-data /var/www/html/vendor /var/www/html/bootstrap/cache /var/www/html/public /var/www/.npm \
    && chmod -R 755 /var/www/html/vendor /var/www/html/bootstrap/cache /var/www/html/public /var/www/.npm

# Cambiar a usuario www-data para ejecutar composer y npm
USER www-data

# Instalar dependencias de PHP y Node.js
RUN set -eux \
    && if [ -f composer.json ]; then composer install --optimize-autoloader --classmap-authoritative --no-dev; fi \
    && if [ -f package.json ]; then npm install && npm run build; fi

# Volver a root para configurar Apache
USER root

# Configurar permisos finales
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Copiar archivo de configuración de Apache
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Exponer puerto 80
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"] 