CREATE TABLE register (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL,
    fullname VARCHAR(25) NOT NULL,
    course VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL,
    contact VARCHAR(25) NOT NULL,
    password VARCHAR(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;
INSERT INTO elib (username,email,password) VALUES('admin', 'admin@gmail.com', '123');
