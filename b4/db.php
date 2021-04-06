<?php
/**
 *
 */
const DB_HOST = 'localhost';

const DB_USERNAME = 'root';

const DB_PASSWORD = '';

const DB_NAME = 'db_manager_student';

const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die('Lỗi kết nối:' . mysqli_connect_error());

}
//echo "<h2>Kết nối DB " . DB_NAME . " thành công</h2>";