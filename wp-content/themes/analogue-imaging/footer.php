<?php
$phone = get_theme_mod('phone_number'); $email = antispambot(get_theme_mod('email'),1);
$contactPopupGroup = get_field('contact_popup_group', 'options');
$contactTitle = $contactPopupGroup['contact_title']; 
$salesFormGroup = $contactPopupGroup['sales_form_group'];
$salesFormTitle = $salesFormGroup['sales_form_title']; $salesForm = $salesFormGroup['sales_form']; 
$serviceFormGroup = $contactPopupGroup['service_form_group'];
$serviceFormTitle = $serviceFormGroup['service_form_title']; $serviceForm = $serviceFormGroup['service_form'];
?>
    <div class="popup" data-popup="contact-popup">
        <div class="popup-inner">
            <?php echo $contactTitle ? '<h2>'. $contactTitle .'</h2>' : ''; ?>
            <?php echo $phone ? '<span class="popup-phone"><a href="tel:+1'. $phone .'"><i class="fa fa-phone"></i>'. $phone .'</a></span>' : ''; ?>
            <?php echo $email ? '<span class="popup-email"><a href="mailto:'. $email .'"><i class="fa fa-envelope"></i></a></span>' : ''; ?>
            <div class="forms flex-display-align">
                <div class="service-form flex-col">
                    <?php echo $serviceFormTitle ? '<h3>'. $serviceFormTitle .'</h3>' : ''; ?>
                    <?php if($serviceForm): $formShort = '[gravityform id='. $serviceForm .' title=false description=false tabindex=49]'; echo do_shortcode($formShort); endif; ?>
                </div>
                <div class="sales-form flex-col">
                    <?php echo $salesFormTitle ? '<h3>'. $salesFormTitle .'</h3>' : ''; ?>
                    <?php if($salesForm): $formShort = '[gravityform id='. $salesForm .' title=false description=false tabindex=49]'; echo do_shortcode($formShort); endif; ?>
                </div>
            </div>
            <a class="close-link" data-popup-close="contact-popup">Close</a>
            <a class="popup-close" data-popup-close="contact-popup">x</a>
        </div>
    </div>
    <footer>
        <div class="container footer-inner">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sitemap">
                    <?php wp_nav_menu( array('theme_location' => 'footer_menu', 'items_wrap' => '<ul class="list-inline">%3$s</ul>', 'menu_class' => '' )); ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 copyright">
                    <a href="<?php echo get_theme_mod('footer_partner_url');?>" rel="nofollow" target="_blank">&copy; <?php echo date('Y'); ?> Copyright &amp; Powered By <?php echo get_theme_mod('footer_partner_name');?></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/js/swiper.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
    <script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.photobox.js" type="text/javascript"></script>

    <script language="JavaScript" type="application/javascript">
        //Product Learn More Toggle (must be before scroll to correct spot code)
        $('.learn-more-link').click(function() {
            $('.additional-product-info').slideToggle('500');
            $(this).toggleClass('active');
        });

        //Animate Scroll To Correct Spot
        if (location.hash) {
            scrollPageToAnchor(window.location.hash);
        }
        $('a').click(function(e) {
            if ($(this)[0].host + $(this)[0].pathname == window.location.host + window.location.pathname) {
                e.preventDefault();
                scrollPageToAnchor($(this)[0].hash);
                window.location.hash = $(this)[0].hash;
            }
        });

        function scrollPageToAnchor(anchor) {
            anchor = anchor.replace('/', '');
            var fixedElementHeight = 50;
            var anchorMarginPadding = $(anchor).outerHeight(true) - $(anchor).innerHeight();
            var scrollDuration = 1000;
            $('html, body').animate({
                scrollTop: $(anchor).offset().top - anchorMarginPadding - fixedElementHeight
            }, scrollDuration);
        }

        //Video Parallax Effect
        $(document).ready(function() {
            if ($(window).width() > 991) {
                $(window).on('load scroll', function() {
                    var scrolled = $(this).scrollTop();
                    $('video').css('transform', 'translate3d(0, ' + -(scrolled * 0.5) + 'px, 0)');
                });
            }

        });

        //Banner Heights
        $(document).ready(function() {
            if ($(window).width() > 991) {
                function setHeight() {
                    windowHeight = $(window).innerHeight();
                    $('#banner').css('height', windowHeight - 175);
                };
                setHeight();
                $(window).resize(function() {
                    setHeight();
                });
            }
        });

        //Mobile Nav Toggler
        $('#nav-toggler').click(function() {
            $('#menu-wrap').slideToggle('300');
            $(this).toggleClass('active');
        });

        //Add modal attributes to nav item, remove hash
        $('li.modal-popup-item a').attr({
            class: "modal-wrapper",
            'data-popup-open': "contact-popup"
        });
        $('li.modal-popup-item a').removeAttr("href");

        //Product video/image function
        var iframe = $('#product-video')[0];
        var player = $f(iframe);

        player.addEvent('ready', function() {
            player.addEvent('finish', onFinish);
            player.addEvent('pause', onPause);
        });
        $('#play').bind('click', function() {
            player.api("play");
            $('.product-image').addClass('product-image-hidden');
            $('.product-video-container').addClass('product-video-show');
        });
        $('#pause').bind('click', function() {
            player.api("pause");
            $('.product-image').removeClass('product-image-hidden');
            $('.product-video-container').removeClass('product-video-show');
        });

        function onFinish() {
            $('.product-image').removeClass('product-image-hidden');
            $('.product-video-container').removeClass('product-video-show');
        };

        function onPause() {
            $('.product-image').removeClass('product-image-hidden');
            $('.product-video-container').removeClass('product-video-show');
        };

        //Modal
        $(function() {
            //Opens Modal
            $('[data-popup-open]').on('click', function(e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-open');
                pdfEmail = $(this).data('pdf');
                $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
                e.preventDefault();
            }); //end
            //Closes window when 'X' button or 'close' link inside of modal are clicked
            $('[data-popup-close]').on('click', function(e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-close');
                $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
                e.preventDefault();
            });
            $('.modal-wrapper').each(function() {
                $('.modal-wrapper>div:last-child').css('min-height', $('.modal-wrapper>div:first-child').height() + 'px');
            }); //end
            //Closes Modal when esc key is pressed
            $(document).keyup(function(e) {
                if (!$('#pbOverlay').hasClass('show') && e.keyCode == 27) {
                    var targeted_popup_class = jQuery(this).attr('data-popup-close');
                    $('.popup').fadeOut(350);
                    e.preventDefault();
                }
            }); //end
            //Closes Modal when window is clicked outside of modal window
            $('.popup').click(function(e) {
                $(function() {
                    var flag = false;
                    $('.popup').each(function() {
                        if ($(this).css('display') == 'block') {
                            flag = true;
                        }
                    });
                    if (flag) {
                        $('.popup').fadeOut(350);
                    }
                });
            });
            $('.popup-inner').click(function(event) {
                event.stopPropagation();
            }); //end
        }); //End Modal

        //Auto Populate Hidden Form Field
        $('a.pdf-popup-link').click(function() {
            $pdfName = $(this).html();
            $('input#input_3_4').attr('value', $pdfName);
        });
        $('.product-brochure-btn').click(function() {
            $pdfName = $(this).html();
            $('input#input_3_4').attr('value', $pdfName);
        });

        //Download pdf on submit
        $('.pdf-dropdown a').click(function() {
            $(this).siblings('.pdf-dropdown-inner').show('300');
        });
        $('.pdf-popup-link').click(function() {
            $('form').each(function() {
                this.reset();
            });
            $('.download-pdf-link').hide();
        })
        var pdfEmail = '';

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        };
        $('.download-pdf-link').hide();
        $(document).on('change keyup', '#input_3_2', function() {
            if (isEmail($(this).val())) {
                $('.download-pdf-link').show();
                $('.download-pdf-link').attr('href', pdfEmail);
            } else {
                $('.download-pdf-link').hide();
            }
        });
        $('.download-pdf-link').click(function() {
            $('#gform_submit_button_3').trigger('click');
        });

        //Show/Hide different selections on product page
        <?php $productRepeater = get_field('product_repeater'); ?>;
        var myArray = <?php echo json_encode($productRepeater); ?>;
        $('#product-comparisons select').on('change', function() {
            var num = $(this).data('num');
            var content = '<img class="img-responsive center-block" src="' + myArray[$(this).val()]['image']['url'] + '" title="' + myArray[$(this).val()]['image']['title'] + '" alt="' + myArray[$(this).val()]['image']['alt'] + '">' +
                '<h3>' + myArray[$(this).val()]['heading'] + '</h3>';
            specArray = myArray[$(this).val()]['spec_repeater'];
            var editedHTML = [];
            for (var i = 0; i < specArray.length; i++) {
                editedHTML.push('<div class="product-content flex-display">' +
                    '<div class="spec-title flex-40-full">' + specArray[i]['title'] + '</div>' +
                    '<div class="spec-info flex-60-full">' + specArray[i]['info'] + '</div>' +
                    '</div>');
            };
            if (myArray[$(this).val()]['link'] != '') {
                var contentBtn = '<a class="btn" href="' + myArray[$(this).val()]['link']['url'] + '" title="' + myArray[$(this).val()]['link']['title'] + '" target="' + myArray[$(this).val()]['link']['target'] + '">' + myArray[$(this).val()]['link']['title'] + '</a>';
                $('#col' + num).html(content + editedHTML.join("") + contentBtn);
            } else {
                $('#col' + num).html(content + editedHTML.join(""));
            }
        });

        $(document).ready(function() {
            //Testimonials auto-scroll
            var maxTestimonialHeight = -1;
            $('.testimonial-box').each(function() {
                var testimonialHeight = $(this).outerHeight();
                maxTestimonialHeight = testimonialHeight > maxTestimonialHeight ? testimonialHeight : maxTestimonialHeight;
            });
            $('.testimonial-box').css('height', maxTestimonialHeight);
            $('.testimonials-outer-box').css('height', maxTestimonialHeight * 3);
            $(function() {
                var tickerHeight = $('.testimonial-box').outerHeight();
                $('.testimonial-box:last-child').prependTo('.testimonials-box');
                $('.testimonials-box').css('marginTop', -tickerHeight);

                function moveTop() {
                    $('.testimonials-box').animate({
                        top: -tickerHeight
                    }, 800, function() {
                        $('.testimonial-box:first-child').appendTo('.testimonials-box');
                        $('.testimonials-box').css('top', '');
                    });
                }
                setInterval(function() {
                    moveTop();
                }, 5500);
            });

            //News and Events Scroll
            var maxNewsBoxHeight = -1;
            var count = 0;
            $('.news-group').each(function() {
                var newsBoxHeight = $(this).outerHeight();
                maxNewsBoxHeight = newsBoxHeight > maxNewsBoxHeight ? newsBoxHeight : maxNewsBoxHeight;
                count++;
            });
            var fullHeight = maxNewsBoxHeight * count;
            $('.news-group').css({
                'height': maxNewsBoxHeight,
                'top': 0
            });
            $('.news-and-events-box').css('height', maxNewsBoxHeight);
            var topValue = $('.news-group').get(0).style.top;
            var newTopVal = parseInt(topValue, 10);
            if (newTopVal == 0) {
                $('.news-scroll-up').hide();
            }
            $('.news-scroll-down').click(function() {
                var topValue = $('.news-group').get(0).style.top;
                var newTopVal = parseInt(topValue, 10) - maxNewsBoxHeight;
                $('.news-group').animate({
                    top: '-=' + maxNewsBoxHeight
                });
                if (newTopVal == -(fullHeight - maxNewsBoxHeight)) {
                    $(this).hide();
                }
                $('.news-scroll-up').show();
            });
            $('.news-scroll-up').click(function() {
                var topValue = $('.news-group').get(0).style.top;
                var newTopVal = parseInt(topValue, 10) + maxNewsBoxHeight;
                $('.news-group').animate({
                    top: '+=' + maxNewsBoxHeight
                });
                if (newTopVal == 0) {
                    $(this).hide();
                }
                $('.news-scroll-down').show();
            });
        });

    </script>
    <?php wp_footer(); ?>
    </body>

    </html>
