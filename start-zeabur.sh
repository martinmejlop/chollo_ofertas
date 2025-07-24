#!/bin/bash

# Script de inicialización para Zeabur
echo "🚀 Iniciando Chollo Ofertas en Zeabur..."

# Mostrar variables de entorno (sin passwords)
echo "📋 Variables de entorno:"
echo "APP_ENV: $APP_ENV"
echo "APP_DEBUG: $APP_DEBUG"
echo "APP_KEY: ${APP_KEY:0:20}..." # Solo mostrar los primeros 20 caracteres
echo "DB_CONNECTION: $DB_CONNECTION"
echo "DB_HOST: $DB_HOST"
echo "DB_DATABASE: $DB_DATABASE"

# Crear archivo .env si no existe
if [ ! -f .env ]; then
    echo "📝 Creando archivo .env..."
    cat > .env << EOF
APP_NAME="Chollo Ofertas"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://chollo-ofertas.zeabur.app

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=\${DB_HOST}
DB_PORT=\${DB_PORT}
DB_DATABASE=\${DB_DATABASE}
DB_USERNAME=\${DB_USERNAME}
DB_PASSWORD=\${DB_PASSWORD}

CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
EOF
fi

# Generar clave de aplicación si no existe o está vacía
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ] || ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Generando clave de aplicación..."
    php artisan key:generate --force
    echo "✅ APP_KEY generada: $(grep APP_KEY .env | cut -d'=' -f2 | cut -c1-20)..."
else
    echo "✅ APP_KEY ya existe en .env"
fi

# Configurar permisos CRÍTICOS
echo "🔐 Configurando permisos..."
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod -R 775 public/build 2>/dev/null || true
chown -R www-data:www-data storage bootstrap/cache public/build 2>/dev/null || true

# Verificar que los directorios son escribibles
echo "📁 Verificando permisos de directorios..."
ls -la storage/
ls -la bootstrap/cache/
ls -la public/ 2>/dev/null || echo "Directorio public no encontrado"

# Ejecutar migraciones si la base de datos está disponible
if [ -n "$DB_HOST" ] && [ -n "$DB_DATABASE" ]; then
    echo "🗄️ Ejecutando migraciones..."
    php artisan migrate --force
else
    echo "⚠️ Variables de base de datos no configuradas"
    echo "DB_HOST: $DB_HOST"
    echo "DB_DATABASE: $DB_DATABASE"
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

# Verificar configuración
echo "🔍 Verificando configuración..."
php artisan config:show app
php artisan --version

echo "🎉 ¡Chollo Ofertas está listo!"

# Iniciar Laravel
exec php artisan serve --host 0.0.0.0 --port $PORT 