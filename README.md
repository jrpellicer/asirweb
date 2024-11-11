# proyectoasir
Instala rápidamente un ambiente de desarrollo local para desarrollar una web trabajando con PHP y MySQL utilizando Docker

# Docker: PHP & MySQL

Viene configurado con  `PHP 7.4` y `MySQL 5.7`, además se incluyen las extensiones `zip` y `mysql`. Las versiones se mueden cambiar modificando el fichero `.env`

## Requerimientos

* Tener instalado Docker y docker-compose

## Configurar el ambiente de desarrollo

Puedes utilizar la configuración por defecto, pero en ocasiones es recomendable modificar la configuración para que sea igual al servidor de producción. La configuración se ubica en el archivo `.env` con las siguientes opciones:

* `PHP_VERSION` versión de PHP ([Versiones disponibles de PHP](https://github.com/docker-library/docs/blob/master/php/README.md#supported-tags-and-respective-dockerfile-links)).
* `PHP_PORT` puerto para servidor web.
* `MYSQL_VERSION` versión de MySQL([Versiones disponibles de MySQL](https://hub.docker.com/_/mysql)).
* `MYSQL_USER` nombre de usuario para conectarse a MySQL.
* `MYSQL_PASSWORD` clave de acceso para conectarse a MySQL.
* `MYSQL_DATABASE` nombre de la base de datos que se crea por defecto.

## Instalar el ambiente de desarrollo

La instalación se hace en línea de comandos dentro del directorio del repositorio:

```zsh
docker-compose up -d
```
Puedes verificar la instalación accediendo a: [http://localhost/info.php](http://localhost/info.php)

Una vez comprobado que funciona podemos crear la base de datos de muestra:

```zsh
mysql -h 127.0.0.1 -u asirweb -p < ./assets/database/create_db.sql
```
Puedes verificar el funcionamiento accediendo a: [http://localhost/](http://localhost/)


## Comandos disponibles

Una vez instalado, se pueden utilizar los siguiente comandos:

```zsh
docker-compose start    # Iniciar el ambiente de desarrollo si está detenido
docker-compose stop     # Detener el ambiente de desarrollo
docker-compose down     # Detener y eliminar el ambiente de desarrollo.
```

## Estructura de Archivos

* `/docker/` contiene los archivos de configuración de Docker.
* `/www/` carpeta para los archivos PHP del proyecto.

## Accesos

### Web

* http://localhost/

### Base de datos

Existen dos dominios para conectarse a base de datos.

* `mysql`: para conexión desde los archivos PHP.
* `localhost`: para conexiones externas al contenedor.

Las credenciales por defecto para la conexión son:

| Usuario | Clave | Base de datos |
|:---:|:---:|:---:|
| asirweb | qwe_123 | webasir |

También se pueden cambiar estas credenciales en el fichero `.env`

Para acceder a MySQL desde la línea de comandos:

```zsh
mysql -h 127.0.0.1 -u asirweb -p
```