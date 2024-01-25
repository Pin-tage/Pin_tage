// 해시태그 기능
let hashtags = document.querySelectorAll('.hashtag');
hashtags.forEach(function(hashtag) {
    hashtag.addEventListener('click', function() {
        this.classList.toggle('active');
    });
});

