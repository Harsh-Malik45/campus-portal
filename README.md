 # 🎓 Campus Management Portal

A full-stack **Campus Management Portal** built with **Laravel 12** that streamlines campus administration through role-based access control. The system enables administrators to manage students, users, notices, and academic results, while providing students with personalized dashboards, profiles, and result access.

---

# 🚀 Features

## 🔐 Authentication

- User Registration
- User Login
- User Logout
- Laravel Breeze Authentication
- Password Hashing
- Session Management

---

## 👥 Role-Based Access Control

### 👨‍💼 Admin

- Dashboard Analytics
- Manage Users
- Manage Students
- Manage Notices
- Manage Results
- Import & Export Results

### 👨‍🎓 Student

- Student Dashboard
- View Profile
- View Personal Results
- View Latest Notices

### 👤 User

- View Published Notices
- Search Notices
- View Notice Details

---

## 📢 Notice Management

- Create Notice
- Edit Notice
- Delete Notice
- Search Notices
- Pagination
- Latest Notices
- Notice Details Page

---

## 👨‍🎓 Student Management

- Add Student
- Edit Student
- Delete Student
- Search Students
- Pagination
- User ↔ Student Mapping
- Roll Number Management
- Branch Management
- Year & Semester Management

---

## 📊 Result Management

- Add Results
- Edit Results
- Delete Results
- Search Results
- Pagination

### Excel Features

- Import Results from Excel
- Export Results to Excel
- Download Excel Template
- Bulk Upload Support
- Duplicate Prevention using `updateOrCreate()`

---

## 📈 Dashboard

### Admin Dashboard

- Total Users
- Total Admins
- Total Students
- Total Notices
- Total Results
- Recent Notices

### Student Dashboard

- Student Information
- Latest Notices
- Quick Navigation
- My Profile
- My Results

---

## 🔍 Search Functionality

### Students

- Search by Name
- Search by Roll Number
- Search by Branch

### Results

- Search by Student Name
- Search by Subject

### Notices

- Search by Title

---

## 🎨 User Interface

- Bootstrap 5
- Responsive Design
- Bootstrap Cards
- Tables
- Pagination
- Delete Confirmation Popup
- Toastr Notifications
- jQuery Validation

---

# 🛠 Tech Stack

## Frontend

- HTML5
- CSS3
- Bootstrap 5
- Blade Templates
- JavaScript
- jQuery

## Backend

- PHP 8
- Laravel 12

## Database

- MySQL

## Packages

- Laravel Breeze
- Laravel Excel (Maatwebsite Excel)

## Tools

- Git
- GitHub
- Composer
- XAMPP
- VS Code

---

# 🗄 Database Structure

## Users Table

| Column | Type |
|---------|------|
| id | bigint |
| name | string |
| email | string |
| password | string |
| role | enum(admin, user, student) |
| created_at | timestamp |
| updated_at | timestamp |

---

## Students Table

| Column | Type |
|---------|------|
| id | bigint |
| user_id | Foreign Key |
| name | string |
| roll_no | string |
| year | integer |
| semester | integer |
| branch | string |
| created_at | timestamp |
| updated_at | timestamp |

---

## Results Table

| Column | Type |
|---------|------|
| id | bigint |
| student_id | Foreign Key |
| subject | string |
| max_marks | integer |
| obtained_marks | integer |
| created_at | timestamp |
| updated_at | timestamp |

---

## Notices Table

| Column | Type |
|---------|------|
| id | bigint |
| title | string |
| description | text |
| created_by | Foreign Key |
| created_at | timestamp |
| updated_at | timestamp |

---

# 🔗 Eloquent Relationships

## User Model

```php
public function student()
{
    return $this->hasOne(Student::class);
}

public function notices()
{
    return $this->hasMany(Notice::class, 'created_by');
}
```

---

## Student Model

```php
public function user()
{
    return $this->belongsTo(User::class);
}

public function results()
{
    return $this->hasMany(Result::class);
}
```

---

## Result Model

```php
public function student()
{
    return $this->belongsTo(Student::class);
}
```

---

## Notice Model

```php
public function user()
{
    return $this->belongsTo(User::class, 'created_by');
}
```

---

# 📥 Excel Import & Export

### Import Results

- Upload results using Excel.
- Automatically maps students using Roll Number.
- Updates existing records using `updateOrCreate()`.
- Prevents duplicate entries.

### Export Results

- Export all student results into an Excel spreadsheet.

### Download Template

- Download a predefined Excel template for bulk uploads.

---

# 📂 Project Structure

```text
app/
├── Exports/
│   └── ResultsExport.php
├── Imports/
│   └── ResultsImport.php
├── Http/
│   ├── Controllers/
│   │   ├── DashboardController.php
│   │   ├── StudentDashboardController.php
│   │   ├── NoticeController.php
│   │   ├── StudentController.php
│   │   ├── ResultController.php
│   │   └── UserController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── User.php
│   ├── Student.php
│   ├── Result.php
│   └── Notice.php

resources/
└── views/
    ├── admin/
    ├── student/
    ├── students/
    ├── results/
    ├── notices/
    ├── users/
    └── layouts/
```

---

# ⚙️ Installation

## Clone Repository

```bash
git clone https://github.com/your-username/campus-management-portal.git
```

## Navigate to Project

```bash
cd campus-management-portal
```

## Install Dependencies

```bash
composer install
```

## Copy Environment File

```bash
cp .env.example .env
```

## Generate Application Key

```bash
php artisan key:generate
```

## Configure Database

Update your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=campus_management
DB_USERNAME=root
DB_PASSWORD=
```

## Run Migrations

```bash
php artisan migrate
```

## Start Development Server

```bash
php artisan serve
```

Visit:

```text
http://127.0.0.1:8000
```

---

# 👨‍💼 Admin Functionalities

- Dashboard Analytics
- Manage Users
- Manage Students
- Manage Notices
- Manage Results
- Import Results from Excel
- Export Results to Excel
- Download Excel Template

---

# 👨‍🎓 Student Functionalities

- Student Dashboard
- View Profile
- View Personal Results
- View Latest Notices

---

# 👤 User Functionalities

- View Notices
- Search Notices
- View Notice Details

---

# 📚 Learning Outcomes

- Laravel 12
- Laravel Breeze Authentication
- Role-Based Authorization
- Middleware
- CRUD Operations
- MVC Architecture
- Eloquent Relationships
- Database Design
- Foreign Keys
- Search & Pagination
- Form Validation
- Excel Import & Export
- Responsive UI Development

---

# 🚀 Future Enhancements

- PDF Result Download
- Attendance Management
- Fee Management
- Student Photo Upload
- Notice Attachments
- Dashboard Charts
- Email Notifications
- Advanced Search Filters
- Profile Image Upload

---

# 👨‍💻 Author

**Harsh Malik**

B.Tech Computer Science Engineering Student

---

## ⭐ Support

If you found this project helpful, consider giving it a ⭐ on GitHub!
