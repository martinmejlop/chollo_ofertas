#!/bin/bash

# Script de inicialización para Render
echo "🚀 Iniciando Chollo Ofertas en Render..."

# Mostrar variables de entorno (sin passwords)
echo "📋 Variables de entorno:"
echo "APP_ENV: $APP_ENV"
echo "APP_DEBUG: $APP_DEBUG"
echo "DB_CONNECTION: $DB_CONNECTION"
echo "DB_HOST: $DB_HOST"
echo "DB_DATABASE: $DB_DATABASE"

# Generar clave de aplicación si no existe
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    echo "🔑 Generando clave de aplicación..."
    php artisan key:generate --force
fi

# Verificar si tenemos archivo .env
if [ ! -f .env ]; then
    echo "📝 Creando archivo .env..."
    cp .env.example .env
    php artisan key:generate --force
fi

# Ejecutar migraciones si la base de datos está disponible
if [ -n "$DB_HOST" ] && [ -n "$DB_DATABASE" ]; then
    echo "🗄️ Ejecutando migraciones..."
    php artisan migrate --force
else
    echo "⚠️ Variables de base de datos no configuradas"
fi

# Limpiar caché
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

# Verificar que Laravel funciona
echo "🔍 Verificando Laravel..."
php artisan --version

echo "🎉 ¡Chollo Ofertas está listo!"

# Iniciar Apache
exec apache2-foreground 