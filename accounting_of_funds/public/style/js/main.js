$(document).ready(function(){


    if($('#this') !== undefined) {
        $('#this').trigger('click');
    }

    if($('.slider-card') !== undefined){
        $('.slider-card').slick({
            infinite: false,
            slidesToShow: 1,
        });
    }

});
