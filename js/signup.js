//아이디 중복체크

function checkUsernameAvailability() {
    var username = $('#username').val();

    $.ajax({
        url: 'signup.php',
        type: 'POST',
        data: {user_id: username},
        success: function(response) {
            $('#idCheckResult').html(response);
        }
    });
}