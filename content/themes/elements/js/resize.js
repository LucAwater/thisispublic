(function ( $ ) {
  var body = $('body');
  var resizeTimer = 0;

  $(window).on('resize', function() {
    body.addClass("is-loading");

    clearTimeout(resizeTimer);

    resizeTimer = setTimeout((function() {
      body.removeClass("is-loading");
    }), 500);
  });
}( jQuery ));