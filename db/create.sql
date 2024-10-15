CREATE TABLE cars (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(50) NOT NULL,
    brand VARCHAR(50) NOT NULL,
    vin VARCHAR(17) NOT NULL UNIQUE,
    register_number VARCHAR(20) NOT NULL,
    available BOOLEAN DEFAULT TRUE,
    client_email VARCHAR(255) NOT NULL, 
    client_address VARCHAR(255) NOT NULL, 
    position_latitude DECIMAL(10, 8),
    position_longitude DECIMAL(11, 8),
    millage INT NOT NULL,
    color VARCHAR(50),
    img TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);