
CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 fullname VARCHAR(100),
 email VARCHAR(100) UNIQUE,
 password VARCHAR(255)
);

CREATE TABLE students (
 id INT AUTO_INCREMENT PRIMARY KEY,
 reg_number VARCHAR(50) UNIQUE,
 fullname VARCHAR(100),
 course VARCHAR(100)
);

CREATE TABLE attendance (
 id INT AUTO_INCREMENT PRIMARY KEY,
 student_id INT,
 attendance_date DATE,
 status ENUM('Present','Absent'),
 FOREIGN KEY(student_id) REFERENCES students(id)
);

INSERT INTO users(fullname,email,password)
VALUES('Admin','admin@test.com',
'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
