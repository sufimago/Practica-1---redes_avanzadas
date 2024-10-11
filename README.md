
# Proyecto: 
Configuración Docker con MySQL, Nginx, PHP y Redis
Este proyecto es una configuración de Docker para un entorno de desarrollo que utiliza Nginx como servidor web, PHP-FPM para procesar el backend, MySQL como base de datos y Redis para caching en la versión PRO. Además, se incluyen archivos de configuración y volúmenes para mantener la persistencia de datos.

# Estructura del Proyecto
```plaintext
practica-1/
│
├── mysql_data/                  # Volúmenes de la base de datos
│
├── web/                         # Directorio para los archivos del sitio web
│   ├── db.php                   # Archivo de conexión a la base de datos
│   ├── index.php                # Archivo principal del sitio web
│   └── css/
│       └── style.css            # Estilos CSS
│
├── docker-compose.sta.yml       # Archivo Docker Compose para el entorno de STA (básico)
├── docker-compose.pro.yml       # Archivo Docker Compose para el entorno de PRO (con Redis)
├── Dockerfile                   # Dockerfile para configurar el entorno PHP y Redis
└── nginx.conf                   # Configuración de Nginx para el servidor

# Archivos importantes
1. docker-compose.sta.yml
Este archivo levanta el entorno STA que incluye:

MySQL (base de datos)
phpMyAdmin (herramienta visual para gestionar MySQL)
PHP-FPM (procesador de PHP)
Nginx (servidor web)
2. docker-compose.pro.yml
Similar al archivo STA, pero con una adicionalidad: Redis para caching, mejorando el rendimiento de las solicitudes repetidas al servidor.

3. Dockerfile
Define la configuración del contenedor PHP, instalando las dependencias necesarias para ejecutar el código PHP con FPM.

4. nginx.conf
Archivo de configuración para Nginx, que define cómo manejar las solicitudes HTTP y pasar las peticiones PHP a PHP-FPM.

Cómo usar
1. Configurar el entorno STA (desarrollo básico):
Ejecuta el siguiente comando para levantar los servicios de MySQL, phpMyAdmin, PHP y Nginx:
                    docker-compose -f docker-compose.sta.yml up --build

2. Configurar el entorno PRO (con Redis):
Para incluir Redis en tu entorno, ejecuta el siguiente comando:
                    docker-compose -f docker-compose.pro.yml up --build

3. Acceso a phpMyAdmin:
Una vez levantado el entorno, puedes acceder a phpMyAdmin en http://localhost:8080.
Los datos de configuración estan el fichero config.php

5. Acceso al sitio web:
El sitio estará disponible en http://localhost.

# Notas:
Volúmenes: Los datos de MySQL se guardan en la carpeta mysql_data, lo que asegura que la información no se pierda cuando se detengan los contenedores.
Archivos PHP: El código PHP está en el directorio web/. El archivo principal es index.php y la conexión a la base de datos se maneja en db.php.
