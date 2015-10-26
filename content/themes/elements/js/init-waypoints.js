(function($) {

  if ($('.hero').length > 0) {
    $('body').addClass('has-hero');

    var waypoint = new Waypoint({
      element: $('header'),
      handler: function() {
        $('header').toggleClass("is-fixed");
      }
    });
  }

}( jQuery ));