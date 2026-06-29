 # Notice Board Management System

A role-based Notice Board Management System built with Laravel. The system allows administrators to manage notices and users, while normal users can view published notices.

## Features

### Authentication

* User Registration
* User Login
* User Logout
* Laravel Breeze Authentication

### Role-Based Access Control

* Admin Role
* User Role
* Protected Admin Routes using Middleware
* Separate Admin and User Dashboards

### Notice Management

* Create Notice
* View Notices
* Edit Notice
* Delete Notice
* Notice Details Page
* Published Date Display
* Recent Notices Section

### User Management

* View All Users
* Edit User Roles
* Delete Users
* Prevent Admin Self-Deletion

### Dashboard

* Total Users Count
* Total Admins Count
* Total Notices Count
* Recent Notices Overview

### Additional Features

* Notice Search Functionality
* Pagination
* Bootstrap UI
* Responsive Design
* Delete Confirmation Popup

## Tech Stack

### Frontend

* HTML
* CSS
* Bootstrap 5
* Blade Templates

### Backend

* PHP
* Laravel 12

### Database

* MySQL

### Tools

* Git
* GitHub
* XAMPP

## Database Structure

### Users Table

| Column     | Type             |
| ---------- | ---------------- |
| id         | bigint           |
| name       | string           |
| email      | string           |
| password   | string           |
| role       | enum(admin,user) |
| created_at | timestamp        |
| updated_at | timestamp        |

### Notices Table

| Column      | Type        |
| ----------- | ----------- |
| id          | bigint      |
| title       | string      |
| description | text        |
| created_by  | foreign key |
| created_at  | timestamp   |
| updated_at  | timestamp   |

## Relationships

### User Model

```php
public function notices()
{
    return $this->hasMany(Notice::class, 'created_by');
}
```

### Notice Model

```php
public function user()
{
    return $this->belongsTo(User::class, 'created_by');
}
```

## Installation

### Clone Repository

```bash
git clone https://github.com/your-username/notice-board-management-system.git
```

### Navigate to Project

```bash
cd notice-board-management-system
```

### Install Dependencies

```bash
composer install
```

### Configure Environment

```bash
cp .env.example .env
```

Update database credentials in `.env`.

### Generate Application Key

```bash
php artisan key:generate
```

### Run Migrations

```bash
php artisan migrate
```

### Start Development Server

```bash
php artisan serve
```

Visit:

```text
http://127.0.0.1:8000
```

## Admin Functionalities

* Manage Notices
* Manage Users
* Assign Roles
* View Dashboard Statistics
* Search Notices
* View Recent Notices

## User Functionalities

* View Notices
* Search Notices
* View Notice Details
* See Published Dates

## Project Structure

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── DashboardController.php
│   │   ├── NoticeController.php
│   │   └── UserController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── User.php
│   └── Notice.php

resources/views/
├── admin/
├── user/
├── notices/
└── layouts/
```

## Future Enhancements

* Notice Categories
* File Attachments
* Email Notifications
* User Profile Management
* Advanced Search Filters

## Learning Outcomes

* Laravel Authentication
* Middleware
* Role-Based Authorization
* CRUD Operations
* Eloquent Relationships
* Search and Pagination
* MVC Architecture
* Database Design

## Author

Harsh Malik

B.Tech Computer Science Engineering Student
