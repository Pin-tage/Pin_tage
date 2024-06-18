<?php
include ('db_conn.php');
session_start();

// echo "<script>alert('User ID: " . $_SESSION['user_id'] . "');</script>" //세션 확인용
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYPAGE</title>
    <link rel="stylesheet" href="./css/mypage_H.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/footer.css">


    <!-- 부트스트랩 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <!-- 산돌구름 폰트 -->
    <script type="module"
        src="https://8fl3k30sy0.execute-api.ap-northeast-2.amazonaws.com/v1/api/fontstream/djs/?sid=gAAAAABlsHgJBHM1QHBIdMVd5ZQPii4NpDMf_Qs3jmFS5yt3_xJpQkJWj6G4pOi1XU3WVZc8ZhL3cnzME82ZgdxRheBEr_edqd3mvpja2g5UTyMvZ318m8QKGy0DEWyKHFL-owjPot0HXKViPw61I1yvg8SFrLRXb6LRnB1r-ASpwdwYSk-pKFR-AjjyUsNHhQgwKXdTXRNZSYBwdzD0lf0j2hJLR33glHxsMjxgxz0UXtK6u34ulMFFJsj03iwd21meQBSKY7Ax"
        charset="utf-8"></script>

    <!-- 구글폰트 -->
    <link href="https://fonts.googleapis.com/css?family=Cherry+Bomb" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Sniglet:wght@800&display=swap"
        rel="stylesheet">

    <!--favicon-->
    <link rel="icon" href="./favicon.png">

</head>

<style>
    .folder2 {
        display: none;
    }
