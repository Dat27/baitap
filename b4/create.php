<?php
require_once 'db.php';
session_start();
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
$error = '';

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $select = $_POST['select'];
    $numberphone = $_POST['numberphone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    if (empty($name)|| empty($numberphone)||empty($address)){
        $error= 'Hãy nhập các trường cần điền';
    }elseif (!is_numeric($numberphone)){
        $error = 'Nhập số điện thoại';
    }

    if (empty($error)){
        $sql_insert = "INSERT INTO tbl_student(id_faculty, name , email, phone, addres)VALUES
                        ('$select' ,'$name', '$email', '$numberphone', '$address')";
        $is_insert = mysqli_query($connection, $sql_insert);
            var_dump($is_insert);
    }
    if ($is_insert){
        $_SESSION['success']='Thêm mới sp thành công';
        header('Location:index.php');
        exit();
    }else{
        $error = 'Thêm thất bại';
    }
}
?>


<form action="" method="post">
    <h3>Thêm mới học viên</h3><br>
    Họ tên* <br>
    <input type="text" name="name" value="" placeholder="Họ tên học viên"><br>
    Khoa* <br>
    <select name="select">
        <option value="1">Công nghệ thông tin</option>
        <option value="2">Ngôn ngữ</option>
        <option value="3">Thiết kế đồ họa</option>
    </select><br>
    Số điện thoại* <br>
    <input type="text" name="numberphone" value="" placeholder="0987654321"><br>
    Email<br>
    <input type="email" name="email" placeholder="it-plus@gmail.com"><br>
    Địa chỉ*<br>
    <input type="text" name="address" placeholder="Địa chỉ học viên.."><br>
    <input type="submit" name="submit" value="Thêm mới" style="color: white; background-color: #377DB5">
</form>
<h3 style="color: red"><?php echo $error ?></h3>
