<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


> ### Proyecto laravel para el sistema de adminstracion DPIC, dependiente de la facultad nacional de ingenieria, de la Universidad Tecnica de Oruro

 


# Migraciones

- create_tipo_usuarios_table
- create_usuarios_table
- create_postgraduantes_table
- create_materias_table
- create_nivels_table
- create_postgrados_table
- create_docente_materia_table
- create_calificacions_table
- create_requisitos_table
- create_inscripcions_table
- create_inscripcion_requisitos_table
- create_pagos_table
- create_materia_postgrado_table
- create_permission_table

# Seeders

- DatabaseSeeder
- DocenteseSeeder
- MateriaseSeeder
- NivelsseSeeder
- PermissionTableseSeeder
- PostgradoSeeder
- PostgraduanteSeeder
- RolesTableSeeder
- RoleToUserSeeder
- TipoUsuarioSeeder
- UsuarioSeeder

# Modelos

- Calificacion
- DocenteMateria
- Inscripcion_Requisito
- Inscripcion
- Materia
- MateriaPostgrado
- Nivel
- Pago
- Permiso
- Postgrado
- Postgraduante
- Rol
- TipoUsuario
- Usuario

# Tipos de Usuario

- Administrador
  - Usuario que se encarga de administrar los modulos de Usuarios, Materias, Postgrados, Postgraduantes, Pagos y Calificaciones
- Sistemas
  - Usuario que tiene acceso a todos los mudulos del sistema, incluyendo los permisos y los roles de usuario.
- Docemte
  - Usuario que tendra acceso a los modulos de calificaciones, lista de postgrados y materias en las cuales regenta la asignatura.

# Flujo de datos
- **Registrar** los  **Docentes(usuarios)** con todos los datos requeridos. 
- **Registrar** un **Postgrado** con todos los datos requeridos. 
- **Registrar** primero las **Materias/Modulos** con sus respectivos **Docentes.**
- **Registrar/Inscribir** a los **Postgraduantes** con sus respectivos **Pagos**, si asi fuera el caso, 
-  Siguiendo este flujo de datos se crearan las calificaciones de los postgraduantes, mismas que se podran modificar desde sus respectivas materias.
# Reportes
### Reporte de Pagos (GENERAL)
- Este reporte se obtiene del curso de postgrado en curso 

---

### Installation
 Clone the project in your server folder (laragon = WWWW directory)
    
```sh
$ git clone https://github.com/marco-antonio-gb/dpic-servidor.git
```
 
 Install the dependencies and devDependencies and start the server.

```sh
$ cd dpic-servidor
$ composer install
```
Configure your .env file
```sh
DB_DATABASE=server_dpic
DB_USERNAME=root
DB_PASSWORD=
```
Generate an app encryption key

```sh
$ php artisan key:generate
```
Create an empty database for our application
```sh
$ mysql -u root -p
$ CREATE DATABASE server-dpic;
$ exit
```
Migrate the database
```sh
$php artisan migrate:fresh --seed
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
