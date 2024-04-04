// 별점 색
document.addEventListener('DOMContentLoaded', function() {
    let stars = document.querySelectorAll('.star');
    let ratingDisplay = document.querySelector('.rating-value'); // 별점 숫자를 표시할 요소 선택
  
    stars.forEach(function(star){
      star.addEventListener('click', setRating);
    });
  
    function setRating(ev){
      let ratingValue = ev.currentTarget.getAttribute('data-value');
      stars.forEach(function(star, index){
        if(index < ratingValue){
          star.classList.add('rated');
        } else {
          star.classList.remove('rated');
        }
      });
      updateRatingValue(ratingValue); // 별점 숫자 업데이트 함수 호출
    }
  
    function updateRatingValue(value) {
      let numericValue = parseFloat(value); // 정수를 실수로 변환
      ratingDisplay.textContent = `별점: ${numericValue.toFixed(1)}`; // 소수점 한 자리까지 표시
    }
  });
  
  