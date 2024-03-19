<?php 
    include('db_conn.php');

    if ($conn->connect_error) {
        die("연결 실패: " . $conn->connect_error);
    }

    // POST 요청에서 'textbox' 필드의 값을 가져옴
    $shop_name = $_POST['shop_name'];
    $shop_guide = $_POST['shop_guide'];
    $opening_time = $_POST['opening_time'];
    $closing_time = $_POST['closing_time'];
    $shop_location = $_POST['shop_location'];
    $tag_location = $_POST['tag_location'];
    $tag_style = $_POST['tag_style'];
    $tag_brand = $_POST['tag_brand'];
    $tag_category = $_POST['tag_category'];
    
    $sql = "INSERT INTO  vintageshop (shop_name, shop_guide, opening_time, closing_time, shop_location, tag_location, tag_style, tag_brand, tag_category) 
    VALUES ('$shop_name', '$guide', '$time_start', '$time_end', '$Location', '$tag_location', '$tag_style', '$tag_brand', '$tag_category')";

    if ($conn->query($sql) === TRUE) {
        echo "데이터가 성공적으로 삽입되었습니다.";
    } else {
        echo "데이터 삽입 오류: " . $conn->error;
    }

// 데이터베이스 연결 종료
$conn->close();


?>