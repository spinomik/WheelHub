# WheelsHub

## Opis projektu

WheelsHub to aplikacja webowa do zarządzania wypożyczalnią pojazdów, stworzona przy użyciu AngularJS oraz Laminas. Aplikacja pozwala użytkownikom na przeglądanie dostępnych pojazdów oraz ich wypożyczanie.

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

2.  Wykonaj mpm i w katalogu app

3.  Zbuduj i uruchom kontenery Docker:

    ```bash
        docker-compose up --build
    ```

4.  dodaj vhosty na swoim komputerze "127.0.0.1 wheelhub.localhost"

5.  aplikacja powinna być dostępna pod http://wheelhub.localhost:8080

    Struktura projektu
    • app/ – Aplikacja i backend (AngularJS, PHP, Laminas)
    • db/ – Baza danych (MySQL)
    • docker-compose.yml – Konfiguracja Docker
