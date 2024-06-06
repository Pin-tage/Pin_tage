<?php 
include('db_conn.php');
session_start();

// echo "<script>alert('User ID: " . $_SESSION['user_id'] . "');</script>" 세션 확인용
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYPAGE</title>
    <link rel="stylesheet" href="./css/mypage.css">

    <!-- 부트스트랩 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- 산돌구름 폰트 -->
    <script type="module" src="https://8fl3k30sy0.execute-api.ap-northeast-2.amazonaws.com/v1/api/fontstream/djs/?sid=gAAAAABlsHgJBHM1QHBIdMVd5ZQPii4NpDMf_Qs3jmFS5yt3_xJpQkJWj6G4pOi1XU3WVZc8ZhL3cnzME82ZgdxRheBEr_edqd3mvpja2g5UTyMvZ318m8QKGy0DEWyKHFL-owjPot0HXKViPw61I1yvg8SFrLRXb6LRnB1r-ASpwdwYSk-pKFR-AjjyUsNHhQgwKXdTXRNZSYBwdzD0lf0j2hJLR33glHxsMjxgxz0UXtK6u34ulMFFJsj03iwd21meQBSKY7Ax" charset="utf-8"></script>

    <!-- 구글폰트 -->
    <link href="https://fonts.googleapis.com/css?family=Cherry+Bomb" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Sniglet:wght@800&display=swap" rel="stylesheet">

    <!--favicon-->
    <link rel="icon" href="./favicon.png"> 

</head>
<body>

    <!--상단 nav-->
    <nav>
        <logo>
            <a href="./index.html">
                <img src="./assets/logo2.png">
            </a>   
        </logo>
        <menu>
            <ul>
                <li><a href="./index.html" class="top-nav">MAIN</a></li>
                <li><a href="./search.html" class="top-nav">SEARCH</a></li>
                <li><a href="./map.html" class="top-nav">PIN!MAP</a></li>
                <li><a href="./mypage_H.html" class="top-nav">MYPAGE</a></li>
            </ul>
        </menu>
        <!-- <input type="button" value="LOGIN" class="login-Btn"> -->
        <button type="submit" class="login-Btn">
            <a href="login.html">
                LOGIN
            </a>
        </button>
    </nav>

    <main>
        <div class="title">
            <h1><?php echo strtoupper($_SESSION['user_id']); ?>님</h1>
        </div>
    </main>

    <footer>
        <div class="contributor">
            <div class="jiwoo">
                <ul>
                    <li>김지우</li>
                    <li>📖 Backend Developer</li>
                    <li>🛠️ VScode / Github</li>
                    <li><a href="https://github.com/jiwoo1087">😺 깃허브</a></li>
                    <li>📩 s2205@e-mirim.hs.kr</li>
                </ul>
            </div>
            <div class="khyunji">
                <ul>
                    <li>김현지</li>
                    <li>📖 FullStack Developer</li>
                    <li>🛠️ VScode / FileZila / Github</li>
                    <li><a href="https://github.com/de-quei">😺 깃허브</a></li>
                    <li>📩 s2208@e-mirim.hs.kr</li>
                </ul>
            </div>
            <div class="heeyoung">
                <ul>
                    <li>김희영</li>
                    <li>📖 Frontend Developer</li>
                    <li>🛠️ VScode / Github</li>
                    <li><a href="https://github.com/gmldrnfl">😺 깃허브</a></li>
                    <li>📩 w2225@e-mirim.hs.kr</li>
                </ul>
            </div>
            <div class="nhyunji">
                <ul>
                    <li>노현지</li>
                    <li>📖 Designer</li>
                    <li>🛠️ Figma</li>
                    <li><a href="https://www.instagram.com/shgusw1/">🩷인스타그램</a></li>
                    <li>📩 d2204@e-mirim.hs.kr</li>
                </ul>
            </div>
        </div>
       
        <div class="footer-nav">
            <img src="./assets/logo2.png" style="width: 150px; margin-top: 20px;">
            <h4>TEAM カピバラ</h4>
        </div>
    </footer>
    
</body>
</html>