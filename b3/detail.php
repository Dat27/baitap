<?php
require_once 'database.php';
$id = $_GET['id'];
$sql_description = "SELECT * FROM tbl_product WHERE id = $id";
$obj_description = $connection->prepare($sql_description);
$obj_description->execute();
$des = $obj_description->fetch(PDO::FETCH_ASSOC);
echo $des['description'];
?>