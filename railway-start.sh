#!/bin/bash

# Script de inicialización para Railway
echo "🚀 Iniciando Chollo Ofertas en Railway..."

# Esperar a que la base de datos esté lista
echo "⏳ Esperando conexión a la base de datos..."
if [ -n "$DB_HOST" ] && [ -n "$DB_PORT" ] && [ -n "$DB_USERNAME" ] && [ -n "$DB_PASSWORD" ]; then
    while ! mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent 2>/dev/null; do
        sleep 2
    done
    echo "✅ Base de datos conectada"
else
    echo "⚠️ Variables de base de datos no configuradas, usando configuración local"
    sleep 5
fi

# Generar clave de aplicación si no existe
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    echo "🔑 Generando clave de aplicación..."
    php artisan key:generate --force
fi

# Ejecutar migraciones
echo "🗄️ Ejecutando migraciones..."
php artisan migrate --force

# Ejecutar seeders si es la primera vez
if [ ! -f /tmp/seeded ]; then
    echo "🌱 Ejecutando seeders..."
    php artisan db:seed --force
    touch /tmp/seeded
fi

# Limpiar y optimizar caché
echo "🧹 Limpiando caché..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Optimizar para producción
echo "⚡ Optimizando para producción..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Configurar permisos
echo "🔐 Configurando permisos..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "🎉 ¡Chollo Ofertas está listo!"
echo "🌐 URL: $APP_URL"

# Iniciar Apache
exec apache2-foreground 