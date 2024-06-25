# Laravel API for Products

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
