# 🐳 Docker para Chollo Ofertas

Este proyecto Laravel está configurado para ejecutarse con Docker.

## 📋 Requisitos Previos

- Docker
- Docker Compose

## 🚀 Pasos para Lanzar el Proyecto

### 1. Clonar el repositorio (si no lo has hecho)
```bash
git clone <tu-repositorio>
cd chollo_ofertas
```

### 2. Construir y lanzar con Docker Compose
```bash
docker-compose up --build
```

### 3. Configurar Laravel (en una nueva terminal)
```bash
# Copiar archivo de configuración
docker-compose exec app cp .env.example .env

# Generar clave de aplicación
docker-compose exec app php artisan key:generate

# Ejecutar migraciones
docker-compose exec app php artisan migrate

# Ejecutar seeders (opcional)
docker-compose exec app php artisan db:seed
```

## 🌐 Acceder a la Aplicación

Una vez que todo esté funcionando, puedes acceder a:

- **Aplicación Laravel**: http://localhost:8000
- **Base de datos MySQL**: localhost:3306

## 📁 Estructura de Archivos Docker

- `Dockerfile` - Configuración del contenedor PHP/Apache
- `docker-compose.yml` - Orquestación de servicios
- `docker/apache.conf` - Configuración de Apache
- `docker/init.sh` - Script de inicialización
- `.dockerignore` - Archivos excluidos del contexto Docker

## 🔧 Comandos Útiles

```bash
# Ver logs
docker-compose logs

# Ejecutar comandos artisan
docker-compose exec app php artisan [comando]

# Acceder al contenedor
docker-compose exec app bash

# Detener servicios
docker-compose down

# Detener y eliminar volúmenes
docker-compose down -v
```

## 🗄️ Base de Datos

- **Host**: db (dentro de Docker) o localhost (desde tu máquina)
- **Puerto**: 3306
- **Base de datos**: chollo_ofertas
- **Usuario**: laravel
- **Contraseña**: password

## ⚠️ Notas Importantes

1. La primera vez que ejecutes `docker-compose up --build` puede tardar varios minutos en descargar las imágenes y construir el contenedor.

2. Si cambias archivos del proyecto, no necesitas reconstruir la imagen completa gracias a los volúmenes montados.

3. Los datos de la base de datos se persisten en un volumen de Docker.

4. Para desarrollo, puedes modificar archivos directamente en tu editor y los cambios se reflejarán automáticamente. 