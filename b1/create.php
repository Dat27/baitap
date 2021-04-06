<?php
session_start();
require_once 'database.php';
?>

<?php
//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//echo "</pre>";


$error = '';
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
            $avatar ='';
            if ($avatar_arr['error'] == 0){
                $dir_upload = 'uploads';
                if (!file_exists($dir_upload)){
                    mkdir($dir_upload);
                }
                $avatar = time(). "-" . $avatar_arr['name'];

                move_uploaded_file($avatar_arr['tmp_name'],"$dir_upload/$avatar");

            }
            $sql_insert = "INSERT INTO students (name, age, avatar, description) VALUES (:name ,$age,:avatar, :description)";
            $obj_insert = $connection->prepare($sql_insert);
//            echo "<pre>";
//            print_r($obj_insert);
//            echo "</pre>";
//            echo $name;
//            echo $avatar;
//            echo $description;
            $arr_insert = [
                ':name' => $name,
                ':avatar' => $avatar,
                ':description' =>$description
            ];
            $is_insert = $obj_insert->execute($arr_insert);
//            var_dump($is_insert);
              if ($is_insert){
                  $_SESSION['success'] = 'Thêm mới thành công';
                  header("Location: index.php");
                  exit();
              } else{
                  $_SESSION['error'] = "Thêm mới thất bại";
              }

        }
    }

require_once 'layout_create.html';
?>