# Teacher Manager
a teaching plan manager platform

## pre-install

* [git](https://git-scm.com/)
* [composer](https://getcomposer.org/)
* [bower](http://bower.io/)

## initial

```
$ cp .env.example .env
$ touch database/database.sqlite
$ php artisan migrate
```

## how to start

```
$ bower install # if adding new components to bower.json
$ composer install # if adding new vendor to composer.json 
$ php artisan serve
```