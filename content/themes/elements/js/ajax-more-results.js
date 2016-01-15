jQuery(document).ready( function($) {

  var infiniteScrollResults = function() {
    var grid = $('.search-results .products');

    var waypoint = new Waypoint({
      element: grid,
      handler: function(direction) {
        if( direction == 'down' ){
          loadResults();
          this.destroy();
        }
      },
      offset: 'bottom-in-view'
    });
  };

  if( $('.search-results .products').length > 0 ){
    infiniteScrollResults();
  }

  var loadResults = function() {
    // Add spinner below the grid
    $('.products').after('<div class="loader"></div>');

    // Get searched key
    var key = $('h1.search-result').data('searched');

    // Count already loaded products
    var product_count = $('.product').length;

    // The ajax call
    jQuery.ajax({
      url : ajaxmoreresults.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_more_results',
        offset: product_count,
        key: key
      },
      success : function( response ) {
        jQuery('.search-results .products').append(response);

        if( response ){
          $('.loader').remove();
          infiniteScrollResults();
        } else {
          $('.loader').remove();
        }
      }
    }).then( function(){
      var masonry = $('.isotope-masonry');
      var items = $('.product');

      $('main').imagesLoaded( function() {
        masonry.isotope( 'reloadItems' ).isotope({
          itemSelector: 'li',
          transitionDuration: 0
        });
      });
    });
  };
})