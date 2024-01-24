document.addEventListener('DOMContentLoaded', function () {
    function previewImages(input) {
        var previewContainer = document.getElementById('preview-container');
        // 이전 미리보기 초기화하지 않고 기존 미리보기에 추가하기 위해 변경

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

                    // 이미지 크기를 300x300으로 제한
                    var width = 250;
                    var height = 250;

                    // 실제 이미지 비율을 유지하면서 크기 조정
                    if (img.width > img.height) {
                        height = img.height * (width / img.width);
                    } else {
                        width = img.width * (height / img.height);
                    }

                    canvas.width = width;
                    canvas.height = height;

                    ctx.drawImage(img, 0, 0, width, height);

                    preview.src = canvas.toDataURL('image/jpeg');
                    // 각 이미지에 대한 미리보기를 리스트로 추가
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
});