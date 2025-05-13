# Task Manager (Laravel)

A simple task management API built with Laravel.

## How to Setup

1. Clone this repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and update database settings
4. Run `php artisan migrate --seed`
5. Start server with `php artisan serve`

## API Endpoints

- `GET /api/tasks` - List all tasks
- `POST /api/tasks` - Create new task (send JSON with `title` and `description`)
- `GET /api/tasks/{id}` - Get single task
- `PUT /api/tasks/{id}` - Update task
- `DELETE /api/tasks/{id}` - Delete task

## Login

Send POST request to `/api/login` with:
```json
{
  "email": "admin@example.com",
  "password": "password"
}