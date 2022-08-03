# Javan PHP Assessment 1

Laravel web app and API for PHP Assessment 1 at PT. Javan Cipta Solusi

## Usage

Install Laravel dependencies.

```bash
composer install
```

Copy .env file.

```bash
composer run-script post-root-package-instal
```

Generate encryption key.

```bash
php artisan key:generate
```

Migrate database.

```bash
php artisan migrate
```

Seed database.

```bash
php artisan db:seed
```

Install node.js dependencies.

```bash
npm install
```

Build assets for production.

```bash
npm run build
```

Serve Laravel.

```bash
php artisan serve
```

Open the app on your browser at <http://127.0.0.1:8000>
