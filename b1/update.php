<?php
session_start();
/**
 *
 */
require_once "database.php";
if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    $_SESSION['error'] = 'id không hợp lệ';
    header('Location: index.php');
    exit();
}
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
$id = $_GET['id'];
?>
<?php
    $sql_select_one = "SELECT * FROM students WHERE id = $id";
    $obj_select_one = $connection->prepare($sql_select_one);
    $obj_select_one->execute();
    $student = $obj_select_one->fetch(PDO::FETCH_ASSOC);
?>
<?php
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $avatar_arr = $_FILES['avatar'];
    $description = $_POST['description'];
//        echo "<pre>";
//        print_r($avatar_arr);
//        echo "</pre>";

    if (empty($_POST['name']) || empty($age)){
        $error = 'Phải nhập tên và tuổi';
    } elseif ($avatar_arr['error']==0){
        $extention = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);// Lấy đuôi filename
        $extention = strtolower($extention);
        $allowed = ['jpg','jpeg','png','gif'];
        if (!in_array($extention,$allowed)){
            $error = 'File avatar phải là ảnh';
        }
        $size_mb = $avatar_arr['size']/1024/1024;
        $size_mb = round($size_mb,2);
        if ($size_mb>2){
            $error = 'Dung lượng ảnh phải nhỏ hơn 2 MB';
        }
    }
    if (empty($error)){
        $avatar =$student['avatar'];
        if ($avatar_arr['error'] == 0){
            @unlink('uploads/' .$avatar);
            $dir_upload = 'uploads';
//            if (!file_exists($dir_upload)){
//                mkdir($dir_upload);
//            }
            $avatar = time(). "-" . $avatar_arr['name'];

            move_uploaded_file($avatar_arr['tmp_name'],"$dir_upload/$avatar");

        }
        $sql_update = "UPDATE students SET name = :name, age = $age, avatar = :avatar, description = :description where id = $id";
        $obj_update = $connection->prepare($sql_update);
        $arr_update = [
            ':name' => $name,
            ':avatar' => $avatar,
            ':description' =>$description
        ];
        $is_update = $obj_update->execute($arr_update);
//            var_dump($is_insert);
        if ($is_update){
            $_SESSION['success'] = 'Chỉnh sửa thành công';
            header("Location: index.php");
            exit();
        } else{
            $_SESSION['error'] = "Chỉnh sửa thất bại";
        }

    }
}
?>

<a href="index.php">Về trang danh sách</a>
<form action="" method="POST" enctype="multipart/form-data">
    Họ tên: <input type="text" name="name" value="<?php echo $student['name'];?>" class="create_form"><br>
    Tuổi: <input type="text" name="age" value="<?php echo $student['age'];?>" class="create_form"><br>
    <img src="uploads/<?php echo $student['avatar'];?>" height="100px">
    <br>
    Ảnh đại diện:  <input type="file" name="avatar" class="create_form"> <br>
    Mô tả sinh viên: <textarea name="description" placeholder="" id="" cols="25" rows="5" class="create_form"><?php echo $student['description'];?></textarea>
    <br>
    <input type="submit" name="submit" value="Lưu">
    <input type="reset" name="reset" value="Hủy">
</form>
