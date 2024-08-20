Product CRUD Laravel Project.

Overview

This is a Product CRUD (Create, Read, Update, Delete) application built using the Laravel framework. It allows users to manage products, including creating, viewing, updating, and deleting product records.

Clone the Repository : https://github.com/aki961996/product.git

Navigate to the Project Directory : cd your-repository-name

Install Dependencies : composer install

Set Up the Environment File : cp .env.example .env

Open the .env file and update the following lines: DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

Generate Application Key : php artisan key:generate

Run Migrations and Seeders : php artisan migrate  and php artisn make:migrate --class=ProductSeeder

Serve the Application : php artisan serve



