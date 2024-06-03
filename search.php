<? php

include('db_conn.php');

// 데이터베이스 연결 오류 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}


$shop_name = $_POST['shop_name'];
$tag_location = $_POST['tag_location'];
$tag_style = $_POST['tag_style'];
$price_min = $_POST['price_min'];
$price_max = $_POST['price_max'];




?>