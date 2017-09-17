# Robust API

<a href="https://travis-ci.org/sfelix-martins/laravel-robust"><img src="https://travis-ci.org/sfelix-martins/laravel-robust.svg" alt="Build Status"></a>
[![StyleCI](https://styleci.io/repos/102787816/shield)](https://styleci.io/repos/102787816)

Laravel Project with many tools preinstalled and pre-set to build **Robust** APIs

## Features

- Register Users
- OAuth 2 Authentication (Default and Facebook)

## Endpoints

- `POST`: /v1/users         - Create users
- `POST`: /v1/oauth/token   - Default login and Facebook Login
- `GET` : /v1/users/{id}    - Get one user

More details on [Docs](https://app.swaggerhub.com/apis/sfelix-martins/LaravelRobustAPI/1.0.0)

## Used Packages

- [Laravel Modules](https://github.com/nWidart/laravel-modules)
- [Laravel Cors](https://github.com/barryvdh/laravel-cors)
- [Laravel Passport](https://github.com/laravel/passport)
- [Laravel Socialite](https://github.com/laravel/socialite)
- [Laravel Social-Grant](https://github.com/adaojunior/passport-social-grant)
- [Laravel Permissions](https://github.com/spatie/laravel-permission)
- [Lassehaslev/Executor](https://github.com/LasseHaslev/executor)
- [Json Exception Handler](https://github.com/sfelix-martins/json-exception-handler)

## Installing

- Create laravel-robust project

```sh
$ composer create-project sfelix-martins/laravel-robust $YOUR_APP
```

- Copy .env file and set your environment configs

```sh
$ cp .env.example .env
```

- Install composer packages

```sh
$ composer install
```

- Generate you app key

```sh
$ php artisan key:generate
```

- Migrate database changes

```sh
$ php artisan module:migrate
$ php artisan migrate
```

- Install `Laravel Passport` to get credentials

```sh
$ php artisan passport:install
```

Get the generate credentials to use on API authentication

## Testing

- Install npm dependencies and start automatic tests

```sh
$ npm install

$ npm run tdd
```
