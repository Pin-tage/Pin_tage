<?php
include('./db_conn.php');

// POST 데이터 가져오기
$shop_name = $_POST['shop_name'] ?? '';
$shop_guide = $_POST['shop_guide'] ?? '';
$opening_time = $_POST['opening_time'] ?? '';
$closing_time = $_POST['closing_time'] ?? '';
$shop_location = $_POST['shop_location'] ?? ''; 
$tag_region = $_POST['tag_region'] ?? '';
$tag_location = $_POST['tag_location'] ?? '';
$tag_style = $_POST['tag_style'] ?? '';
$tag_brand = $_POST['tag_brand'] ?? '';
$tag_category = $_POST['tag_category'] ?? '';
$price_min = $_POST['price_min'] ?? '';
$price_max = $_POST['price_max'] ?? '';

// 이미지 파일 처리
$shop_img_temp = $_FILES['image']['tmp_name'];
$shop_img_name = $_FILES['image']['name'];
$shop_img_path = "upload/" . $shop_img_name; // 저장될 경로 및 파일명

// 파일 업로드
if (move_uploaded_file($shop_img_temp, $shop_img_path)) {
    // SQL 쿼리 작성
    $sql = "INSERT INTO vintageshop (shop_name, shop_guide, opening_time, closing_time, shop_location, shop_img_path, tag_region, tag_location, tag_style, tag_brand, tag_category, price_min, price_max) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // 쿼리 실행
    $stmt = $conn->prepare($sql);

    // 쿼리 실행이 성공했는지 확인
    if ($stmt) {
        // bind_param 사용
        $stmt->bind_param("sssssssssssss", $shop_name, $shop_guide, $opening_time, $closing_time, $shop_location, $shop_img_path, $tag_region, $tag_location, $tag_style, $tag_brand, $tag_category, $price_min, $price_max);
        
        // bind_param이 제대로 되었는지 확인
        if ($stmt->execute()) {
            echo "매장 정보가 성공적으로 등록되었습니다.";
        } else {
            // execute가 실패한 경우 오류 출력
            echo "쿼리 실행 실패: " . $stmt->error;
        }
    } else {
        // 쿼리 실행에 실패한 경우 오류 출력
        echo "쿼리 준비 실패: " . $conn->error;
    }
} else {
    echo "파일 업로드 실패";
}

// 연결 종료
$stmt->close();
$conn->close();
?>
