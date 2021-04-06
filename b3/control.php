

<?php
session_start();
    $in = [];
    $sum = 0;
    $re = [];
function getSums($into,$result){
    for ($i=0;$i<count($into);$i++){
        $sum = array_sum($into) - $into[$i];
        $result[$i] = $sum;
    }
    echo "<pre>";
    print_r($result);
    echo "<pre>";
}
?>
<form action="" method="post">
<?php
 for ($i=0;$i<$_SESSION['count'];$i++){
    echo "phan tu thu $i= <input type='number' name=$i> <br>";
 }
 echo "<input type='submit' value='Tinh' name='sum'>";
if (isset($_POST['sum'])){
    for ($i=0;$i<$_SESSION['count'];$i++){
        $in[$i] = $_POST["$i"];
    }
//    var_dump($in);
    echo " <br>Ket qua phep toan:";
    getSums($in,$re);
}
?>
</form>
