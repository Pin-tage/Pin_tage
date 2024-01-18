<?php
    include('./db_conn.php');

    // POST 데이터 가져오기
    $brand_name = $_POST['brand_name'];
    $brand_guide = $_POST['brand_guide'];
    $brand_tag = $_POST['brand_tag'];

    // 이미지 파일 처리
    $brand_img_temp = $_FILES['brand_img']['tmp_name'];
    $brand_img_name = $_FILES['brand_img']['name'];
    $brand_img_path = "upload/" . $brand_img_name; // 저장될 경로 및 파일명

    // 파일 업로드
    if (move_uploaded_file($brand_img_temp, $brand_img_path)) {
        // SQL 쿼리 작성
        $sql = "INSERT INTO brandshop (brand_name, brand_guide, brand_img, brand_tag) VALUES (?, ?, ?, ?)";
        
        // 쿼리 실행
        $stmt = $conn->prepare($sql);

        // 쿼리 실행이 성공했는지 확인
        if ($stmt) {
            // bind_param 사용
            $stmt->bind_param("ssss", $brand_name, $brand_guide, $brand_img_path, $brand_tag);
            
            // bind_param이 제대로 되었는지 확인
            if ($stmt->execute()) {
                echo "브랜드 정보가 성공적으로 등록되었습니다.";
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
