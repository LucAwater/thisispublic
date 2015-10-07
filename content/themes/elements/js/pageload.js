(function($) {
  Pace.on('done', function() {
    $('body').removeClass("is-loading");
    $('.pace').remove();
  });
}( jQuery ));