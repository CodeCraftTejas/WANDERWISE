CREATE DATABASE IF NOT EXISTS wanderwise;
USE wanderwise;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(255)
);

CREATE TABLE trips (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    destination VARCHAR(100),
    start_date DATE,
    end_date DATE,
    interests TEXT,
    flight_cost DECIMAL(10,2),
    stay_cost DECIMAL(10,2),
    food_cost DECIMAL(10,2),
    activities_cost DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
