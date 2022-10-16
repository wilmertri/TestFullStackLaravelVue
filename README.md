# TestFullStackLaravelVue
Desarrollo de una app de prueba para el manejo de pedidos de productos dentro de un inventario, la cual estará construida con un API en Laravel para el Backend y un App en VueJs para el Frontend **(Prueba para Desarrollador)**

### Requerimiento de versiones
- Laravel: **9**
- VueJs: **3**

## Instalación API Laravel

Primero clonar este repositorio, instalar las dependencias y configurar tu archivo .env

```
git clone https://github.com/wilmertri/TestFullStackLaravelVue.git TestFullStackLaravelVue
cd api-store-laravel
composer install
cp .env.example .env
```

Luego generar la llave secreta para la autenticación JWT

```
php artisan jwt:secret
```

Despues crear la base de datos necesaria

```
php artisan db
create database api-store-laravel
```

Luego correr las migraciones y los seeders necesarios

```
php artisan migrate --seed
```

#### Usuario de prueba generado para autenticación

- Email: admin@gmail.com
- Password: admin

## Instalación App VueJS

Ubicados en TestFullStackLaravelVue

```
cd app-store-vue
npm install
```

### Compilar y correr servidor para desarrollo
```
npm run serve
```
