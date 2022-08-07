# Как развернуть проект

P.S. Я не шибко силен в докере, по этому тут могут быть небольшие проблемы в разворачивании, как решить проблемы я также описал
1) Скопировать `.env.example` и назвать `.env`
   1) Заполнить переменные для БД: `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, `POSTGRES_USER`, `POSTGRES_PASSWORD`, `POSTGRES_DB`
   2) Создать VK API и скопировать от туда "Сервисный ключ доступа" в поле `VK_API_ACCESS_TOKEN`
   3) Скопировать свой vk id и вставить его в `VK_USER_ID` (vk id можно узнать здесь - https://vk.com/settings в поле "Адрес страницы" (если вы ставили свой id, то нужно нажать на "изменить" и там будет "Номер страницы"))
2) `composer install`
3) `sudo docker-compose up -d`. Если ошибка с правами, то нужно сделать - `sudo chmod 775 /var/run/docker.sock`
4) Открыть http://localhost. Если появилась ошибка с доступом к логам laravel, то нужно:
   1) `docker-compose exec php bash`
   2) `ls -l` и берем цифру из 3 колонки и записываем в `docker-compose.yml php container` в поле `user`
   3) `docker-compose down`
   4) `sudo docker-compose up -d` После этого должно быть все нормально
5) `docker-compose exec php bash`
   1) `php artisan migrate`
   2) `php artisan storage:link`
   3) `php artisan vk:import` - для импорта пользователей в БД

Возможно я мог что-то упустить. По вопросам писать в тг - https://t.me/WartVader
