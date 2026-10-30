# My Reading List

A simple web application built using Laravel and SQLite to manage a personal reading list.

## Features

- View all books in a table.
- Add a new book with a title, author, and reading status.
- Edit existing book details.
- Delete books with a JavaScript confirmation popup.
- Filter books by reading status.
- Validate form inputs and display validation errors.
- Display success messages after adding, editing, or deleting books.

## Technologies Used

- PHP
- Laravel 13
- SQLite
- Blade Templates
- HTML and CSS
- JavaScript

## Reading Status Options

Each book can have one of three statuses:

1. **To Read** — Books planned for future reading.
2. **Reading** — Books currently being read.
3. **Finished** — Books that have been completed.

## Requirements

Before running this project, make sure you have:

- PHP 8.3 or later
- Composer
- PHP SQLite extension
- Git

## Installation and Setup

### 1. Clone the Repository

```bash
git clone https://github.com/vaiddavi356-png/reading-list.git
```

### 2. Open the Project Folder

```bash
cd reading-list
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Create the Environment File

```bash
cp .env.example .env
```

### 5. Generate the Application Key

```bash
php artisan key:generate
```

### 6. Configure SQLite

Open the `.env` file and ensure the database connection is set to:

```env
DB_CONNECTION=sqlite
```

Create the SQLite database file if it does not exist:

```bash
touch database/database.sqlite
```

### 7. Run Database Migrations

```bash
php artisan migrate
```

### 8. Start the Laravel Server

```bash
php artisan serve
```

### 9. Open the Application

Visit the following address in your browser:

`http://127.0.0.1:8000/books`

## Database Structure

The application uses a `books` table containing:

| Column | Description |
|---|---|
| id | Unique identifier |
| title | Book title |
| author | Author name |
| status | to-read, reading, or finished |
| created_at | Date the record was created |
| updated_at | Date the record was updated |

## Form Validation

- Book title is required and cannot exceed 255 characters.
- Author name is required and cannot exceed 255 characters.
- Reading status must be `to-read`, `reading`, or `finished`.
- Validation errors are displayed to the user.

## AI Usage Disclosure

I used ChatGPT as a learning and development assistant while building this project.

AI helped me understand Laravel project setup, MVC structure, routing, CRUD operations, form validation, Blade templates, and SQLite integration.

I also used AI assistance to troubleshoot development errors and improve the application's implementation.

I tested the application's features and maintained separate Git commits for each major development step.

## Author

Developed as a Laravel assignment project.