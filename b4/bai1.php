<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<?php
require_once 'db.php';
session_start()
?>

<?php

?>

<img src="anh1.jpg" style="width: 800px; height: 200px">
<div style="display: flex">
    <div>
        <table>
            <tr>
                <th>Quản thị học viên</th>
            </tr>
            <tr>
                <td><a href="#" id="infor">Quản thị học viên</a></td>
            </tr>
            <tr>
                <td><a href="#" >Danh sách khoa</a></td>
            </tr>
            <tr>
                <td><a href="#" id="create">Thêm mới</a></td>
            </tr>
        </table>
    </div>
    <div id="result">

    </div>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // alert('wedding');
        // Click vào thẻ a sẽ gọi ajax
        $('#create').click(function () {
            // Tạo 1 đối tượng ajax
            var obj_ajax = {
                // url PHP gửi data từ ajax lên
                url:'create.php',
                // Phương thức truyền dữ liệu: post/get
                method: 'POST',
                //data gửi lên PHP, Với chức năng liệt kê sp thì ko cần data truyền
                // ->demo
                data:{
                    name: 'Quyen',
                    age: 19,
                    address: 'HB'
                },
                // Hàm chứa kết quả trả về từ PHP
                // Tham số data(đặt tên tùy ý)
                success: function (data) {
                    console.log(data);
                    // Xử lý kết quả trả về từ PHP thông qua tham số data
                    // Hiển thị nội dung vào selector
                    $('#result').html(data);
                }

            };
            // Cách debug ajax inspectHTML->Network
            // Gọi Ajax theo cú pháp của jQuery
            $.ajax(obj_ajax);
        });
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        // alert('wedding');
        // Click vào thẻ a sẽ gọi ajax
        $('#infor').click(function () {
            // Tạo 1 đối tượng ajax
            var obj_ajax = {
                // url PHP gửi data từ ajax lên
                url:'danhsach.php',
                // Phương thức truyền dữ liệu: post/get
                method: 'POST',
                //data gửi lên PHP, Với chức năng liệt kê sp thì ko cần data truyền
                // ->demo
                data:{
                    name: 'Quyen',
                    age: 19,
                    address: 'HB'
                },
                // Hàm chứa kết quả trả về từ PHP
                // Tham số data(đặt tên tùy ý)
                success: function (data) {
                    console.log(data);
                    // Xử lý kết quả trả về từ PHP thông qua tham số data
                    // Hiển thị nội dung vào selector
                    $('#result').html(data);
                }

            };
            // Cách debug ajax inspectHTML->Network
            // Gọi Ajax theo cú pháp của jQuery
            $.ajax(obj_ajax);
        });
    })
</script>