<?php

include('db_conn.php');

if(isset($_POST['user_name'])&&isset($_POST['emailPrefix'])&&isset($_POST['emailDomain'])&&isset($_POST['user_id'])&&isset($_POST['user_pw'])&&isset($_POST['confirmPassword']))    //isset: 변수가 null인지 아닌지 확인
{
    //보안 mysqli_real_escape_string : 인젝션 공격을 막아줌
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $emailPrefix = $_POST['emailPrefix'];
    $emailDomain = $_POST['emailDomain'];
    $email = $emailPrefix . "@" . $emailDomain;
    $user_email = mysqli_real_escape_string($conn, $email);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $pass = mysqli_real_escape_string($conn, $_POST['user_pw']);
    $confirmPassword = mysqli_real_escape_string($conn , $_POST['confirmPassword']);
   
    //가입 오류 체크
    $check_email = filter_var($user_email, FILTER_VALIDATE_EMAIL);

    if($check_email === false)
    {
        echo "<script>
        alert('이메일 형식이 올바르지 않습니다');
        location.replace('signup_test.php');
        </script>";
    }
    else if($pass !== $confirmPassword) 
    {
        echo "<script>
        alert('비밀번호가 일치하지 않습니다');
        location.replace('signup.html');
        </script>";
    }
    else 
    {
        //비밀번호 암호화 
        $user_pw = password_hash($pass, PASSWORD_DEFAULT);

        //이메일, 아이디 중복 검사
        $sql_same_email = "SELECT * FROM users where user_email ='$user_email'";
        $email_order = mysqli_query($conn, $sql_same_email);
        
        if (mysqli_num_rows($email_order) > 0) 
        {
            echo "<script>
            alert('이미 존재하는 이메일입니다');
            location.replace('signup.html');
            </script>";
        }
        else 
        {
            //db로 정보를 넘김
            $sql_save = "insert into users(user_name, user_email, user_id, user_pw) values('$user_name','$user_email','$user_id','$user_pw')";
            $result = mysqli_query($conn, $sql_save);

            if($result)
            {
                echo "<script>
                alert('가입이 성공적으로 완료되었습니다.');
                </script>";
            }
            else 
            {
                $error_message = mysqli_error($conn);
                echo "<script>
                alert('가입에 실패하였습니다');
                location.replace('signup.html');
                </script>";
            }
        }
    }
}
else {
    $error_message = mysqli_error($conn);
    echo "<script>
    alert('알 수 없는 오류가 발생하였습니다');
    </script>";
}


?>