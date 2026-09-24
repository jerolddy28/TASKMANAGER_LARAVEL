# Personal Task Manager

A Laravel web application for creating, viewing, editing, deleting, and completing personal tasks.

## Submission Information

- **Project Code:** WST21-PM-2026-SF
- **Student Name:** JEROLD R. CABANES
- **Course & Year:** BSIT-2 
- **Database Used:** SQLite

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status by setting tasks to Pending or Completed
- Set an optional due date and description for each task

## Requirements

- PHP 8.3 or later
- Composer
- Node.js and npm

## Installation

Clone the repository and install the project dependencies:

```bash
git clone <public-repository-url>
cd TASKMANAGER_LARAVEL
composer install
npm install
```

Create the environment file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

Create the SQLite database and run the migrations:

```bash
touch database/database.sqlite
php artisan migrate
```

Build the frontend assets:

```bash
npm run build
```

## Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

Open the URL shown in the terminal. If port `8000` is already in use, Laravel may start on another port such as `8001`; use that active URL.

## Testing

Run the test suite with:

```bash
php artisan test
```

## Technology Stack

- Laravel 13
- PHP 8.3+
- SQLite
- Blade templates
- Vite
