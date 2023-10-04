
## Learning Laravel 8

  
In this repository, I build a simple blog website using Laravel 8 with the guidance of [Laracast](https://laracasts.com/series/laravel-8-from-scratch). 

[Laravel](https://laravel.com/) is a popular open-source PHP web framework known for its elegant syntax and powerful features, simplifying and speeding up the development of web applications by providing a robust set of tools and utilities. 

[Eloquent](https://laravel.com/docs/5.0/eloquent) is the built-in ORM (Object-Relational Mapping) in Laravel, which allows developers to interact with the database using object-oriented syntax, making database querying and manipulation more intuitive and convenient. It provides an expressive and fluent API to handle database operations and relationships between models.

[Composer](https://getcomposer.org/) is a dependency management tool for PHP that simplifies the process of installing and managing external libraries and packages required by a PHP project. It uses a `composer.json` file to define project dependencies and their versions, automatically resolving and downloading them from Packagist, the default PHP package repository.


## Usage

After cloning this repository, in the root directory run the following commands:

1. to install composer dependencies: 

```bash
composer install
```

2. to install NPM dependencies: 

```bash
npm install
```

3. create a copy of your .env file:

```bash
cp .env.example .env
```

4. generate an app encryption key

```bash
php artisan key:generate
```

5. create an empty database for your application and add the configurations to the .env file.
6. run the database migrations:

```bash
php artisan migrate
```

7. seed the database:

```bash
php artisan db:seed
```

you can also run step 6 and 7 together with the following command to make migrations and seed the database at once:

```bash
php artisan migrate:fresh --seed                  
```

8. start a local server:

```bash
php artisan serve
```

9. to bundle assets ie **tailwindCSS**:

```bash
npm run dev
```

Proceed to [localhost:8000](http://localhost:8000/)

