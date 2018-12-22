/**
 * @category    Phagento
 * @package  Customerproducts
 * @copyright   Copyright (c) 2018
 * @author  Joenas Ejes <joenasejes@gmail.com>
 */

(function ($) {
    $(document).ready(function ($) {
        $('.product-slider').slick({
            slidesToShow: 3,
            dots: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
})(jQuery);
