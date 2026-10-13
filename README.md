# Clínica Médica

Aplicación web de gestión clínica desarrollada con **PHP**, **MySQL** y **PDO**. Es un proyecto ambicioso cuyo objetivo es digitalizar el día a día de una clínica: desde el registro de usuarios y la gestión de médicos y especialidades hasta la reserva de citas y la generación de informes.

## Características

- Registro e inicio de sesión de usuarios
- Gestión de médicos y especialidades médicas
- Reserva y gestión de citas
- Verificación de citas mediante correo electrónico
- Generación de informes
- Consultas a la base de datos con sentencias preparadas (PDO) para evitar inyección SQL

## Arquitectura

El proyecto sigue el patrón **MVC**:

```
clinica/
├── controllers/        # Lógica de la aplicación
├── models/             # Acceso a datos (PDO) y entidades
├── views/              # Interfaz de usuario
├── index.php           # Punto de entrada
└── proyectoclinica.sql # Script de la base de datos
```

## Tecnologías

- PHP
- MySQL
- PDO
- HTML, CSS y JavaScript
- XAMPP (entorno de desarrollo local)

## Instalación

1. Clona el repositorio dentro de la carpeta `htdocs` de XAMPP:
```bash
   git clone https://github.com/JaviCastro03/Clinica_Medica.git
```
2. Arranca **Apache** y **MySQL** desde el panel de XAMPP.
3. Abre phpMyAdmin, crea una base de datos e importa el archivo `proyectoclinica.sql`.
4. Edita las credenciales de conexión en `models/Config.php` con los datos de tu servidor.
5. Si el proyecto usa dependencias de Composer, ejecuta `composer install` dentro de `models/`.
6. Abre `http://localhost/Clinica_Medica` en el navegador.

## Autor

Desarrollado por [Javi](https://github.com/JaviCastro03).
