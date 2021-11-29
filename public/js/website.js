




    // carauosl

    $(document).ready(function() {
        $('.home-slider').owlCarousel({
            items: 1,
            margin: 10,
            loop: true,
            center: true,
            autoplay: true
        });

        $('.fastiner-slider').owlCarousel({
            nav: true,
            loop: true,
            margin: 10,
            items:1,
            autoplay: true,
            navContainer: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });

        $('.deals-slider').owlCarousel({
            nav: true,
            loop: true,
            margin: 10,
            items:1,
            autoplay: true,
            navContainer: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        });
    });



