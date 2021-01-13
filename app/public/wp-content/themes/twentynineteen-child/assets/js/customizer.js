(function ($) {
    wp.customize('wpcookbook-text-color', function (value) {
        value.bind(function (to) {
            $('body').css('color', to);
        });
    });
})(jQuery);