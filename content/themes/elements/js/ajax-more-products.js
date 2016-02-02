var infiniteScrollProducts = function() {
  var grid = $('.products');

  var trigger_point = $(document).height() - $('footer').height();
  var screen_bottom = $(window).scrollTop() + $(window).height();

  $(window).on('scroll', function() {
    trigger_point = $(document).height() - $('footer').height();
    screen_bottom = $(window).scrollTop() + $(window).height();

    if( screen_bottom > trigger_point ){
      $(window).off('scroll');

      loadProducts();
    }

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
      $('ul.products').append(response);

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