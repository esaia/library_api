# Library Management System (Laravel)

This is Library Management System, a Laravel-based web application that simplifies the management of your library's collection of books and authors. This system empowers administrators with a range of features to efficiently handle library resources.

### Table of Contents

-   [Tech Stack](#tech-stack)
-   [Getting Started](#getting-started)
-   [Environment Variables](#environment-variables)
-   [Screenshots](#screenshots)

### Tech Stack

-   [Laravel@10.x](https://laravel.com/docs/10.x) - back-end framework
-   [MySQL](https://www.mysql.com/) - for database

### Getting Started

1\. Clone the repository to your local machine

```sh
https://github.com/esaia/library_api.git
```

2\. Run composer install to install the dependencies

```sh
composer install
```

3\. Configure your database credentials in the .env file

4\. Migrate and Seed: Run database migrations and seed the initial data.

```sh
php artisan migrate:fresh --seed
```

5\. And start the local development server

```sh
php artisan serve
```

6\. To compile the CSS, run the following command. This is especially important if you're using Tailwind CSS for styling.

```sh
npm run dev
```

### Environment Variables

To run this project, you will need to add the following environment variables to your .env file

**MYSQL:**

> DB_CONNECTION=mysql

> DB_HOST=127.0.0.1

> DB_PORT=3306

> DB_DATABASE=**\***

> DB_USERNAME=**\***

> DB_PASSWORD=**\***

### Screenshots

#### Dashboard

![App Screenshot](/readme/dashboard.jpg)

#### Edit book

![App Screenshot](/readme/edit.jpg)
