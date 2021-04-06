<?php
session_start();
require_once 'database.php';

$id = $_GET['id'];
$sql_delete = "DELETE FROM tbl_product WHERE id = $id";
$obj_delete = $connection->prepare($sql_delete);
$is_delete = $obj_delete->execute();
if ($is_delete) {
    $_SESSION['success'] = 'Xóa thành công sản phẩm';
} else {
    $_SESSION['error'] = 'Xóa thất bại';
}
header('Location:index.php');
exit () ;
?>

