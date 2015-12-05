# Teacher Manager
a teaching plan manager platform

## pre-install

* [git](https://git-scm.com/)
* [php]()
* [php-sqlite]()
```
$ sudo apt-get install php5-sqlite # ubuntu
```
* [composer](https://getcomposer.org/)
* [node.js]()
* [npm]()
* [bower](http://bower.io/)

## initial

```
$ composer install
$ cp .env.example .env 
$ php artisan key:generate # check your php app key in .env file
$ touch database/database.sqlite
$ php artisan migrate
$ php artisan db:seed
```

## how to start

```
$ bower install # if adding new components to bower.json
$ composer install # if adding new vendor to composer.json 
$ php artisan serve
```
