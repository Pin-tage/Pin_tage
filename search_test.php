<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png"> <!--favicon-->
    <link href="https://fonts.googleapis.com/css?family=Cherry+Bomb" rel="stylesheet"> <!--상단 내비 폰트-->
    <link rel="stylesheet" href="./css/search_test.css">
    <title>SEARCH</title>
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
                <li class="nav-element"><a href="./index.html" class="top-nav">MAIN</a></li>
                <li><a href="./search_test.html" class="top-nav">SEARCH</a></li>
                <li class="nav-element"><a href="./map.html" class="top-nav">PIN!MAP</a></li>
                <li class="nav-element">MY</li>
            </ul>
        </menu>
        <!-- <input type="button" value="LOGIN" class="login-Btn"> -->
        <button type="submit" class="login-Btn">
            <a href="login.html">
                LOGIN
            </a>
        </button>
    </nav>

    <?php

    include ('db_conn.php');

    // 데이터베이스 연결 오류 확인
    if ($conn->connect_error) {
        echo "<script>console.error('데이터베이스 연결 실패: " . addslashes($conn->connect_error) . "');</script>";
    }

    $sql = "SELECT shop_name, tag_location, tag_style, tag_brand, shop_img_path, price_min, price_max FROM vintageshop";
    $result = $conn->query($sql); // 쿼리 실행
    
    if (!$result) {
        echo "<script>console.error('쿼리 실행 실패: " . addslashes($conn->error) . "');</script>";
    }
    ?>


    <!-- 상단 글 -->
    <main>
        <div class="title">
            <h1 class="">검색</h1>
            <p style="margin: 10px;">필터를 설정해 나에게 딱 맞는 매장을 찾아보세요.</p>
        </div>
        <div class="brandshop-box">

            <section class="search">
                <div class="filters">
                    <div class="filters-buttons">
                        <button>검색 필터</button>
                        <button>위치</button>
                        <button>스타일</button>
                        <button>브랜드</button>
                        <button>종류</button>
                        <button>가격대</button>
                        <h1 class="">검색</h1>
                        <p class="offline-shop">오프라인샵 <span>(23)</span></p>

                        <!-- 게시글 구현 -->
                        <div class="post-container">
                            <?php
                            function render_card($row)
                            { ?>
                                <div class="post">
                                    <img src="<?php echo $row["shop_img_path"]; ?>" class="storeImg">
                                    <span class="like-btn"><img src="./upload/bxs-heart.svg.svg" class="heart-icon"></span>
                                    <h3><?php echo $row["shop_name"]; ?></h3>
                                    <div class="hashtags">
                                        <span>#<?php echo $row["tag_location"]; ?></span>
                                        <span>#<?php echo $row["tag_style"]; ?></span>
                                        <span>#<?php echo $row["tag_brand"]; ?></span>
                                    </div>

                                    <div class="price">
                                        <img src="./akar-icons_coin.png" class="yenImg">
                                        <span><?php echo $row["price_min"]; ?>¥ ~ <?php echo $row["price_max"]; ?>¥</span>
                                    </div>
                                </div>
                            <?php }

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    render_card($row);
                                }
                            }

                            ?>
                        </div>

                        <p class="brand-shop">브랜드 / 체인점 <span>(23)</span></p>

                        <div class="post-container">
                            <?php
                            function render_card2($row)
                            { ?>
                                <div class="post">
                                    <img src="<?php echo $row["shop_img_path"]; ?>" class="storeImg">
                                    <span class="like-btn"><img src="./upload/bxs-heart.svg.svg" class="heart-icon"></span>
                                    <h3><?php echo $row["shop_name"]; ?></h3>
                                    <div class="hashtags">
                                        <span>#<?php echo $row["tag_location"]; ?></span>
                                        <span>#<?php echo $row["tag_style"]; ?></span>
                                        <span>#<?php echo $row["tag_brand"]; ?></span>
                                    </div>
                                    <div class="price">
                                        <img src="./akar-icons_coin.png" class="yenImg">
                                        <span><?php echo $row["price_min"]; ?>¥ ~ <?php echo $row["price_max"]; ?>¥</span>
                                    </div>

                                    <img src="Vector 6.png" class="bookmark">
                                </div>
                            <?php }

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    render_card2($row);
                                }
                            }

                            ?>

                        </div>
    </main>

    <div class="market-button">
        <a href="./vintage_insert.html"><img src="./assets/market-button.svg"></a>
    </div>

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

    <script src="./js/search.js"></script>
</body>

</html>