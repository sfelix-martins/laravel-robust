# Robust

Laravel Project with many tools preinstalled and pre-set to build **Robust** APIs

## Packages

- [Laravel Modules](https://github.com/nWidart/laravel-modules)
- [Laravel Cors](https://github.com/barryvdh/laravel-cors)
- [Laravel Passport](https://github.com/laravel/passport)
- [Laravel Socialite](https://github.com/laravel/socialite)
- [Laravel Social-Grant](https://github.com/adaojunior/passport-social-grant)
- [Laravel Permissions](https://github.com/spatie/laravel-permission)
- [Lassehaslev/Executor](https://github.com/LasseHaslev/executor)
- [Json Exception Handler](https://github.com/sfelix-martins/json-exception-handler)

## Using

- Clone the project

```console
$ git clone https://github.com/sfelix-martins/laravel-robust.git
```

- Install composer packages

```console
$ composer install
```

- Migrate database changes

```console
$ php artisan migrate
```

- Install `Laravel Passport` to get credentials

```console
$ php artisan passport:install
```

Get the generate credentials to use on API authentication

## Testing

- Install npm dependencies and start automatic tests

```console
$ npm install

$ npm run tdd
```
