## GAME - STORE BY<p> Cesar molina</p>


Email : cesar.molina.torres.05@gmail.com


sistema crud para la puesto de desarollo backend developer en promarketingchile
de acuerdo a la prueba se requeria un sistema crud.

## Game store
Cuenta con registro de usuario y login
rol y permiso para que un usuario no pueda eliminar el juego creado por otro
dashboard

tailwind  para el frontend
alpinejs  para los componentes
policy y middlware para los persmisos
repository pattern para el GameController 
active record para el AdminGameController

El uso de respository pattern

Ahora, en una forma normal de CRUD, podríamos simplemente implementar esas funciones en el controlador,
pero pensemos que tenemos otro controlador para nuestra tabla Product o cualquier otro que utiliza el mismo sistema CRUD.

Entonces, tenemos que escribir el mismo código una y otra vez y eso no es una buena práctica. Si tenemos otro controlador,
también puede implementar la misma interfaz. Así, no tenemos que declarar esas mismas funciones de nuevo.
Además, es un CRUD muy simple, pero lo que si tenemos un problema muy complejo en nuestra aplicación,
entonces sería muy fácil de mantener a través de los diferentes repositorios. Nuestro controlador estará limpio
y testear la aplicación será fácil. Otro ejemplo es, digamos que estamos usando MySQL y queremos cambiar a MongoDB.
Dado que el patrón de repositorio utiliza interfaces, la logica de nuestra aplicación seguirá siendo la misma
y todo lo que tenemos que hacer es cambiar el repositorio.
con esto quiero decir que el patron tiene sus pro y sus contras pero aca es un basico ejemplo
de como se puede usar y los patrones son guias asi como lo es solid.

## Requerimientos

Composer 2.2.6
laravel 9.x
php 8.x
aceso a internet por los CDN de tailwind y alpine js
mysql 8.x


## Inicio rapido

clonar el repo con git clone 

para instalar usar el comando <p>composer install</p>

crear el archivo .env  <p>copy .env.example .env</p>

crear una base de datos game_store

luego php artisan migrate:seed

para el login:
    email = admin@admin.com datos obtenidos por el seeders
    password = password
    o puede regitras un usuario manualmente donde el campo usarname agregar "admin"


## Guia rapida

luego de instalar el sistema ya puede moverse como admin o guest

# HOME
la pagina home te da el catalogo de todos los juegos registrados

tiene buscador integrado

hacer una busqueda

name |  buscar

name _: el primer filtro es la lista de los juegos registrados

buscar : el buscardor filtra por nombre, descriccion


# DASHBOARD

el boton dashboard te dirige a la pagina administrativa del sistema game-store
lo cual pudes ver el listado de los juegos registrados abrir su url
crearlos, editarlos y eliminalos (no puede eliminar juegos registrados por otro usuario)  ya que cuenta
con permisos y roles

TIPOS DE ROLES ADMIN y Guest


## POR HACER

    TDD
    CLEAN CODE
    mailchimps

make with love 
