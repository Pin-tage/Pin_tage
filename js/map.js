document.addEventListener('DOMContentLoaded', function() {
    // 각 지역의 정보를 객체로 정의
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
    function handleClick(region) {
        if (!region.clicked) {
            region.img.src = region.imgOn;  // 이미지 변경
            region.hashtag.style.display = 'inline';  // 해시태그 표시
            region.clicked = true;  // 클릭 상태 업데이트
        } else {
            region.img.src = region.imgOff;  // 이미지 변경
            region.hashtag.style.display = 'none';  // 해시태그 숨기기
            region.clicked = false;  // 클릭 상태 업데이트
        }

        // 배열에 현재 클릭 상태 저장
        const clickedArray = regions.map(region => region.clicked);
        console.log(clickedArray);  // 테스트용 콘솔 출력, 실제로는 서버로 전송하면 됩니다.
        
        // 서버로 데이터 전송 예시 (실제로는 fetch를 이용하여 서버로 전송)
        // fetch('./map.php', {
        //     method:'POST',
        //     headers: {
        //         'Content-Type':'application/json'
        //     },
        //     body : JSON.stringify({ clicked_regions: clickedArray })
        // });
    }

    // 각 지역의 클릭 이벤트 등록
    regions.forEach(region => {
        region.img.addEventListener('click', function() {
            handleClick(region);
        });

        region.hashtag.addEventListener('click', function() {
            region.img.src = region.imgOff;  // 이미지 변경
            region.hashtag.style.display = 'none';  // 해시태그 숨기기
            region.clicked = false;  // 클릭 상태 업데이트
        });
    });
});
