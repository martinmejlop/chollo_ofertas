# 🚀 Guía de Despliegue en Render

## 📋 Requisitos Previos

- Cuenta en [Render](https://render.com)
- Cuenta en [GitHub](https://github.com)
- Proyecto subido a GitHub

## 🔧 Pasos para Desplegar

### 1. Preparar Repositorio GitHub

```bash
# Inicializar git (si no está hecho)
git init
git add .
git commit -m "Preparado para despliegue en Render"

# Crear repositorio en GitHub y subir
git remote add origin https://github.com/tu-usuario/chollo-ofertas.git
git push -u origin main
```

### 2. Configurar Render

1. **Crear cuenta en Render**
   - Ve a [render.com](https://render.com)
   - Regístrate con tu cuenta de GitHub

2. **Crear nuevo proyecto**
   - Haz clic en "New +"
   - Selecciona "Blueprint"
   - Conecta tu repositorio de GitHub
   - Render detectará automáticamente el `render.yaml`

3. **Configurar servicios**
   - Render creará automáticamente:
     - Servicio web para la aplicación
     - Base de datos PostgreSQL

### 3. Configuración Automática

El archivo `render.yaml` ya está configurado con:

```yaml
services:
  - type: web
    name: chollo-ofertas
    env: php
    plan: free
    buildCommand: composer install --no-dev --optimize-autoloader
    startCommand: php artisan serve --host 0.0.0.0 --port $PORT
    envVars:
      - key: DB_CONNECTION
        value: pgsql
      # ... más configuraciones automáticas

databases:
  - name: chollo-ofertas-db
    databaseName: chollo_ofertas
    user: chollo_user
    plan: free
```

### 4. Variables de Entorno

Render configurará automáticamente:

```env
APP_ENV=production
APP_DEBUG=false
APP_KEY=generado_automáticamente
DB_CONNECTION=pgsql
DB_HOST=desde_base_de_datos
DB_PORT=5432
DB_DATABASE=chollo_ofertas
DB_USERNAME=chollo_user
DB_PASSWORD=generado_automáticamente
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
LOG_CHANNEL=stack
LOG_LEVEL=error
```

### 5. Desplegar

1. **Trigger deployment**
   - Haz un push a GitHub: `git push origin main`
   - Render detectará los cambios y desplegará automáticamente

2. **Verificar logs**
   - En Render, ve a tu servicio web
   - Revisa los logs para asegurar que todo funciona

### 6. Configurar Dominio

1. **Obtener URL**
   - Render te dará una URL como: `https://chollo-ofertas.onrender.com`
   - La URL se actualiza automáticamente

2. **Dominio personalizado (opcional)**
   - En "Settings" → "Custom Domains"
   - Agrega tu dominio personalizado

## 🔐 Credenciales de Administrador

Una vez desplegado, para acceder al panel de administración:

- **URL**: `https://tu-app.onrender.com/chollos/create`
- **Usuario**: `admin`
- **Contraseña**: `chollo2024`

## 📊 Monitoreo

- **Logs**: En Render → tu servicio → "Logs"
- **Métricas**: En Render → tu servicio → "Metrics"
- **Base de datos**: En Render → "Databases"

## 🔧 Comandos Útiles

```bash
# Ver logs en tiempo real
render logs

# Ejecutar comandos en el servidor
render run php artisan migrate

# Acceder al servidor
render shell
```

## 🚨 Solución de Problemas

### Error de Base de Datos
- Verifica que las variables de entorno estén correctas
- Asegúrate de que la base de datos PostgreSQL esté conectada

### Error de Permisos
- Los permisos se configuran automáticamente

### Error de Caché
- Render ejecuta automáticamente los comandos de optimización

## 💰 Costos

- **Gratuito**: Plan free de Render
- **Base de datos**: PostgreSQL gratuita incluida
- **Ancho de banda**: 750 horas/mes gratuitas

## 🔄 Actualizaciones

Para actualizar la aplicación:

```bash
git add .
git commit -m "Nueva funcionalidad"
git push origin main
```

Render detectará los cambios y desplegará automáticamente.

## 🗄️ Base de Datos PostgreSQL

Tu aplicación ahora usa PostgreSQL en lugar de MySQL:

- **Ventajas**: Más potente, mejor rendimiento
- **Compatibilidad**: Laravel maneja automáticamente las diferencias
- **Migración**: Se ejecuta automáticamente en el despliegue

---

**¡Tu aplicación estará disponible en `https://tu-app.onrender.com`!** 🎉 