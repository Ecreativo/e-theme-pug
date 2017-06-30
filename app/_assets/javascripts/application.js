(function($, window, document, undefined) {

    'use strict';

    function cargar() {
        $('.loader').fadeIn();
    }

    function descargar() {
        $('.loader').fadeOut();
    }

    $(window).load(function() {
        descargar();
    });
    /* ==============================================
    GO TO TOP
    =============================================== */

    jQuery(document).ready(function($) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.back-to-top').fadeIn('slow');
            } else {
                $('.back-to-top').fadeOut('slow');
            }
        });
        $('.back-to-top').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 500);
            return false;
        });
        $('.go-to-top').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    });

    /* ==============================================
    Flickity
    =============================================== */

    var flickity = new Flickity('.slider', {
        cellSelector: '.slide',
        accessibility: false,
        cellAlign: 'center',
        draggable: true,
        autoPlay: false,
        wrapAround: true,
        prevNextButtons: true,
        pageDots: false,
        lazyLoad: true,
        imagesLoaded: true
    });



})(jQuery, window, document);
