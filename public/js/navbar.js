$(document).ready(function() {
    let ww = $(window).width();
    if(ww >= 1220) {
        $('.search-toggle').click(function() {
            $('.search-nav-hide').toggleClass('search-nav-show');
            $('.form-search-nav').focus()
            $('.search-toggle svg').toggleClass('text-danger');
            $('.nav-link').removeClass('text-white').addClass('text-dark');
            $('#title_nav').addClass('clr-red').removeClass('text-white');
            let top = window.pageYOffset || document.documentElement.scrollTop
            if($('#form-search-desktop').hasClass('search-nav-show')) {
                if(top <= 100) {
                    $('.search-toggle svg').addClass('text-danger').removeClass('text-white');
                    $('.nav-link').removeClass('text-white').addClass('text-dark');
                    $('.navbar').addClass('bg-white').removeClass('bg-transparent');
                } else {
                    $('.search-toggle svg').addClass('text-danger').removeClass('text-white');
                    $('.nav-link').removeClass('text-white').addClass('text-dark');
                    $('.navbar').addClass('bg-white').removeClass('bg-transparent');
                }
            } else {
                if(top <= 100) {
                    $('.search-toggle svg').removeClass('text-danger').addClass('text-white');
                    $('.navbar').removeClass('bg-white').addClass('bg-transparent');
                    $('.nav-link').removeClass('text-dark').addClass('text-white');
                } else {
                    $('.search-toggle svg').addClass('text-danger').removeClass('text-white');
                    $('.navbar').addClass('bg-white');
                    $('.nav-link').addClass('text-dark');
                }
            }
        });
    }
    if(ww < 1220) {
        $('.search-toggle svg').addClass('text-danger')
        $('.search-toggle').click(function() {
            $('.search-small-nav').slideToggle(500, "linear")
            $('.form-search-nav-small').focus()
            $('.search-toggle svg').toggleClass('text-dark')
        });
    }

    $('#sumatra').mouseenter(function() {
        $('#sumatra-map').attr('src', 'img/map/fill/sumatra_black.png');
    });
    $('#sumatra').mouseleave(function() {
        $('#sumatra-map').attr('src', 'img/map/border/sumatra_black.png');
    });
    $('#jawa').mouseenter(function() {
        $('#jawa-map').attr('src', 'img/map/fill/jawa_black.png');
    });
    $('#jawa').mouseleave(function() {
        $('#jawa-map').attr('src', 'img/map/border/jawa_black.png');
    });
    $('#kalimantan').mouseenter(function() {
        $('#kalimantan-map').attr('src', 'img/map/fill/kalimantan_black.png');
    });
    $('#kalimantan').mouseleave(function() {
        $('#kalimantan-map').attr('src', 'img/map/border/kalimantan_black.png');
    });
    $('#sulawesi').mouseenter(function() {
        $('#sulawesi-map').attr('src', 'img/map/fill/sulawesi_black.png');
    });
    $('#sulawesi').mouseleave(function() {
        $('#sulawesi-map').attr('src', 'img/map/border/sulawesi_black.png');
    });
    $('#irian').mouseenter(function() {
        $('#irian-map').attr('src', 'img/map/fill/irianjaya_black.png');
    });
    $('#irian').mouseleave(function() {
        $('#irian-map').attr('src', 'img/map/border/irianjaya_black.png');
    });

    $(window).resize(function() {
        var windowsize = $(window).width();
        if(windowsize < 1219) {
        //    location.reload();
        }
    });
    var top  = window.pageYOffset || document.documentElement.scrollTop
    var windowsize = $(window).width();
    if(windowsize < 1219) {
        $('.navbar').addClass('bg-white');
    } else {
        if(top <= 22) {
            $('.navbar').removeClass('shadow-sm bg-white').addClass('text-white');
            $('.nav-link').addClass('text-white').removeClass('text-dark');
            $('#title_nav').addClass('text-white');
        } else {
            $('.navbar').addClass('shadow-sm bg-white').removeClass('text-white');
            $('.nav-link').addClass('text-dark').removeClass('text-white');
        }
    }
    $(window).scroll(function() {
        var windowsize = $(window).width();
        var top  = window.pageYOffset || document.documentElement.scrollTop;
        if(windowsize < 1219) {
            if(top <= 70) {
                $('.navbar').addClass('bg-white border-bottom').removeClass('shadow-sm');
                $('.nav-link').addClass('text-dark');
                $('#image_nav').addClass('image_normal').removeClass('image_transform');
                $('#title_nav').removeClass('title_hide').addClass('title_show');
            } else {
                $('.navbar').addClass('bg-white shadow-sm').removeClass('border-bottom');
                $('.nav-link').addClass('text-dark').removeClass('text-white');
                $('#title_nav').removeClass('title_show').addClass('title_hide');
                $('#image_nav').addClass('image_transform').removeClass('image_normal');
            }
        } else {
            if(top <= 200) {
                $('.go_top').addClass('go_top_hide').removeClass('go_top_show animate__animated animate__shakeX');
            } else {
                $('.go_top').addClass('go_top_show animate__animated animate__shakeX').removeClass('go_top_hide');
            }
            if(top <= 70) {
                $('.navbar').removeClass('shadow-sm bg-white animate__animated animate__fadeInDown').addClass('text-white');
                $('#title_nav').removeClass('title_hide').addClass('title_show text-white');
                $('#image_nav').addClass('image_normal').removeClass('image_transform');
                $('.nav-link').addClass('text-white').removeClass('text-dark');
            } else {
                $('.search-toggle svg').addClass('text-danger').removeClass('text-white');
                $('.navbar').addClass('shadow-sm bg-white animate__animated animate__fadeInDown animate__faster').removeClass('text-white');
                $('#image_nav').addClass('image_transform').removeClass('image_normal');
                $('#title_nav').removeClass('title_show').addClass('title_hide');
                $('.nav-link').addClass('text-dark').removeClass('text-white');
                $('.icon-search-toggle').addClass('text-danger')
                if($('#form-search-desktop').hasClass('search-nav-show')) {
                    $('#form-search-desktop').removeClass('search-nav-show').addClass('search-nav-hide');
                }
            }
        }
    });
});