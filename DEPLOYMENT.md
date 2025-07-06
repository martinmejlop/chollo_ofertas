# 🚀 Guía de Despliegue en Railway

## 📋 Requisitos Previos

- Cuenta en [Railway](https://railway.app)
- Cuenta en [GitHub](https://github.com)
- Proyecto subido a GitHub

## 🔧 Pasos para Desplegar

### 1. Preparar Repositorio GitHub

```bash
# Inicializar git (si no está hecho)
git init
git add .
git commit -m "Preparado para despliegue en Railway"

# Crear repositorio en GitHub y subir
git remote add origin https://github.com/tu-usuario/chollo-ofertas.git
git push -u origin main
```

### 2. Configurar Railway

1. **Crear cuenta en Railway**
   - Ve a [railway.app](https://railway.app)
   - Regístrate con tu cuenta de GitHub

2. **Crear nuevo proyecto**
   - Haz clic en "New Project"
   - Selecciona "Deploy from GitHub repo"
   - Busca y selecciona tu repositorio `chollo-ofertas`

3. **Configurar servicios**
   - Railway detectará automáticamente el `docker-compose.yml`
   - Creará dos servicios: `app` y `db`

### 3. Configurar Variables de Entorno

En Railway, ve a la pestaña "Variables" y configura:

```env
APP_NAME="Chollo Ofertas"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-app.railway.app

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}

CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=strict
```

### 4. Configurar Base de Datos

1. **Crear servicio MySQL**
   - En Railway, haz clic en "New Service"
   - Selecciona "Database" → "MySQL"
   - Railway generará automáticamente las variables de entorno

2. **Conectar servicios**
   - En el servicio de la app, ve a "Settings"
   - En "Connect" selecciona tu base de datos MySQL

### 5. Desplegar

1. **Trigger deployment**
   - Haz un push a GitHub: `git push origin main`
   - Railway detectará los cambios y desplegará automáticamente

2. **Verificar logs**
   - En Railway, ve a la pestaña "Deployments"
   - Revisa los logs para asegurar que todo funciona

### 6. Configurar Dominio

1. **Obtener URL**
   - Railway te dará una URL como: `https://tu-app.railway.app`
   - Actualiza `APP_URL` en las variables de entorno

2. **Dominio personalizado (opcional)**
   - En "Settings" → "Domains"
   - Agrega tu dominio personalizado

## 🔐 Credenciales de Administrador

Una vez desplegado, para acceder al panel de administración:

- **URL**: `https://tu-app.railway.app/chollos/create`
- **Usuario**: `admin`
- **Contraseña**: `chollo2024`

## 📊 Monitoreo

- **Logs**: En Railway → "Deployments" → "View Logs"
- **Métricas**: En Railway → "Metrics"
- **Base de datos**: En Railway → "Database" → "Connect"

## 🔧 Comandos Útiles

```bash
# Ver logs en tiempo real
railway logs

# Ejecutar comandos en el servidor
railway run php artisan migrate

# Acceder al servidor
railway shell
```

## 🚨 Solución de Problemas

### Error de Base de Datos
- Verifica que las variables de entorno estén correctas
- Asegúrate de que el servicio MySQL esté conectado

### Error de Permisos
- Los permisos se configuran automáticamente en el script de inicio

### Error de Caché
- Railway limpia automáticamente la caché en cada despliegue

## 💰 Costos

- **Gratuito**: $5 de crédito mensual
- **Estimado**: ~$2-3/mes para este proyecto
- **Escalable**: Puedes pagar más si necesitas más recursos

## 🔄 Actualizaciones

Para actualizar la aplicación:

```bash
git add .
git commit -m "Nueva funcionalidad"
git push origin main
```

Railway detectará los cambios y desplegará automáticamente.

---

**¡Tu aplicación estará disponible en `https://tu-app.railway.app`!** 🎉 