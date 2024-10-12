CREATE TABLE `users` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `password` VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `last_login` DATETIME DEFAULT NULL,
    `user_config_id` INT(11) UNSIGNED DEFAULT NULL,
    `first_name` VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `last_name` VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `email` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `gender` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1- male, 2- female',
    `role_id` INT(11) UNSIGNED NOT NULL,
    `address_id` INT(11) UNSIGNED NOT NULL,
    `verified` BOOLEAN NOT NULL DEFAULT FALSE,
    `active` BOOLEAN NOT NULL DEFAULT FALSE,
    `driver_licence_number` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    `driver_licence_date` DATETIME,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `unique` (`username`, `email`, `driver_licence_number`) USING BTREE,
    PRIMARY KEY (`id`)
);

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