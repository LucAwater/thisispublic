var infiniteScrollProducts = function() {
  var grid = $('.products');

  var waypoint = new Waypoint({
    element: grid,
    handler: function(direction) {
      if( direction == 'down' ){
        loadProducts();
        this.destroy();
      }
    },
    offset: 'bottom-in-view'
  });
};

if( $('.products').length > 0 ){
  infiniteScrollProducts();
}

var loadProducts = function() {
  // Add spinner below the grid
  $('.products').after('<div class="loader"></div>');

  // Get all current filter values
  var brand_current = $('a[title="brand-current"]').find('span').text().toLowerCase();
  var category_current = $('a[title="category-current"]').find('span').text().toLowerCase();
  var season_current = $('a[title="season-current"]').find('span').text().toLowerCase();
  var gender_current = $('a[title="gender-current"]').find('span').text().toLowerCase();
  var tag_current = $('a[title="tag-current"]').find('span').text().toLowerCase();

  // Count already loaded products
  var product_count = $('.product').length;

  // The ajax call
  jQuery.ajax({
    url : ajaxmoreproducts.ajax_url,
    type : 'post',
    data : {
      action : 'ajax_more_products',
      brand: brand_current,
      category: category_current,
      season: season_current,
      gender: gender_current,
      tag: tag_current,
      offset: product_count
    },
    success : function( response ) {
      jQuery('ul.products').append(response);

      // If the response is not empty, recalculate waypoints
      if( response ){
        $('.loader').remove();
        infiniteScrollProducts();
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