<?php

include('db_conn.php');

if(isset($_POST['user_name'])&&isset($_POST['emailPrefix'])&&isset($_POST['emailDomain'])&&isset($_POST['user_id'])&&isset($_POST['pass'])&&isset($_POST['confirmPassword']))    //isset: 변수가 null인지 아닌지 확인
{
    //보안 mysqli_real_escape_string : 인젝션 공격을 막아줌
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = $_POST['emailPrefix']."@".$_POST['emailDomain'];
    $user_email = mysqli_real_escape_string($conn, $email);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $confirmPassword = mysqli_real_escape_string($conn , $_POST['confirmPassword']);


    //가입 오류 체크
    // $check_email = filter_var($user_email, FILTER_VALIDATE_EMAIL);
    $check_email=preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email);

    if(empty($user_name))
    {
        echo "<script>
        alert('이름이 비어있습니다');
        location.replace('signup.html');
        </script>";
    }
    else if(empty($user_email))
    {
        echo "<script>
        alert('이메일이 비어있습니다');
        location.replace('signup.html');
        </script>";
    }
    else if($check_email === false)
    {
        echo "<script>
        alert('이메일 형식이 올바르지 않습니다');
        location.replace('signup.html');
        </script>";
    }
    else if(empty($user_id))
    {
        echo "<script>
        alert('아이디가 비어있습니다');
        location.replace('signup.html');
        </script>";
    }
    else if(empty($pass))
    {
        echo "<script>
        alert('비밀번호가 비어있습니다');
        location.replace('signup.html');
        </script>";
    }
    else if(empty($confirmPassword))
    {
        echo "<script>
        alert('비밀번호 확인이 비어있습니다');
        location.replace('signup.html');
        </script>";
    }
    else if($pass != $confirmPassword) 
    {
        echo "<script>
        alert('비밀번호가 일치하지 않습니다');
        location.replace('signup.html');
        </script>";
    }
    else 
    {
        //비밀번호 암호화 
        $user_pass = password_hash($pass, PASSWORD_DEFAULT);

        //아이디, 이메일 중복 확인
        $sql_same_id = "SELECT * FROM users where user_id= '$user_id'";     //sql에 명령
        $sql_same_email = "SELECT * FROM users where user_email ='$user_email'";
        $id_order = mysqli_query($conn, $sql_same_id);
        $email_order = mysqli_query($conn, $sql_same_email);
       
        if(mysqli_num_rows($id_order) > 0)
        {
            echo "<script>
            alert('이미 존재하는 아이디입니다');
            location.replace('signup.html');
            </script>";
        }
        else if(mysqli_num_rows($id_order) <= 0)
        {
            echo "<script>
            alert('사용 가능한 아이디입니다');
            location.replace('signup.html');
            </script>";
        }
        else if(mysqli_num_rows($email_order) > 0)
        {
            echo "<script>
            alert('이미 존재하는 이메일입니다');
            location.replace('signup.html');
            </script>";
        }
        else 
        {
            //db로 정보를 넘김
            $sql_save = "insert into users(user_name, user_email, user_id, user_pw) values('$user_name','$user_email','$user_id','$user_pass')";
            $result = mysqli_query($conn, $sql_save);

            if($result)
            {
                echo "<script>
                alert('가입이 성공적으로 완료되었습니다.');
                </script>";
            }
            else 
            {
                echo "<script>
                alert('가입에 실패하였습니다: " . mysqli_error($conn) . "');
                // location.replace('signup.html');
                </script>";
            }
        }
    }
}
else {
    echo "<script>
    alert('알 수 없는 오류가 발생하였습니다');
    location.replace('signup.html');
    </script>";
}


?>