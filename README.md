
# Task Management System

## How to Run the Project

### Prerequisites

Before running the project, make sure you have the following installed:

- **PHP** (>= 8.0)
- **Composer** (Dependency Manager for PHP)
- **Node.js** (for frontend dependencies, if applicable)
- **MySQL** (or any compatible database)

### Steps to Run the Project

#### 1. Clone the repository:

Open your terminal and run the following command to clone the project:

```bash
git clone https://github.com/rabbanist/task-management.git
```

#### 2. Navigate into the project directory:

```bash
cd task-management
```

#### 3. Install Backend Dependencies (PHP):

Run the following command to install the required PHP dependencies using Composer:

```bash
composer install
```

#### 4. Copy the `.env.example` file to `.env` to configure the environment settings:

```bash
cp .env.example .env
```

#### 5. Generate Application Key:

Run the following command to generate the application key for the project:

```bash
php artisan key:generate
```

#### 6. Configure Database:

Open the `.env` file and configure the database connection settings like `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.

#### 7. Run Database Migrations:

Run the following command to set up the necessary database tables:

```bash
php artisan migrate
```

#### 8. Populate some dummy data for testing purposes:

(Optional) If you'd like to add some sample data to test the application, run:

```bash
php artisan db:seed
```

#### 9. Install Frontend Dependencies:

Run the following command to install frontend dependencies:

```bash
npm install
```

#### 10. Build Frontend Assets:

(Optional) Run this command to build the frontend assets:

```bash
npm run dev
```

#### 11. Run the Development Server:

Now, start the Laravel development server:

```bash
php artisan serve
```

This will run the application on `http://localhost:8000`. You can access the project through your browser.

---

Now you can access and run your **Task Management System** locally!
