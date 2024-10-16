# WheelHub

## Opis projektu

WheelHub to aplikacja webowa do zarządzania wypożyczalnią pojazdów, stworzona przy użyciu AngularJS oraz Laminas. Aplikacja pozwala użytkownikom na przeglądanie dostępnych pojazdów oraz ich wypożyczanie.

## Technologie

- **Frontend:** AngularJS (v1), AngularJS Material
- **Backend:** PHP, Laminas, Doctrine
- **Baza danych:** MySQL
- **Docker:** Konteneryzacja backendu i bazy danych
- **Swagger:** Dokumentacja i testowanie API

## Instalacja

1.  Sklonuj repozytorium:

    ```bash
    git clone https://github.com/spinomik/WheelHub.git

    ```

2.  Wykonaj mpm i oraz coposer install w katalogu app

3.  Zbuduj i uruchom kontenery Docker:

    ```bash
        docker-compose up --build
    ```

4.  utwórz plik .env i zaktualizuj dane bazydanych w pliku api/config/autoload/global.php
    z pliku .env

    api/config/autoload/global.php

    ```
        'db' => [
            'driver'         => 'Pdo',
            'dsn'            => 'mysql:dbname=[MYSQL_DATABASE];host=[container_name]',
            'username'       => 'root',
            'password'       => '[MYSQL_ROOT_PASSWORD]',
        ]


    ```

    wykonaj w mySql skrypty /db/scripts/create_tables.sql ,/db/scripts/insert_data.sql

5.  dodaj vhosty na swoim komputerze "127.0.0.1 wheelhub.localhost"

6.  aplikacja powinna być dostępna pod http://wheelhub.localhost:8080

    Struktura projektu
    • app/ – Frontend i (AngularJS, AngularJS Material)
    • api/ - backend PHP, Laminas
    • db/ – Baza danych (MySQL)
    • docker-compose.yml – Konfiguracja Docker

w celu debugowania mozna uzyc loggera:

use WheelHubApi\Service\Logger;

(new Logger())->log($variable);

zostanie utworzony plik w katalogu WheelHubApi/src/Service/logs.txt
