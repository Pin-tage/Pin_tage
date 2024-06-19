<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png"> <!--favicon-->
    <link href="https://fonts.googleapis.com/css?family=Cherry+Bomb" rel="stylesheet"> <!--상단 내비 폰트-->
    <link rel="stylesheet" href="./css/search_test.css">
    <link rel="stylesheet" href="./css/nav.css">
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
        <menu style="margin-left:32px">
            <ul>
                <li><a href="./index.php" class="top-nav">MAIN</a></li>
                <li><a href="./search_test.php" class="top-nav">SEARCH</a></li>
                <li><a href="./map.php" class="top-nav">PIN!MAP</a></li>
                <li><a href="./mypage_H.php" class="top-nav">MYPAGE</a></li>
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
    include('db_conn.php');

    // 데이터베이스 연결 오류 확인
    if ($conn->connect_error) {
        die("<script>console.error('데이터베이스 연결 실패: " . addslashes($conn->connect_error) . "');</script>");
    }

    $sql = "SELECT shop_name, tag_region, tag_location, tag_style, tag_brand, shop_img_path, price_min, price_max FROM vintageshop";

    $result = $conn->query($sql); // 쿼리 실행
    
    if (!$result) {
        die("<script>console.error('쿼리 실행 실패: " . addslashes($conn->error) . "');</script>");
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
                        <p style="position:absolute; margin-top: -42px; margin-left: 3px;">검색 필터</p>
                        <form id="dropdownForm">
                            <div class="hs_dropbox" style="position:absolute; margin-top: -50px; margin-left: 95px; ">
                                <span>
                                    <select id="tag_region" name="tag_region" required>
                                        <!--더 늘릴 예정-->
                                        <option value="" disabled selected>지역</option>
                                        <option value="홋카이도">홋카이도</option>
                                        <option value="혼슈">혼슈</option>
                                        <option value="시코쿠">시코쿠</option>
                                        <option value="규슈">규슈</option>
                                    </select>
                                </span>
                                <span>
                                    <select id="tag_style" name="tag_style" required>
                                        <!--더 늘릴 예정-->
                                        <option value="" disabled selected>스타일</option>
                                        <option value="모리걸">모리걸</option>
                                        <option value="스트릿">스트릿</option>
                                        <option value="펑크">펑크</option>
                                        <option value="스포티">스포티</option>
                                    </select>
                                </span>
                                <button type="submit" class="submit-btn">검색</button>
                            </div>
                        </form>


                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                // 선택된 값을 저장할 배열
                                let selectedValues = [];

                                // select 요소 가져오기
                                const regionSelect = document.getElementById('tag_region');
                                const styleSelect = document.getElementById('tag_style');

                                // 폼 제출 이벤트 리스너 추가
                                const form = document.getElementById('dropdownForm');
                                form.addEventListener('submit', function (event) {
                                    event.preventDefault(); // 기본 제출 동작 방지

                                    // 선택된 값을 배열에 저장
                                    selectedValues.push({
                                        region: regionSelect.value,
                                        style: styleSelect.value
                                    });

                                    console.log("Selected values array:", selectedValues);

                                    // 필터링 함수 호출
                                    filterCards(regionSelect.value, styleSelect.value);
                                });

                                // 필터링 함수 정의
                                function filterCards(selectedRegion, selectedStyle) {
                                    // 모든 카드 가져오기
                                    const cards = document.querySelectorAll('.post');

                                    cards.forEach(function (card) {
                                        // 카드의 데이터 속성 값 가져오기
                                        const cardRegion = card.getAttribute('data-region');
                                        const cardStyle = card.getAttribute('data-style');

                                        // 조건에 맞는지 확인
                                        if ((selectedRegion === "" || cardRegion === selectedRegion) &&
                                            (selectedStyle === "" || cardStyle === selectedStyle)) {
                                            card.style.display = "block"; // 조건에 맞으면 보이기
                                        } else {
                                            card.style.display = "none"; // 조건에 맞지 않으면 숨기기
                                        }
                                    });
                                }
                            });
                        </script>

                        <p class="offline-shop">
                        <p style="margin: top 9px; font-weight: bold;">오프라인샵</p><span
                            style="margin-top:-24px; margin-left: 90px; position:absolute; color : #ff47cb; font-weight: bold;">(23)</span>
                        </p>

                        <!-- 게시글 구현 -->
                        <div class="post-container">
                            <?php

                            $shop = ["2nd", "wego", "sousou", "grizzly", "el", "jetrag"];
                            $i = 0;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="post" data-region="<?php echo $row["tag_region"]; ?>" data-style="<?php echo $row["tag_style"]; ?>">
                                        <a href="<?php echo array_values($shop)[$i]; ?>.php">
                                            <img src="<?php echo $row["shop_img_path"]; ?>" class="storeImg">
                                        </a>
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
                                    <?php $i++;
                                }
                            } else {
                                echo "<p>결과가 없습니다.</p>";
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
