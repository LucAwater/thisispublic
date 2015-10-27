(function($) {

  if ($('.hero').length > 0) {
    $('body').addClass('has-hero');

    var sticky = new Waypoint.Sticky({
      element: $('header')[0],
      stuckClass: 'is-fixed'
    })
  }

}( jQuery ));