(function($) {

  if ($('.isotope').length > 0) {
    console.log("isotope class detected");
    var masonry = $('.isotope-masonry');

    $('main').imagesLoaded( function() {
      masonry.isotope({
        layoutMode: 'masonry'
      });
    });
  };

}( jQuery ));