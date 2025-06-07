# User Management System

A simple user management system built with PHP and MySQL.

## Technologies Used
- PHP 8.1.32
- MySQL 5.7+
- HTML/CSS

## Features
- User Registration
- User Login
- Session Management
- Role Based Access Control (Admin/Member)

## Setup Instructions

1. Create database and tables:
   ```bash
   mysql -u root -p < create_users_table.sql
   ```

2. Configure database in `.env.dev`:
   ```
   DB_SERVER=localhost
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   DB_NAME=user_management
   ```

3. Start the server:
   ```bash
   php -S localhost:8000
   ```

4. Access the application at `http://localhost:8000`
