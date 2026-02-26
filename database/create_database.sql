-- This creates the database 'eventdb'
CREATE DATABASE IF NOT EXISTS eventdb;
USE eventdb;

-- This creates the 'users' table for your login
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- This creates the 'event_details' table for your conference data
CREATE TABLE IF NOT EXISTS event_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    heading VARCHAR(255) NOT NULL,
    presenter_name VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    place VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);