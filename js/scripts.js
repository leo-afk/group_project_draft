(function($) {
    "use strict"; // Start of use strict

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (
            location.pathname.replace(/^\//, "") ==
            this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length ?
                target :
                $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html, body").animate({
                        scrollTop: target.offset().top - 70,
                    },
                    1000,
                    "easeInOutExpo"
                );
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $(".js-scroll-trigger").click(function() {
        $(".navbar-collapse").collapse("hide");
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $("body").scrollspy({
        target: "#mainNav",
        offset: 100,
    });

    // Collapse Navbar
    var navbarCollapse = function() {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
        }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);
})(jQuery); // End of use strict

// slide show//

document.addEventListener("DOMContentLoaded", function() {
    var nut = document.querySelectorAll('div.nut ul li');
    var slides = document.querySelectorAll('div.slide div');
    for (var i = 0; i < nut.length; i++) {
        nut[i].addEventListener('click', function() {
            var nutnay = this;
            var vitrislide = 0;
            console.log(nutnay.previousElementSibling);
            for (var i = 0; nutnay = nutnay.previousElementSibling; vitrislide++) {
                //chay den khi nut nay  = null thi dung.
                // chay xong lenh nay khi click vao nut ta lay dc vitrislide
            }
            for (var i = 0; i < slides.length; i++) {
                slides[i].classList.remove('ra');
            }
            for (var i = 0; i < slides.length; i++) {
                slides[vitrislide].classList.add('ra');
            }
        })
    }
    // Click chuyen slide

    auto();

    function auto() {
        var thoigian = setInterval(function() {
            var slide = document.querySelector('div.slide div.ra');
            var vitrislide = 0;
            for (var i = 0; slide = slide.previousElementSibling; vitrislide++) {}
            for (var i = 0; i < slides.length; i++) {
                slides[i].classList.remove('ra');
            }
            if (vitrislide == slides.length - 1) {
                slides[0].classList.add('ra');

            } else {
                slides[vitrislide].nextElementSibling.classList.add('ra');

            }
        }, 3500)

        for (var i = 0; i < 3; i++) {
            nut[i].addEventListener('click', function() {
                clearInterval(thoigian);

            })
        }

    }

    var x = setInterval(function() {
        console.log('dm');
    }, 1000);

}, false)