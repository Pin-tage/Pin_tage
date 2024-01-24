// 중복 확인 버튼을 눌렀을 때 실행되는 함수
function checkDuplicate() {
    // 사용자가 입력한 아이디 가져오기
    var username = document.getElementById('user_id').value;

    // 아이디 중복 체크 요청
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'signup_check.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var result = xhr.responseText;

                // 결과를 alert로 표시
                alert(result);

                // 사용 가능한 아이디인 경우에만 결과를 표시란에 표시
                if (result === '사용 가능한 아이디 입니다') {
                    document.getElementById('idCheckResult').innerHTML = result;
                } else {
                    // 사용 불가능한 경우에는 입력 필드를 비우고 결과를 표시란에 표시
                    document.getElementById('user_id').value = '';
                    document.getElementById('idCheckResult').innerHTML = result;
                }
            } else {
                // 요청 중 오류 처리
                alert('중복 확인 중 오류 발생: ' + xhr.status);
            }
        }
    };

    // 서버에 아이디 전송
    xhr.send('user_id=' + username);
}

// 폼 전송 전 중복 확인 및 가입 처리
function validateForm() {
    var result = document.getElementById('idCheckResult').innerHTML;

    if (result === '사용 가능한 아이디 입니다') {
        // 사용 가능한 아이디일 때 폼이 제출되도록 true 반환
        return true;
    } else {
        // 사용 불가능한 경우에는 폼이 제출되지 않도록 false 반환
        return false;
    }
}
