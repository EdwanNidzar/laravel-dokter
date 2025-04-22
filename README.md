# laravel-dokter

Laravel Dokter

## Prerequisites

Before you begin, ensure you have the following installed:

-   [composer](https://getcomposer.org/download/)
-   [PHP](https://www.php.net/downloads) (version 8.2)
-   [Node.js](https://nodejs.org/en/download/package-manager)

## Installation

Clone the Repository

```bash
  git clone https://github.com/EdwanNidzar/laravel-dokter.git
  or download zip file
  cd laravel-dokter
```

Install Dependencies

```bash
  composer install
```

Next, install JavaScript dependencies:

```bash
  npm install
```

Environment Configuration
Create a copy of the .env.example file and rename it to .env:

```bash
  cp .env.example .env
```

Setup database open `.env`

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel-dokter
  DB_USERNAME=root
  DB_PASSWORD=
```

Generate the application key:

```bash
  php artisan key:generate
```

Set Up the Database

```bash
  php artisan migrate
```

Start the Laravel server:

```bash
  npm run build
```

```bash
  php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).