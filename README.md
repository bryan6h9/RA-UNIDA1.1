# RA-UNIDA1.1
1. Instancia VM en Google Cloud:
Crear la máquina virtual en Google Compute Engine con una imagen de Linux (Ubuntu recomendado).
>Instalar Apache, PHP y MySQL:
bash
Copiar código
>sudo apt update
>sudo apt install apache2
>sudo apt install php libapache2-mod-php php-mysql
>sudo apt install mysql-server
2. Configuración de Apache y PHP:
Configurar Apache para que sirva archivos PHP:
Verificar que el servicio de Apache esté corriendo:
bash
Copiar código
>sudo systemctl restart apache2
>sudo systemctl enable apache2
Colocar los archivos PHP (auth.php, search_flights.php, etc.) en el directorio de Apache:
bash
Copiar código
>/var/www/html/
Configurar permisos para asegurar que Apache pueda leer los archivos:
bash
Copiar código
>sudo chown -R www-data:www-data /var/www/html/
>sudo chmod -R 755 /var/www/html/
3. Base de Datos MySQL:
Acceder a MySQL y crear la base de datos:
bash
Copiar código
>sudo mysql -u root -p
>CREATE DATABASE nombre_base_datos;
>Crear las tablas necesarias (Users, Flights, Reservations).
>Configurar acceso remoto a MySQL si es necesario, modificando el archivo de configuración:
bash
Copiar código
>sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
>Cambiar bind-address = 127.0.0.1 a bind-address = 0.0.0.0 para permitir conexiones externas.
4. Configuración de Archivos PHP:
Editar los archivos PHP para asegurar que las credenciales de la base de datos sean correctas:
php
Copiar código
>$db_host = 'localhost';  // O la IP de tu servidor MySQL
>$db_user = 'usuario';
>$db_pass = 'contraseña';
>$db_name = 'nombre_base_datos';
>Probar la conexión a la base de datos desde PHP para asegurarse de que funcione correctamente.
5. Despliegue de Archivos HTML/CSS:
Subir los archivos HTML/CSS (index.html, search.html, register.html, etc.) al directorio /var/www/html/:
Si usas Google Cloud Storage para archivos estáticos, subir los archivos allí y configurar los permisos adecuados.
6. Configuración de Google Cloud:
Google Compute Engine: Asegurarse de que los puertos necesarios estén abiertos:
80 para HTTP
443 para HTTPS (si es necesario)
Configurar Google Cloud Storage (opcional): Si decides usarlo para almacenar archivos estáticos, crear un bucket y configurar permisos públicos para los archivos necesarios.
7. Verificación y Pruebas:
Acceder a la aplicación desde el navegador, en la dirección IP pública de la VM.
Verificar que los archivos PHP se ejecuten correctamente y que el frontend se muestre bien.
Probar la conexión con la base de datos MySQL desde los scripts PHP.
