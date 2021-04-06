<?php
session_start();
require_once 'database.php';
?>

<?php
//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//echo "</pre>";
$error ='';
    if (isset($_POST['submit'])){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $avatar_arr = $_FILES['avatar'];
        $content = $_POST['content'];
        if (empty($title) || empty($price)){
            $error = "Tên và giá sản phẩm không được để trống";
        } elseif (!is_numeric($price)){
            $error = "Giá sản phẩm phải là số";
        } elseif ($avatar_arr['error'] == 0){
            $extention = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
            $extention = strtolower($extention);
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($extention,$allowed)){
                $error = 'File tải lên phải là ảnh';
            }
            $size_mb = $avatar_arr['size']/1024/1024;
            $size_mb = round($size_mb,2);
            if ($size_mb>2){
                $error = 'Dung lượng ảnh phải nhỏ hơn 2MB';
            }
        }
        if (empty($error)){
            $avatar = '';
            if ($avatar_arr['error'] == 0){
                $dir_upload = 'uploads';
                if (!file_exists($dir_upload)){
                    mkdir($dir_upload);
                }
                $avatar = time(). "-" . $avatar_arr['name'];
                move_uploaded_file($avatar_arr['tmp_name'], "$dir_upload/$avatar");
            }
            $sql_insert = "INSERT INTO products (title, price, avatar, content) VALUES (:title, $price, :avatar, :content)";
            $obj_insert = $connection->prepare($sql_insert);
//            echo "<pre>";
//            print_r($obj_insert);
//            echo "</pre>";
//            echo $title;
//            echo $avatar;
//            echo $content;
            $arr_insert = [
              ':title' => $title,
              ':avatar' => $avatar,
              ':content' => $content,
            ];
            $is_insert = $obj_insert->execute($arr_insert);
//            var_dump($is_insert);
            if ($is_insert){
                $_SESSION['success'] = 'Thêm mới thành công';
                header("Location: index.php");
                exit();
            } else{
                $_SESSION['error'] = "Thêm mới thất bại";
                echo $_SESSION['error'];
            }
        }
    }




require_once 'layout_create.html';
