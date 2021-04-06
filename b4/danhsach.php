<?php
/**
 *
 */
require_once 'db.php';
// Xử lý lấy dữ liệu từ bảng products
//      + Viết truy vấn: Theo thứ tự giảm dần của ngày tạo
$sql_select_all = "SELECT * FROM tbl_student ORDER BY time_create DESC";
//  + Thực thi truy vấn
$obj_result_all = mysqli_query($connection, $sql_select_all);
//  + Lấy dữ liệu trả về dưới dạng mảng kết hợp
$products = mysqli_fetch_all($obj_result_all, MYSQLI_ASSOC);
//echo "<pre>";
//print_r($product);
//echo "</pre>";
?>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>#_CODE</th>
        <th>Name</th>
        <th>Faculty</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>

    </tr>
    <?php foreach ($products AS $product): ?>
    <tr>
        <td><?php echo $product['id_student']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['id_faculty']; ?></td>
        <td><?php echo $product['phone']; ?></td>
        <td><?php echo $product['email']; ?></td>
        <td><?php echo $product['addres']; ?></td>
        <td>
                <?php

                $url_update = "update.php?id=" . $product['id_student'];
                $url_delete = "delete.php?id=" . $product['id_student'];
                ?>

                <a href="<?php echo $url_update;?>">Sửa</a>
                <a href="<?php echo $url_delete;?>" onclick="return confirm('Xóa dữ liệu?')">Xóa
            </td>

    <?php endforeach; ?>