</style>

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
                <li><a href="./search_test.php" class="top-nav">SEARCH</a></li>
                <li><a href="./map.php" class="top-nav">PIN!MAP</a></li>
                <li><a href="./mypage_H.php" class="top-nav">MYPAGE</a></li>
            </ul>
        </menu>
        <!-- <input type="button" value="LOGIN" class="login-Btn"> -->
        <button type="submit" class="login-Btn">
            <a href="login.html" style="color: #FF47CB; text-decoration: none;">
                LOGIN
            </a>
        </button>
    </nav>

    <!--메인-->
    <main>
        <img src="/assets/circle.png" alt="">
        <?php if (isset($_SESSION['user_id']) && $_SESSION['loggedin'] === true) { ?>
            <h1><?php echo strtoupper($_SESSION['user_id']); ?>님</h1>
        <?php } else { ?>
            <h2>로그인 시 이용 가능한 기능입니다.</h2>
        <?php } ?>
        <div class="folderContainer">
            <div class="tabConnection"></div>
            <div class="tab">
                <p>내가 등록한 후기</p>
            </div>
            <div class="tab">
                <p>내가 등록한 매장</p>
            </div>
            <div class="folder">
                <div class="albumDiv">
                    <div class="albumContainer" id="albumContainer1">
                        <div class="card">
                            <div class="corner-paper-curl"></div>
                            <div class="cardImg"><img src="./upload/image 9.png" alt=""></div>
                            <p class="cardTitle">2nd STREET</p>
                            <div class="cardHashtag_container">
                                <div class="cardHashtag">#오사카</div>
                                <div class="cardHashtag">#스트릿</div>
                                <div class="cardHashtag">#빈티지샵</div>
                            </div>
                            <div class="price"><img src="./akar-icons_coin.png" alt="">
                                <p>500 ~ 15,000¥</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="corner-paper-curl"></div>
                            <div class="cardImg"><img src="./upload/image 9 (1).png" alt=""></div>
                            <p class="cardTitle">WEGO</p>
                            <div class="cardHashtag_container">
                                <div class="cardHashtag">#교토</div>
                                <div class="cardHashtag">#모리걸</div>
                                <div class="cardHashtag">#요시다 포터</div>
                            </div>
                            <div class="price"><img src="./akar-icons_coin.png" alt="">
                                <p>1,000 ~ 4,500¥</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="corner-paper-curl"></div>
                            <div class="cardImg"><img src="./upload/image 9 (2).png" alt=""></div>
                            <p class="cardTitle">SOU • SOU 타비</p>
                            <div class="cardHashtag_container">
                                <div class="cardHashtag">#교토</div>
                                <div class="cardHashtag">#스트릿</div>
                                <div class="cardHashtag">#빔즈</div>
                            </div>
                            <div class="price"><img src="./akar-icons_coin.png" alt="">
                                <p>500 ~ 10,000¥</p>
                            </div>
                        </div>
                    </div>
                    <div class="albumContainer" id="albumContainer2">
                        <div class="card">
                            <div class="corner-paper-curl"></div>
                            <div class="cardImg"><img src="./upload/Grizzly.jpg" alt=""></div>
                            <p class="cardTitle">Grizzly</p>
                            <div class="cardHashtag_container">
                                <div class="cardHashtag">#오사카</div>
                                <div class="cardHashtag">#스트릿</div>
                                <div class="cardHashtag">#빈티지샵</div>
                            </div>
                            <div class="price"><img src="./akar-icons_coin.png" alt="">
                                <p>500 ~ 15,000¥</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="corner-paper-curl"></div>
                            <div class="cardImg"><img src="./upload/EL RODEO.jpg" alt=""></div>
                            <p class="cardTitle">EL RODEO</p>
                            <div class="cardHashtag_container">
                                <div class="cardHashtag">#오사카</div>
                                <div class="cardHashtag">#모리걸</div>
                                <div class="cardHashtag">#빈티지샵</div>
                            </div>
                            <div class="price"><img src="./akar-icons_coin.png" alt="">
                                <p>1,000 ~ 4,500¥</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="corner-paper-curl"></div>
                            <div class="cardImg"><img src="./upload/Jetrag.jpg" alt=""></div>
                            <p class="cardTitle">Jetrag</p>
                            <div class="cardHashtag_container">
                                <div class="cardHashtag">#교토</div>
                                <div class="cardHashtag">#캐주얼</div>
                                <div class="cardHashtag">#빈티지샵</div>
                            </div>
                            <div class="price"><img src="./akar-icons_coin.png" alt="">
                                <p>500 ~ 10,000¥</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="folder2">
                <div class="reviewContainer">
                    <div class="review">
                        <p class="reviewTitle">2nd STREET</p>
                        <div class="reviewHashtag_container">
                            <div class="reviewHashtag">#오사카</div>
                            <div class="reviewHashtag">#도쿄</div>
                            <div class="reviewHashtag">#스트릿</div>
                        </div>
                        <div class="reviewDate">
                            <p>2024-01-12</p>
                        </div>
                        <div class="reviewText">
                            <p>다양한 아이템들이 있어서 둘러보는 동안 즐거웠고 직원분들도 너무 친절하시고 추천도 잘 해주셔서 좋았습니다</p>
                        </div>
                    </div>
                    <div class="review">
                        <p class="reviewTitle">BBIRO</p>
                        <div class="reviewHashtag_container">
                            <div class="reviewHashtag">#도쿄</div>
                            <div class="reviewHashtag">#스트릿</div>
                            <div class="reviewHashtag">#빈티지샵</div>
                        </div>
                        <div class="reviewDate">
                            <p>2023-12-04</p>
                        </div>
                        <div class="reviewText">
                            <p>세련된 스타일이 많아서 좋아요</p>
                        </div>
                    </div>
                    <div class="review">
                        <p class="reviewTitle">Hamzi</p>
                        <div class="reviewHashtag_container">
                            <div class="reviewHashtag">#오사카</div>
                            <div class="reviewHashtag">#모리걸</div>
                            <div class="reviewHashtag">#빈티지샵</div>
                        </div>
                        <div class="reviewDate">
                            <p>2023-11-24</p>
                        </div>
                        <div class="reviewText">
                            <p>유니크하고 개성 있는 디자인의 가방이 많아요!</p>
                        </div>
                    </div>
                    <div class="review">
                        <p class="reviewTitle">XIKEY</p>
                        <div class="reviewHashtag_container">
                            <div class="reviewHashtag">#오사카</div>
                            <div class="reviewHashtag">#도쿄</div>
                            <div class="reviewHashtag">#스트릿</div>
                        </div>
                        <div class="reviewDate">
                            <p>2023-03-30</p>
                        </div>
                        <div class="reviewText">
                            <p>힙한 느낌의 제품들이 많고 직원분 스타일이 너무 멋지셨어요!</p>
                        </div>
                    </div>
                </div>

            </div>
    </main>

    <!-- 푸터 -->
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
            <div class="goeun">
                <ul>
                    <li>고은</li>
                    <li>📖 Frontend Developer</li>
                    <li>🛠️ VScode / Github</li>
                    <li><a href="https://github.com/Silversi06">😺 깃허브</a></li>
                    <li>📩 w2219@e-mirim.hs.kr</li>
                </ul>
            </div>
            <div class="hyobeen">
                <ul>
                    <li>홍효빈</li>
                    <li>📖 Frontend Developer</li>
                    <li>🛠️ VScode / Github</li>
                    <li><a href="https://github.com/honghyobin">😺 깃허브</a></li>
                    <li>📩 w234@e-mirim.hs.kr</li>
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


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll(".tab");
            const tabConnection = document.querySelector(".tabConnection");
            const folder1 = document.querySelector(".folder");
            const folder2 = document.querySelector(".folder2");

            tabs.forEach((tab, index) => {
                tab.addEventListener("click", function () {
                    tabs.forEach(tab => {
                        tab.style.backgroundColor = "#EBEBEB";
                        tab.querySelector('p').style.color = "#C6C6C6";
                    });

                    tab.style.backgroundColor = "#FCFCFC";
                    tab.querySelector('p').style.color = "#FF47CB";

                    if (index === 0) {
                        tabConnection.style.marginLeft = "802px";
                        folder1.style.display = "none";
                        folder2.style.display = "block";
                    } else {
                        tabConnection.style.marginLeft = "0";
                        folder1.style.display = "block";
                        folder2.style.display = "none";
                    }
                });
            });
        });
    </script>


</body>

</html>