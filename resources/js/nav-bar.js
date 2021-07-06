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

var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  })
});