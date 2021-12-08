Для входи и регистрации я использовал 

composer require laravel/fortify

php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"

Также необходимо скачать пакет Laravel ui

composer require laravel/ui

Установка стилей
php artisan ui bootstrap
php artisan ui bootstrap --auth

npm install 
npm run dev

Установка Laravel Permission от Spaite 

composer require spatie/laravel-permission

Добавить в config/app.php

'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];

Опубликовать файл конфига и миграций

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

Очистить кэш

php artisan config:clear

Создание 2 роли

 user 
 php artisan permission:create-role user

 admin
 php artisan permission:create-role admin

Добавить в модель User 

 use Spatie\Permission\Traits\HasRoles;

 и 

 use HasRoles;