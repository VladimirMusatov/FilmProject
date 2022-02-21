Для того что-бы развернуть проект необходимо

Клонировать код с гита
git clone https://github.com/VladimirMusatov/FilmProject

Подключить зависимости
composer install

Скопировать файл .env.example и переименовать в .env

Изменить строчки в файле evn для подключения к базе данных.

DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

Запустить миграции
php artisan migrate

Запустить сиды
php artisan db:seed

Сгенерировать app_key
php artisan key:generate

Создать символическую ссылку
php artisan storage:link

Логин и пароль от админки
Логин:Vladimir@gmail.com
Пароль:123456789