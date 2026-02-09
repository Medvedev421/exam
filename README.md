# Ticket System (Laravel MVP)

Простая система обращений (тикетов) с ролями user/admin, личным кабинетом и админ-панелью.  
Учебный проект для демонстрации навыков работы с **Laravel 12**, MVC, авторизацией и базовыми функциями администрирования.

[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Возможности

### Для обычного пользователя
- Регистрация и авторизация
- Редактирование профиля
- Создание нового обращения (тикета)
- Просмотр списка своих обращений и их деталей

### Для администратора
- Просмотр **всех** обращений
- Изменение статуса обращения
- Мягкое удаление (soft delete) обращений
- Просмотр списка удалённых обращений

## Технологии

- **PHP** 8.2+
- **Laravel** 12.x
- **MySQL** / PostgreSQL
- Eloquent ORM
- Blade + **Bootstrap 5**
- Laravel Authentication (Laravel Breeze / Fortify / встроенная)
- Middleware для разграничения ролей
- Soft Deletes

## Структура проекта

Проект следует классическому **MVC**-паттерну Laravel:

- **app/Models** — модели и отношения
- **app/Http/Controllers** — контроллеры (обычные + Admin namespace)
- **resources/views** — Blade-шаблоны
- **routes/web.php** — маршруты
- Middleware для проверки ролей (`role:admin`)
- Soft delete для тикетов

Админ-панель вынесена в пространство имён `App\Http\Controllers\Admin`.

## Установка и запуск

### 1. Клонирование и установка зависимостей

 - git clone https://github.com/Medvedev421/exam.git
 - cd exam
 - composer install

### 2. Настройка окружения

 - cp .env.example .env
 - php artisan key:generate
 - Откройте файл .env и укажите параметры базы данных:
 - DB_CONNECTION=pgsql
 - DB_HOST=127.0.0.1
 - DB_PORT=5432
 - DB_DATABASE=exam
 - DB_USERNAME=postgres
 - DB_PASSWORD=1234

### 3. Миграции и запуск

 - php artisan migrate
 - php artisan serve
 - Приложение будет доступно по адресу:
  http://127.0.0.1:8000

## Тестовые данные (Seeders)

В проекте реализованы seeders для быстрого наполнения базы данных тестовыми данными.

После выполнения команды:

 - php artisan db:seed

или при использовании:

 - php artisan migrate:fresh --seed

будут автоматически созданы:

### Администратор
- Email: admin@admin.com
- Пароль: admin123

### Тестовый пользователь
- Email: user@test.com
- Пароль: user123

### Тестовые обращения
- Несколько тикетов с разными статусами:
    - Новое (open)
    - В работе (in_work)
    - Завершено (done)

Это позволяет сразу проверить работу пользовательской части и административной панели без ручного создания данных.


## Безопасность

 - Пароли хранятся в зашифрованном виде (bcrypt)
 - Встроенная CSRF-защита Laravel
 - Middleware для проверки ролей
 - Валидация всех входящих данных через Form Requests

## Ограничения MVP

 - Нет очередей (queues)
 - Нет REST API (только веб-интерфейс)
 - Нет сложной системы ролей / разрешений (только user и admin)

## Лицензия
 - Проект создан в учебных целях и распространяется под лицензией MIT.
 - Фреймворк Laravel также распространяется под лицензией MIT.
