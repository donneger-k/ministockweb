# Ministockweb

> **Version française disponible :** [README.md](./README.md)

**Ministockweb** is a simple stock management application built with **Laravel**, featuring a user interface designed with **Bootstrap**.
This project is a web adaptation of the original [ministock](https://github.com/donneger-k/ministock) project.

---

# Objective

This project was developed as part of my learning journey with Laravel, in order to understand how PHP frameworks work and to learn the fundamentals of backend web development.

---

## Application Overview

### Dashboard

![Dashboard](./screenshots/dashboard.png)

### Stock

![Stock](./screenshots/stock.png)

### Transactions

![Transactions](./screenshots/transaction.png)

---

# Features

- Create products with custom information
- Edit existing products
- Add and remove products from stock
- Track stock movements (inbound and outbound)
- View the complete history of operations
- Search products using filters

---

## Technologies Used

- **Laravel**
- **Bootstrap 5** (UI styling)
- **Git** & **GitHub** for version control

---

## Technical Requirements

Before running the project, make sure you have installed:

- PHP (version 8.1 or higher)
- Composer
- A database (MySQL, SQLite, etc.)
- Node.js and npm (optional, only if you want to compile front-end assets)

---

## Quick Access

Once the server is running, open:

```bash
http://127.0.0.1:8000
```

---

## Run the Project

### 1. Clone the repository

```bash
git clone https://github.com/donneger-k/ministockweb.git
cd ministockweb
```

### 2. Install dependencies

```bash
composer install
```

### 3. Configure the environment

```bash
cp .env.example .env
```

Then configure your database (MySQL, SQLite, etc.).

### 4. Generate the application key

```bash
php artisan key:generate
```

### 5. Run migrations

```bash
php artisan migrate
```

### 6. (Optional) Seed the database with test data

Sample data (products, transactions, etc.) will be generated to help you quickly test the application.

 ```bash
php artisan db:seed
```

### 7. Start the server

```bash
php artisan serve
```

Then access the application at:

```bash
http://127.0.0.1:8000
```

---

# Tests

Automated tests have been implemented to verify the main functionalities of the application (product management, stock movements, etc.).

You can run them using:

```bash
php artisan test
```


# Statut du projet

- ✅ Completed

The project is functional and ready to use.

# Auteur

Project developed by **DONNEGER Kilyan** as part of my portfolio.

## Licence

This project is licensed under the MIT License.
You are free to use it for personal or educational purposes, provided that you credit the author.

See the [`LICENSE`](./LICENSE) file for more information.

## Credits

Credits for the resources used (images, icons, etc.) are available on the dedicated page within the application.