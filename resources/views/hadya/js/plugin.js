/*global $, jQuery, console, alert, prompt */
$(document).ready(function () {
    "use strict";
    $('.menu-toggle').click(function () {
        $('.main-nav').slideToggle();
    });
    $(window).resize(function () {
		var widths = $(window).width();
		if (widths <= 768) {
            $('.menu-toggle').css("display", "block");
            $('.main-nav').css("display", "none");
		} else {
            $('.menu-toggle').css("display", "none");
            $('.main-nav').css("display", "block");
		}
        $('.slider-hero').height($(window).height());
        $('.slider-hero .carousel-inner > .item img').height($('.slider-hero').height());
	});

    // Main carousel slider in gifts area
    $('.product-slider').slick({
        dots: false,
        infinite: true,
        accessibility: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    infinite: true
                }
            },
            {
                breakpoint: 580,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    infinite: true
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    // About slider
    $('.slider-inner').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    $('.drop-down > a').click(function(event){
        event.preventDefault();
        $(this).parent().find('ul.drop-ul').slideToggle(200);
        if($(this).find('span.fa').hasClass('fa-caret-right')){
            $(this).find('span.fa').removeClass('fa-caret-right');
            $(this).find('span.fa').addClass('fa-caret-down');
        } else {
            $(this).find('span.fa').addClass('fa-caret-right');
            $(this).find('span.fa').removeClass('fa-caret-down');
        }
    });

    /* $('.check-color').on('click', function(){
        var valinput = $(this).attr('data-value');
        $('.tags-color > p > span').each( function () {
            if($(this).attr('data-val') !== valinput){
                alert('hi');
                $('.tags-color > p').append('<span class="color-tag btn btn-default" data-val="' + valinput + '">'+ valinput +'<button><i>&times;</i></button></span>');
            }
        });



        //alert(valinput);

    }); */

    $('.check-color').on('click', function(){
        var html = '';
        $(".color-ul ul li").each(function(){
            if ($(this).find('input').prop('checked')==true){
                var sp = $(this).find('span').text();
                $(this).find('input').attr('data-value', sp);
                var v =$(this).find('input').data('value');
                html+='<span class="color-tag btn btn-default" data-val="' + v + '">'+ v +'<button><i>&times;</i></button></span>';
            }else{
                $(this).find('input').attr('data-value', '');
            }
        });
        $('.tags-color > p').html(html);
        
        $('.tags-color span').click(function () {
            var t = $(this);
            var val = $(this).data('val');
            $(".color-ul ul li").each(function(){
                if ($(this).find('input').prop('checked')==true){
                    var sp = $(this).find('span').text();
                    $(this).find('input').attr('data-value', sp);
                    var v =$(this).find('input').data('value');
                    var vs = $(this).find('input').data('value');
                    if(val == vs){
                        $(this).find('input').removeAttr('checked');
                        t.remove();
                    }
                    html+='<span class="color-tag btn btn-default" data-val="' + v + '">'+ v +'<button><i>&times;</i></button></span>';
                }else{

                    $(this).find('input').attr('data-value', '');

                }
            });
        });

    });

    $('#clear').click(function () {
        $('.tags-color p').html(" ");
        $(".color-ul ul li").each(function(){
            $(".color-ul ul li").find('input').removeAttr('checked');
        });
    });

    $('.square-view').click(function () {
        $('.three-div-view').fadeOut(500);
        $('.tow-view').fadeIn(500);
    });

    $('.three-view').click(function () {
        $('.three-div-view').fadeIn(200);
        $('.tow-view').fadeOut(200);
    });

});
