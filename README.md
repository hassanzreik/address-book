## Address Book

Web Application developed using Laravel 8.0+ and GraphQl 

Configuration:
- Get a cup of coffee.
- create a copy from .env.example.
- import database => [database/address_book_db.sql](https://github.com/hassanzreik/address-book/blob/master/database/address_book_db.sql) (mysql 5.7+).
- Add your mysql credentials to .env file (DB_USERNAME,DB_PASSWORD).
- run `composer install`.
- run `php artisan storage:link` and `php artisan passport:keys` this to generate private and public keys.
- all users in the database have default password => `password`.
- API documentation [here](https://documenter.getpostman.com/view/112747/TW6tMArh) after importing to postman you should import [environment](https://github.com/hassanzreik/address-book/blob/master/Address Book.postman_environment.json) also.
- run `php artisan serve`.
- Have Fun 
