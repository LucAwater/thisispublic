(function ( $ ) {
  function resize() {
    var body = $('body');
    var resizeTimer = 0;

    body.addClass("is-loading");

    clearTimeout(resizeTimer);

    resizeTimer = setTimeout((function() {
      body.removeClass("is-loading");
    }), 500);
  };

  // resize();

  // $(window).on('resize', function() {
  //   resize();
  // });
}( jQuery ));