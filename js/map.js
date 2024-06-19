document.addEventListener('DOMContentLoaded', function() {
    // 홋카이도
    const hokkaidoImg = document.getElementById('hokkaido-img');
    const hokkaidoHashtag = document.getElementById('hokkaido-hashtag');

    // 혼슈
    const honshuImg = document.getElementById('honshu-img');
    const honshuHashtag = document.getElementById('honshu-hashtag');

    // 시코쿠
    const shikokuImg = document.getElementById('shikoku-img');
    const shikokuHashtag = document.getElementById('shikoku-hashtag');

    // 규슈
    const kyushuImg = document.getElementById('kyushu-img');
    const kyushuHashtag = document.getElementById('kyushu-hashtag');

    // 홋카이도
    hokkaidoImg.addEventListener('click', function() {
        if (hokkaidoImg.src.includes('Hokkaido_off.png')) {
            hokkaidoImg.src = './assets/Hokkaido_on.png';  // 이미지 변경
            hokkaidoHashtag.style.display = 'inline';  // 해시태그 표시
        } else {
            hokkaidoImg.src = './assets/Hokkaido_off.png';  
            hokkaidoHashtag.style.display = 'none';  
        }
    });

    // 혼슈
    honshuImg.addEventListener('click', function() {
        if (honshuImg.src.includes('Honshu_off.png')) {
            honshuImg.src = './assets/Honshu_on.png';  // 이미지 변경
            honshuHashtag.style.display = 'inline';  // 해시태그 표시
        } else {
            honshuImg.src = './assets/Honshu_off.png';  // 이미지 변경
            honshuHashtag.style.display = 'none';  // 해시태그 숨기기
        }
    });

    // 시코쿠
    shikokuImg.addEventListener('click', function() {
        if (shikokuImg.src.includes('shikoku_off.png')) {
            shikokuImg.src = './assets/Shikoku_on.png';  // 이미지 변경
            shikokuHashtag.style.display = 'inline';  // 해시태그 표시
        } else {
            shikokuImg.src = './assets/shikoku_off.png';  // 이미지 변경
            shikokuHashtag.style.display = 'none';  // 해시태그 숨기기
        }
    });

    // 규슈
    kyushuImg.addEventListener('click', function() {
        if (kyushuImg.src.includes('kyushu_off.png')) {
            kyushuImg.src = './assets/kyushu_on.png';  // 이미지 변경
            kyushuHashtag.style.display = 'inline';  // 해시태그 표시
        } else {
            kyushuImg.src = './assets/kyushu_off.png';  // 이미지 변경
            kyushuHashtag.style.display = 'none';  // 해시태그 숨기기
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // 이미지와 해시태그 요소 가져오기
        const regions = [
            { img: document.getElementById('hokkaido-img'), hashtag: document.getElementById('hokkaido-hashtag'), imgOn: './assets/Hokkaido_on.png', imgOff: './assets/Hokkaido_off.png' },
            { img: document.getElementById('honshu-img'), hashtag: document.getElementById('honshu-hashtag'), imgOn: './assets/Honshu_on.png', imgOff: './assets/Honshu_off.png' },
            { img: document.getElementById('shikoku-img'), hashtag: document.getElementById('shikoku-hashtag'), imgOn: './assets/Shikoku_on.png', imgOff: './assets/Shikoku_off.png' },
            { img: document.getElementById('kyushu-img'), hashtag: document.getElementById('kyushu-hashtag'), imgOn: './assets/Kyushu_on.png', imgOff: './assets/Kyushu_off.png' }
        ];

        regions.forEach(region => {
            // 이미지 클릭 이벤트 처리 함수
            region.img.addEventListener('click', function() {
                if (region.img.src.includes(region.imgOff)) {
                    region.img.src = region.imgOn;  // 이미지 변경
                    region.hashtag.style.display = 'inline';  // 해시태그 표시
                } else {
                    region.img.src = region.imgOff;  // 이미지 변경
                    region.hashtag.style.display = 'none';  // 해시태그 숨기기
                }
            });

            // 해시태그 클릭 이벤트 처리 함수
            region.hashtag.addEventListener('click', function() {
                region.img.src = region.imgOff;  // 이미지 변경
                region.hashtag.style.display = 'none';  // 해시태그 숨기기
            });
            
        });

       
    });   
});