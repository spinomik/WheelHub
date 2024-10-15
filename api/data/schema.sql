-- CREATE TABLES 

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
    password VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    last_login DATETIME DEFAULT NULL,
    user_config_id INT UNSIGNED DEFAULT NULL,
    first_name VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    last_name VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    email VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
    gender TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1- male, 2- female',
    role_id INT UNSIGNED NOT NULL,
    address_id INT UNSIGNED NOT NULL,
    verified BOOLEAN NOT NULL DEFAULT FALSE,
    active BOOLEAN NOT NULL DEFAULT FALSE,
    driver_licence_number VARCHAR(255) UNIQUE CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    driver_licence_date DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE user_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    assigned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE user_configs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    dark_mode BOOLEAN NOT NULL DEFAULT FALSE,
    language_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE user_addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    street VARCHAR(100) NOT NULL,
    building_number VARCHAR(10) NOT NULL,
    local VARCHAR(10),
    city VARCHAR(50) NOT NULL,
    postal_code VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE vehicle_brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE vehicle_models (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    brand_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_model_id INT NOT NULL,
    vin VARCHAR(17) NOT NULL UNIQUE,
    register_number VARCHAR(20) NOT NULL,
    available BOOLEAN DEFAULT TRUE,
    rent_id INT NULL,
    position_latitude DECIMAL(10, 8),
    position_longitude DECIMAL(11, 8),
    millage INT NOT NULL,
    color VARCHAR(50),
    img TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE rents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    user_id INT NOT NULL,
    date_start DATETIME NOT NULL,
    date_end DATETIME,
    start_position POINT NOT NULL,
    end_position POINT,
    millage_start INT NOT NULL,
    millage_end INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- CONNECTIONS 

ALTER TABLE `user_configs`
ADD CONSTRAINT `fk_user_configs_language`
    FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`) ON DELETE SET NULL;

ALTER TABLE `users`
ADD CONSTRAINT `fk_users_config`
    FOREIGN KEY (`user_config_id`) REFERENCES `user_configs`(`id`) ON DELETE SET NULL,
ADD CONSTRAINT `fk_users_role`
    FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_users_address`
    FOREIGN KEY (`address_id`) REFERENCES `user_addresses`(`id`) ON DELETE CASCADE;

ALTER TABLE `rents`
ADD CONSTRAINT `fk_rents_car`
    FOREIGN KEY (`car_id`) REFERENCES `cars`(`id`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_rents_user`
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE;

ALTER TABLE `cars`
ADD CONSTRAINT `fk_cars_rent`
    FOREIGN KEY (`rent_id`) REFERENCES `rents`(`id`) ON DELETE SET NULL;

-- INSERTS 

INSERT INTO users (
    username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date
) VALUES (
    'janNowak', '123frytki', '2024-10-08', 1, 'Jan', 'Nowak', 'janNowak@gmail.com', 1, 1, 1, true, true, 'PNF123DDR342E', '2030-01-01'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user432', 'abc123', '2023-12-22', 5, 'Jan', 'Nowak', 'user432@gmail.com', 1, 5, 3, 1, 1, 'DLN2388', '2024-10-14'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user128', 'admin', '2023-11-06', 2, 'Anna', 'Kowalski', 'user128@gmail.com', 2, 2, 3, 1, 1, 'DLN9860', '2024-10-18'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user571', 'letmein789', '2023-12-05', 2, 'Krzysztof', 'Wiśniewski', 'user571@gmail.com', 1, 3, 2, 1, 1, 'DLN1544', '2024-10-08'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user543', 'password', '2023-11-19', 6, 'Maria', 'Wójcik', 'user543@gmail.com', 1, 5, 1, 1, 1, 'DLN5924', '2024-10-10'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user952', 'qwerty456', '2023-10-23', 4, 'Piotr', 'Kozłowski', 'user952@gmail.com', 2, 5, 4, 1, 0, 'DLN2638', '2024-10-11'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user468', 'password123', '2024-01-03', 9, 'Katarzyna', 'Lewandowski', 'user468@gmail.com', 1, 3, 2, 0, 0, 'DLN4650', '2024-10-09'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user333', 'password123', '2024-02-09', 8, 'Tomasz', 'Zając', 'user333@gmail.com', 2, 4, 4, 1, 0, 'DLN3515', '2024-10-11'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user397', 'password123', '2024-05-11', 10, 'Zofia', 'Mazur', 'user397@gmail.com', 1, 5, 5, 1, 0, 'DLN2387', '2024-10-10'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user295', 'userpass', '2024-02-19', 3, 'Andrzej', 'Jankowski', 'user295@gmail.com', 1, 3, 3, 1, 0, 'DLN8373', '2024-10-09'
);

INSERT INTO users (username, password, last_login, user_config_id, first_name, last_name, email, gender, role_id, address_id, verified, active, driver_licence_number, driver_licence_date) VALUES (
    'user187', 'password', '2024-08-30', 10, 'Monika', 'Krawczyk', 'user187@gmail.com', 1, 1, 1, 1, 1, 'DLN8964', '2024-10-17'
);