<?php

session_start();
include('db_conn.php');

// 데이터베이스 연결 오류 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
    exit();
}

// 로그인 폼에서 전송된 사용자 아이디와 비밀번호
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

// 사용자 인증을 위한 SQL 쿼리
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);

// 사용자 인증
if ($result->num_rows > 0) {        //이 메서드는 결과 집합의 행 수를 반환. 즉, 해당 쿼리로 검색된 레코드의 수를 의미함.
    // 사용자가 존재하면 비밀번호 검사
    $user = $result->fetch_assoc();     //이 메서드는 결과 집합에서 현재 행을 연관 배열 형태로 반환. 즉, 현재 결과 집합의 행을 연관 배열로 가져옴.
    if (password_verify($user_pw, $user['user_pw'])) {
        // 인증 성공 시 세션에 사용자 아이디 저장
        $_SESSION['user_id'] = $user_id;
        $_SESSION['loggedin']= true;
        // 로그인 성공 메시지 출력 후 홈페이지로 리다이렉트
        echo "<script>alert('로그인 성공'); location.replace('index.php');</script>";
    } else {
        // 비밀번호가 일치하지 않는 경우 로그인 실패
        echo "<script>alert('아이디 또는 비밀번호가 올바르지 않습니다.'); window.history.back();</script>";
    }
} else {
    // 사용자가 존재하지 않는 경우 로그인 실패
    echo "<script>alert('존재하지 않는 아이디 입니다.'); window.history.back();</script>";
}



// 데이터베이스 연결 닫기
$conn->close();

?>
