# Client / Server (Laravel) 

Проект для ТЗ - Laravel для управления клиентами и их серверами  

## Функциональность
- Связанные модели Client (клиент) и Server (сервер)
- Миграции базы данных
- Seeder с тестовыми данными
- Форма добавления сервера
- Список серверов
- Серверный рендеринг (Blade)
- Запуск в браузере без Docker и JS-фреймворков

## Требования
- PHP 8.1+
- Composer
- MySQL / MariaDB
- Запущенный MySQL-сервер

## Установка

### 1. Клонировать репозиторий
git clone <repo_url>
cd client-server-demo

### 2. Установить зависимости
composer install

### 3. Создать файл окружения
cp .env.example .env

### 4. Настроить подключение к БД в .env:
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=client_server
- DB_USERNAME=root
- DB_PASSWORD=

### 5. Сгенерировать ключ приложения
php artisan key:generate

### 6. Создать базу данных
CREATE DATABASE client_server;

### 7. Выполнить миграции и сидинг
php artisan migrate --seed

### 8. Запустить приложение
php artisan serve

### 9. Открыть в браузере:
- http://127.0.0.1:8000/servers
- http://127.0.0.1:8000/servers/create

## Структура
- Client hasMany Server
- Server belongsTo Client
- Seeder создаёт 10 серверов с привязанными клиентами