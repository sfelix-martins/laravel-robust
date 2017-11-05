# Robust API

<a href="https://travis-ci.org/sfelix-martins/laravel-robust?branch=master"><img src="https://travis-ci.org/sfelix-martins/laravel-robust.svg?branch=master" alt="Build Status"></a>
[![StyleCI](https://styleci.io/repos/102787816/shield)](https://styleci.io/repos/102787816)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sfelix-martins/laravel-robust/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sfelix-martins/laravel-robust/?branch=master)

Laravel Project with many tools preinstalled and pre-set to build **Robust** APIs

## Features

- Register Users
- OAuth 2 Authentication (Default and Facebook)
- Reset Passwords
    - You can resets password on **browser** using routes:
        - GET  : `/password/reset` to show link request form
        - POST : `/password/email` to send reset link email
        - GET  : `/password/reset/{token}` to show reset form
        - POST : `/password/reset` to reset password
    - Or using the API endpoints
- Confirm Account

## Endpoints

- `POST`: /v1/users                     - Create users
- `POST`: /v1/oauth/token               - Default login and Facebook Login
- `GET` : /v1/users/{id}                - Get one user
- `POST`: /v1/password/email            - Sends password reset emails
- `POST`: /v1/password/reset            - Resets Passwords
- `GET` : /v1/account/verify/{token}    - Confirm email

## Events

- `Illuminate\Auth\Events\Registered` when user is registered
- `Illuminate\Auth\Events\PasswordReset` when resets password

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

- Enter in the project folder:

```sh
$ cd $YOUR_APP
```

- Use the stable version. Go to [releases](https://github.com/sfelix-martins/laravel-robust/releases) and checkout on latest version. For example:

```sh
$ git checkout v1.1.0
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

- You need start queue to send confirmation email correctly

```sh
$ php artisan queue:work
```

Or configure [Supervisor](https://laravel.com/docs/5.5/queues#supervisor-configuration) to make this

## Testing

- Install npm dependencies and start automatic tests

```sh
$ npm install

$ npm run tdd
```
