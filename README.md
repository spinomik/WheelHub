# WheelHub

## Project Description

WheelHub is a web application designed for managing a vehicle rental service, built using AngularJS and Laminas. The application allows users to browse available vehicles and rent them.

## Technologies

- **Frontend:** AngularJS (v1), AngularJS Material
- **Backend:** PHP, Laminas
- **Database:** MySQL
- **Docker:** Containerization of the backend and database

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/spinomik/WheelHub.git
   ```

2. Configure the database in the `.env` file by updating the following details:

   ```
   MYSQL_DATABASE={DB_NAME}
   MYSQL_ROOT_PASSWORD={DB_ROOT_PASSWORD}
   MYSQL_USER={DB_USER_NAME}
   MYSQL_PASSWORD={DB_USER_PASSWORD}
   ```

3. Build and run the Docker containers:

   ```bash
   docker-compose up --build
   ```

4. Update the database configuration in the file `api/config/autoload/global.php`:

   ```php
    'db' => [
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname={DB_NAME};host=wheelHub_db',
        'username'       => 'root',
        'password'       => '{DB_ROOT_PASSWORD}',
    ],
   ```

5. Add a virtual host on your machine: /etc/hosts

   ```
      127.0.0.1 wheelhub.localhost
      127.0.0.1 wheelhub.api.localhost
   ```

6. The application should be accessible at [http://wheelhub.localhost:8080](http://wheelhub.localhost:8080).

## Project Structure

- **app/** – Frontend (AngularJS, AngularJS Material)
- **api/** – Backend (PHP, Laminas)
- **db/** – Database (MySQL)
- **docker-compose.yml** – Docker configuration

## Debugging the Backend

To enable backend debugging, you can use the logger:

```php
use WheelHubApi\Service\Logger;
(new Logger())->log($variable);
```

A log file will be created in the directory `WheelHubApi/src/Service/logs.txt`.
