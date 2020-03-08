# API-RESTFul-PHP
A simple API to CRUD users
### Used tecnologies
- PHP 7.4.1
- MySQL 5.7
- PHPUnit 3.7
- Composer 1.9.2

### Instalation
-  Excecute the `composer install` command 
-  Configure the database in **database\DB** class
-  run the `php -S localhost:3000` command in the **public** directory of the project

### Routes

-  (GET) **/user** => Show all user in database
-  (GET) **/user/:id** => Show one user with the respective id
-  (POST) **/user/** => Create a new user
-  (PUT) **/user/:id** => Update one user
-  (DELETE) **/user/:id** -> Delete one user
