# Proyecto web 2 con laravel

Este proyecto fue contruido con el framework de desarrollo web de php Laravel
para la correcta ejecucion de este proyecto se deberan seguir los siguientes pasos:

# requisitos

1. php 7.3 + o php 8.0 +
2. composer -> manejador de paquetes de php
3. manejador de base de datos (para el desarrollo se uso phpmyadmin)

# pasos para ejecutar el proyecto

1. descarga el proyecto
2. inicia los servicios de mysql y apache
3. entramos a nuestro manejador de base de datos y creamos la base de datos del proyecto llamada `laravel`
4. entramos a la carpeta del proyecto
5. ejecutamos los siguientes comandos :
    1. instalamos las dependencias con `composer install`
    2. corremos las migraciones del proyecto asi : `php artisan migrate`
    3. si deseamos tener informacion pre cargada en el proyecto ejecutamos el comando `php artisan db:seed`
    4. ejecutamos el proyecto con : `php artisan serve`

# (Solo si las migraciones no funcionan) por tener una version de mysql antigua, agregar lo siguiente

1. Dirigirse a la carpeta app/providers/AppServiceProvider
2. agregar la siguiente importacion `use Illuminate\Support\Facades\Schema;`
3. dentro del metodo boot() agregar el siguiente codigo `Schema::defaultStringLength(191);`
