<?php
/**
 * Created by PhpStorm.
 * User: dattk
 * Date: 15/03/2021
 * Time: 12:19 SA
 */
?>
<h3 style="color: red"><?php
    if (isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<h3 style="color: lime"><?php
    if (isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>

<a href="create.php">Thêm mới sinh viên</a>
    <table border="1" cellspacing="0" cellpadding ="0">
        <tr>
            <th>Id</th>
            <th>Họ tên</th>
            <th>Tuổi</th>
            <th>Ảnh đại diện</th>
            <th>Mô tả sinh viên</th>
            <th></th>
        </tr>
        <?php
            foreach ($students AS $student):
        ?>
        <tr>
            <td><?php echo $student['id'];?></td>
            <td><?php echo $student['name'];?></td>
            <td><?php echo $student['age'];?></td>
            <td><img src="uploads/<?php echo $student['avatar'] ?>" height="80px" ></td>
            <td><?php echo $student['description'];?></td>
        <?php
        $url_detail = "detail.php?id=" . $student['id'];
        $url_update = "update.php?id=" . $student['id'];
        $url_delete = "delete.php?id=" . $student['id'];
        ?>
            <td>
                <a href="<?php echo $url_detail;?>">Chi tiết</a>
                <a href="<?php echo $url_update;?>">Sửa</a>
                <a href="<?php echo $url_delete;?>" onclick="return confirm('Xóa dữ liệu?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>