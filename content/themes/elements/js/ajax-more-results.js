var infiniteScrollResults = function() {
  var grid = $('.search-results .products');

  var trigger_point = $(document).height() - $('footer').height();
  var screen_bottom = $(window).scrollTop() + $(window).height();

  $(window).on('scroll', function() {
    trigger_point = $(document).height() - $('footer').height();
    screen_bottom = $(window).scrollTop() + $(window).height();

    if( screen_bottom > trigger_point ){
      $(window).off('scroll');

      loadResults();
    }
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

  console.log(key);
  
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
      $('.search-results .products').append(response);

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