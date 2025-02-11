# Tienda de camisetas


## Guía temporal (Voy a buscar otras formas mientras tanto)
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
    CREATE DATABASE db_dss;
    ```
    3. Creamos usuario con permisos de root:
    ```sql
    CREATE USER 'root'@'localhost' IDENTIFIED BY 'root_password';
    GRANT ALL PRIVILEGES ON db_dss.* TO 'root'@'localhost';
    FLUSH PRIVILEGES;
    ```
    4. Borramos la caché de configuración:
    ```sh
    php artisan config:clear
    php artisan cache:clear
    ```
    5. Instalamos dependencias (si no están instaladas):
    ```sh
    composer require doctrine/dbal
    ```
4. Continuamos ejecutando el siguiente comando: 
```sh
composer install
```
5. Luego ejecutamos el siguiente comando para instalar dependencias:
```sh
php artisan key:generate
```
6. Para ejecutar el proyecto. Usad el siguiente comando:
```sh
php artisan serve
```

</br>

## Tras esto, el proyecto debería estar ejecutándose en [http://127.0.0.1:8000](http://127.0.0.1:8000)
