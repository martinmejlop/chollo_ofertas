#!/bin/bash

# Script de inicialización para Zeabur
echo "🚀 Iniciando Chollo Ofertas en Zeabur..."

# Generar clave de aplicación si no existe
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    echo "🔑 Generando clave de aplicación..."
    php artisan key:generate --force
fi

# Crear archivo .env si no existe
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
chmod -R 775 storage bootstrap/cache

echo "🎉 ¡Chollo Ofertas está listo!"

# Iniciar Laravel
exec php artisan serve --host 0.0.0.0 --port $PORT 