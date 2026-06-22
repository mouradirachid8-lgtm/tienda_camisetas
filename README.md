# Tienda de camisetas
Tienda online de camisetas de futbol de las cuales tambien se permiten personalizaciones o de jugadores profesionales.

## Guía temporal
### Para ejecutar el proyecto desde 0, seguid los siguientes pasos:
1. Clonar el repositorio
2. Añadir el archivo .env que se encuentra en la página principal del repositorio en el directorio del proyecto. (Voy a intentar tener el .env constantemente actualizado si se necesita hacer algún cambio)
3. Configuración de MySQL para poder utilizarlo como BD:
    1. Abrimos una terminal y accedemos a mysql:
    ```sh
    mysql -u root -p
    ```
    2. Creamos la base de datos en MySQL:
    ```sql
    CREATE DATABASE laravel_db;
    ```
    3. Creamos usuario con todos los privilegios para laravel:
    ```sql
    CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'laravel';
    GRANT ALL PRIVILEGES ON laravel_db.* TO 'laravel'@'localhost';
    FLUSH PRIVILEGES;
    ```
    4. Nos aseguramos de que el usuario tenga los privilegios
    ```sh
    SHOW GRANTS FOR 'laravel'@'localhost';
    ```
    Debería salir algo así:
```sh
+----------------------------------------------------------------------------------------------------------------+
| Grants for laravel@localhost                                                                                   |
+----------------------------------------------------------------------------------------------------------------+
| GRANT USAGE ON *.* TO `laravel`@`localhost` IDENTIFIED BY PASSWORD '*0B05EB232BBAF74D4C57F43AC637C46702E22083' |
| GRANT ALL PRIVILEGES ON `laravel_db`.* TO `laravel`@`localhost`                                                |
+----------------------------------------------------------------------------------------------------------------+    
 ```

4. Continuamos ejecutando el siguiente comando: 
```sh
composer install
```
5. Luego ejecutamos el siguiente comando para instalar dependencias:
```sh
php artisan key:generate
```
6. Ejecutamos el siguiente comando para lanzar las migraciones y formar la BD:
```sh
php artisan migrate -------------> ALTERNATIVA POR LA CARA: php artisan migrate --database=mysql

```

7. Para ejecutar el proyecto. Usad el siguiente comando:
```sh
php artisan serve
```

</br>

## Tras esto, el proyecto debería estar ejecutándose en [http://127.0.0.1:8000](http://127.0.0.1:8000)
