#!/bin/bash

# Esperar a que la base de datos esté lista
echo "Esperando a que la base de datos esté lista..."
while ! mysqladmin ping -h"$DB_HOST" --silent; do
    sleep 1
done

# Generar clave de aplicación si no existe
if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate
fi

# Ejecutar migraciones
echo "Ejecutando migraciones..."
php artisan migrate --force

# Ejecutar seeders si existen
if [ -f database/seeders/DatabaseSeeder.php ]; then
    echo "Ejecutando seeders..."
    php artisan db:seed --force
fi

# Limpiar caché
php artisan config:clear
php artisan cache:clear
php artisan view:clear

echo "Laravel está listo!" 