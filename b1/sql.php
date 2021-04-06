<?php
/**sql.php
 */

CREATE DATABASE IF NOT EXISTS quanlysinhvien CHARACTER SET utf8 COLLATE utf8_general_ci

CREATE TABLE IF NOT EXISTS students (
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(255),
    age INT(11),
    avatar VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
)

