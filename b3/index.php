<?php
session_start();
require_once "database.php";
?>
<h3 style="color: blue">
<?php
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
?>
</h3>
<h3 style="color: red">
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<?php
$sql_select_all = "SELECT * FROM tbl_product INNER JOIN tbl_cate ON tbl_cate.id_cate = tbl_product.id_cate ORDER BY id ASC";
$obj_select_all = $connection->prepare($sql_select_all);
$obj_select_all->execute();
$products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
//echo "<pre>";
//print_r($products);
//echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<div style="text-align: center">
    <h4>Quản lý Đồng hồ</h4>
    <img src="banner.jpg" height="300px">
    <table style="margin-left: auto; margin-right: auto" border="1" cellpadding="8px" cellspacing="0px">
        <tr>
            <th>STT</th>
            <th>Tên đồng hồ</th>
            <th>Thương hiệu</th>
            <th>Giá tiền</th>
            <th>Ngày đăng</th>
            <th>Chức năng</th>
        </tr>
        <?php foreach ($products AS $product):
//            echo "<pre>";
//            print_r($product);
//            echo "</pre>";
            ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['name_cate']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['date_create']; ?></td>
                <td>
                    <a id="detail" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Xem</a>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Thông tin chi tiết sản phẩm</h4>
                                </div>
                                <div class="modal-body">
                                    <?php echo $product['description']?>;
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <a id="delete" type="button" class="btn btn-danger" href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm(('Xóa sản phẩm này?'))">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</html>
