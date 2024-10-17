
# Servicio Web de Gestión de Empresas

Este proyecto es un servicio web desarrollado con PHP y Laravel para la gestión de empresas, utilizando una base de datos SQLite.


![Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)


## Características

* Crear nuevas empresas
* Actualizar datos de empresas existentes por NIT
* Consultar empresas por NIT
* Listar todas las empresas registradas
* Eliminar empresas inactivas por NIT


## Requisitos

* PHP 7.4 o superior
* Composer
* Laravel 8.x
* SQLite
## Instalación

Instalar dependencias:

```bash
 composer install
```
Ejecutar las migraciones:

```bash
 php artisan migrate
```
Iniciar el servidor de desarrollo:
```bash
 php artisan serve
```
## Endpoints

* POST /api/companies: Crear una nueva empresa
* PUT /api/companies/{nit}: Actualizar datos de una empresa por NIT
* GET /api/companies/{nit}: Obtener detalles de una empresa por NIT
* GET /api/companies: Obtener lista de todas las empresas
* DELETE /api/companies/{nit}: Eliminar una empresa inactiva por NIT
