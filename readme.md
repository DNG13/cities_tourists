<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# cities_tourists

Test task

## Getting Started

Clone the project up and running on your local machine for development and testing purposes.

### Installing

Update the package manager cache by running:

```
sudo apt-get update
```
Install  composer

```
php composer install
```
Or update (if already installed)

```
php composer update
```
Open your .env file and change the database name to whatever you have,
 username  and password field correspond to your configuration. 
 
```
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

## Running the tests

Run for migration and adding data to your database
```
 php artisan migrate
 php artisan db:seed
```
Run 
```
php artisan serve
```
Go to localhost:8000

Or run your own server

## Manual

User has access to pages:
"Tourists"(List of tourists with a list of visited cities),
"Cities"(List of cities), 
where search is possible (search field) and sorting by columns (acs \ desc when clicking on the arrows).
On the "Cities" page after a click on a line "city-country" information with photo/photos about this city loaded in the upper part of the table.
 
Registration and authorization from the box.
 
The registered and authorized user has access to the administrative part (Admin tab in the navbar).
Administrative part: Cities(Cities List with Additional Information)
               Tourists(List of tourists with additional information)
               Cities with tourists (List of cities with surname / names of tourists visited)
               Tourists with the number of cities visited (List of tourists with the number of cities visited)
"Tourists", Cities",
where search is possible (search field) and sorting by columns (acs \ desc when clicking on the arrows), 
"Add city" / "Add tourist" buttons are redirected to the creation form,
there are buttons with links to view in the "Actions" column,
edit or delete a line (deleting "city" removes all the files associated with it  at the same time).

## Built With

* [Laravel](https://laravel.com/docs/5.6) - The web framework used

## Authors

* **Nataliia Duka**

