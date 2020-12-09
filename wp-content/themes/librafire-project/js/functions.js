jQuery(document).ready(function ($){
    $(".wp-block-gallery").append("<span class='previous' onclick='plusSlides(-1)'></span>");
    $(".wp-block-gallery").append("<span class='next' onclick='plusSlides(1)'></span>");
    
});

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("blocks-gallery-item");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}