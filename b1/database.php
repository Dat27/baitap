<?php
/**
 * database.php
 */
const DB_DSN = 'mysql:host=localhost;dbname=quanlysinhvien;charset=utf8';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
try{
    $connection = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
} catch (Exception $e){
    die("Lỗi kết nối: " .$e->getMessage());
}
//echo "Kết nối thành công";