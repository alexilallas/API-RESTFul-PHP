# API-RESTFul-PHP
A simple API to CRUD users
### Used tecnologies
- PHP 7.4.1
- MySQL 5.7
- PHPUnit 3.7
- Composer 1.9.2

### Instalation
1 - Excecute the `composer install` command
2 - Configure the database in **database\DB** class
3 - run the `php -S localhost:3000` command in the root of the project

### Routes

1 - (GET) **/user** => Show all user in database
2 - (GET) **/user/:id** => Show one user with the respective id
3 - (POST) **/user/** => Create a new user
4 - (PUT) **/user/:id** => Update one user
5 - (DELETE) **/user/:id** -> Delete one user
