CREATE DATABASE IF NOT EXISTS crud_db;

USE crud_db;

CREATE TABLE IF NOT EXISTS products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  quantity INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, price, quantity) VALUES
('laptop', 999.99, 2),
('Phone', 399.99, 10);
