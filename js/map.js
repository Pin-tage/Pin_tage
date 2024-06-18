// script.js

document.addEventListener('DOMContentLoaded', function() {
    const regions = [
        { 
            name: 'hokkaido',
            img: document.getElementById('hokkaido-img'), 
            hashtag: document.getElementById('hokkaido-hashtag'), 
            imgOn: './assets/Hokkaido_on.png', 
            imgOff: './assets/Hokkaido_off.png',
            clicked: false
        },
        { 
            name: 'honshu',
            img: document.getElementById('honshu-img'), 
            hashtag: document.getElementById('honshu-hashtag'), 
            imgOn: './assets/Honshu_on.png', 
            imgOff: './assets/Honshu_off.png',
            clicked: false
        },
        { 
            name: 'shikoku',
            img: document.getElementById('shikoku-img'), 
            hashtag: document.getElementById('shikoku-hashtag'), 
            imgOn: './assets/Shikoku_on.png', 
            imgOff: './assets/Shikoku_off.png',
            clicked: false
        },
        { 
            name: 'kyushu',
            img: document.getElementById('kyushu-img'), 
            hashtag: document.getElementById('kyushu-hashtag'), 
            imgOn: './assets/Kyushu_on.png', 
            imgOff: './assets/Kyushu_off.png',
            clicked: false
        }
    ];

    // 클릭 이벤트를 처리하는 함수
    function handleRegionClick(region) {
        if (!region.clicked) {
            region.img.src = region.imgOn;
            region.hashtag.style.display = 'block';
        } else {
            region.img.src = region.imgOff;
            region.hashtag.style.display = 'none';
        }
        region.clicked = !region.clicked;

        // 클릭된 지역들을 배열에 담아서 서버에 전송하는 로직 추가
        const clickedRegions = regions.filter(r => r.clicked).map(r => r.name);
        sendClickedRegions(clickedRegions);
    }

    // 각 지역 이미지에 클릭 이벤트 리스너 추가
    regions.forEach(region => {
        region.img.addEventListener('click', () => handleRegionClick(region));
    });

    // 클릭된 지역 배열을 서버로 전송하는 함수 (AJAX 요청)
    function sendClickedRegions(clickedRegions) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'process.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // 서버로부터 카드 데이터를 받아와서 카드를 동적으로 추가
                    const response = JSON.parse(xhr.responseText);
                    renderCards(response);
                } else {
                    console.error('Error:', xhr.status);
                }
            }
        };

        const data = JSON.stringify({ clicked_regions: clickedRegions });
        xhr.send(data);
    }

    // 서버로부터 받은 데이터를 기반으로 카드를 동적으로 추가하는 함수
    function renderCards(cardsData) {
        const cardContainer = document.getElementById('card-container');
        cardContainer.innerHTML = ''; // 기존 카드 초기화

        cardsData.forEach(row => {
            const cardDiv = document.createElement('div');
            cardDiv.classList.add('card');

            // 카드 내용 구성
            cardDiv.innerHTML = `
                <div class="heart">
                    <i class="bi bi-heart-fill" style="color: red;"></i>
                </div>
                <div class="corner-paper-curl"></div>
                <div class="cardImg"><img src="${row.shop_img_path}" alt=""></div>
                <p class="cardTitle">${row.shop_name}</p>
                <div class="cardHashtag_container">
                    <div class="cardHashtag">#${row.tag_location}</div>
                    <div class="cardHashtag">#${row.tag_style}</div>
                    <div class="cardHashtag">#${row.tag_brand}</div>
                </div>
                <div class="price">
                    <img src="" alt="">
                    <p>${row.price_min}¥ ~ ${row.price_max}¥</p>
                </div>
            `;

            cardContainer.appendChild(cardDiv);
        });
    }
});
