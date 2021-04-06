<?php
session_start();
//    $a = [1,3,0,4,7];
    $count = '';
    $in = [];
    $sum = 0;
    $result = [];
//    echo array_sum($a);

//    getSums($a,$result);
//echo "<pre>";
//print_r($_POST);
//echo "<pre>";
if(isset($_POST['submit'])){
    $_SESSION['count'] = $_POST['count'];
    header("Location: control.php");
    exit();
}

?>
<form action="" method="POST">
    Nhap so phan tu
    <input type="number" name="count" value="<?php echo $count?>">
    <input type="submit" name="submit" value="Dong y">
</form>
<?php

?>

