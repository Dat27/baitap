<?php
/**
 *
 */
$error = '';
$result = '';
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

if (isset($_POST['submit'])){
    $number = $_POST['number'];
    if (empty($number)){
        $error = 'Không được để trống';
    }elseif (!is_numeric($number)){
        $error = 'Cần phải nhập số';
    }else{
        if ($number<2){
            $result = "$number không phải là số nguyên tố";
        }
        else{
            $count = 0;
            for ($i=2;$i<=sqrt($number);$i++){
                if ($number % $i == 0){
                    $count++;
                }
            }
            if ($count == 0) {
                $result = "$number là số nguyên tố";
            }else{
                $result = "$number không phải số nguyên tố";
            }
        }
    }
}

?>
<form action="" method="post">

    <h2>Kiểm tra số nguyên tố</h2>
    <input type="text" name="number" value=""><br><br>
    <input type="submit" name="submit" value="Kiểm tra" style="color:white; background-color: #D9534F;">
    <h3><?php echo $error; echo $result;
//        if ($error){
//            echo "<b>đây là thông báo</b>";
//        }
        ?></h3>
</form>
