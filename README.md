# GUVI Login System

A full-stack user authentication and profile management system developed using PHP, MySQL, MongoDB, Redis, jQuery AJAX, Bootstrap, HTML, CSS, and JavaScript.

## Features

### User Authentication
- User Registration
- User Login
- Password Hashing
- Session Token Generation

### Profile Management
- View User Profile
- Update Profile Information
- Store Additional User Details

### Database Integration

#### MySQL
Used for:
- User Registration
- User Login Credentials

#### MongoDB
Used for:
- User Profile Storage
- Profile Information Management

#### Redis
Used for:
- Session Management
- Authentication Token Storage

## Technology Stack

### Frontend
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- jQuery
- AJAX

### Backend
- PHP 8

### Databases
- MySQL
- MongoDB
- Redis

## Project Structure

```
guvi-login-system/
│
├── index.html
├── login.html
├── register.html
├── profile.html
│
├── css/
│   ├── common.css
│   ├── login.css
│   ├── register.css
│   └── profile.css
│
├── js/
│   ├── login.js
│   ├── register.js
│   ├── profile.js
│   ├── auth.js
│   └── api.js
│
├── php/
│   ├── login.php
│   ├── register.php
│   ├── save_profile.php
│   ├── get_profile.php
│   ├── logout.php
│   └── config/
│       ├── mysql.php
│       ├── mongo.php
│       └── redis.php
│
└── vendor/
```

## Installation

### Clone Repository

```bash
git clone https://github.com/Aswath1607/guvi-login-system.git
```

### Install Dependencies

```bash
composer install
```

### Configure Databases

#### MySQL
Create database:

```sql
CREATE DATABASE guvi_login_system;
```

Create users table:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password_hash VARCHAR(255)
);
```

#### MongoDB

Start MongoDB service:

```bash
mongod
```

#### Redis

Start Redis/Memurai service:

```bash
memurai
```

## Workflow

1. User Registers
2. User Data Stored in MySQL
3. User Logs In
4. Session Token Generated
5. Session Stored in Redis
6. User Profile Saved in MongoDB
7. Profile Retrieved and Updated

## Author

Aswath S

## License

This project is developed for educational and internship evaluation purposes.
