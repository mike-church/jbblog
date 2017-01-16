(function ($) {
    "use strict";

    var $window = $(window),
        $body = $('body'),
        isRtl = $body.hasClass('rtl');

    /*-----------------------------------------------------------------------------------*/
    /* Main Menu
     /*-----------------------------------------------------------------------------------*/
    var siteNavigation = $('#site-navigation'),
        siteNavigationList = siteNavigation.find('li');

    siteNavigationList.on('mouseenter', function () {
        $(this).children('ul').stop().slideDown(200);
    });

    siteNavigationList.on('mouseleave', function () {
        $(this).children('ul').stop(true, true).slideUp(200);
    });

    /*-----------------------------------------------------------------------------------*/
    /* Responsive Menu
     /*-----------------------------------------------------------------------------------*/
    if (jQuery().meanmenu) {
        siteNavigation.meanmenu({
            meanMenuContainer: '#mobile-menu',
            meanRevealPosition: isRtl ? "right" : "left",
            meanMenuCloseSize: "20px",
            meanScreenWidth: "991",
            meanExpand: '+',
            meanContract: '-',
            meanDisplay: "inline-block"
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /* Search Toggle
    /*-----------------------------------------------------------------------------------*/
    var $searchOverlay = $("#search-overlay");
    var innerScreen = $searchOverlay.find('#inner-screen');

    $('.search-toggle').on('click', function (event) {
        searchOverlay();
        event.preventDefault();
    });

    $(document).on('keyup', function(event) {
        if (event.keyCode == 27) {
            $searchOverlay.fadeOut();
        }
    });

    innerScreen.on('click', function (event) {
        searchOverlay();
    });

    function searchOverlay() {
        $searchOverlay.fadeToggle(function () {
            $('.search-field').focus();
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /* Slidable Sidebar
     /*-----------------------------------------------------------------------------------*/
    var slidableSidebar = $(".slidable-sidebar"),
        pageWrapper = $(".page-wrapper"),
        showSlidableSidebar = $(".show-slidable-sidebar"),
        showDrawerIcon = showSlidableSidebar.find("i");

    function show_slidableSidebar() {
        slidableSidebar.addClass("show");
        pageWrapper.addClass("slide");
        showDrawerIcon.removeClass("fa-navicon").addClass("fa-times");
    }

    function close_slidableSidebar() {
        slidableSidebar.removeClass("show");
        pageWrapper.removeClass("slide");
        showDrawerIcon.addClass("fa-navicon").removeClass("fa-times");
    }

    showSlidableSidebar.on('click', function (event) {
        slidableSidebar.hasClass("show") ? close_slidableSidebar() : show_slidableSidebar();
        event.preventDefault();
    });

    $(".close-slidable-sidebar").on('click', function () {
        close_slidableSidebar();
    });

    /*-----------------------------------------------------------------------------------*/
    /* Sliders
     /*-----------------------------------------------------------------------------------*/
    if (jQuery().flexslider) {
        $('.gallery-post-slider').flexslider({
            animation: "slide",
            slideshow: true,
            controlNav: false,
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>'
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*  Carousels
     /*-----------------------------------------------------------------------------------*/
    if (jQuery().owlCarousel) {
        var postCarousel = $(".post-carousel");
        postCarousel.owlCarousel({
            rtl: isRtl,
            smartSpeed: 500,
            margin: 0,
            dots: false,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1300: {
                    items: 3
                },
                2400: {
                    items: 4
                }
            }
        });

        var topPostsCarousel = $(".top-posts-carousel");
        topPostsCarousel.owlCarousel({
            rtl: isRtl,
            items: 1,
            margin: 0,
            dots: false,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
        });

        topPostsCarousel.on('changed.owl.carousel', function (event) {
            updateNavPosition(topPostsCarousel);
        });

        topPostsCarousel.on('resized.owl.carousel', function (event) {
            updateNavPosition(topPostsCarousel);
        });

        $window.on('load', function () {
            updateNavPosition(topPostsCarousel);
        });
    }

    function updateNavPosition(element) {
        var containerHeight = element.find(".post-thumbnail"),
            navControls = element.find(".owl-controls");
        navControls.css('top', containerHeight.first().height() / 2);
    }

    function updateWrapperPosition() {
        var postInCarousel = $(".post-carousel .hentry");

        postInCarousel.each(function () {
            var $this = $(this),
                innerWrapper = $this.find('.inner-wrapper'),
                entrySummary = $this.find('.entry-summary');

            innerWrapper.css('bottom', -entrySummary.outerHeight());
        });
    }

    $window.on('load', function () {
        updateWrapperPosition();
    });

    $window.on('resize', function () {
        updateWrapperPosition();
    });


    /*------------------------------------------------------------------------------------*/
    /* Multiple Category Fixer
     /*-----------------------------------------------------------------------------------*/
    $('.positioned-categories').each(function () {
        var $this = $(this),
            catLength = $this.find('.cat-links a').length;

        if (5 < catLength) {
            $this.addClass('multiple-post-categories');
            $this.find('.entry-meta')
                .append('<span class="entry-meta-item top-post-meta-item">' + $this.find('.cat-links').html() + '</span>');
        }
    });

    /*------------------------------------------------------------------------------------*/
    /* Remove height/width attributes on avatar img tags.
    /*-----------------------------------------------------------------------------------*/
    var $avatar = $("img.avatar");
    $avatar.each(function () {
        var $this = $(this);

        $this.removeAttr('width');
        $this.removeAttr('height');
    });

    /*------------------------------------------------------------------------------------*/
    /* Masonry Blog Style
     /*-----------------------------------------------------------------------------------*/
    var blogMasonry = $("#blog-masonry"),
        clickCount = 0,
        loader = $('#loader'),
        loadMoreBtn = $('#load-more-btn'),
        maxPageNum = loader.data('page-num');

    function initiateIsotope() {
        blogMasonry.isotope({
            itemSelector: '.col-post'
        });
    }

    if (jQuery().isotope) {
        $window.on("load", function () {
            initiateIsotope();
        });

        blogMasonry.imagesLoaded(function () {
            initiateIsotope();
        });
    }

    blogMasonry.infinitescroll({
            navSelector: '.paging-navigation', // selector for the paged navigation
            nextSelector: '.paging-navigation a',  // selector for the NEXT link (to page 2)
            itemSelector: '.col-post', // selector for all items you'll retrieve
            loading: {
                finishedMsg: '',
                msgText: '',
                img: loader.data('loader-img'),
                selector: loader,
                speed: 0
            },
            // debug: true,
            bufferPx: 0,
            maxPage: maxPageNum
        },
        // trigger Isotope as a callback
        function (newElements) {
            // hide new items while they are loading
            var $newElems = $(newElements).css({opacity: 0});
            // ensure that images load before adding to masonry layout
            $newElems.imagesLoaded(function () {
                // show elems now they're ready
                $newElems.animate({opacity: 1});
                blogMasonry.isotope('appended', $newElems, true);
            });
        }
    );

    blogMasonry.infinitescroll('pause');

    loadMoreBtn.on('click', function () {
        blogMasonry.infinitescroll('retrieve');
        var iteration = maxPageNum - 1;

        clickCount++;
        if (clickCount >= iteration) {
            $(this).fadeOut(1000, function () {
                $('#load-more-msg').show();
            });
        }

        return false;
    });

    /*-----------------------------------------------------------------------------------*/
    /* Swipebox
     /*-----------------------------------------------------------------------------------*/
    if (jQuery().swipebox) {
        $('.clone .swipebox').removeClass('swipebox');
        $(".swipebox").swipebox();

        $('a[data-rel]').each(function () {
            $(this).attr('rel', $(this).data('rel'));
        });
    }

    /*-----------------------------------------------------------------------------------*/
    /*	Accordion
     /*-----------------------------------------------------------------------------------*/
    $('dl.accordion dt').click(function () {
        var $this = $(this);
        $this.siblings('dt').removeClass('current');
        $this.addClass('current').next('dd').stop(true, true).slideDown(250).siblings('dd').stop(true, true).slideUp(250);
    });

    /*-----------------------------------------------------------------------------------*/
    /*	Toggle
     /*-----------------------------------------------------------------------------------*/
    $('dl.toggle dt').click(function () {
        var $this = $(this);
        if ($this.hasClass('current')) {
            $this.removeClass('current').next('dd').stop(true, true).slideUp(250);
        }
        else {
            $this.addClass('current').next('dd').stop(true, true).slideDown(250);
        }
    });

    /*-----------------------------------------------------------------------------------*/
    /* Tabs
     /*-----------------------------------------------------------------------------------*/
    var tabsContainer = $('.tabs-container'),
        tabsNav = tabsContainer.find('.tabs-nav'),
        tabsNavLis = tabsNav.find('li'),
        tabContents = tabsContainer.find('.tab-content');

    tabsNavLis.first().addClass('active');
    tabContents.hide().first().show();

    tabsNavLis.on('click', function (event) {
        var $this = $(this);
        $this.siblings().removeClass('active').end().addClass('active');
        tabContents.stop(true, true).hide().eq($this.index()).fadeIn(250);
        event.preventDefault();
    });


    /*-----------------------------------------------------------------------------------*/
    /*	Scroll to Top
     /*-----------------------------------------------------------------------------------*/
    $(function () {
        var scrollAnchor = $('#scroll-top');
        $window.scroll(function () {
            if ($window.width() > 980) {
                if ($(this).scrollTop() > 250) {
                    scrollAnchor.fadeIn('fast');
                    return;
                }
            }
            scrollAnchor.fadeOut('fast');
        });

        scrollAnchor.on('click', function (event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, 'slow');
        });
    });

})(jQuery);