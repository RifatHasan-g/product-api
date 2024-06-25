# Laravel API for Products

## Requirements

-   PHP >= 7.3
-   Composer
-   Laravel >= 8.x
-   MySQL

## Installation

1.  **Clone the repository**

        ```bash
        git clone https://github.com/RifatHasan-g/product-api.git
        cd product-api
        ```

    Open the .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=product-api
    DB_USERNAME=root
    DB_PASSWORD=

## Setup

1. Clone the repository.
2. Install dependencies: `composer install`
3. Run migrations: `php artisan migrate`
4. Run the server: `php artisan serve`

## Endpoints

-   `GET /api/product` - List all products
-   `GET /api/product/{id}` - Get a single product
-   `POST /api/product` - Create a new product
-   `PUT /api/product/{id}` - Update a product
-   `DELETE /api/product/{id}` - Delete a product

## Authentication

-   Use Laravel Passport for authentication.
