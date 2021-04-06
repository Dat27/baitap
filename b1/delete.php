<?php
session_start();
require_once "database.php";
echo "<pre>";
print_r($_GET);
echo "</pre>";
if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    $_SESSION['error'] = 'id không hợp lệ';
    header('Location: index.php');
    exit();
}

$id= $_GET['id'];

$sql_delete = "DELETE FROM students where id = $id";
$obj_delete = $connection->prepare($sql_delete);
$is_delete = $obj_delete->execute();
var_dump($is_delete);
if ($is_delete){
    $_SESSION['success'] = "Xóa thành công sinh viên có id = $id";

} else{
    $_SESSION['error'] = "Xóa dữ liệu thất bại";
}
header("Location: index.php");
exit();
