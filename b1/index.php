<?php
session_start();
/**
 * Created by PhpStorm.
 * User: dattk
 * Date: 14/03/2021
 * Time: 11:47 CH
 */
require_once "database.php";


    $sql_select_all = "SELECT * FROM students ORDER BY created_at DESC";
    $obj_select_all = $connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $students = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
//    echo "<pre>";
//    print_r($students);
//    echo "</pre>";


?>
<br>
<?php
require_once "layout_index.php";
?>
