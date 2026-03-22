# Student Information Management System (SIMS)

[![Laravel Version](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue.svg)](https://www.php.net/)

> A modern web application built with Laravel to manage student records, academic data, and administrative tasks efficiently.

---

## 📌 Project Overview

This Student Information Management System (SIMS) is designed to streamline the process of managing student data for educational institutions. It provides a secure and user-friendly interface for administrators and teachers to handle student registrations, academic performance, and reporting.

**Why I built this:**
As a 2nd-year Computer Science student, I developed this project to deepen my understanding of the Laravel framework, MVC architecture, and database management. It demonstrates my ability to build a full-stack CRUD (Create, Read, Update, Delete) application.

---

## ✨ Key Features

-   **Dashboard:** Overview of key statistics (total students, active courses, recent activities).
-   **Student Management:** Complete CRUD functionality to register, update, view, and delete student profiles (including photo upload).
-   **Course Management:** Manage academic courses and assign them to students/teachers.
-   **Academic Records:** Input and track student grades, attendance, and generate basic report cards.
-   **Authentication & Authorization:** Secure login system with role-based access control (Admin vs. Teacher).
-   **Search & Filters:** Advanced search to find students quickly based on ID, name, or grade level.

---

## 🛠️ Tech Stack

-   **Backend Framework:** Laravel 10.x (PHP)
-   **Database:** MySQL
-   **Frontend:** Blade Templating, Bootstrap 5, Custom CSS
-   **Other Tools:** Composer (Dependency Management), NPM

---

## 🚀 Installation & Setup

Follow these steps to get the project running on your local machine:

1.  **Clone the Repository:**
    ```bash
    git clone [https://github.com/your-username/student-management-system.git](https://github.com/your-username/student-management-system.git)
    cd student-management-system
    ```

2.  **Install PHP Dependencies:**
    ```bash
    composer install
    ```

3.  **Install Frontend Dependencies:**
    ```bash
    npm install
    npm run build
    ```

4.  **Environment Setup:**
    ```bash
    cp .env.example .env
    ```
    *Open the `.env` file and configure your database settings (DB_DATABASE, DB_USERNAME, DB_PASSWORD).*

5.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

6.  **Run Database Migrations & Seeders:**
    ```bash
    php artisan migrate --seed
    ```

7.  **Run the Application:**
    ```bash
    php artisan serve
    ```
    The application will be accessible at `http://localhost:8000`.

---

## 📸 Screenshots (Optional but Highly Recommended)

| Dashboard | Student List |
| :--- | :--- |
| ![Dashboard Screenshot](path/to/your/dashboard_screenshot.png) | ![Student List Screenshot](path/to/your/student_list_screenshot.png) |

---

## 👨‍💻 About the Author

I am a passionate 2nd-year Computer Science student at [Debark University]. Currently, I am specializing in full-stack web development with a focus on Laravel. I am eager to learn and ready to contribute to real-world projects.

-   **GitHub:** [kindalemtazeb-ops](https://github.com/kindalemtazeb-ops)
-   **Contact:** [kindalemtazeb@gmail.com]
