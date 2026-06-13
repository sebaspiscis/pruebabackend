# Prueba Backend API

API REST desarrollada con Laravel para la gestión de categorías y productos utilizando UUID como clave primaria.

## Tecnologías Utilizadas

* PHP 8.4
* Laravel 12
* MySQL
* Laravel Sanctum
* Laravel Telescope
* Laravel Auditing
* L5 Swagger
* UUIDs

---

## Requisitos

Antes de ejecutar el proyecto, asegúrese de tener instalado:

* PHP 8.4 o superior
* Composer
* MySQL
* Git

---

## Instalación

### Clonar repositorio

```bash
git clone <url-del-repositorio>
cd prueba-backend
```

### Instalar dependencias

```bash
composer install
```

### Configurar variables de entorno

Copiar el archivo de ejemplo:

```bash
cp .env.example .env
```

Generar clave de aplicación:

```bash
php artisan key:generate
```

### Configurar base de datos

Editar el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=prueba_backend
DB_USERNAME=root
DB_PASSWORD=
```

---

## Migraciones

Ejecutar migraciones:

```bash
php artisan migrate
```

O reiniciar completamente la base de datos:

```bash
php artisan migrate:fresh
```

---

## Seeders

Generar datos de prueba:

```bash
php artisan db:seed
```

O:

```bash
php artisan migrate:fresh --seed
```

Los seeders generan:

* Categorías
* Productos

---

## Ejecutar Proyecto

```bash
php artisan serve
```

Servidor local:

```text
http://127.0.0.1:8000
```

---

## Autenticación

La API utiliza Laravel Sanctum.

### Generar Token

Ejemplo:

```php
$token = $user->createToken('api-token')->plainTextToken;
```

### Consumir Endpoints Protegidos

Enviar en los headers:

```http
Authorization: Bearer TOKEN
```

---

## Estructura de Base de Datos

### Categorías

| Campo      | Tipo         |
| ---------- | ------------ |
| id         | UUID         |
| name       | VARCHAR(250) |
| created_at | TIMESTAMP    |
| updated_at | TIMESTAMP    |

### Productos

| Campo        | Tipo          |
| ------------ | ------------- |
| id           | UUID          |
| name         | VARCHAR(50)   |
| description  | VARCHAR(250)  |
| price        | DECIMAL(10,2) |
| stock        | INTEGER       |
| estado       | BOOLEAN       |
| categoria_id | UUID          |
| created_at   | TIMESTAMP     |
| updated_at   | TIMESTAMP     |

Relación:

* Una categoría tiene muchos productos.
* Un producto pertenece a una categoría.

---

## Endpoints Disponibles

### Categorías

| Método | Endpoint             |
| ------ | -------------------- |
| GET    | /api/categorias      |
| POST   | /api/categorias      |
| GET    | /api/categorias/{id} |
| PUT    | /api/categorias/{id} |
| DELETE | /api/categorias/{id} |

### Productos

| Método | Endpoint            |
| ------ | ------------------- |
| GET    | /api/productos      |
| POST   | /api/productos      |
| GET    | /api/productos/{id} |
| PUT    | /api/productos/{id} |
| DELETE | /api/productos/{id} |

### Autenticación

| Método | Endpoint    |
| ------ | ----------- |
| POST   | /api/login  |
| POST   | /api/logout |

---

## Documentación Swagger

Generar documentación:

```bash
php artisan l5-swagger:generate
```

Acceder desde:

```text
http://127.0.0.1:8000/api/documentation
```

---

## Laravel Telescope

Instalado para monitoreo y depuración.

Acceso:

```text
http://127.0.0.1:8000/telescope
```

---

## Laravel Auditing

Instalado para auditoría de registros.

Permite almacenar:

* Creaciones
* Actualizaciones
* Eliminaciones

de las entidades auditadas.

---

## Comandos Útiles

Limpiar caché:

```bash
php artisan optimize:clear
```

Regenerar autoload:

```bash
composer dump-autoload
```

Listar rutas:

```bash
php artisan route:list
```

Generar documentación Swagger:

```bash
php artisan l5-swagger:generate
```

Ejecutar seeders:

```bash
php artisan db:seed
```

---

## Autor

Sebastián Alarcón

Proyecto desarrollado como prueba técnica utilizando Laravel y buenas prácticas de desarrollo API REST.
"# pruebabackend" 
