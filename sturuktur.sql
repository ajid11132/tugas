CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(100),
    product_name VARCHAR(100),
    price DECIMAL(10, 2),
    quantity INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
