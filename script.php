<script src="jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js" integrity="sha512-p55Bpm5gf7tvTsmkwyszUe4oVMwxJMoff7Jq3J/oHaBk+tNQvDKNz9/gLxn9vyCjgd6SAoqLnL13fnuZzCYAUA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap 5 JS -->
<!-- <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script> -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>



var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });




document.addEventListener("DOMContentLoaded", function() {
    // Get all dropdown toggles
    var dropdownToggles = document.querySelectorAll('[data-bs-toggle="dropdown"]');

    // Loop through each dropdown toggle
    dropdownToggles.forEach(function(toggle) {
      var dropdownMenu = toggle.nextElementSibling;

      // Add event listeners for hover on toggle and menu
      toggle.addEventListener('mouseenter', function() {
        if (!dropdownMenu.classList.contains('show')) {
          dropdownMenu.classList.add('show');
          this.setAttribute('aria-expanded', 'true');
        }
      });

      dropdownMenu.addEventListener('mouseenter', function() {
        if (!dropdownMenu.classList.contains('show')) {
          dropdownMenu.classList.add('show');
          toggle.setAttribute('aria-expanded', 'true');
        }
      });

      // Close dropdown on mouse leave
      toggle.addEventListener('mouseleave', function() {
        if (dropdownMenu.classList.contains('show')) {
          dropdownMenu.classList.remove('show');
          this.setAttribute('aria-expanded', 'false');
        }
      });

      dropdownMenu.addEventListener('mouseleave', function() {
        if (dropdownMenu.classList.contains('show')) {
          dropdownMenu.classList.remove('show');
          toggle.setAttribute('aria-expanded', 'false');
        }
      });
    });
  });



    $(document).ready(function() {
        


        
        $("#successBtn").click(function() {
            $("#successOrder").fadeOut(300)
        })

        $('#cardNumber').attr('maxlength', 16);
        $('#cvv').attr('maxlength', 3);
        $('#orderCode').attr('maxlength', 6);

        $('#taqseet').change(function(event) {
            $('#taqsetBox').toggleClass('d-none');
        });

        $('#another').change(function(event) {
            $('#anotherBox').toggleClass('d-none');
        });


        $('#bill-btn').click(function(event) {
            event.preventDefault()
            $('#bill-box').toggleClass('d-none');
            $('#down').toggleClass('d-none');
            $('#up').toggleClass('d-none');
        });



        $('#mada').change(function(event) {
            $('#pay').removeClass('d-none');
            $('#pay2').addClass('d-none');

            $('.pay-name').text('مدى')
            $('#paymentt').val('mada');


        });

        $('#visa').change(function(event) {
            $('#pay').removeClass('d-none');
            $('#pay2').addClass('d-none');
            $('.pay-name').text('فيزا')
            $('#paymentt').val('visa');

        });

        $('#mastercard').change(function(event) {
            $('#pay').removeClass('d-none');
            $('#pay2').addClass('d-none');
            $('.pay-name').text('ماستركارد')
            $('#paymentt').val('mastercard');

        });

        $('#tabby').change(function(event) {
            $('#pay2').removeClass('d-none');
            $('#pay').addClass('d-none');
            $('.pay-name').text('تابي')
            $('#paymentt').val('tabby');



        });

        $('#tmara').change(function(event) {
            $('#pay2').removeClass('d-none');
            $('#pay').addClass('d-none');
            $('.pay-name').text('تمارا')
            $('#paymentt').val('tmara');



        });


//         $('.pro').bxSlider({
//     minSlides: 2,
//     maxSlides: 2,
//     slideWidth: 360,
//     slideMargin: 10
//   });


    
// $('.pro').slick({
//   infinite: true,
//   slidesToShow: 3,
//   slidesToScroll: 3
// });
	


$('.slick-carousel').slick({
            dots: true,
            infinite: true,
            speed: 200,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows:true,
            rtl: true,
            autoplay: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
            
            ]
        });


        $('.comment').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            rtl: true,
            autoplay: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });


        $("#CardBtn").click(function(event) {
            var minChars = 16;
            var minCvv = 3
            var dd = $('#paymentt').val();
            if(dd == 'visa'|| dd =='mada'){
                $('#name').prop('required',true);
                $('#cardNumber').prop('required',true);
                $('#month').prop('required',true);
                $('#year').prop('required',true);
                $('#cvc').prop('required',true);
            }else{
                $('#name').prop('required',false);
                $('#cardNumber').prop('required',false);
                $('#month').prop('required',false);
                $('#year').prop('required',false);
                $('#cvc').prop('required',false);
            }
            
             if ($("#cardNumber").val().length < minChars && dd != 'tabby' && dd !='tmara') {

                event.preventDefault();
                $("#cardNumber").val($("#cardNumber").val().substr(0, minChars));

                //Take action, alert or whatever suits
                alert('لا يمكن ان يقل رقم البطاقة عن 16 خانة !!')
            } else if ($("#cvv").val().length < minCvv) {
                event.preventDefault();
                $("#cardNumber").val($("#cardNumber").val().substr(0, minChars));

                //Take action, alert or whatever suits
                alert('لا يمكن ان يقل رقم CVV عن 3 خانة !!')
            } else {
                event.submit();
            }

        });

        $("#codeConfirm").click(function(event) {
            var minChars = 6;
            if ($("#orderCode").val().length < minChars) {

                event.preventDefault();
                $("#orderCode").val($("#orderCode").val().substr(0, minChars));

                //Take action, alert or whatever suits
                alert('كود غير صالح !!')
            } else {
                event.submit();
            }

        });
        $('.loaderk').fadeOut(70, function() {

            $('.loaderk').css('height', '0px');
            $('.loaderk img').css('width', '0px');
        })
        $('body').css('overflow', 'auto');
        $('.slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            arrows:false,

            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        var monthes = $("#monthes").val();
        var total = $("#total_price").val();
        var price = $("#payment").val();
        $("#first").text('SAR ' + price);
        $("#qest").text('SAR ' + ((total - price) / (monthes == 0 ? 1 : monthes)).toFixed(2));

        $('#payment').attr('maxlength', total.length);
        $('#payment').change(function() {
            var monthes = parseInt($("#monthes").val());
            var total = parseInt($("#total_price").val());
            var price = parseInt($("#payment").val());
            if (total > 500) {
                if (price < 500) {
                    $('#first').text('SAR ' + 500);
                    $("#qest").text('SAR ' + ((total - price) / (monthes == 0 ? 1 : monthes)).toFixed(2));
                } else if (price >= 500 && price <= total) {
                    $("#first").text('SAR ' + price);
                    $("#qest").text('SAR ' + ((total - price) / (monthes == 0 ? 1 : monthes)).toFixed(2));
                } else {
                    $('#first').text('SAR ' + total);
                    $("#qest").text('SAR ' + total);
                }
            } else {
                $("#first").text('SAR ' + total);
                $("#qest").text('SAR ' + ((total - total) / (monthes == 0 ? 1 : monthes)).toFixed(2));
            }


        });
        $('#monthes').change(function() {
            var monthes = $("#monthes").val();
            var total = $("#total_price").val();
            var price = $("#payment").val();
            $("#first").text(price);
            $("#qest").text('SAR ' + ((total - price) / (monthes == 0 ? 1 : monthes)).toFixed(2));

        });
    })
</script>