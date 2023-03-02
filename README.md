# Json Saver
### EN
This project allows you to store and modify json data in the database.

## Building a project
1. In the root of the project, run **composer install**
    * In case of an error, can help **composer install --ignore-platform-reqs**
2. After that, create *.env* in the root of the project, following the example from *.env.example*
    * For linux: **cp .env.example .env**
3. Next, you need to add permission to read and write the */storage* folder
    * For linux: in the root of the project, run **sudo chmod 777 -R ./storage/ && sudo chmod 777 -R ./storage/\***
4. After that, you need to clear the cache and set the application key using **php artisan config:clear && php artisan key:generate**
5. To start the project, you need to enter **./vendor/bin/sail up -d** at the root
6. After that you need to run migrations by using **./vendor/bin/sail artisan migrate**
7. To fill the database with test users, enter **./vendor/bin/sail artisan db:seed**

## Usage
* To use the api, you will need api_token. To get it, enter **./vendor/bin/sail artisan user:auth {email} {password}** in the terminal. The token validity period is 5 minutes.
    * Test users (email password):
        * admin@admin.com admin
        * moderator@moderator.com moderator
        * user@user.com user
* The first form saves json format data (example: {"test":"json"}) to the database.
* The second form modifies the entries in the database according to the instructions. You need to enter the record id and code for updating the json. The Json from the string takes the form of an object, so to change it, you need to refer to it as an object (for example: $data->foo['bar'] = 1;).
* The third link displays all records from the database with the ability to delete and view each specific record.
* The fourth link displays logs.
* The project also has a limit on the number of api requests set in the config.
***
### RU
Этот проект позволяет хранить и изменять данные json в БД.

## Сборка проекта
1. В корне проекта запустить **composer install**
    * В случае ошибки может помочь **composer install --ignore-platform-reqs**
2. После создайте в корне проекта *.env* по примеру из *.env.example*
    * Для linux: **cp .env.example .env**
3. Далее нужно выдать разрешение на просмотр и редактирование папки */storage*
    * Для linux: в корне проекта запустить **sudo chmod 777 -R ./storage/ && sudo chmod 777 -R ./storage/\***
4. После этого нужно очистить кэш и задать ключ приложения с помощью **php artisan config:clear && php artisan key:generate**
5. Для запуска проекта в корне требуется ввести **./vendor/bin/sail up -d**
6. Далее вам требуется запустить миграции командой **./vendor/bin/sail artisan migrate**
7. Для заполнения базы данных тестовыми пользователями введите **./vendor/bin/sail artisan db:seed**

## Использование
* Для использования апи вам потребуется api_token. Для его получения введите в терминале **./vendor/bin/sail artisan user:auth {email} {password}**. Время действия токена - 5 минут.
    * Тестовые пользователи (email password):
        * admin@admin.com admin
        * moderator@moderator.com moderator
        * user@user.com user
* Первая форма сохраняет данные формата json (пример: {"test":"json"}) в базу данных.
* Вторая форма изменяет записи в базе данных по инструкции. Нужно указать id записи, а так же код для обновления json. Json из строки принимает вид объекта, поэтому для изменения нужно обратиться к нему как к объекту (например: $data->foo['bar'] = 1;).
* Третья ссылка отображает все записи из базы данныз с возможностью удаления и просмотра каждой конкретной записи.
* Четвертая ссылка отображает логи.
* Так же в проекте есть ограничение на кол-во запросов к апи, задаваемое в конфиге.