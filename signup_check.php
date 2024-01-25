//아이디 중복 체크

<?php
include('db_conn.php'); // 데이터베이스 연결 파일

if (isset($_POST['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    // 아이디 중복 확인
    $sql_same_id = "SELECT * FROM users WHERE user_id = '$user_id'";
    $id_order = mysqli_query($conn, $sql_same_id);

    if (mysqli_num_rows($id_order) == 0)
    {
        echo "사용 가능한 아이디 입니다";
    } 
    else if (mysqli_num_rows($id_order) > 0 )
    {
        echo "이미 존재하는 아이디입니다";
    }
}    
else 
{
    echo "아이디를 전달받지 못했습니다";
}
?>
