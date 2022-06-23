# Crud login php

Este proyecto es un crud con autentificación de usuario hecho en Php, Html y Bootstrap. Se conecta a una base de datos mysql y todas las conexiones se realizan con mysqli. 
El proyecto logra correctamente crear usuarios (sign up), determinar si el usuario existe para iniciar sesión (Log in), crear tareas (index), leer tareas (index), editar 
tareas (edit_task) y borrar tareas (delete_task).

Se trabaja con una base de datos llamada php_mysql_crud, la cual tiene dos tablas: task y users. Los campos de las tareas son: id, title, description y created_at.
Los campos de los usuarios son id, email y password, este ultimo campo se encuentra bajo cifrado porque nadie más que el usuario debe saber su contraseña.

Para la creación de este primer proyecto se siguió 4 tutoriales: "Php Mysql Crud" y "Registro y login de usuarios con Php y Mysql" de Fazt web en youtube, asi como el curso 
"Master en PHP, Sql..." de Victor robles en Udemy y tambien el tutorial de Vida Mrr en youtube llamado "Curso completo PHP y MySQL.."
