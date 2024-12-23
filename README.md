
How to Run the Project
Prerequisites
Before running the project, make sure you have the following installed:

PHP (>= 8.0)
Composer (Dependency Manager for PHP)
Node.js (for frontend dependencies, if applicable)
MySQL (or any compatible database)
Steps to Run the Project
Clone the repository:

Open your terminal and run the following command to clone the project:

git clone https://github.com/rabbanist/task-management.git

Navigate into the project directory:
cd task-management


Install Backend Dependencies (PHP):

Run the following command to install the required PHP dependencies using Composer:
composer install


Copy the .env.example file to .env to configure the environment settings.
cp .env.example .env

Generate Application Key:
#php artisan key:generate


Configure Database:

Run Database Migrations:
php artisan migrate

Populate some dummy data for testing purposes:
php artisan db:seed

Run the following command to start the development server:
npm install
&&
npm run dev

Run this command to start the development server:
php artisan serve

This will run the application on http://localhost:8000. You can access the project through your browser.