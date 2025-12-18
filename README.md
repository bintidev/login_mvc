# 🚀 Login MVC PHP - Proyecto Básico 

Este proyecto es una aplicación básica de login usando PHP con arquitectura MVC sencilla, PDO para la base de datos y sesiones seguras.

---

## Índice 📚

- [Descripción](#descripción)
- [Estructura de archivos](#estructura-de-archivos)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Uso](#uso)
- [Seguridad](#seguridad)
- [Capturas](#capturas)

---

## Descripción

Este proyecto implementa un sistema de autenticación básico utilizando PHP puro con orientación a objetos y una estructura MVC ligera.  
Se controla el acceso mediante sesiones y tokens CSRF para proteger contra ataques comunes.  

La aplicación permite:  
- Login de usuarios con validación y límites de intentos  
- Redirección a un dashboard solo si el usuario está autenticado  
- Cierre de sesión con limpieza de cookies y sesión  

---

## Estructura de archivos 📁

```
LOGIN_MVC/
│
├── config/
│   ├── Database.php            # Configuración de conexión PDO a MySQL
│   └── secure-session.php      # Manejo de sesiones seguras y CSRF token
│
├── controllers/
│   └── AuthController.php      # Lógica de autenticación y control de vistas
│
├── models/
│   └── Usuario.php             # Modelo usuario que consulta la base de datos
│
├── public/
│   ├── css/
│   │   └── style.css           # Estilos CSS personalizados
│   ├── img/
│   │   ├── ccg_logo.png
│   │   └── favicon.png
│   └── js/
│       └── validation.js       # Validaciones front-end
│
├── views/
│   ├── dashboard.php           # Vista del dashboard post-login
│   ├── login.php               # Vista del formulario de login
│   └── index.php               # Enrutador principal de la app
│
└── index.php                   # Punto de entrada que invoca el controlador y enruta
```

---

## Requisitos ⚙️

- PHP 7.4 o superior  
- Servidor con soporte PDO y MySQL  
- Base de datos MySQL/MariaDB  

---

## Instalación y configuración 🛠️

1. Crear la base de datos `login_php` y la tabla `usuarios` con los campos `idusuario` y `password`.  
2. Configurar las credenciales en `config/Database.php`.  
3. Subir los archivos al servidor o ejecutar localmente.  
4. Acceder a `index.php` desde el navegador.

---

## Uso 📋

- La página inicial muestra el formulario de login.  
- Al enviar credenciales correctas, el usuario es redirigido al dashboard.  
- Se limita el número de intentos fallidos a 5 para mayor seguridad.  
- El logout destruye la sesión y limpia cookies para cerrar sesión correctamente.

---

## Seguridad 🔒

- Gestión segura de sesiones con configuración de cookies .  
- Regeneración periódica del ID de sesión para prevenir secuestro.  
- Token CSRF para proteger los formularios.  
- Limpieza y validación básica de entradas.



