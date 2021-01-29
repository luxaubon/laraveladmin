AOS.init({
  duration: 1000,
});

jQuery(document).ready(function ($) {

  $(window).scroll(function () {
    if ($(this).scrollTop() > $('.top-bar').outerHeight()) {
      $('.main-header').addClass('active');
    } else {
      $('.main-header').removeClass('active');
    }
  })

  $('.toggle-menu').click(function () {
    $(this).toggleClass('active');
    $('.side-nav').toggleClass('active');
  })

});


/* Home Slider */

var shoeSlide = new Swiper('.shoe-slide', {
  // Optional parameters
  loop: true,
  slidesPerView: 1,
  autoplay: {
    delay: 3000
  }
})