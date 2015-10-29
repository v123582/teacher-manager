# Teacher Manager
a teaching plan manager platform

## pre-install

* [git](https://git-scm.com/)
* [composer](https://getcomposer.org/)
* [bower](http://bower.io/)
* [php5-sqlite]()

```
sudo apt-get install php5-sqlite
```

## initial

```
$ composer install
$ php artisan key:generate
$ cp .env.example .env # check your php app key in this file
$ touch database/database.sqlite
$ php artisan migrate
```

## how to start

```
$ bower install # if adding new components to bower.json
$ composer install # if adding new vendor to composer.json 
$ php artisan serve
```