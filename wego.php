<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/search.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script type="module"
        src="https://8fl3k30sy0.execute-api.ap-northeast-2.amazonaws.com/v1/api/fontstream/djs/?sid=gAAAAABlsHgJBHM1QHBIdMVd5ZQPii4NpDMf_Qs3jmFS5yt3_xJpQkJWj6G4pOi1XU3WVZc8ZhL3cnzME82ZgdxRheBEr_edqd3mvpja2g5UTyMvZ318m8QKGy0DEWyKHFL-owjPot0HXKViPw61I1yvg8SFrLRXb6LRnB1r-ASpwdwYSk-pKFR-AjjyUsNHhQgwKXdTXRNZSYBwdzD0lf0j2hJLR33glHxsMjxgxz0UXtK6u34ulMFFJsj03iwd21meQBSKY7Ax"
        charset="utf-8"></script>


    <link href="https://fonts.googleapis.com/css?family=Cherry+Bomb" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Sniglet:wght@800&display=swap"
        rel="stylesheet">
    <style>
        nav {
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 10;
            background: transparent;
        }
    </style>
</head>

<body>

    <?php

    include ('db_conn.php');

    // 데이터베이스 연결 오류 확인
    if ($conn->connect_error) {
        echo "<script>console.error('데이터베이스 연결 실패: " . addslashes($conn->connect_error) . "');</script>";
    }

    $sql = "SELECT shop_name, tag_location, tag_style, tag_brand, shop_img_path, price_min, price_max, opening_time, closing_time, shop_guide FROM vintageshop";
    $result = $conn->query($sql); // 쿼리 실행
    
    if (!$result) {
        echo "<script>console.error('쿼리 실행 실패: " . addslashes($conn->error) . "');</script>";
    }

    $row = $result->fetch_assoc(); // 단일 결과 행을 가져옴
    if (!$row) {
        echo "<script>console.error('데이터를 찾을 수 없습니다.');</script>";
        exit();
    }
    ?>
    <nav>
        <logo>
            <a href="./index.html">
                <img src="./assets/logo.png">
            </a>
        </logo>
        <menu>
            <ul>
                <li><a href="./index.php" class="top-nav">MAIN</a></li>
                <li><a href="./search_test.php" class="top-nav">SEARCH</a></li>
                <li><a href="./map.php" class="top-nav">PIN!MAP</a></li>
                <li><a href="./mypage_H.php" class="top-nav">MYPAGE</a></li>
            </ul>
        </menu>
        <button type="submit" class="login-Btn">
            <a href="login.html" style="color: #fff; text-decoration: none;">
                LOGIN
            </a>
        </button>
    </nav>

    <div class="carousel-container">
        <div class="owl-carousel owl-theme">
            <div class="item"><img src="./assets/wego.png"></div>
            <div class="item"><img src="./assets/wego2.png"></div>
            <div class="item"><img src="./assets/wego3.png""></div>
        </div>

        <!-- 왼쪽 화살표 이미지 -->
        <img src="./assets/left-scroll.svg" class="left-arrow">

        <!-- 오른쪽 화살표 이미지 -->
        <img src="./assets/right-scroll.svg" class="right-arrow">
    </div>

    <main>
        <div class="top-detail">
            <div class="intro">
                <h1 class="title">WEGO<img src="./upload/bxs-heart.svg.svg" class="heart-icon"></h1>
                <p>WEGO는 일본의 인기 빈티지샵으로, 주로 도쿄의 하라주쿠 지역에 위치하고 있습니다. 1994년에 설립된 WEGO는 젊은 층을 대상으로 한 다양한 스타일의 빈티지 및 스트리트 패션 아이템을 판매합니다. 독특한 디자인과 합리적인 가격으로 많은 패션 애호가들에게 사랑받고 있으며, 일본뿐만 아니라 해외에서도 많은 팬을 보유하고 있습니다. WEGO는 트렌디한 의류뿐만 아니라 액세서리, 신발 등 다양한 패션 아이템을 제공합니다.</p>
                <div class="hashtags">
                    <span>#교토</span>
                    <span>#모리걸</span>
                    <span>#요시다_포터</span>
                </div>
            </div>
            <div class="web-detail">
                <div class="location"><span class="iconify" data-icon="mdi:map-marker" data-inline="false"
                        style="color: #FF47CB;"></span> 〒150-0001 Tokyo, Shibuya City, Jingumae, 1 Chome−8−2 原宿 Solado Takeshita-dori, 地下１階</div>
                <div class="time"><span class="iconify" data-icon="fluent:clock-24-filled" data-inline="false"
                        style="color: #FF47CB;"></span>매일 10:00AM ~ 9:00PM</div>
                <div class="website"><span class="iconify" data-icon="mdi:web" data-inline="false"
                        style="color: #FF47CB;"></span>wego.jp
                </div>
                <div class="call"><span class="iconify" data-icon="bx:bxs-phone-call" data-inline="false"
                        style="color: #FF47CB;"></span> 0184-87-5760</div>
                <div class="sell"><span class="iconify" data-icon="mdi:currency-jpy" data-inline="false"
                        style="color: #FF47CB;"></span>1000¥ ~ 15000¥
                </div>
            </div>


        </div>

        <div class="reviews">
            <h2>후기</h2>
            <form id="reviewForm">
                <textarea id="reviewInput" placeholder="후기를 입력하세요..."></textarea>
                <button type="submit">입력</button>
            </form>
            <div id="reviewList">
                <!--후기는 추가하면 여기 떠요-->
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                items: 1
            });

            // 왼쪽 화살표 클릭 시
            $('.left-arrow').click(function () {
                owl.trigger('prev.owl.carousel');
            });


            $('.right-arrow').click(function () {
                owl.trigger('next.owl.carousel');
            });


            $('#reviewForm').submit(function (event) {
                event.preventDefault();


                var reviewText = $('#reviewInput').val();


                if (reviewText.trim() !== '') {
                    var newReview = '<div class="review-item">' +
                        '<p>' + reviewText + '</p>' +
                        '</div>';
                    $('#reviewList').append(newReview);
                    $('#reviewInput').val('');
                }
            });

        });
    </script>
</body>

</html>