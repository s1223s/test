<?php 
$result = array();
$province_id = isset($_POST['province_id'])?intval($_POST['province_id']):0;
// $province_id = 3;
$con = new mysqli('localhost','root','','test');
if ($con->connect_error) {
    die("链接失败");
}
$con->query("set names utf8");
$sql = "SELECT * from com_city where province_id = $province_id and in_use = 1;";
$ret = $con->query($sql);
if ($ret->num_rows > 0) {
    while ($row = $ret->fetch_assoc()) {
        $temp = array();
        $temp['id'] = $row['id'];
        $temp['name'] = $row['name'];
        $result[] = $temp;
    }
}
$con->close();
echo json_encode($result);
 ?>
