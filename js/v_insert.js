document.addEventListener('DOMContentLoaded', function () {
    let map;
    let marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 37.5665, lng: 126.9780 },
            zoom: 12
        });

        const input = document.getElementById('shop_location');
        const searchBox = new google.maps.places.SearchBox(input);

        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function () {
            const places = searchBox.getPlaces();

            if (places.length === 0) {
                return;
            }

            // 이전 마커 지우기
            if (marker) {
                marker.setMap(null);
            }

            // 선택한 장소에 새로운 마커 설정
            marker = new google.maps.Marker({
                map: map,
                title: places[0].name,
                position: places[0].geometry.location
            });

            // 주소 추출하여 데이터베이스에 저장할 수도 있습니다.
            const selectedAddress = places[0].formatted_address;
            console.log('선택한 주소:', selectedAddress);
        });

        // 이미지 미리보기 관련 코드 추가
        document.querySelector('.img-button').addEventListener('click', function () {
            document.getElementById('image').click();
        });

        function previewImages(input) {
            var previewContainer = document.getElementById('preview-container');

            var files = input.files;
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                var preview = document.createElement('img');

                reader.onload = function (e) {
                    var img = new Image();
                    img.src = e.target.result;

                    img.onload = function () {
                        var canvas = document.createElement('canvas');
                        var ctx = canvas.getContext('2d');

                        var width = 250;
                        var height = 250;

                        if (img.width > img.height) {
                            height = img.height * (width / img.width);
                        } else {
                            width = img.width * (height / img.height);
                        }

                        canvas.width = width;
                        canvas.height = height;

                        ctx.drawImage(img, 0, 0, width, height);

                        preview.src = canvas.toDataURL('image/jpeg');
                        previewContainer.appendChild(preview.cloneNode(true));
                    };
                };

                if (files[i]) {
                    reader.readAsDataURL(files[i]);
                }
            }
        }

        var fileInput = document.getElementById('image');
        fileInput.addEventListener('change', function () {
            previewImages(this);
        });
    }

    // 페이지 로드 시 맵 초기화
    google.maps.event.addDomListener(window, 'load', initMap);
});