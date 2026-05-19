# Abdel Kicau Mania Store

Abdel Kicau Mania Store is a bird shop website built using Laravel for a Semester 3 group project.  
This project provides product management features, category management, authentication system, and MySQL database integration.

---

## 🚀 Features

- Authentication & Login System
- CRUD Product Management
- CRUD Category Management
- Product Image Upload
- Admin Dashboard
- Responsive User Interface
- MySQL Database Integration

---

## 🛠 Tech Stack

- Backend : PHP & Laravel
- Frontend : Laravel Blade, Bootstrap / Tailwind CSS
- Database : MySQL
- Tools : Laragon & Composer

---

## 📦 Installation Guide

### 1. Clone Repository
```bash
git clone https://github.com/USERNAME/abdel-kicau-mania-store-laravel.git
```

### 2. Open Project Folder
```bash
cd abdel-kicau-mania-store-laravel
```

### 3. Install Dependencies
```bash
composer install
```

### 4. Copy Environment File
```bash
cp .env.example .env
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Create Database
Create a new MySQL database named:

```txt
db_burung
```

### 7. Import Database
Import the SQL file located in:

```txt
/database/db_burung.sql
```

### 8. Run Development Server
```bash
php artisan serve
```

### 9. Open in Browser
```txt
http://127.0.0.1:8000
```

---

## 📁 Project Structure

```txt
app/            -> Application logic
resources/      -> Blade templates and UI
routes/         -> Application routes
database/       -> Database SQL files
public/         -> Public assets
```

---

## 👥 Team Members

- Abdel Khaer Ardana Putra
- Rafli Praditta
- Rivaldo Firmansyah
- Roni Syaki Prakoso

---

## 📌 Notes

Make sure:
- Laragon / XAMPP is running
- PHP and Composer are installed
- Database has been imported before running the project

---

This project was created to fulfill the Semester 3 group assignment.
