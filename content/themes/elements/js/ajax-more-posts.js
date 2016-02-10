jQuery(document).ready( function($) {

  var infiniteScrollPosts = function() {
    var grid = $('.posts');

    var trigger_point = $(document).height() - $('footer').height();
    var screen_bottom = $(window).scrollTop() + $(window).height();

    $(window).on('scroll', function() {
      trigger_point = $(document).height() - $('footer').height();
      screen_bottom = $(window).scrollTop() + $(window).height();

      if( screen_bottom > trigger_point ){
        $(window).off('scroll');

        loadPosts();
      }
    });
  };

  if( $('.posts').length > 0 ){
    infiniteScrollPosts();
  }

  var loadPosts = function() {
    // Add spinner below the grid
    $('.posts').after('<div class="loader"></div>');

    // Count already loaded products
    var post_count = $('.posts li').length;

    // The ajax call
    jQuery.ajax({
      url : ajaxmoreposts.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_more_posts',
        offset: post_count
      },
      success : function( response ) {
        jQuery('ul.posts').append(response);

        // If the response is not empty, recalculate waypoints
        if( response ){
          $('.loader').remove();
          infiniteScrollPosts();
        } else {
          $('.loader').remove();
        }
      }
    }).then( function(){
      // Re-initialize isotope
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