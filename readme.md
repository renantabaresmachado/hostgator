

## Resourses

- Composer [Dependency Manager](https://getcomposer.org/).
- Laravel 5.5 [Framework PHP](https://laravel.com/docs/5.5/).
- MySql [SGBD](https://www.mysql.com/).
 


## Steps to run Aplication

- clone this respository.
- Access the root directory of the application.
- To update dependencies, run the command in terminal : composer update.
- Create new database with name "hostgator".
- edit the .env file in the root directory of the application in the lines:
-{
-12.DB_USERNAME="your user".
-13.DB_PASSWORD="your pass".
-}
- To create the database struture, run the command in terminal: php artisan migrate.
- To run application, run a command: php artisan serve or place the project on an apache server  .


## Steps to test Aplication

-to run Unit Tests: run the command in terminal: vendor/bin/phpunit.
- if you run the application with command: php artisan serve and your port 8000 is free
- For find a Breed of cat by name = sib **[URL](http://localhost:8000/breeds/breeds?name=sib)**
- For find a Breed of cat by name = a **[URL](http://localhost:8000/breeds/breeds?name=a)**
- For find  potato = yes **[URL](http://localhost:8000/breeds/breeds?potato=yes)**


<p>Renan Tabares Machado</p>
<p>Celphone/Whats: <a target="_blank" href="https://api.whatsapp.com/send?l=pt&amp;phone=5551998900507" target="_blank">51-998900507</a></p>
<p>E-mail: </p><a href="mailto:renantabares@gmail.com">renantabares@gmail.com</a></p>