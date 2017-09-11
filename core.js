jQuery(document).ready(function ($) {
    $carousel = $(".carousel");
    $window = $(window);

    $(".nav").sideNav({});
    $(".parallax").parallax();

    if ($carousel.length > 0) {
        if ($carousel.children().length > 1) {
            $carousel.carousel({fullWidth: true, indicators: true});
        }

        var cst = $carousel.offset().top;
        var csb = cst + $carousel.height();

        $window.bind("scroll", function () {
            var ct = $window.scrollTop();
            if (ct >= csb) {
                return;
            }

            var percentage = Math.floor(100 * ($carousel.height() / ($carousel.height() - ct + cst))) / 100;
            if (percentage < 1.5) {
                $carousel.find('img').css('filter', 'blur(0px)');
                return;
            }
            // var percentage = (ct + cst) / $carousel.height()*10 - 5 * (720/$carousel.height());
            $carousel.find('img').css('filter', 'blur(' + percentage + 'px)');
        });
    }

    $fillviewport = $('.fillviewport');
    if ($fillviewport.length > 0) {
        var h = $window.innerHeight() - $('body>header').outerHeight() - $('body>footer').outerHeight() - $('section.icon-bar').outerHeight();
        $fillviewport.css('min-height', h + 'px');
        $fillviewport.css('overflow', 'hidden');
    }

    $('li.hasmore').click(function () {
        $(this).toggleClass('showmore');
    });
});