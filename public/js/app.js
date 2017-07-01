$(function() {
            
    $(".typed").typewriter({
        speed: 10
    });

    /* When user clicks the Icon */
    $('.nav-toggle').click(function() {
        $(this).toggleClass('active');
        $('.header-nav').toggleClass('open');
        event.preventDefault();
    });
    /* When user clicks a link */
    $('.header-nav li a').click(function() {
        $('.nav-toggle').toggleClass('active');
        $('.header-nav').toggleClass('open');

    });

    $("html").niceScroll({
        scrollspeed: 120,
        // mousescrollstep: 30,
        cursorwidth: 5,
        cursorborder: 0,
        cursorcolor: '#2f2f2f',
        autohidemode: true,
        zindex: 999999999,
        horizrailenabled: false,
        cursorborderradius: 0,
    });

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        
        if (scroll >= 20) {
            $('section.navigation').addClass('fixed');
            $('header').css({
                "border-bottom": "none",
                "padding": "35px 0",
            });
            $('header .member-actions').css({
                "top": "26px",
            });
            $('header .navicon').css({
                "top": "34px",
            });
        } else {
            $('section.navigation').removeClass('fixed');
            $('header').css({
                "border-bottom": "solid 1px rgba(255, 255, 255, 0.2)",
                "padding": "50px 0"
            });
            $('header .member-actions').css({
                "top": "41px",
            });
            $('header .navicon').css({
                "top": "48px",
            });
        }
    });

    if ($(window).scrollTop() >= 20) {
        $('section.navigation').addClass('fixed');
        $('header').css({
            "border-bottom": "none",
            "padding": "35px 0"
        });
        $('header .member-actions').css({
            "top": "26px",
        });
        $('header .navicon').css({
            "top": "34px",
        });
    }

    
    var $container = $('.portfolio');
    $container.isotope({
        layoutMode : 'masonry',
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false,
        }
    });

    $('.portfolio-filter ul a').click(function(){
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false,
            }
        });
      return false;
    });

    var $optionSets = $('.portfolio-filter ul'),
        $optionLinks = $optionSets.find('a');
    $optionLinks.click(function(){
        var $this = $(this);
        if ( $this.hasClass('selected') ) { return false; }
        var $optionSet = $this.parents('.portfolio-filter ul');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected'); 
    });

    $('.lightbox').nivoLightbox({
        effect: 'fadeScale',
        keyboardNav: true,
        errorMessage: 'The requested content cannot be loaded. Please try again later.'
    });

    $(".owl-theme").owlCarousel({
        items: 4,
    });
    
});