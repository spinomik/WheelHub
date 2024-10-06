# Używamy obrazu PHP z Apache
FROM php:8.1-apache

# Instalacja potrzebnych rozszerzeń PHP i narzędzi
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalacja Node.js i npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Instalacja Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Przypisujemy folder roboczy
WORKDIR /var/www/html

# Instalacja Laminas
RUN composer create-project laminas/laminas-mvc-skeleton .

# Instalacja AngularJS i dodatkowych modułów
RUN npm install angular@1.8.2 angular-material angular-route angular-animate angular-aria

# Kopiowanie aplikacji do kontenera
COPY . /var/www/html

# Kopiowanie konfiguracji Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Ustawienia serwera Apache
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

RUN a2enmod rewrite && service apache2 restart

# Restart Apache po zmianach
CMD ["apache2-foreground"]

# Otwarcie portu dla aplikacji
EXPOSE 80