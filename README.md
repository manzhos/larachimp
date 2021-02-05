
## Git

Клонировать репозиторий можно по ссылке - https://github.com/manzhos/larachimp.git 

## Конфигурация

Проект клонируется вместе с файлом .env - в нем прописаны ключи для Milchimp.
Необходимо отредактировать имя базы данных, пользователя и пароль. При необходимости, другие поля.  

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example_test
            ^^^^^^^^^^^^
DB_USERNAME=root
            ^^^^
DB_PASSWORD=root
            ^^^^


Если запускаете на сервере c SSL, в файле config/newsletter.php нужно заменить значение:
'ssl' => true
         ^^^^


## Консоль

Запускаем
composer install

Разворачиваем базу данных
php artisan migrate

Заранее создаем пользователя, который будет иметь доступ к форме добавления пользователей
php artisan create:admin

Заполняем базу данных тестовыми записями 
php artisan db:seed

или выплняем команды пакетом 
composer install && php artisan migrate && php artisan create:admin && php artisan db:seed


## Консольные команды

Для отправки всех пользователей в список Mailchimp: 
php artisan mailchimp:senduser

Для проверки и синхронизации статусов подписки:
php artisan mailchimp:updateuser

Команда синхронизации ставится на периодическое выполнение (каждые 30 мин):
php artisan schedule:work


### Mailchimp

Аккаунт на Mailchimp (mailchimp.com)
Логин:  larachimp_Q
Пароль: lara2021chimp_Q

Почта для Mailchimp (на всякий случай)
tutanota.com
larachimp@tutanota.com
Пароль: lara2021chimp
recovery key: 890b9dfb5fdb893e9746776b3601830e67af6e60626cea48aca5586a46de002e


## Браузер

В консоли из папки public (тогда можно будет не указывать порт в адресной строке браузера)
php -S 127.0.0.1:80

В браузере переходим localhost

Данные для доступа:
Логин:  admin@admin.com
Пароль: topsecret


