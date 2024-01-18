<?php
    //테스트 커밋
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // db_conn.php 파일을 포함
    include('./db_conn.php');

    // 데이터베이스에서 정보를 가져오는 쿼리 작성 (brandshop 테이블에서 모든 브랜드 가져오기)
    $sql = "SELECT * FROM brandshop";
    $result = $conn->query($sql);

    // 가져온 데이터를 출력
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<img src="data:image/png;base64,'.base64_encode($row['brand_img']).'" alt="Image" style="width: 100px; height: 100px;">'."<br>";
            echo $row["brand_name"] . "<br>";
            echo $row["brand_tag"] . "<br><br>";
        }
    } else {
        echo "0 개의 결과";
    }

    // MySQL 연결 닫기
    $conn->close();
?>