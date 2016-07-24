$(document).ready(function() {

    // Page animation
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 900,
        outDuration: 800,
        linkElement: '.animsition-link',

        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body',
        transition: function(url) {
            window.location.href = url;
        }
    });

    // Adding Ripple Styling to site
    Waves.attach('.btn');
    Waves.attach('.boxes');
    Waves.attach('.animsition-link');
    Waves.init();

    // Toggling Menu
    $('.toggle').on('click', function() {
        $(this).toggleClass('open');

        $('body').toggleClass('open-nav');

    });

    // MailChimp Newsletter Form
    var thanks = $('#thanks-text');
    thanks.hide();
    $('#load-image').hide();
    $('.mailchimp-form').submit(function(e) {
        e.preventDefault();
        var form = $('.mailchimp-form');
        $.ajax({
            url: form.attr('action'),
            type: 'GET',
            data: form.serialize(),
            dataType: 'json',
            contentType: "application/json; charset=utf-8",
            beforeSend: function() {
                $('#load-image').show();
                form.hide();
            },
            complete: function() {
                $('#load-image').hide();
            },
            success: function(data) {
                if (data['result'] != "success") {
                    form.show();
                    console.log(data['msg']);
                } else {
                    form.hide();
                    thanks.show();
                    sweetAlert("Thanks for Signing Up!", "Make sure to check your email to confirm!", "success");
                    console.log('Success');
                }
            }
        });
    });


});