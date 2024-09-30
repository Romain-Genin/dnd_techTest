define([
    'jquery',
    'jquery/ui',
    'slick'
], function($) {
    return function(config, element) {
        $(element).ready(() => {
            $(element).slick({
                dots: false,
                infinite: true,
                slidesToShow: config.slidesToShow,
                slidesToScroll: 1
            });
        });
    };
});
