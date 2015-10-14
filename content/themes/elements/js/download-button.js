(function($) {

  function downloaded() {
    var button = $('a.product_type_simple');
    
    button.click( function() {
      $(this).html("Download again!");
    });
  };

  downloaded();

}( jQuery ));