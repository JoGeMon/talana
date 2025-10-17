# TalaTrivia

Este repositorio tiene como objetivo publicar el código que se generó utilizó para resolver la prueba técnica del proceso de postulación como desarrollador a la empresa Talana.

## Puesta en marcha
Para ejecutar esta proyecto es necesario tener docker, descargarlo y luego construir la imagen con el comando 

`docker compose build`

una vez creada la imagen, se puede levantar el proyecto con el comando

`docker compose up -d`

una vez levantado el proyecto, será necesario ingresar al contenedor con el siguiente comando `docker compose exec web bash`, para completar la instalación de codeigniter con el comando

`composer update`

En el mismo repositorio se encuentra el script de creación de la base de datos en el archivo...


## Modelo de datos
El modelo de datos propuesto e encuentra en el archivo `db_model.mwb` para ser visto en MySQL Workbench, pero también está disponible como imagen en el archivo `database.png`

De igual forma el script para crear las tablas está en el archvo `db.sql`

## Rutas de prueba
Para facilitar las pruebas en el repositorio se encuentra la colección de postman utilizada durante el desarrollo en el archivo `Talana.postman_collection.json` el cual puede ser importado directamente y debiera tener cargadas las rutas.