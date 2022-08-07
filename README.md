# Как развернуть проект

1) `composer install`
2) `sudo docker-compose up -d`. Если ошибка с правами, то нужно сделать - `sudo chmod 775 /var/run/docker.sock`
3) Открыть http://localhost. Если появилась ошибка при открытии Laravel логов, провести команду - `sudo chmod -R 775 storage`

### Перед тем как начать импорт пользователей
1) `docker-compose exec php bash`
2) `php artisan storage:link`

### Команда для импорта пользователей из вк
`php artisan vk:import` Запускать внутри контейнера php
