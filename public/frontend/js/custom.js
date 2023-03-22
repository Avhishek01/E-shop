$(document).ready(function (e) {

    
    $('.fff-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })
    
    loadcart();
    function loadcart() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "get",
            url: "/load-cart-data",
            success: function (response) {
                if (response.count == 0) {
                    $('.cart-count').removeClass('cart-count');
                }
                else {
                    $('.cart-count').html('');
                    $('.cart-count').html(response.count);
                }
            }
        });
    }
    $flag = -1;
  
    $("a.cart").hover(
        function () {
            $flag = 1;
            $("div.shopping-cart").attr("style", "display:block");
        },
        function () {
            if ($flag == -1) {
                $("div.shopping-cart").attr("style", "display:none");
            }
        },
    );
    // $("a.cart").click(function () {
    //     $flag = 1;
    // });
})
$(document).click(function(event){
    if(!$(event.target).is(".shopping-cart")){
      $(".shopping-cart").hide();

    }
});

      // $('#openBtn').hover(function () {
    //     $('#modal-minicart').popover({
    //         placement: 'top',
    //         trigger: 'hover'
    //     });
    // });
    
    
    // $('#openBtn').hover(function () {
    //         // over
    //         $('#modal-minicart').show();
            
    //     }, function () {
    //         // out
    //         $('#modal-minicart').hide();
    //     }
    // );


    
    // $(function() { 
    //     $(".cart").on({
    //         mouseenter: function() {
    //             $(".shopping-cart").show();
    //         },
    //         mouseleave: function() {
    //             $(".shopping-cart").hide();
    //         }
    //     })
    // });

    
    // (function(){
    //     $("#aaa").on("click", function() {
    //       $(".shopping-cart").fadeToggle();
    //     });
        
    //   })();