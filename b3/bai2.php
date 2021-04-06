
<!--Tạo CSDL db_shop-->
CREATE DATABASE db_shop CHARACTER SET utf8 COLLATE utf8_general_ci


<!--Tạo bảng tbl_cate -->
CREATE TABLE IF NOT EXISTS tbl_cate (
id_cate INT(11) AUTO_INCREMENT,
name_cate VARCHAR(100),
date_cate DATETIME,
status_cate TINYINT(4),
PRIMARY KEY (id_cate)
);

<!--Tạo bảng tbl_product -->
CREATE TABLE IF NOT EXISTS tbl_product(
id INT(11) AUTO_INCREMENT,
id_cate INT(11),
name VARCHAR(100),
price FLOAT,
description TEXT,
date_create DATETIME,
status TINYINT(4),
PRIMARY KEY (id),
FOREIGN KEY (id_cate) REFERENCES tbl_cate(id_cate)
);

