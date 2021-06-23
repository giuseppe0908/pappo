$(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
      $('nav').addClass('visible');
      $('nav').removeClass('transparent');
    } else {
      $('nav').removeClass('visible');
      $('nav').addClass('transparent');
    }
  });

$('.hamburger').click(function() {
    console.log('click');
    $(".hamburger > div").toggleClass("toggle")
    if ($('.navcollapse').hasClass('hidden')) {
        $('.navcollapse').removeClass('hidden');
        $('.navcollapse').addClass('show');
    }
    else {
        $('.navcollapse').addClass('hidden');
        $('.navcollapse').removeClass('show');
    }    
});